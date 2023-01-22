<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function application_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function posts_list_display_latest_ones(): void
    {
        $user = User::factory()->create();
        Post::factory(mt_rand(10, 50))->create();
        $response = $this->actingAs($user, 'web')->get('posts');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function a_post_can_be_created_by_an_authenticated_user(): void
    {
        Storage::fake('dummy');
        $post = Post::factory()->make();
        $user = User::factory()->create();


        $response = $this->actingAs($user, 'web')->post('posts', [
            'title' => $post->title,
            'image' => UploadedFile::fake()->image('post_image.jpg'),
            'content' => $post->content,
        ]);

        // Redirect
        $response->assertStatus(302);

        $this->assertDatabaseHas('posts', [
            'title' => $post->title
        ]);
    }

    /**
     * @test
     */
    public function a_post_title_image_and_content_must_be_exit_and_valid(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')->post('posts');

        $response->assertSessionHasErrors(['title', 'image', 'content']);
    }

    /**
     * @test
     */
    public function a_post_can_be_updated_by_an_authenticated_user(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'web')->post('posts', $this->dummyData());

        $this->actingAs($user, 'web')->patch(Post::first()->path(), [
            'title' => 'New Updated Title',
            'image' => UploadedFile::fake()->image('post_image.jpg'),
            'content' => 'New Updated Paragraph',
        ]);

        $this->assertEquals('New Updated Title', Post::first()->title);
    }

    /**
     * @test
     */
    public function a_post_can_be_deleted()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'web')->post('posts', $this->dummyData());

        $post = Post::first();
        $this->assertCount(1, Post::all());

        $response = $this->actingAs($user, 'web')->delete($post->path());

        $this->assertCount(0, Post::all());

        // Redirect
        $response->assertStatus(302);
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
