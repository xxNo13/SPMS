<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funct;
use App\Models\AccountType;
use App\Models\Office;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class
        ]);

        Funct::factory()->create([
            'funct' => 'Strategic Priority'
        ]);
        Funct::factory()->create([
            'funct' => 'Core Function'
        ]);
        Funct::factory()->create([
            'funct' => 'Support Function'
        ]);

        Office::factory()->create([
            'office' => 'HRMO'
        ]);
        Office::factory(4)->create();

        AccountType::factory()->create([
            'account_type' => 'Head of Agency'
        ]);
        AccountType::factory()->create([
            'account_type' => 'Head of Delivery Unit'
        ]);
        AccountType::factory()->create([
            'account_type' => 'Faculty'
        ]);
        AccountType::factory()->create([
            'account_type' => 'Staff'
        ]);
    }
}
