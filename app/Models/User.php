<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'phone_num',
        'gender',
        'role'
    ];


    //specifying user table primary key
    protected $primaryKey = "user_ID";

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
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function student()
    {
        return $this->hasOne(StudentDetail::class, 'user_ID'); // Assuming 'user_ID' is the foreign key 
    }

    public function lecturer()
    {
        return $this->hasOne(LecturerDetail::class, 'user_ID'); // Assuming 'user_ID' is the foreign key 
    }

    public function admin()
    {
        return $this->hasOne(SystemAdministrationDetail::class, 'user_ID'); // Assuming 'user_ID' is the foreign key 
    }

    public function technical()
    {
        return $this->hasOne(TechnicianDetail::class, 'user_ID'); // Assuming 'user_ID' is the foreign key 
    }
}
