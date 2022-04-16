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
            'name' => 'Cluster 1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('clusters')->insert([
            'name' => 'Cluster 2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('clusters')->insert([
            'name' => 'Cluster 3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('clusters')->insert([
            'name' => 'Cluster 4',
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
            'question' => 'Find a picture of a "crowd" on stage.',
            'slug' => 'question-1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'cluster_id' => 1,
            'question' => 'Find a picture of an "artist" on stage.',
            'slug' => 'question-2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'cluster_id' => 2,
            'question' => 'Find a picture of a "crowd" on stage.',
            'slug' => 'question-3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
