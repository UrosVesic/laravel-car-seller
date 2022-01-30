<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Brand;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
        protected $model = Brand::class;

    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        $v = $this->faker->unique()->vehicleArray();

        return [
            'name'=>$v['brand'],
            'country'=>$this->faker->country(),
        ];
    }
}
