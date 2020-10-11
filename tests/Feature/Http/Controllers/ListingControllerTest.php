<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Listing;
use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ListingController
 */
class ListingControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $listings = Listing::factory()->times(3)->create();

        $response = $this->get(route('listing.index'));

        $response->assertOk();
        $response->assertViewIs('listing.index');
        $response->assertViewHas('listings');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('listing.create'));

        $response->assertOk();
        $response->assertViewIs('listing.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ListingController::class,
            'store',
            \App\Http\Requests\ListingStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $position = Position::factory()->create();

        $response = $this->post(route('listing.store'), [
            'position_id' => $position->id,
        ]);

        $listings = Listing::query()
            ->where('position_id', $position->id)
            ->get();
        $this->assertCount(1, $listings);
        $listing = $listings->first();

        $response->assertRedirect(route('listing.index'));
        $response->assertSessionHas('listing.id', $listing->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $listing = Listing::factory()->create();

        $response = $this->get(route('listing.show', $listing));

        $response->assertOk();
        $response->assertViewIs('listing.show');
        $response->assertViewHas('listing');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $listing = Listing::factory()->create();

        $response = $this->get(route('listing.edit', $listing));

        $response->assertOk();
        $response->assertViewIs('listing.edit');
        $response->assertViewHas('listing');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ListingController::class,
            'update',
            \App\Http\Requests\ListingUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $listing = Listing::factory()->create();
        $position = Position::factory()->create();

        $response = $this->put(route('listing.update', $listing), [
            'position_id' => $position->id,
        ]);

        $listing->refresh();

        $response->assertRedirect(route('listing.index'));
        $response->assertSessionHas('listing.id', $listing->id);

        $this->assertEquals($position->id, $listing->position_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $listing = Listing::factory()->create();

        $response = $this->delete(route('listing.destroy', $listing));

        $response->assertRedirect(route('listing.index'));

        $this->assertDeleted($listing);
    }
}
