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
            'question' => 'Find the image of a performer on stage wearing a green jacket, pointing in one direction with his right hand',
            'slug' => 'question-1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 2,
            'question' => 'Find the image of a man with a beard and sunglasses holding a pink stuffed lama and a beer standing in front of walking people.',
            'slug' => 'question-2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 3,
            'question' => 'Find the image of a woman wearing a red t-shirt with a blurred background, holding a sign that says "Free hugs".',
            'slug' => 'question-3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 4,
            'question' => 'Find the image of a man wearing black glasses and a hat that looks like a squirrel',
            'slug' => 'question-4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 5,
            'question' => 'Find the image of a crowd where you can clearly see two women, one with short red hair and the other wearing a white t-shirt and holding a cup in her left hand.',
            'slug' => 'question-5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 6,
            'question' => 'Find the image of the crowd waving an Irish flag.',
            'slug' => 'question-6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 7,
            'question' => 'Find the image of an artist on stage wearing a green jacket and lifting a box on which is written "WE ALL KNOW"',
            'slug' => 'question-7',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 8,
            'question' => 'Find the image where you can see two empty scenes with a coca-cola trailer.',
            'slug' => 'question-8',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 9,
            'question' => 'Find the image of a shirtless man holding a beer and wearing a helmet with one horn.',
            'slug' => 'question-9',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 10,
            'question' => 'Find the image of a crowd where you can see an woman with green hair raising her fist in the air.',
            'slug' => 'question-10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 11,
            'question' => 'Find the image of a wooden sculpture of a bearded man( wearing glasses and a hat, also holding a drink )  and a skull. ',
            'slug' => 'question-11',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('questions')->insert([
            'image_id' => 12,
            'question' => 'Find the image of a man holding the hand of a child with people walking in the background.',
            'slug' => 'question-12',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
