<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LoginHistoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('login_history')->delete();
        
        \DB::table('login_history')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'name' => 'mohammed',
                'email' => 'mohammed@laravel.com',
                'ip_address' => '127.0.0.1',
                'browser' => 'Firefox',
                'platform' => 'Linux',
                'created_at' => '2026-06-21 21:41:32',
                'updated_at' => '2026-06-21 21:41:32',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'name' => 'mohammed',
                'email' => 'mohammed@laravel.com',
                'ip_address' => '127.0.0.1',
                'browser' => 'Firefox',
                'platform' => 'Linux',
                'created_at' => '2026-06-22 08:17:49',
                'updated_at' => '2026-06-22 08:17:49',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'name' => 'mohammed',
                'email' => 'mohammed@laravel.com',
                'ip_address' => '127.0.0.1',
                'browser' => 'Firefox',
                'platform' => 'Linux',
                'created_at' => '2026-06-22 13:10:44',
                'updated_at' => '2026-06-22 13:10:44',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'name' => 'mohammed',
                'email' => 'mohammed@laravel.com',
                'ip_address' => '127.0.0.1',
                'browser' => 'Firefox',
                'platform' => 'Linux',
                'created_at' => '2026-06-22 21:02:36',
                'updated_at' => '2026-06-22 21:02:36',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'name' => 'mohammed',
                'email' => 'mohammed@laravel.com',
                'ip_address' => '127.0.0.1',
                'browser' => 'Firefox',
                'platform' => 'Linux',
                'created_at' => '2026-06-22 21:40:08',
                'updated_at' => '2026-06-22 21:40:08',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'name' => 'mohammed',
                'email' => 'mohammed@laravel.com',
                'ip_address' => '127.0.0.1',
                'browser' => 'Firefox',
                'platform' => 'Linux',
                'created_at' => '2026-06-22 21:48:36',
                'updated_at' => '2026-06-22 21:48:36',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 1,
                'name' => 'mohammed',
                'email' => 'mohammed@laravel.com',
                'ip_address' => '127.0.0.1',
                'browser' => 'Firefox',
                'platform' => 'Linux',
                'created_at' => '2026-06-22 22:03:37',
                'updated_at' => '2026-06-22 22:03:37',
            ),
        ));
        
        
    }
}