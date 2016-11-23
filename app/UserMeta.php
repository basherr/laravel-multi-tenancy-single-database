<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model {

    protected $primaryKey = 'meta_id';
    protected $fillable = ['user_id', 'meta_key', 'meta_value'];
    protected $table = 'users_meta';
    public $timestamps = false;
}
