<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $token = '538UzO206268r059e707Ni0IU59e7W2X23eT4ru9T200hs3222b3Y3Jqs21U';
        User::insert([
            'name' => 'Alexis Morales'
            , 'email' => 'alexis.morales@zascita.com'
            , 'password' => bcrypt('123456789')
            , 'api_token' => hash('sha256', $token)
            , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
        ]);
    }
}
