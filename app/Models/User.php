<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
<<<<<<< HEAD
        'utype',
=======
        'role',
>>>>>>> 860b61aed6781a2df125de4cc91df13655591e80
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Set the username attribute to be lowercase.
     *
     * @param  string  $value
     * @return void
     */
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }

<<<<<<< HEAD
    public function setutypeAttribute($value)
{
    $this->attributes['utype'] = $value;
=======
    public function setRoleAttribute($value)
{
    $this->attributes['role'] = $value; // Jangan set default jadi 'superadmin' di sini
}


>>>>>>> 860b61aed6781a2df125de4cc91df13655591e80
}


}