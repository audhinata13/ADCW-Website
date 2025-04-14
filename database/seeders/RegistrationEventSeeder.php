<?php

namespace Database\Seeders;

use App\Models\RegistrationEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RegistrationEvent::factory(20)->create();
    }
}
