<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Person;
use App\Models\Role;
use App\Models\Project;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'email', 'password', 'isActive', 'person_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function projectUsers()
    {
        return $this->hasMany(ProjectUser::class);
    }
    
}
