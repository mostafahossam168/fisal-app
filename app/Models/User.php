<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enum\Usertatus;
use App\Enum\UserStatus;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;
    public $guarded = [];

    public function ScopeUsers($query)
    {
        $query->where('type', 'user');
    }
    public function ScopeAdmins($query)
    {
        $query->where('type', 'admin');
    }
    public function ScopeActive($query)
    {
        $query->where('status', 1);
    }
    public function ScopeInActive($query)
    {
        $query->where('status', 0);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */


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
            'status' => UserStatus::class,
        ];
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'wishlists');
    }
}