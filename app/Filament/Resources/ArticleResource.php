<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 3;
    protected static ?string $recordTitleAttribute = 'title';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', Auth::id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Main Content')
                            ->description('Enter the basic information about your article')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->reactive()
                                    ->debounce(1000)
                                    ->afterStateUpdated(fn ($state, callable $set) =>
                                    $set('slug', Str::slug($state)))
                                    ->placeholder('Enter article title')
                                    ->helperText('A descriptive title for your article')
                                    ->columnSpan('full'),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Article::class, 'slug', fn ($record) => $record)
                                    ->placeholder('article-slug')
                                    ->helperText('Used in the URL, auto-generated from title')
                                    ->columnSpan('full'),

                                Forms\Components\MarkdownEditor::make('excerpt')
                                    ->maxLength(500)
                                    ->placeholder('Write a short excerpt (summary) of your article')
                                    ->helperText('A brief summary - max 500 characters')
                                    ->toolbarButtons([
                                        'bold', 'italic', 'strike', 'bulletList', 'orderedList'
                                    ])
                                    ->columnSpan('full'),

                                Forms\Components\MarkdownEditor::make('content')
                                    ->required()
                                    ->placeholder('Write your article content here...')
                                    ->helperText('Full article content with formatting')
                                    ->columnSpan('full'),
                            ]),

                        Forms\Components\Section::make('Media')
                            ->description('Upload media files for your article')
                            ->icon('heroicon-o-photo')
                            ->collapsed()
                            ->schema([
                                Forms\Components\SpatieMediaLibraryFileUpload::make('featured_image')
                                    ->collection('featured_images')
                                    ->image()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1200')
                                    ->imageResizeTargetHeight('675')
                                    ->helperText('Recommended size: 1200x675 pixels (16:9 ratio)')
                                    ->columnSpan('full'),
                            ]),

                        Forms\Components\Section::make('SEO')
                            ->description('Search engine optimization settings')
                            ->icon('heroicon-o-magnifying-glass')
                            ->collapsed()
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->placeholder('SEO Title (leave blank to use article title)')
                                    ->helperText('Max 60 characters for optimal SEO')
                                    ->maxLength(60),

                                Forms\Components\Textarea::make('meta_description')
                                    ->placeholder('SEO Description - what should search engines show?')
                                    ->helperText('Recommended: 120-160 characters')
                                    ->maxLength(160),
                            ]),
                    ])
                    ->columnSpan(2),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Publishing Settings')
                            ->description('Configure how and when your article is published')
                            ->icon('heroicon-o-cog')
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'pending_review' => 'Pending Review',
                                        'published' => 'Published',
                                        'scheduled' => 'Scheduled',
                                    ])
                                    ->default('draft')
                                    ->required()
                                    ->reactive()
                                    ->helperText('Current publishing status'),

                                Forms\Components\DateTimePicker::make('published_at')
                                    ->label('Publish Date')
                                    ->visible(fn (callable $get) =>
                                    in_array($get('status'), ['published', 'scheduled']))
                                    ->helperText('When should this article go live?')
                                    ->default(now()),

                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\Toggle::make('is_featured')
                                            ->label('Featured Article')
                                            ->helperText('Show in featured section')
                                            ->default(false),

                                        Forms\Components\Toggle::make('allow_comments')
                                            ->label('Allow Comments')
                                            ->helperText('Enable user comments')
                                            ->default(true),
                                    ]),
                            ]),

                        Forms\Components\Section::make('Categories & Tags')
                            ->description('Organize your article with categories and tags')
                            ->icon('heroicon-o-tag')
                            ->schema([
                                Forms\Components\Select::make('primary_category_id')
                                    ->label('Primary Category')
                                    ->relationship('primaryCategory', 'name', function (Builder $query) {
                                        // Show only user's categories and system categories
                                        return $query->where('user_id', Auth::id())
                                            ->orWhereNull('user_id');
                                    })
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\Hidden::make('user_id')
                                            ->default(fn () => Auth::id()),
                                        Forms\Components\Hidden::make('type')
                                            ->default('user'),
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
                                            ->unique(Category::class, 'slug'),
                                        Forms\Components\Textarea::make('description')
                                            ->maxLength(255),
                                    ])
                                    ->helperText('Main category for this article')
                                    ->required(),

                                Forms\Components\Select::make('categories')
                                    ->label('Additional Categories')
                                    ->relationship('categories', 'name', function (Builder $query) {
                                        // Show only user's categories and system categories
                                        return $query->where('user_id', Auth::id())
                                            ->orWhereNull('user_id');
                                    })
                                    ->multiple()
                                    ->searchable()
                                    ->preload()
                                    ->helperText('Select additional categories'),

                                Forms\Components\Select::make('tags')
                                    ->relationship('tags', 'name', function (Builder $query) {
                                        // Show only user's tags and system tags
                                        return $query->where('user_id', Auth::id())
                                            ->orWhereNull('user_id');
                                    })
                                    ->multiple()
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\Hidden::make('user_id')
                                            ->default(fn () => Auth::id()),
                                        Forms\Components\Hidden::make('type')
                                            ->default('user'),
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
                                            ->unique(Tag::class, 'slug'),
                                    ])
                                    ->helperText('Add relevant tags to improve discoverability'),
                            ]),

                        // Auto set current user
                        Forms\Components\Hidden::make('user_id')
                            ->default(fn () => Auth::id())
                            ->dehydrated(fn ($state, $record) =>
                                !$record || $record->user_id === Auth::id()),
                    ])
                    ->columnSpan(1),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('featured_image')
                    ->label('Image')
                    ->collection('featured_images')
                    ->circular(false)
                    ->square()
                    ->size(40),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->tooltip(fn (Article $record): string => $record->title),

                Tables\Columns\TextColumn::make('primaryCategory.name')
                    ->label('Primary Category')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'danger' => 'draft',
                        'warning' => 'pending_review',
                        'success' => 'published',
                        'primary' => 'scheduled',
                    ]),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-x-mark'),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published')
                    ->date('M d, Y')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->date('M d, Y')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'pending_review' => 'Pending Review',
                        'published' => 'Published',
                        'scheduled' => 'Scheduled',
                    ])
                    ->multiple(),

                Tables\Filters\SelectFilter::make('primary_category_id')
                    ->label('Primary Category')
                    ->relationship('primaryCategory', 'name', function (Builder $query) {
                        // Only include categories that are used in articles
                        return $query->whereHas('primaryArticles', function (Builder $subQuery) {
                            $subQuery->where('user_id', Auth::id());
                        });
                    })
                    ->searchable()
                    ->preload(),

                Tables\Filters\Filter::make('is_featured')
                    ->query(fn (Builder $query) => $query->where('is_featured', true))
                    ->label('Featured Only')
                    ->toggle(),

                Tables\Filters\Filter::make('published')
                    ->query(fn (Builder $query) => $query->whereNotNull('published_at')
                        ->where('published_at', '<=', now())
                        ->where('status', 'published'))
                    ->label('Published Only')
                    ->toggle(),

                Tables\Filters\Filter::make('created_this_month')
                    ->query(fn (Builder $query) => $query->whereMonth('created_at', now()->month))
                    ->label('Created This Month')
                    ->toggle(),
            ])

            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('duplicate')
                        ->label('Duplicate')
                        ->icon('heroicon-o-document-duplicate')
                        ->color('warning')
                        ->action(function (Article $record) {
                            $duplicate = $record->replicate();
                            $duplicate->title = "Copy of {$record->title}";
                            $duplicate->slug = Str::slug("Copy of {$record->title}");
                            $duplicate->status = 'draft';
                            $duplicate->save();

                            // Copy relationships
                            $duplicate->categories()->attach($record->categories);
                            $duplicate->tags()->attach($record->tags);

                            return redirect()->route('filament.admin.resources.articles.edit', ['record' => $duplicate->id]);
                        }),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('updateStatus')
                        ->label('Update Status')
                        ->icon('heroicon-o-check-circle')
                        ->form([
                            Forms\Components\Select::make('status')
                                ->label('New Status')
                                ->options([
                                    'draft' => 'Draft',
                                    'pending_review' => 'Pending Review',
                                    'published' => 'Published',
                                    'scheduled' => 'Scheduled',
                                ])
                                ->required(),
                            Forms\Components\DateTimePicker::make('published_at')
                                ->label('Publish Date')
                                ->visible(fn (callable $get) => in_array($get('status'), ['published', 'scheduled']))
                                ->required(fn (callable $get) => in_array($get('status'), ['published', 'scheduled'])),
                        ])
                        ->action(function (array $data, Collection $records) {
                            foreach ($records as $record) {
                                $record->status = $data['status'];
                                if (in_array($data['status'], ['published', 'scheduled']) && isset($data['published_at'])) {
                                    $record->published_at = $data['published_at'];
                                }
                                $record->save();
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

    public static function canEdit(Article|\Illuminate\Database\Eloquent\Model $record): bool
    {
        return $record->user_id === Auth::id();
    }

    public static function canDelete(Article|\Illuminate\Database\Eloquent\Model $record): bool
    {
        return $record->user_id === Auth::id();
    }

    public static function canDeleteAny(): bool
    {
        return true; // Users can bulk delete, but we'll filter by user_id in the query
    }
}
