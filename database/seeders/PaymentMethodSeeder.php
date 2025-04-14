<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::create([
            'name' => 'Bank Mandiri',
            'type' => 'Bank Transfer',
            'number' => '123456789',
            'note' => 'Admin'
        ]);
        PaymentMethod::create([
            'name' => 'Bank BRI',
            'type' => 'Bank Transfer',
            'number' => '123456789',
            'note' => 'Admin'
        ]);
        PaymentMethod::create([
            'name' => 'Bank BCA',
            'type' => 'Bank Transfer',
            'number' => '123456789',
            'note' => 'Admin'
        ]);
        PaymentMethod::create([
            'name' => 'Dana',
            'type' => 'E-Wallet',
            'number' => '123456789',
            'note' => 'Admin'
        ]);
        PaymentMethod::create([
            'name' => 'LinkAja',
            'type' => 'E-Wallet',
            'number' => '123456789',
            'note' => 'Admin'
        ]);
    }
}
