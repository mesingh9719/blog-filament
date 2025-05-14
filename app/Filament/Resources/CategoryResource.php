<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where(function (Builder $query) {
                $query->where('user_id', Auth::id())
                    ->orWhereNull('user_id');
            });
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Select::make('parent_id')
                            ->label('Parent Category')
                            ->relationship('parent', 'name', function (Builder $query) {
                                // Only allow selecting parent categories that belong to the user or are null
                                return $query->where('user_id', Auth::id())
                                    ->orWhereNull('user_id');
                            })
                            ->searchable()
                            ->preload()
                            ->placeholder('Select parent category (optional)'),

                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->reactive()
                            ->debounce(1000)
                            ->afterStateUpdated(fn ($state, callable $set) =>
                            $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(Category::class, 'slug', fn ($record) => $record),

                        Forms\Components\TextInput::make('order')
                            ->default('0')
                            ->numeric(),

                        Forms\Components\Textarea::make('description')
                            ->maxLength(255)
                            ->columnSpan('full'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Parent')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('order')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                // Add this column to show ownership status
                Tables\Columns\BadgeColumn::make('ownership')
                    ->label('Ownership')
                    ->getStateUsing(function (Category $record): string {
                        return $record->user_id === Auth::id() ? 'Mine' : 'System';
                    })
                    ->colors([
                        'primary' => fn ($state) => $state === 'Mine',
                        'secondary' => fn ($state) => $state === 'System',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('parent_id')
                    ->label('Parent Category')
                    ->relationship('parent', 'name')
                    ->searchable()
                    ->placeholder('All Categories'),

                Tables\Filters\Filter::make('is_active')
                    ->query(fn ($query) => $query->where('is_active', true))
                    ->label('Active Only')
                    ->toggle(),

                // Add a filter for ownership
                Tables\Filters\SelectFilter::make('ownership')
                    ->options([
                        'mine' => 'My Categories',
                        'system' => 'System Categories',
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query->when($data['value'] === 'mine', function (Builder $query) {
                            return $query->where('user_id', Auth::id());
                        })->when($data['value'] === 'system', function (Builder $query) {
                            return $query->whereNull('user_id');
                        });
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('parent_id')
                    ->label('Parent Category')
                    ->relationship('parent', 'name')
                    ->searchable()
                    ->placeholder('All Categories'),

                Tables\Filters\Filter::make('is_active')
                    ->query(fn ($query) => $query->where('is_active', true))
                    ->label('Active Only')
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn (Category $record) => $record->user_id === Auth::id()),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn (Category $record) => $record->user_id === Auth::id()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Tables\Actions\DeleteBulkAction $action) {
                            // Check if any system categories are selected
                            $systemCategorySelected = $action->getRecords()->contains(function (Category $record) {
                                return $record->user_id !== Auth::id();
                            });

                            if ($systemCategorySelected) {
                                // Cancel the action if a system category is selected
                                $action->cancel();
                                $action->notify('danger', 'You can only delete your own categories.');
                            }
                        }),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    // Add this to ensure edit page authorization
    public static function canEdit(Category|\Illuminate\Database\Eloquent\Model $record): bool
    {
        return $record->user_id === Auth::id();
    }

    // Add this to ensure delete authorization
    public static function canDelete(Category|\Illuminate\Database\Eloquent\Model $record): bool
    {
        return $record->user_id === Auth::id();
    }
}
