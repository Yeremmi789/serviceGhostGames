<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // DB::table('roles')->insert([
        //     'rol' => 'Admin',
        //     'activo' => 1,
        //     'descripcion' => null,
        // ]);

        // DB::table('roles')->insert([
        //     'rol' => 'Users',
        //     'activo' => 1,
        //     'descripcion' => null
        // ]);

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Usuario']);
        // Role::create(['name' => 'moderator']);
        // Role::create(['name' => 'guest']);
        // Role::create(['name' => 'editor']);


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            "apellido" => "Test apellido",
            "usuario" => 'Name User Test',
            "password" => '1234567890',
            "rol_id" => 2,
            "activo" => 1,
            "ultimo_acceso" => Carbon::now(),
        ]);


    }



}
