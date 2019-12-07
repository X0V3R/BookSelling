<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('AdminSeeder');

    }
}
class AdminSeeder extends Seeder
{
    public function run(){
        DB::table('admin_users')->insert([
            array('name'=>'admin','email'=>'phong@mail.com','password'=>Hash::make('lethanhphong'),'level'=>'100')
        ]);
    }
}
class CategorySeeder extends Seeder
{
    public function run(){
        DB::table('category')->insert([
            array('name'=>'Chính trị – pháp luật'),
            array('name'=>'Văn học nghệ thuật'),
            array('name'=>'Khoa học công nghệ – Kinh tế'),
            array('name'=>'Văn hóa xã hội – Lịch sử'),
            array('name'=>'Giáo trình'),
            array('name'=>'Giáo trình'),
            array('name'=>'Tâm lý, tâm linh, tôn giáo'),
            array('name'=>'Sách thiếu nhi')
        ]);
    }
}
