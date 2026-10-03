<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'create-post',
                'display_name' => 'إنشاء منشور',
                'description' => 'يسمح لصاحب هذا الحساب بإنشاء منشور',
                'created_at' => '2026-06-26 17:55:11',
                'updated_at' => '2026-06-26 17:55:11',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'edit-post',
                'display_name' => 'تعديل منشور',
                'description' => 'يسمح لصاحب هذا الحساب بتحديث بيانات منشور',
                'created_at' => '2026-06-26 17:58:29',
                'updated_at' => '2026-06-26 17:58:29',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'delete-post',
                'display_name' => 'حذف منشور',
                'description' => 'يسمح لصاحب هذا الحساب بحذف بيانات منشور',
                'created_at' => '2026-06-26 19:42:58',
                'updated_at' => '2026-06-26 19:42:58',
            ),
        ));
        
        
    }
}