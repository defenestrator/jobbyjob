<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Position;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PositionController
 */
class PositionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $positions = Position::factory()->times(3)->create();

        $response = $this->get(route('position.index'));

        $response->assertOk();
        $response->assertViewIs('position.index');
        $response->assertViewHas('positions');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('position.create'));

        $response->assertOk();
        $response->assertViewIs('position.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PositionController::class,
            'store',
            \App\Http\Requests\PositionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $team = Team::factory()->create();
        $title = $this->faker->sentence(4);
        $description = $this->faker->text;
        $remote = $this->faker->boolean;
        $compensation = json_encode(['salary' => 4000000]);
        $type = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('position.store'), [
            'team_id' => $team->id,
            'title' => $title,
            'description' => $description,
            'remote' => $remote,
            'compensation' => $compensation,
            'type' => $type,
        ]);

        $positions = Position::query()
            ->where('team_id', $team->id)
            ->where('title', $title)
            ->where('description', $description)
            ->where('remote', $remote)
            ->where('compensation', $compensation)
            ->where('type', $type)
            ->get();
        $this->assertCount(1, $positions);
        $position = $positions->first();

        $response->assertRedirect(route('position.index'));
        $response->assertSessionHas('position.id', $position->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $position = Position::factory()->create();

        $response = $this->get(route('position.show', $position));

        $response->assertOk();
        $response->assertViewIs('position.show');
        $response->assertViewHas('position');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $position = Position::factory()->create();

        $response = $this->get(route('position.edit', $position));

        $response->assertOk();
        $response->assertViewIs('position.edit');
        $response->assertViewHas('position');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PositionController::class,
            'update',
            \App\Http\Requests\PositionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $position = Position::factory()->create();
        $team = Team::factory()->create();
        $title = $this->faker->sentence(4);
        $description = $this->faker->text;
        $remote = $this->faker->boolean;
        $compensation = json_encode(['salary' => 4000000]);
        $type = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('position.update', $position), [
            'team_id' => $team->id,
            'title' => $title,
            'description' => $description,
            'remote' => $remote,
            'compensation' => $compensation,
            'type' => $type,
        ]);

        $position->refresh();

        $response->assertRedirect(route('position.index'));
        $response->assertSessionHas('position.id', $position->id);

        $this->assertEquals($team->id, $position->team_id);
        $this->assertEquals($title, $position->title);
        $this->assertEquals($description, $position->description);
        $this->assertEquals($remote, $position->remote);
        $this->assertEquals($compensation, $position->compensation);
        $this->assertEquals($type, $position->type);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $position = Position::factory()->create();

        $response = $this->delete(route('position.destroy', $position));

        $response->assertRedirect(route('position.index'));

        $this->assertDeleted($position);
    }
}
