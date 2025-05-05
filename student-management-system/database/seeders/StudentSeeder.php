<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Student::create(['name' => 'John Doe', 'email' => 'john@example.com', 'course' => 'Math']);
    Student::create(['name' => 'Jane Smith', 'email' => 'jane@example.com', 'course' => 'Science']);
}
}
