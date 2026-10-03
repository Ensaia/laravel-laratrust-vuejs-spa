<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
#[Fillable([
    'name',
    'email',
    'password'
])]
#[Hidden([
    'password',
    'remember_token'
])]

#[ObservedBy(UserObserver::class)]

class User extends Authenticatable implements MustVerifyEmail,LaratrustUser
{
    /**
     *
     * @use HasFactory<UserFactory>
     */
    use HasApiTokens, HasFactory, Notifiable,HasRolesAndPermissions;
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
//             'email_verified_at' => 'datetime', // if uncomment return current timestamp for empty field
            'password' => 'hashed'
        ];
    }

    /**
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }
    /**
     *
     * @return unknown
     */
    public function UserRoles()
    {
        return $this->roles()
            ->select('name')
            ->get();
    }
    /**
     *
     * @return unknown
     */
    public function UserPermissions()
    {
        return $this->permissions()
            ->select('name')->get();
    }
    /**
     *
     * @return bool
     */
    public function isEmailVerified():bool{
      return $this->email_verified_at !== '';
    }
}
