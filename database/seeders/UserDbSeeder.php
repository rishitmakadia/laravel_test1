<?php

namespace Database\Seeders;

use App\Models\DbTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UserDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table("database")->insert([
        //     "name" => Str::random(10),
        //     "email" => Str::random(10) . '@mychoice.com',
        //     "age" => rand(18, 60),
        //     "position" => 'Developer',
        //     "company" => 'MyCompany',
        // ]);
        DbTable::factory(3)->create();
    }
}
