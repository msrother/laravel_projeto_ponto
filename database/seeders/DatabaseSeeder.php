<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void    
    {
        $this->call(class:CidadesTableSeeder::class);      
        $this->call(class:CargosTableSeeder::class);
        $this->call(class:FuncionariosTableSeeder::class);
        $this->call(class:UsersTableSeeder::class);
        $this->call(class:PontosTableSeeder::class);
    

        
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
