<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserActionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_actions')->delete();
        
        \DB::table('user_actions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'action' => 'تحديث البيانات',
                'action_model' => 'App\\Models\\User',
                'action_id' => '1',
                'created_at' => '2026-06-22 21:40:04',
                'updated_at' => '2026-06-22 21:40:04',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'action' => 'تحديث البيانات',
                'action_model' => 'App\\Models\\User',
                'action_id' => '1',
                'created_at' => '2026-06-22 21:48:32',
                'updated_at' => '2026-06-22 21:48:32',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'action' => 'تحديث البيانات',
                'action_model' => 'App\\Models\\User',
                'action_id' => '1',
                'created_at' => '2026-06-22 22:03:33',
                'updated_at' => '2026-06-22 22:03:33',
            ),
        ));
        
        
    }
}