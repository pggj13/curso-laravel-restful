<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Paulo João',
            'email'=>'p@unesc.net',
            'password'=>bcrypt('123')
        ]);
    }
}
