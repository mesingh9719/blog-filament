<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'bio',
        'website',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
