<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'thumbnail', 'author_id'
    ];

    protected $casts = [
        'created_at' => 'date'
    ];

    public function getPublishedAtAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
