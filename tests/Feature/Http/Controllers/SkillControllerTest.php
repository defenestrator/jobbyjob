<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SkillController
 */
class SkillControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $skills = factory(Skill::class, 3)->create();

        $response = $this->get(route('skill.index'));

        $response->assertOk();
        $response->assertViewIs('skill.index');
        $response->assertViewHas('skills');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('skill.create'));

        $response->assertOk();
        $response->assertViewIs('skill.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SkillController::class,
            'store',
            \App\Http\Requests\SkillStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        $response = $this->post(route('skill.store'), [
            'name' => $name,
        ]);

        $skills = Skill::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $skills);
        $skill = $skills->first();

        $response->assertRedirect(route('skill.index'));
        $response->assertSessionHas('skill.id', $skill->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $skill = factory(Skill::class)->create();

        $response = $this->get(route('skill.show', $skill));

        $response->assertOk();
        $response->assertViewIs('skill.show');
        $response->assertViewHas('skill');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $skill = factory(Skill::class)->create();

        $response = $this->get(route('skill.edit', $skill));

        $response->assertOk();
        $response->assertViewIs('skill.edit');
        $response->assertViewHas('skill');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SkillController::class,
            'update',
            \App\Http\Requests\SkillUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $skill = factory(Skill::class)->create();
        $name = $this->faker->name;

        $response = $this->put(route('skill.update', $skill), [
            'name' => $name,
        ]);

        $skill->refresh();

        $response->assertRedirect(route('skill.index'));
        $response->assertSessionHas('skill.id', $skill->id);

        $this->assertEquals($name, $skill->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $skill = factory(Skill::class)->create();

        $response = $this->delete(route('skill.destroy', $skill));

        $response->assertRedirect(route('skill.index'));

        $this->assertDeleted($skill);
    }
}
