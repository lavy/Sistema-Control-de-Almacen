<?php
/**
 * Created by PhpStorm.
 * User: lavy
 * Date: 18/05/15
 * Time: 11:53 PM
 */
use \Illuminate\Database\Seeder;
class AdminTableSeeder extends Seeder{


    public function run()
    {
        \DB::table('users')->insert(array(
            'name'=>'martin',
            'email'=>'martin.gomes@gdc.gob.ve',
            'password'=>\hash::make('123456')
        ));
    }
}