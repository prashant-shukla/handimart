<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorldDataSeeder extends Seeder
{
    /**
     * Seed countries, states, and cities from altwaireb/laravel-world package data.
     *
     * Maps:
     *  countries: id | name | short_name (iso2) | country_code (iso2)
     *  states:    id | country_id | name | short_name (null)
     *  cities:    id | country_id | state_id | name | zip_code (null)
     */
    public function run(): void
    {
        $dataPath = base_path('vendor/altwaireb/laravel-world/database/data');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // ─── Countries ────────────────────────────────────────────────────────
        $this->command->info('Seeding countries…');
        DB::table('countries')->truncate();

        $countries = json_decode(file_get_contents("{$dataPath}/countries.json"), true);
        $now       = now();

        $countryRows = array_map(fn ($c) => [
            'id'           => $c['id'],
            'name'         => $c['name'],
            'short_name'   => $c['iso2'] ?? null,
            'country_code' => $c['iso2'] ?? null,
            'created_at'   => $now,
            'updated_at'   => $now,
        ], $countries);

        foreach (array_chunk($countryRows, 100) as $chunk) {
            DB::table('countries')->insert($chunk);
        }

        $this->command->info('  ✓ ' . count($countryRows) . ' countries inserted.');

        // ─── States ───────────────────────────────────────────────────────────
        $this->command->info('Seeding states…');
        DB::table('states')->truncate();

        $states = json_decode(file_get_contents("{$dataPath}/states.json"), true);

        $stateRows = array_map(fn ($s) => [
            'id'         => $s['id'],
            'country_id' => $s['country_id'],
            'name'       => $s['name'],
            'short_name' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ], $states);

        foreach (array_chunk($stateRows, 200) as $chunk) {
            DB::table('states')->insert($chunk);
        }

        $this->command->info('  ✓ ' . count($stateRows) . ' states inserted.');

        // ─── Cities ───────────────────────────────────────────────────────────
        $this->command->info('Seeding cities… (this may take a minute)');
        DB::table('cities')->truncate();

        $cities = json_decode(file_get_contents("{$dataPath}/cities.json"), true);

        $cityRows = array_map(fn ($c) => [
            'id'         => $c['id'],
            'country_id' => $c['country_id'],
            'state_id'   => $c['state_id'],
            'name'       => $c['name'],
            'zip_code'   => null,
            'created_at' => $now,
            'updated_at' => $now,
        ], $cities);

        foreach (array_chunk($cityRows, 500) as $chunk) {
            DB::table('cities')->insert($chunk);
        }

        $this->command->info('  ✓ ' . count($cityRows) . ' cities inserted.');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('World data seeding complete!');
    }
}
