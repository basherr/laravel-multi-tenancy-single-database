<?php

namespace App;

use Session;
use App\ProjectMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

	protected $fillable = ['project_name', 'project_details'];
    protected $dates = ['deleted_at'];
     	
    public function getTable()
   	{
      return 'site_' . Session::get('site') . '_projects';
   	}
}
