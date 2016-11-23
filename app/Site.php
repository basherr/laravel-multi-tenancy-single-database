<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use SoftDeletes;

    protected $fillable = ['site_name', 'site_slug', 'user_id'];

    protected $dates = ['deleted_at'];
    /**
     * Every site has one admin who creates it
     *
     * @param null
     * @return null
     */
    public function users()
    {
    	return $this->belongsToMany('App\User', 'sites_users');
    }
}
