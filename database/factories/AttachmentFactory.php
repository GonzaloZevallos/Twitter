<?php

namespace Database\Factories;

use App\Models\Attachment;
use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class AttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $attachmentFilename = $this->faker->unique()->image('public/storage/avatars', 200, 200, 'cats', false);

        return [
            'filename' => $attachmentFilename,
            'size' => 200,
            'extension' => pathinfo($attachmentFilename, PATHINFO_EXTENSION),
            'tweet_id' => Tweet::factory()
        ];
    }
}
