<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\EmployeePosition
 *
 * @property int $id
 * @property int $employee_id
 * @property int $position_id
 * @property int $grade_id
 * @property int $department_id
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Employee $employee
 * @property-read \App\Models\Position $position
 * @property-read \App\Models\Grade $grade
 * @property-read \App\Models\Department $department
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition whereGradeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeePosition active()
 * @method static \Database\Factories\EmployeePositionFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class EmployeePosition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'employee_id',
        'position_id',
        'grade_id',
        'department_id',
        'start_date',
        'end_date',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'employee_id' => 'integer',
        'position_id' => 'integer',
        'grade_id' => 'integer',
        'department_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the employee for this position.
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get the position.
     */
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * Get the grade.
     */
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    /**
     * Get the department.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Scope a query to only include active positions.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}