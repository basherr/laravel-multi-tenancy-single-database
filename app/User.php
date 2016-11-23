<?php

namespace App;

use App\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Every user that authenticates belongs to a one or more sites
     *
     * @param null
     * @return null
     */
    public function sites()
    {
        return $this->belongsToMany('App\Site', 'sites_users');
    }
    /**
     * Every user that authenticates belongs to a one or more sites
     *
     * @param null
     * @return null
     */
    public function UserMeta()
    {
        return $this->hasMany('App\UserMeta');
    }
    /**
     * Every user that authenticates belongs to a one or more sites
     *
     * @param null
     * @return null
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'roles_users')->withPivot('site_id');
    }
    /**
     * Every user that authenticates belongs to a one or more sites
     *
     * @param null
     * @return null
     */
    public function scopeCoworker($q)
    {
        $role = new Role();
        $q->where('id', $role->get_coworker_role());
    }
}
