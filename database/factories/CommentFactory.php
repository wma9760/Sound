<?php

namespace Database\Factories;

use App\Models\Audio;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>User::get()->random()->id,
            'track_id'=>Audio::get()->random()->id,
            'comment'=>$this->faker()->paragaph(1)        ];
    }
}
