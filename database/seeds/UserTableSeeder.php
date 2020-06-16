<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Henry Smith";
        $user->email = "henrysmith@gmail.com";
        $user->password = bcrypt("smith123");
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

        $user = new User;
        $user->name = "Athhar Kautsar";
        $user->email = "athharkautsar14@gmail.com";
        $user->password = bcrypt("athhar14");
        $user->save();
        $user->roles()->attach(Role::where('name', 'admin')->first());
    }
}
