<?php

namespace Database\Seeders;
use \App\Models\Airline;
use \App\Models\Flight;
use \App\Models\Aircraft;
use \App\Models\Ticket;
use Faker\Factory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $airlines = Airline::factory(rand(0,10))->create();
        $aircrafts = Aircraft::factory(rand(0,10))->create();
        $flights = [];
        $ticket_types = ['economy', 'business', 'first_class'];

        for ($i = 0; $i < 30; $i++) {
            $flight = Flight::factory()->create(
                [
                    'airline_id' => $airlines->random()->id,
                    'aircraft_id' => $aircrafts->random()->id,
                ]
            );
            array_push($flights, $flight);
        }
        $faker = Factory::create();

        for ($i = 0; $i < 30; $i++) {
            Ticket::create([
                'flight_id' => $flights[array_rand($flights)]->id,
                'user' => $faker->ipv4,
                'type' => $ticket_types[array_rand($ticket_types)],
            ]);
        }
        
    }
}
