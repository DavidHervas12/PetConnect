<?php

namespace Database\Seeders;

use App\Models\Adoption;
use App\Models\User;
use App\Models\Contact;
use App\Models\Animal;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => 1,
            'name' => 'david',
            'email' => 'dhervas456@gmail.com',
            'password' => '12345678'
        ]);

        Contact::factory(100)->create();
        Animal::factory(30)->create();
    }
}
