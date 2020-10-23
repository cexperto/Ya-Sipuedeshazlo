<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastName','file',
        'documentType','numberDocument','documentType',
        'state','phoneNumber','address','email','valoration',
        'password','state','codUserRol',
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
    public function roles(){
    return $this
        ->belongsTo(Role::class);
    }
    public function valorations(){
    return $this
        ->hasMany(Valoration::class);
    }
    
    public function services(){
        return $this->hasMany(Service::class);
    }
    
    //roles
    public $permisos = [
        "admin" =>[
            ["name"=>"homeAdmin","url"=>"/homeAdmin", "icon"=>"fas fa-user"]
        ],
        "student"=>[
            ["name"=>"homeStudent","url"=>"/homeStudent", "icon"=>"fas fa-user"]
        ]
    ];

}
