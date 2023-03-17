<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subcategory = $this->faker->unique()->words(2,true);
        $slug = Str::slug($subcategory,"-");
        return [
            "subcategory"      =>  $subcategory,
            "slug"              =>  $slug,
            "category_id"       =>  $this->faker->numberBetween(1,5),
        ];
    }
}
