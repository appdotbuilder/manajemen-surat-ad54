<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\OutgoingLetter
 *
 * @property int $id
 * @property string $letter_number
 * @property string $subject
 * @property string $recipient
 * @property string|null $recipient_address
 * @property \Illuminate\Support\Carbon $letter_date
 * @property \Illuminate\Support\Carbon|null $sent_date
 * @property int $category_id
 * @property int $letter_type_id
 * @property int $created_by
 * @property int|null $signed_by
 * @property string|null $content
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
 * @property-read \App\Models\Employee $createdByEmployee
 * @property-read \App\Models\Employee|null $signedByEmployee
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereLetterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereRecipient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereRecipientAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereLetterDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereSentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereLetterTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereSignedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereUpdatedAt($value)
 * @method static \Database\Factories\OutgoingLetterFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class OutgoingLetter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'letter_number',
        'subject',
        'recipient',
        'recipient_address',
        'letter_date',
        'sent_date',
        'category_id',
        'letter_type_id',
        'created_by',
        'signed_by',
        'content',
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
        'sent_date' => 'date',
        'category_id' => 'integer',
        'letter_type_id' => 'integer',
        'created_by' => 'integer',
        'signed_by' => 'integer',
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
     * Get the employee who created this letter.
     */
    public function createdByEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }

    /**
     * Get the employee who signed this letter.
     */
    public function signedByEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'signed_by');
    }
}