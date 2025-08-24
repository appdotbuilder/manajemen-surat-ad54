<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\IncomingLetter
 *
 * @property int $id
 * @property string $letter_number
 * @property string $internal_number
 * @property string $subject
 * @property string $sender
 * @property string|null $sender_address
 * @property \Illuminate\Support\Carbon $letter_date
 * @property \Illuminate\Support\Carbon $received_date
 * @property int $category_id
 * @property int $letter_type_id
 * @property int $received_by
 * @property string|null $notes
 * @property string|null $file_path
 * @property string|null $file_name
 * @property int|null $file_size
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\LetterCategory $category
 * @property-read \App\Models\LetterType $letterType
 * @property-read \App\Models\Employee $receivedByEmployee
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Disposition> $dispositions
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereLetterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereInternalNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereSender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereSenderAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereLetterDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereReceivedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereLetterTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereReceivedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereUpdatedAt($value)
 * @method static \Database\Factories\IncomingLetterFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class IncomingLetter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'letter_number',
        'internal_number',
        'subject',
        'sender',
        'sender_address',
        'letter_date',
        'received_date',
        'category_id',
        'letter_type_id',
        'received_by',
        'notes',
        'file_path',
        'file_name',
        'file_size',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'letter_date' => 'date',
        'received_date' => 'date',
        'category_id' => 'integer',
        'letter_type_id' => 'integer',
        'received_by' => 'integer',
        'file_size' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the category for this letter.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(LetterCategory::class, 'category_id');
    }

    /**
     * Get the letter type.
     */
    public function letterType(): BelongsTo
    {
        return $this->belongsTo(LetterType::class, 'letter_type_id');
    }

    /**
     * Get the employee who received this letter.
     */
    public function receivedByEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'received_by');
    }

    /**
     * Get dispositions for this letter.
     */
    public function dispositions(): HasMany
    {
        return $this->hasMany(Disposition::class);
    }
}