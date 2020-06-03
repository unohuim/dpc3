<?php

namespace App;

use App\Traits\Tenantable;
use App\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Company;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Tenantable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
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
     * The attributes that should be cast to native types - carbon.
     *
     * @var array
     */
    protected $casts = [

        'email_verified_at' => 'datetime',

        'init_at'
    ];


    public function hasPermission($required_permission)
    {
        foreach($this->roles as $role) {

            foreach($role->permissions as $permission) {

                if($permission->slug == $required_permission) return true;

            } 

        }

        return false;
    }


    public function company()
    {
        return $this->belongsTo(Company::class);
    }



    public function getName()
    {
        return $this->first_name . " " . $this->last_name;
    }


    

    public function init(Request $request, Company $company)
    {
        $this->first_name = $request->first_name;

        $this->last_name = $request->last_name;

        $this->company_id = $company->id;

        $this->init_at = now();

        $this->save();
    }


    public function is_init()
    {
        return ! is_null($this->init_at);
    }
}
