<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Department
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property int|null $parent_id
 * @property int|null $head_employee_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Department|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Department> $children
 * @property-read \App\Models\Employee|null $headEmployee
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EmployeePosition> $employeePositions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Disposition> $dispositions
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereHeadEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department active()
 * @method static \Database\Factories\DepartmentFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Department extends Model
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
        'parent_id',
        'head_employee_id',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'parent_id' => 'integer',
        'head_employee_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the parent department.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }

    /**
     * Get the child departments.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Department::class, 'parent_id');
    }

    /**
     * Get the head employee of this department.
     */
    public function headEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'head_employee_id');
    }

    /**
     * Get employee positions in this department.
     */
    public function employeePositions(): HasMany
    {
        return $this->hasMany(EmployeePosition::class);
    }

    /**
     * Get dispositions for this department.
     */
    public function dispositions(): HasMany
    {
        return $this->hasMany(Disposition::class, 'to_department_id');
    }

    /**
     * Scope a query to only include active departments.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}