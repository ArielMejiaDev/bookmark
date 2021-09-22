<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Recipe
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string|null $thumbnail
 * @property int $author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $author
 * @property-read string $published_at
 * @method static \Database\Factories\RecipeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'thumbnail', 'author_id'
    ];

    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
        'author_id' => 'integer',
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
