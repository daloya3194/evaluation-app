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
            'name' => 'cluster_1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('clusters')->insert([
            'name' => 'cluster_2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('clusters')->insert([
            'name' => 'cluster_3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 13,
            'question' => 'Find an image focused on a man wearing a melon hat',
            'slug' => 'question-0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 1,
            'question' => 'Find a picture of an artist wearing a hat, carrying a guitar and holding down a beer.',
            'slug' => 'question-1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 2,
            'question' => 'Find a picture of a man wearing glasses and a hat that looks like a squirrel',
            'slug' => 'question-2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 3,
            'question' => 'Find a picture of a woman with green hair raising her fist in the air',
            'slug' => 'question-3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 4,
            'question' => 'Find a photo of a crowd in front of artists on stage with an Italian flag',
            'slug' => 'question-4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 5,
            'question' => 'Find a picture of a man with long blond hair holding a fake sword',
            'slug' => 'question-5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 6,
            'question' => 'Find a photo of a woman wearing a red t-shirt and holding a sign that reads "free hug"',
            'slug' => 'question-6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 7,
            'question' => 'Find a picture of a woman wearing a black t-shirt, green pants and a viking helmet on her head',
            'slug' => 'question-7',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 8,
            'question' => 'Find a photo of an artist(woman) on stage, with blond hair, holding a microphone and doing a hand sign',
            'slug' => 'question-8',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 9,
            'question' => 'Find the photo of two men dressed as anime characters.',
            'slug' => 'question-9',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 10,
            'question' => 'Find the photo of a man being photographed in front of a large "wacken" badge.',
            'slug' => 'question-10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 11,
            'question' => 'Find a picture of a man wearing glasses and holding a pink doll.',
            'slug' => 'question-11',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 12,
            'question' => 'Find a picture of a man carrying a woman on his shoulders',
            'slug' => 'question-12',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
