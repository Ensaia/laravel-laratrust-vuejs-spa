<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post')->delete();
        
        \DB::table('post')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'حرمة الكذب على النبي صلى الله عليه وسلم',
            'content' => 'عن أبي هريرة رضي الله عنه قال: قال رسول الله صلى الله عليه وسلم ((  إن كذبا علي ليس ككذب على أحد من كذب علي متعمدا فليتبوأ مقعده من النار )) متفق عليه.',
                'created_at' => '2026-06-28 20:51:21',
                'updated_at' => '2026-06-28 20:51:21',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'من علامات إرادة الله بعبده الخير أن يفقهه في الدين',
            'content' => 'عن معاوية بن أبي سفيان رضي الله عنهما قال:  سمعت النبي صلى الله عليه وسلم يقول (( من يرد الله به خيرا يفقهه في الدين  )) متفق عليه.',
                'created_at' => '2026-06-28 20:52:10',
                'updated_at' => '2026-06-29 07:25:08',
            ),
        ));
        
        
    }
}