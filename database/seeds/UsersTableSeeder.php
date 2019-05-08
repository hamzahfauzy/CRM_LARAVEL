<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->nama = "admin";
        $user->email = "admin@admin.com";
        $user->password = bcrypt("admin");
        $user->level = "admin";
        $user->alamat = "";
        $user->jenis_kelamin = "";
        $user->telepon = "";
        $user->save();
    }
}
