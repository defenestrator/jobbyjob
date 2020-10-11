<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Application;
use App\Models\Listing;
use App\Models\Resume;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ApplicationController
 */
class ApplicationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $applications = Application::factory()->times(3)->create();

        $response = $this->get(route('application.index'));

        $response->assertOk();
        $response->assertViewIs('application.index');
        $response->assertViewHas('applications');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('application.create'));

        $response->assertOk();
        $response->assertViewIs('application.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ApplicationController::class,
            'store',
            \App\Http\Requests\ApplicationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $resume = Resume::factory()->create();
        $listing = Listing::factory()->create();

        $response = $this->post(route('application.store'), [
            'resume_id' => $resume->id,
            'listing_id' => $listing->id,
        ]);

        $applications = Application::query()
            ->where('resume_id', $resume->id)
            ->where('listing_id', $listing->id)
            ->get();
        $this->assertCount(1, $applications);
        $application = $applications->first();

        $response->assertRedirect(route('application.index'));
        $response->assertSessionHas('application.id', $application->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $application = Application::factory()->create();

        $response = $this->get(route('application.show', $application));

        $response->assertOk();
        $response->assertViewIs('application.show');
        $response->assertViewHas('application');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $application = Application::factory()->create();

        $response = $this->get(route('application.edit', $application));

        $response->assertOk();
        $response->assertViewIs('application.edit');
        $response->assertViewHas('application');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ApplicationController::class,
            'update',
            \App\Http\Requests\ApplicationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $application = Application::factory()->create();
        $resume = Resume::factory()->create();
        $listing = Listing::factory()->create();

        $response = $this->put(route('application.update', $application), [
            'resume_id' => $resume->id,
            'listing_id' => $listing->id,
        ]);

        $application->refresh();

        $response->assertRedirect(route('application.index'));
        $response->assertSessionHas('application.id', $application->id);

        $this->assertEquals($resume->id, $application->resume_id);
        $this->assertEquals($listing->id, $application->listing_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $application = Application::factory()->create();

        $response = $this->delete(route('application.destroy', $application));

        $response->assertRedirect(route('application.index'));

        $this->assertDeleted($application);
    }
}
