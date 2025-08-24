<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\DispositionHistory
 *
 * @property int $id
 * @property int $disposition_id
 * @property int $employee_id
 * @property string $action
 * @property string|null $previous_status
 * @property string $new_status
 * @property string|null $notes
 * @property array|null $metadata
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Disposition $disposition
 * @property-read \App\Models\Employee $employee
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory whereDispositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory wherePreviousStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory whereNewStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispositionHistory whereUpdatedAt($value)
 * @method static \Database\Factories\DispositionHistoryFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class DispositionHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'disposition_id',
        'employee_id',
        'action',
        'previous_status',
        'new_status',
        'notes',
        'metadata',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'disposition_id' => 'integer',
        'employee_id' => 'integer',
        'metadata' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the disposition for this history.
     */
    public function disposition(): BelongsTo
    {
        return $this->belongsTo(Disposition::class);
    }

    /**
     * Get the employee who performed this action.
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}