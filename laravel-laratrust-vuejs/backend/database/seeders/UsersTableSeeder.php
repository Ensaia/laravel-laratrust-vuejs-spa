<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'mohammed',
                'email' => 'mohammed@laravel.com',
                'email_verified_at' => '2026-06-03 19:11:34',
                'password' => '$2y$12$dOSMoaR7FLeKW.Y5qzXUZuOHzCd7ZyfR6.OENRJdBjrQkDOGKyMJG',
                'remember_token' => '0ERC130aJXBVYRxt62HlT8rZYbUarOcC7co51ptHMHgHpXSnCUFWpaJMQVuM',
                'created_at' => '2026-06-03 19:11:34',
                'updated_at' => '2026-06-03 19:11:34',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'User1',
                'email' => 'User1@laravel.com',
                'email_verified_at' => '2026-06-26 08:39:11',
                'password' => '$2y$12$ZmzRzxHJGXF88O6JdZUuGu/l0s5LHHtsGTryozkeKc.SEj2.xfjXW',
                'remember_token' => 'Bu3xwTzbeg',
                'created_at' => '2026-06-26 08:39:12',
                'updated_at' => '2026-06-26 08:39:12',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'User2',
                'email' => 'User2@laravel.com',
                'email_verified_at' => '',
                'password' => '$2y$12$7sH6P2DYCQgWOciInH0LaOgq0oACidTc6mWcajbi9xoZgmEtId.TS',
                'remember_token' => 'a0yXi1iqm1',
                'created_at' => '2026-06-26 08:39:43',
                'updated_at' => '2026-06-26 08:39:43',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'User3',
                'email' => 'User3@laravel.com',
                'email_verified_at' => '',
                'password' => '$2y$12$iZFtkDPsrPUivoM8WjokIOJxfGRr/SUl0HlrQCvHFdUH3ZrXsSSVq',
                'remember_token' => 'BUqqbeHw8g',
                'created_at' => '2026-06-26 08:39:52',
                'updated_at' => '2026-06-26 08:39:52',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'User4',
                'email' => 'User4@laravel.com',
                'email_verified_at' => '',
                'password' => '$2y$12$indBVPD0pUUFmAHdsasrLeI.ty2r6tQofLr1g3VSPq//9bU/hPEKK',
                'remember_token' => 'rPVKVzlMuC',
                'created_at' => '2026-06-26 08:40:02',
                'updated_at' => '2026-06-26 08:40:02',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'User5',
                'email' => 'User5@laravel.com',
                'email_verified_at' => '',
                'password' => '$2y$12$zCZXvE1EUJp8wXQOZI0Ptu.QJe57J7QrwiDnAsLXxIidhBKtrUd/2',
                'remember_token' => 'ujDpybC26X',
                'created_at' => '2026-06-26 08:40:12',
                'updated_at' => '2026-06-26 08:40:12',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
        ));
        
        
    }
}