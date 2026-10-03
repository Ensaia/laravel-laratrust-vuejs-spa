<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sessions')->delete();
        
        \DB::table('sessions')->insert(array (
            0 => 
            array (
                'id' => '7Au24XzSBKZbwJzSNVArx8wPi1q3FgJiXCJdoNe3',
                'user_id' => NULL,
                'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64; rv:140.0) Gecko/20100101 Firefox/140.0',
                'payload' => 'eyJfdG9rZW4iOiJZc2hVZ0dBamVlZG4zNWtLcmFtS3NTMzVNQU9manRtRnd3cmV5VVM4IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',
                'last_activity' => 1782718973,
            ),
        ));
        
        
    }
}