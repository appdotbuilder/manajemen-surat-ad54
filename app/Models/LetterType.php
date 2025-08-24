<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\LetterType
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property string $priority
 * @property string $color_code
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomingLetter> $incomingLetters
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OutgoingLetter> $outgoingLetters
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType query()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType whereColorCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterType active()
 * @method static \Database\Factories\LetterTypeFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class LetterType extends Model
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
        'priority',
        'color_code',
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
     * Get incoming letters for this type.
     */
    public function incomingLetters(): HasMany
    {
        return $this->hasMany(IncomingLetter::class, 'letter_type_id');
    }

    /**
     * Get outgoing letters for this type.
     */
    public function outgoingLetters(): HasMany
    {
        return $this->hasMany(OutgoingLetter::class, 'letter_type_id');
    }

    /**
     * Scope a query to only include active types.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}