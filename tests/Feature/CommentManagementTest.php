<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentManagementTest extends TestCase
{
    use RefreshDatabase;


    /**
     * @test
     */
    public function a_comment_added_to_a_post_by_an_authenticated_user(): void
    {
        Storage::fake('dummy');
        $user = User::factory()->create();

        $this->actingAs($user, 'web')->post('posts', $this->dummyData());

        $response = $this->actingAs($user, 'web')->post('posts/'.Post::first()->id.'/comments', [
            'body' => 'Comment added',
        ]);

        // Redirect
        $response->assertStatus(302);

        $this->assertDatabaseHas('comments', [
            'body' => 'Comment added'
        ]);
    }

    private function dummyData(): array
    {
        return [
            'title' => 'Simple Title',
            'image' => UploadedFile::fake()->image('post_image.jpg'),
            'content' =>'Simple Content Paragraph'
        ];
    }

}
