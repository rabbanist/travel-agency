<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new Admin;
        $obj->name = 'MD Golam Rabbani';
        $obj->email = 'admin@gmail.com';
        $obj->password = bcrypt('123');
        $obj->token = '';
        $obj->save();
    }
}
