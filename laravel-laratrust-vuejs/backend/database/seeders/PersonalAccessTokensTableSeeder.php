<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonalAccessTokensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('personal_access_tokens')->delete();
        
        \DB::table('personal_access_tokens')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'postman',
                'token' => '9ed447dea635962a2cfb755e2da840b18b01f080787026d881d94eed4a18d888',
                'abilities' => '["*"]',
                'last_used_at' => NULL,
                'expires_at' => NULL,
                'created_at' => '2026-06-12 13:26:40',
                'updated_at' => '2026-06-12 13:26:40',
            ),
            1 => 
            array (
                'id' => 2,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'postman',
                'token' => '2d57623322295832b3ab5c0de31ed2c37f60d6d50de09c55925cdc334a786f13',
                'abilities' => '["*"]',
                'last_used_at' => NULL,
                'expires_at' => NULL,
                'created_at' => '2026-06-13 14:19:22',
                'updated_at' => '2026-06-13 14:19:22',
            ),
            2 => 
            array (
                'id' => 3,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'postman',
                'token' => '0dfd96c0c6d8cbeb490fe5ccb859e28afbb4f40d13506f4dc10beb4ea7529a4a',
                'abilities' => '["*"]',
                'last_used_at' => NULL,
                'expires_at' => NULL,
                'created_at' => '2026-06-13 16:08:05',
                'updated_at' => '2026-06-13 16:08:05',
            ),
            3 => 
            array (
                'id' => 4,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'postman',
                'token' => 'be6327ed53bda486723b17eea97096e13d2e0a0977e5c00d6e8b271dbc3270ff',
                'abilities' => '["*"]',
                'last_used_at' => NULL,
                'expires_at' => NULL,
                'created_at' => '2026-06-13 20:06:51',
                'updated_at' => '2026-06-13 20:06:51',
            ),
            4 => 
            array (
                'id' => 5,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'postman',
                'token' => 'e4aef96a0a501b3587d6c1bc3209556ca05a5f8982cf7752ddb65ec41f1838c0',
                'abilities' => '["*"]',
                'last_used_at' => NULL,
                'expires_at' => NULL,
                'created_at' => '2026-06-13 20:08:53',
                'updated_at' => '2026-06-13 20:08:53',
            ),
            5 => 
            array (
                'id' => 6,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'postman',
                'token' => '7d5fb603d2288218a4271c373a36582679a9fc3f6737fa3a6215ae2cb9b1d351',
                'abilities' => '["*"]',
                'last_used_at' => NULL,
                'expires_at' => NULL,
                'created_at' => '2026-06-13 20:08:54',
                'updated_at' => '2026-06-13 20:08:54',
            ),
            6 => 
            array (
                'id' => 7,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'postman',
                'token' => 'd192def61dff6481d9ab361a956137adf09b14f7e61672fe4161542096713144',
                'abilities' => '["*"]',
                'last_used_at' => NULL,
                'expires_at' => NULL,
                'created_at' => '2026-06-13 20:08:55',
                'updated_at' => '2026-06-13 20:08:55',
            ),
            7 => 
            array (
                'id' => 8,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'postman',
                'token' => '7f68ba9fbb0e166592c51d68e85789f81f58433f51934320b41d026cde057be7',
                'abilities' => '["*"]',
                'last_used_at' => NULL,
                'expires_at' => NULL,
                'created_at' => '2026-06-13 20:10:01',
                'updated_at' => '2026-06-13 20:10:01',
            ),
        ));
        
        
    }
}