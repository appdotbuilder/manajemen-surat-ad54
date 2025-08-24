<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $nip
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property string $status
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $birth_date
 * @property string $gender
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\EmployeePosition|null $currentPosition
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EmployeePosition> $positions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomingLetter> $receivedLetters
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OutgoingLetter> $createdLetters
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Disposition> $sentDispositions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Disposition> $receivedDispositions
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee active()
 * @method static \Database\Factories\EmployeeFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nip',
        'name',
        'email',
        'phone',
        'status',
        'address',
        'birth_date',
        'gender',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get all positions for this employee.
     */
    public function positions(): HasMany
    {
        return $this->hasMany(EmployeePosition::class);
    }

    /**
     * Get the current active position for this employee.
     */
    public function currentPosition(): HasOne
    {
        return $this->hasOne(EmployeePosition::class)->where('is_active', true);
    }

    /**
     * Get incoming letters received by this employee.
     */
    public function receivedLetters(): HasMany
    {
        return $this->hasMany(IncomingLetter::class, 'received_by');
    }

    /**
     * Get outgoing letters created by this employee.
     */
    public function createdLetters(): HasMany
    {
        return $this->hasMany(OutgoingLetter::class, 'created_by');
    }

    /**
     * Get dispositions sent by this employee.
     */
    public function sentDispositions(): HasMany
    {
        return $this->hasMany(Disposition::class, 'from_employee_id');
    }

    /**
     * Get dispositions received by this employee.
     */
    public function receivedDispositions(): HasMany
    {
        return $this->hasMany(Disposition::class, 'to_employee_id');
    }

    /**
     * Scope a query to only include active employees.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}