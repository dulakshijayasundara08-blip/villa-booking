<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Garden View Room',
                'description' => 'A quiet room with a private balcony that looks out over our tropical garden. Perfect for couples.',
                'price_per_night' => 8500,
                'capacity' => 2,
                'image' => 'images/room-1.jpg',
            ],
            [
                'name' => 'Deluxe Family Room',
                'description' => 'A spacious room with two beds, air conditioning and a seating area for the whole family.',
                'price_per_night' => 14500,
                'capacity' => 4,
                'image' => 'images/room-2.jpg',
            ],
            [
                'name' => 'Mountain View Suite',
                'description' => 'Wake up to a wide view of the hills from your own balcony. Includes a private bathroom with a bathtub.',
                'price_per_night' => 18000,
                'capacity' => 3,
                'image' => 'images/room-3.jpg',
            ],
            [
                'name' => 'Cozy Budget Room',
                'description' => 'A simple, clean room with a comfortable bed and a fan. Ideal for solo travellers.',
                'price_per_night' => 4500,
                'capacity' => 1,
                'image' => 'images/room-4.jpg',
            ],
        ];

        foreach ($rooms as $room) {
            Room::updateOrCreate(
                ['name' => $room['name']],
                $room
            );
        }
    }
}