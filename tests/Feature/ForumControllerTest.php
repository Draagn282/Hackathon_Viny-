<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Account;
use App\Models\Blogs;
use App\Models\Comments;

class ForumControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index method.
     */
    public function test_index_displays_blogs()
    {
        $account = Account::factory()->count(3)->create();
        $blogs = Blogs::factory()->count(3)->create();

        $response = $this->get(route('forums.index'));

        $response->assertStatus(200);
        $response->assertViewIs('forums.index');
        $response->assertViewHas('blog', function ($blog) use ($blogs) {
            return $blogs->pluck('id')->sort()->values()->toArray() === 
                   collect($blog)->pluck('id')->sort()->values()->toArray();
        });
    }

    /**
     * Test the store method.
     */
    public function test_store_creates_blog()
    {
        $account = Account::factory()->create();
        $data = [
            'header' => 'Test Blog',
            'description' => 'This is a test description.',
            'account_id' => $account->id,
            '_token' => csrf_token(), // Add the CSRF token
        ];
    
        $response = $this->post(route('forums.store'), $data);
    
        $response->assertRedirect(route('forums.index'));
        $this->assertDatabaseHas('blogs', $data);
    }
    

    /**
     * Test the show method.
     */
    public function test_show_displays_blog_with_comments()
    {
        $account = Account::factory()->create();
        $blog = Blogs::factory()->create(['account_id' => $account->id]);
        $comments = Comments::factory()->count(3)->create(['blogs_id' => $blog->id]);

        $response = $this->get(route('forums.show', $blog->id));

        $response->assertStatus(200);
        $response->assertViewIs('forums.show');
        $response->assertViewHas('blog', $blog);
        $response->assertViewHas('comments', $comments);
    }

    /**
     * Test the destroy method.
     */
    public function test_destroy_deletes_blog()
    {
        $blog = Blogs::factory()->create();

        $response = $this->delete(route('forums.destroy', $blog->id));

        $response->assertRedirect(route('forums.index'));
        $this->assertDatabaseMissing('blogs', ['id' => $blog->id]);
    }

    /**
     * Test the storeComment method.
     */
    public function test_store_comment_creates_comment()
    {
        $account = Account::factory()->create();
        $blog = Blogs::factory()->create(['account_id' => $account->id]);
        $data = [
            'content' => 'Test comment',
            'blogs_id' => $blog->id,
            'account_id' => $account->id,
        ];

        $response = $this->post(route('forums.storeComment'), $data);

        $response->assertRedirect(route('forums.index'));
        $this->assertDatabaseHas('comments', [
            'description' => 'Test comment',
            'blogs_id' => $blog->id,
            'account_id' => $account->id,
        ]);
    }
}
