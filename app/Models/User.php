<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, \Spatie\Permission\Traits\HasRoles;

    // علاقة الأدوار
    public function roles()
    {
        return $this->belongsToMany(
            \Spatie\Permission\Models\Role::class,
            'model_has_roles',
            'model_id',
            'role_id'
        )->where('model_type', self::class);
    }

    // علاقة التصريحات
    public function permissions()
    {
        return $this->belongsToMany(
            \Spatie\Permission\Models\Permission::class,
            'model_has_permissions',
            'model_id',
            'permission_id'
        )->where('model_type', self::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'phone',
        'birth_date',
        'password',
        'gender',
        'marital_status',
        'age_verified',
        'location',
        'latitude',
        'longitude',
        'blood_type',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relation',
        'job',
        'children_count',
        'children_details',
        'interests',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date',
            'age_verified' => 'boolean',
            'latitude' => 'decimal:8',
            'longitude' => 'decimal:8',
            'children_count' => 'integer',
            'children_details' => 'array',
            'interests' => 'array',
        ];
    }
}
