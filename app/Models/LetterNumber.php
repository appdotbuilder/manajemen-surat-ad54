<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\LetterNumber
 *
 * @property int $id
 * @property string $type
 * @property int $category_id
 * @property string $prefix
 * @property string $format
 * @property int $current_number
 * @property int $year
 * @property bool $reset_yearly
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\LetterCategory $category
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber query()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber whereCurrentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber whereYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber whereResetYearly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterNumber active()
 * @method static \Database\Factories\LetterNumberFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class LetterNumber extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'type',
        'category_id',
        'prefix',
        'format',
        'current_number',
        'year',
        'reset_yearly',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'category_id' => 'integer',
        'current_number' => 'integer',
        'year' => 'integer',
        'reset_yearly' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the category for this letter number.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(LetterCategory::class, 'category_id');
    }

    /**
     * Scope a query to only include active letter numbers.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}