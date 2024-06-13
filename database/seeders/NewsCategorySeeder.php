<?php

namespace Database\Seeders;

use App\Models\News\NewsCategoryModel;
use App\Models\News\NewsDetailModel;
use App\Models\News\NewsModel;
use App\Models\News\NewsTagModel;
use App\Models\News\TagModel;
use App\Models\Setting\FileModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categories = [
            'Entertainment',
            'Sports',
            'Business',
            'Politics',
            'Weather',
            'Education',
            'Government',
            'Health',
        ];

        DB::beginTransaction();
        // Create categories and random tags for each category
        foreach ($categories as $categoryName) {
            $category = NewsCategoryModel::updateOrCreate([
                'name' => $categoryName,
            ], [
                'slug' => Str::slug($categoryName),
            ]);


            // Create news for each category
            for ($i = 0; $i < 4; $i++) {
                $news = NewsModel::create([
                    'slug' => $faker->slug,
                    'featured_image' => 'https://via.placeholder.com/1200X600',
                    'user_id' => User::oldest()->first()->id,
                    'news_category_id' => $category->id,
                    'token' => $faker->uuid,
                    'view_count' => $faker->numberBetween(100, 1000),
                ]);
                // Create news details
                $details = NewsDetailModel::create([
                    'news_id' => $news->id,
                    'title' => $faker->sentence,
                    'short_description' => $faker->paragraph,
                    'description' => $faker->paragraphs(3, true),
                    'created_by' => User::oldest()->first()->id,
                ]);
                $news->update([
                    'slug' => Str::slug($details->title)
                ]);
                $category->news()->attach($news);
                for ($i = 0; $i < 4; $i++) {
                    FileModel::create([
                        'filable_type' => NewsModel::class,
                        'filable_id' => $news->id,
                        'file' => "https://via.placeholder.com/1200X600",
                        "user_id" => User::oldest()->first()->id
                    ]);
                }

                for ($i = 0; $i < 3; $i++) {
                    $tagName = $faker->unique()->word; // Unique tag names within each category
                    $tag = TagModel::updateOrCreate([
                        'name' => $tagName,
                    ]);
                }

                $tags = TagModel::inRandomOrder()->limit(rand(1, 3))->get();
                foreach ($tags as $tag) {
                    NewsTagModel::create([
                        'created_by' => User::oldest()->first()->id,
                        'news_id' => $news->id,
                        'model_type' => TagModel::class,
                        'model_id' => $tag->id
                    ]);
                }
            }
        }
        DB::commit();
    }
}
