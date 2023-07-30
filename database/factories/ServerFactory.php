<?php

namespace Database\Factories;

use App\Models\Server;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */
    protected $model = Server::class;
    public function definition()
    {

        $num = rand(0, 100);

        switch ($num) {
            case ($num <= 69):
                return [
                    'ipv4' => $this->faker->unique()->ipv4(),
                    'ipv6' => "",
                    'location' => $this->faker->state(),
                    'description' => $this->faker->paragraph(),
                ];
                break;
            case ($num <= 84);
                return [
                    'ipv4' => "",
                    'ipv6' => $this->faker->unique()->ipv6(),
                    'location' => $this->faker->state(),
                    'description' => $this->faker->paragraph(),
                ];
                break;
            case ($num <= 100);
                return [
                    'ipv4' => $this->faker->unique()->ipv4(),
                    'ipv6' => $this->faker->unique()->ipv6(),
                    'location' => $this->faker->state(),
                    'description' => $this->faker->paragraph(),
                ];
                break;
        }
    }
}
