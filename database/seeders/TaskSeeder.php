<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // Menggunakan Faker dengan locale Indonesia (id_ID)
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('tasks')->insert([
                'title'        => 'Tugas ' . $faker->sentence(3),
                'description'  => $faker->paragraph(2),
                'assigned_to'  => $faker->name(),
                'phone_number' => $faker->phoneNumber(),
                'status'       => $faker->randomElement(['Pending', 'In Progress', 'Completed']),
                'due_date'     => $faker->date('Y-m-d', '+1 month'),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}