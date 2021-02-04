<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Tweet;
use App\Models\User;
use Database\Factories\TeamFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->withPersonalTeam()->create([
            'name' => 'zollaves',
            'email' => 'gonzalo.zev@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        User::factory(11)->withPersonalTeam()->create();

        $users = User::all();

        $users->each(function (User $user) use ($users) {
            Tweet::factory(rand(0, 10))
                ->create([
                    'author_id' => $user->id
                ]);
            $usersWithoutCurrentUser = User::whereNotIn('id', [$user->id])->get();
            $user->followers()->sync(
                $usersWithoutCurrentUser->random(rand(0, 10))
            );
        });

        $tweets = Tweet::all();

        $tweets->each(function(Tweet $tweet) use ($users) {
            Tweet::factory(rand(0, 10))
                ->create([
                    'author_id' => $users->random()->id,
                    'parent_id' => $tweet->id
                ]);
            $tweet->likers()->sync(
                $users->random(rand(0, 10))
            );
        });
    }
}
