<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Disposition
 *
 * @property int $id
 * @property string $disposition_number
 * @property int $incoming_letter_id
 * @property int $from_employee_id
 * @property int $to_employee_id
 * @property int|null $to_department_id
 * @property string $disposition_type
 * @property string|null $instructions
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $due_date
 * @property string $priority
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property string|null $completion_notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\IncomingLetter $incomingLetter
 * @property-read \App\Models\Employee $fromEmployee
 * @property-read \App\Models\Employee $toEmployee
 * @property-read \App\Models\Department|null $toDepartment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DispositionHistory> $histories
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereDispositionNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereIncomingLetterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereFromEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereToEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereToDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereDispositionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereCompletionNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition whereUpdatedAt($value)
 * @method static \Database\Factories\DispositionFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Disposition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'disposition_number',
        'incoming_letter_id',
        'from_employee_id',
        'to_employee_id',
        'to_department_id',
        'disposition_type',
        'instructions',
        'notes',
        'due_date',
        'priority',
        'status',
        'completed_at',
        'completion_notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'incoming_letter_id' => 'integer',
        'from_employee_id' => 'integer',
        'to_employee_id' => 'integer',
        'to_department_id' => 'integer',
        'due_date' => 'date',
        'completed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the incoming letter for this disposition.
     */
    public function incomingLetter(): BelongsTo
    {
        return $this->belongsTo(IncomingLetter::class);
    }

    /**
     * Get the employee who sent this disposition.
     */
    public function fromEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'from_employee_id');
    }

    /**
     * Get the employee who received this disposition.
     */
    public function toEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'to_employee_id');
    }

    /**
     * Get the department for this disposition.
     */
    public function toDepartment(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'to_department_id');
    }

    /**
     * Get the histories for this disposition.
     */
    public function histories(): HasMany
    {
        return $this->hasMany(DispositionHistory::class);
    }
}