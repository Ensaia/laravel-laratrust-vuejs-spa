<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_user')->delete();
        
        \DB::table('permission_user')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'user_id' => 2,
                'user_type' => 'App\\Models\\User',
            ),
            1 => 
            array (
                'permission_id' => 2,
                'user_id' => 3,
                'user_type' => 'App\\Models\\User',
            ),
            2 => 
            array (
                'permission_id' => 3,
                'user_id' => 4,
                'user_type' => 'App\\Models\\User',
            ),
        ));
        
        
    }
}