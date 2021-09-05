<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateIdea;
use App\Models\Category;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateIdeaTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_idea_form_does_not_show_when_not_logged_out()
    {
        $response = $this->get(route('idea.index'));
        $response->assertSuccessful();
        $response->assertSee('Please login to create an idea.');
    }

    public function test_create_idea_form_does_show_when_logged_in()
    {
        $response = $this->actingAs(User::factory()->create())->get(route('idea.index'));
        $response->assertSuccessful();
        $response->assertDontSee('Please login to create an idea.');
        $response->assertSee('Let us know what you would like and we\'ll take a look over!', false);
    }

    public function test_main_page_contains_create_idea_livewire_component()
    {
        $this->actingAs(User::factory()->create())
            ->get(route('idea.index'))
            ->assertSeeLivewire('create-idea')
        ;
    }

    public function test_create_idea_form_validation_works()
    {
        Livewire::actingAs(User::factory()->create())
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->call('createIdea')
            ->assertHasErrors(['title', 'category', 'description'])
            ->assertSee('The title field is required')
            ;
    }

    public function test_creating_an_idea_works_correctly()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create(['name' => 'Category 1']);
        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray']);

        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'My First Idea')
            ->set('category', $category->id)
            ->set('description', 'Just some description')
            ->call('createIdea')
            ->assertRedirect('/')
        ;

        $response = $this->actingAs($user)->get(route('idea.index'));
        $response->assertSuccessful();
        $response->assertSee('My First Idea');

        $this->assertDatabaseHas('ideas', [
            'title' => 'My First Idea'
        ]);

    }
}
