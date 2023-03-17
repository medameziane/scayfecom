<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(6,true);
        $slug = Str::slug($name,"-");
        return [
            'name'=>$name,
            'slug'=>$slug,
            'description'=>$this->faker->text(500),
            'price'=>$this->faker->numberBetween(10,500),
            'quantity'=>$this->faker->numberBetween(10,50),
            'status'=>$this->faker->numberBetween(0,1),
            'sub_category_id'=>$this->faker->numberBetween(1,18),
            'image'=>"keyboard-".$this->faker->numberBetween(1,10).".jpg",
        ];
        
    }
}
