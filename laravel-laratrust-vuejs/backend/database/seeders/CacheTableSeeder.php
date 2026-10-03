<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CacheTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cache')->delete();
        
        \DB::table('cache')->insert(array (
            0 => 
            array (
                'key' => 'laravel-cache-8a5da52ed126447d359e70c05721a8aa:timer',
                'value' => 'i:1782718989;',
                'expiration' => 1782718989,
            ),
            1 => 
            array (
                'key' => 'laravel-cache-8a5da52ed126447d359e70c05721a8aa',
                'value' => 'i:12;',
                'expiration' => 1782718989,
            ),
        ));
        
        
    }
}