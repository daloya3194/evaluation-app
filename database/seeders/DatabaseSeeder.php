<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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

        DB::table('clusters')->insert([
            'name' => '01_artist_on_stage',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('clusters')->insert([
            'name' => '02_crowd',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('clusters')->insert([
            'name' => '03_person_doing_other_thing',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('clusters')->insert([
            'name' => '04_view',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('clusters')->insert([
            'name' => '05_bridge',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'cluster_id' => 1,
            'question' => 'Find a picture of an "artist" on stage.',
            'slug' => 'question-0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'cluster_id' => 2,
            'question' => 'Find a picture of a "crowd".',
            'slug' => 'question-1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'cluster_id' => 4,
            'question' => 'Find a picture of an "aerial view".',
            'slug' => 'question-2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'cluster_id' => 2,
            'question' => 'Find a picture of a "crowd" .',
            'slug' => 'question-3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'cluster_id' => 1,
            'question' => 'Find a picture of an artist on "stage."',
            'slug' => 'question-4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'cluster_id' => 5,
            'question' => 'Find a picture of a bridge. ',
            'slug' => 'question-5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
