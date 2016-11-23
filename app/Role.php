<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['role_name'];
    protected $dates = ['deleted_at'];
    private $builder_role = 'builder';
    private $super_admin = 'super_admin';
    private $coworker = 'coworker';
    private $customer = 'customer';
    /**
     * Get admin roles only
     *
     * @param null
     * @return null
     */
    public function get_admin_roles()
    {
    	return $this->whereIn('role_name', [ $this->builder_role, $this->super_admin])->get()->toArray();
    }
    /**
     * Get role by its key
     *
     * @param null
     * @return null
     */
    public function get_builder_role()
    {
        return $this->where('role_name', $this->builder_role)->first()->id;
    }
    /**
     * Get role by its key
     *
     * @param null
     * @return null
     */
    public function get_coworker_role()
    {
        return $this->where('role_name', $this->coworker)->first()->id;
    }
    /**
     * Get role by its key
     *
     * @param null
     * @return null
     */
    public function get_customer_role()
    {
        return $this->where('role_name', $this->customer)->first()->id;
    }
    /**
     * Get role by its key
     *
     * @param null
     * @return null
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'roles_users')->withPivot('site_id');
    }
}
