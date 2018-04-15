<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email', 'phone',
    ];

    protected $hidden = [
        'remember_token',
    ];
    
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    
    public static function getUsers()
    {
        return self::paginate(5);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

}
