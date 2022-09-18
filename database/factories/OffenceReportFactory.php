<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\OffenceReport;

class OffenceReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OffenceReport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => Str::random(10),
            'offence_id' => 1,
            'sub_offence_id' => 1,
            'village_id' => 273,
            'reporter_id' => 161,
            'suspect_id' => 161
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [];
        });
    }

    
}
