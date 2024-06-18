<?php

namespace Database\Seeders;

use App\Models\Service\CategoryModel;
use App\Models\Service\SubCategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Begin transaction to ensure atomicity
        DB::beginTransaction();

        try {
            // Your simplified categories array
            $categories = [
                [
                    "name" => "Accommodations",
                    "icon" => "fa-bed",
                    "description" => "Various types of accommodation options.",
                    "subcategories" => [
                        ["name" => "Hotels", "icon" => "fa-hotel", "description" => "Various types of hotels."],
                        ["name" => "Bed & Breakfasts", "icon" => "fa-coffee", "description" => "Comfortable B&B accommodations."],
                        ["name" => "Apartments", "icon" => "fa-building", "description" => "Various types of apartment rentals."],
                        ["name" => "Vacation Homes", "icon" => "fa-home", "description" => "Private homes for vacation rentals."]
                    ]
                ],
                [
                    "name" => "Tours & Activities",
                    "icon" => "fa-map-signs",
                    "description" => "Various tours and activities.",
                    "subcategories" => [
                        ["name" => "Adventure Tours", "icon" => "fa-hiking", "description" => "Exciting adventure tours."],
                        ["name" => "Cultural Tours", "icon" => "fa-landmark", "description" => "Explore local culture."],
                        ["name" => "Wildlife Safaris", "icon" => "fa-paw", "description" => "Explore wildlife in natural habitats."],
                        ["name" => "Eco Tours", "icon" => "fa-leaf", "description" => "Environmentally friendly tours."],
                        ["name" => "City Tours", "icon" => "fa-city", "description" => "Explore cities with guided tours."],
                        ["name" => "Beach Activities", "icon" => "fa-umbrella-beach", "description" => "Enjoy activities at the beach."],
                        ["name" => "Mountain Activities", "icon" => "fa-mountain", "description" => "Activities in the mountains."]
                    ]
                ],
                [
                    "name" => "Transportation Services",
                    "icon" => "fa-bus",
                    "description" => "Various transportation services.",
                    "subcategories" => [
                        ["name" => "Airport Transfers", "icon" => "fa-plane-arrival", "description" => "Transfers to and from the airport."],
                        ["name" => "Car Rentals", "icon" => "fa-car", "description" => "Rent a car for your travels."],
                        ["name" => "Shuttle Services", "icon" => "fa-shuttle-van", "description" => "Shuttle services for easy transportation."],
                        ["name" => "Public Transportation Passes", "icon" => "fa-subway", "description" => "Passes for public transportation."],
                        ["name" => "Bike Rentals", "icon" => "fa-bicycle", "description" => "Rent a bike for convenient travel."],
                        ["name" => "Boat Rentals", "icon" => "fa-ship", "description" => "Rent a boat for water activities."]
                    ]
                ],
                [
                    "name" => "Travel Planning Services",
                    "icon" => "fa-map",
                    "description" => "Services to help plan your travel.",
                    "subcategories" => [
                        ["name" => "Travel Agencies", "icon" => "fa-suitcase-rolling", "description" => "Professional travel agencies."],
                        ["name" => "Tour Operators", "icon" => "fa-clipboard-list", "description" => "Organized tours by operators."],
                        ["name" => "Custom Itineraries", "icon" => "fa-edit", "description" => "Customized travel itineraries."],
                        ["name" => "Travel Insurance", "icon" => "fa-file-alt", "description" => "Insurance for your travels."],
                        ["name" => "Visa Assistance", "icon" => "fa-passport", "description" => "Help with obtaining travel visas."]
                    ]
                ]
            ];

            // Save categories and subcategories
            foreach ($categories as $categoryData) {
                // Save the category
                $category = CategoryModel::updateOrCreate([
                    'name' => $categoryData['name'],
                ], [

                    'icon' => $categoryData['icon'],
                    'description' => $categoryData['description'],
                ]);

                // Save subcategories
                foreach ($categoryData['subcategories'] as $subcategoryData) {
                    $subcategory = SubCategoryModel::updateOrCreate([
                        'name' => $subcategoryData['name'],
                    ], [
                        'icon' => $subcategoryData['icon'],
                        'description' => $subcategoryData['description'],
                        'category_id' => $category->id
                    ]);
                }
            }

            // Commit transaction if all succeeds
            DB::commit();
        } catch (\Exception $e) {
            // Rollback and log error if something goes wrong
            DB::rollback();
            Log::error('Categories seeding failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
