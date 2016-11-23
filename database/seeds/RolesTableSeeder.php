<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['builder', 'customer', 'coworker', 'subcontractor', 'super_admin'];
    	
    	foreach($roles as $role)
    	{
	        DB::table('roles')->insert([
	            'role_name' => $role,
	        ]);
    	}
    }
}
