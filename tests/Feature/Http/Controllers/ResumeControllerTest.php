<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ResumeController
 */
class ResumeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $resumes = Resume::factory()->times(3)->create();

        $response = $this->get(route('resume.index'));

        $response->assertOk();
        $response->assertViewIs('resume.index');
        $response->assertViewHas('resumes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('resume.create'));

        $response->assertOk();
        $response->assertViewIs('resume.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ResumeController::class,
            'store',
            \App\Http\Requests\ResumeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $user = User::factory()->create();
        $active = $this->faker->boolean;
        $stack_overflow = $this->faker->word;
        $cv = $this->faker->word;
        $phone = $this->faker->phoneNumber;
        $github = $this->faker->word;
        $linked_in = $this->faker->word;
        $facebook = $this->faker->word;
        $instagram = $this->faker->word;
        $twitter = $this->faker->word;
        $snapchat = $this->faker->word;

        $response = $this->post(route('resume.store'), [
            'user_id' => $user->id,
            'active' => $active,
            'stack_overflow' => $stack_overflow,
            'cv' => $cv,
            'phone' => $phone,
            'github' => $github,
            'linked_in' => $linked_in,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'snapchat' => $snapchat,
        ]);

        $resumes = Resume::query()
            ->where('user_id', $user->id)
            ->where('active', $active)
            ->where('stack_overflow', $stack_overflow)
            ->where('cv', $cv)
            ->where('phone', $phone)
            ->where('github', $github)
            ->where('linked_in', $linked_in)
            ->where('facebook', $facebook)
            ->where('instagram', $instagram)
            ->where('twitter', $twitter)
            ->where('snapchat', $snapchat)
            ->get();
        $this->assertCount(1, $resumes);
        $resume = $resumes->first();

        $response->assertRedirect(route('resume.index'));
        $response->assertSessionHas('resume.id', $resume->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $resume = Resume::factory()->create();

        $response = $this->get(route('resume.show', $resume));

        $response->assertOk();
        $response->assertViewIs('resume.show');
        $response->assertViewHas('resume');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $resume = Resume::factory()->create();

        $response = $this->get(route('resume.edit', $resume));

        $response->assertOk();
        $response->assertViewIs('resume.edit');
        $response->assertViewHas('resume');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ResumeController::class,
            'update',
            \App\Http\Requests\ResumeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $resume = Resume::factory()->create();
        $user = User::factory()->create();
        $active = $this->faker->boolean;
        $stack_overflow = $this->faker->word;
        $cv = $this->faker->word;
        $phone = $this->faker->phoneNumber;
        $github = $this->faker->word;
        $linked_in = $this->faker->word;
        $facebook = $this->faker->word;
        $instagram = $this->faker->word;
        $twitter = $this->faker->word;
        $snapchat = $this->faker->word;

        $response = $this->put(route('resume.update', $resume), [
            'user_id' => $user->id,
            'active' => $active,
            'stack_overflow' => $stack_overflow,
            'cv' => $cv,
            'phone' => $phone,
            'github' => $github,
            'linked_in' => $linked_in,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'snapchat' => $snapchat,
        ]);

        $resume->refresh();

        $response->assertRedirect(route('resume.index'));
        $response->assertSessionHas('resume.id', $resume->id);

        $this->assertEquals($user->id, $resume->user_id);
        $this->assertEquals($active, $resume->active);
        $this->assertEquals($stack_overflow, $resume->stack_overflow);
        $this->assertEquals($cv, $resume->cv);
        $this->assertEquals($phone, $resume->phone);
        $this->assertEquals($github, $resume->github);
        $this->assertEquals($linked_in, $resume->linked_in);
        $this->assertEquals($facebook, $resume->facebook);
        $this->assertEquals($instagram, $resume->instagram);
        $this->assertEquals($twitter, $resume->twitter);
        $this->assertEquals($snapchat, $resume->snapchat);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $resume = Resume::factory()->create();

        $response = $this->delete(route('resume.destroy', $resume));

        $response->assertRedirect(route('resume.index'));

        $this->assertDeleted($resume);
    }
}
