<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::updateOrcreate(
            [
                'id' => 1,

            ],
            [
                'name' => 'Admin',
                'email'=> 'admin@info.com',
                'password'=> Hash::make('123456789')
            ]
        );
        return response('successfully.');
    }

}
