<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Test";
        $user->email='test@test.com';
        $user->password = bcrypt('test');
        $user->save();
    }
}
