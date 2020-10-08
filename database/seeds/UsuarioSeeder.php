<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'name'=>'cristian galvis',
                'email'=>'cgalvis@gmail.com',
                'password'=>Hash::make('123456'),
        ]);
    }
}
