<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_of_ideas_shows_on_main_page()
    {

        $user = User::factory()->create();
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);
        $statusOne = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        $statusTwo = Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-purple text-white']);

        $ideaOne = Idea::factory()->create([
            'title' => "My First Idea",
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusOne->id,
            'description' => "Description of my first idea"
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => "My Second Idea",
            'user_id' => $user->id,
            'category_id' => $categoryTwo->id,
            'status_id' => $statusTwo->id,
            'description' => "Description of my second idea"
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($categoryOne->name);
        $response->assertSee('<span class="dd-status-name">'.$statusOne->name.'</span>', false);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
        $response->assertSee($categoryTwo->name);
        $response->assertSee('<span class="dd-status-name">'.$statusTwo->name.'</span>', false);
    }

    public function test_single_idea_shows_on_the_show_page()
    {

        $user = User::factory()->create();
        $category = Category::factory()->create(['name' => 'Category 1']);
        $status = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $idea = Idea::factory()->create([
            'title' => "My First Idea",
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
            'description' => "Description of my first idea"
        ]);

        $response = $this->get(route('idea.show', $idea));

        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->description);
        $response->assertSee($category->name);
        $response->assertSee('<span class="dd-status-name">'.$status->name.'</span>', false);
    }
}
