<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = [
            'username' => 'administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'address' => 'Jalan jalan kemaluku',
            'phone_number' => '0881205598',
            'gender' => 'male',
            'level' => 'admin',
            'remember_token' => Str::random(10),
        ];
        $data[] = [
            'username' => 'member1',
            'email' => 'member1@member.com',
            'password' => bcrypt('member123'),
            'address' => 'Jalan jalan kemaluku',
            'phone_number' => '0881205598',
            'gender' => 'male',
            'level' => 'member',
            'remember_token' => Str::random(10),
        ];
        $data[] = [
            'username' => 'member2',
            'email' => 'member2@member.com',
            'password' => bcrypt('member123'),
            'address' => 'Jalan jalan kemaluku',
            'phone_number' => '0881205598',
            'gender' => 'male',
            'level' => 'member',
            'remember_token' => Str::random(10),
        ];
        DB::table('users')->insert($data);
    }
}
