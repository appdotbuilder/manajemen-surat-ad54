<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\LetterCategory
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property string $type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomingLetter> $incomingLetters
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OutgoingLetter> $outgoingLetters
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LetterNumber> $letterNumbers
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory active()
 * @method static \Database\Factories\LetterCategoryFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class LetterCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'type',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get incoming letters for this category.
     */
    public function incomingLetters(): HasMany
    {
        return $this->hasMany(IncomingLetter::class, 'category_id');
    }

    /**
     * Get outgoing letters for this category.
     */
    public function outgoingLetters(): HasMany
    {
        return $this->hasMany(OutgoingLetter::class, 'category_id');
    }

    /**
     * Get letter numbers for this category.
     */
    public function letterNumbers(): HasMany
    {
        return $this->hasMany(LetterNumber::class, 'category_id');
    }

    /**
     * Scope a query to only include active categories.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}