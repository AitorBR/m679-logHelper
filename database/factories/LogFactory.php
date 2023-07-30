<?php

namespace Database\Factories;
use App\Models\Log;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Log::class;
    public function definition()
    {

        $date = $this->faker->date('Y_m_d');
        $time = $this->faker->time('H_i_s');
        //$server_id = ServerFactory::pluck('id')->toArray();
        return [
            //'timestamp' =>   $this->faker->timestamp,
            'timestamp' =>   $date." ".$time,
            //'timestamp' =>   $this.timestamp(),
            'description' => $this->faker->text(5),
        ];
    }
}
