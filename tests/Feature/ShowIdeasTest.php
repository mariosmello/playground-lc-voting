<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Idea;
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

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        $ideaOne = Idea::factory()->create([
            'title' => "My First Idea",
            'category_id' => $categoryOne->id,
            'description' => "Description of my first idea"
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => "My Second Idea",
            'category_id' => $categoryTwo->id,
            'description' => "Description of my second idea"
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($categoryOne->name);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
        $response->assertSee($categoryTwo->name);
    }

    public function test_single_idea_shows_on_the_show_page()
    {

        $category = Category::factory()->create(['name' => 'Category 1']);

        $idea = Idea::factory()->create([
            'title' => "My First Idea",
            'category_id' => $category->id,
            'description' => "Description of my first idea"
        ]);

        $response = $this->get(route('idea.show', $idea));

        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->description);
        $response->assertSee($category->name);
    }
}
