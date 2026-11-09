<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrNew(['email' => 'admin@test.com']);

        if (! $admin->exists) {
            $admin->name = 'Admin';
            $admin->password = 'password123';
        }

        $admin->is_admin = true;
        $admin->save();

        $this->call(RoomSeeder::class);
    }
}