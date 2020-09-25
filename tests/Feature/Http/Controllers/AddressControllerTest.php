<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AddressController
 */
class AddressControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $addresses = factory(Address::class, 3)->create();

        $response = $this->get(route('address.index'));

        $response->assertOk();
        $response->assertViewIs('address.index');
        $response->assertViewHas('addresses');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('address.create'));

        $response->assertOk();
        $response->assertViewIs('address.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AddressController::class,
            'store',
            \App\Http\Requests\AddressStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $addressable_id = $this->faker->randomNumber();
        $addressable_type = $this->faker->word;
        $address_1 = $this->faker->word;
        $city = $this->faker->city;
        $country = $this->faker->country;
        $postcode = $this->faker->postcode;

        $response = $this->post(route('address.store'), [
            'addressable_id' => $addressable_id,
            'addressable_type' => $addressable_type,
            'address_1' => $address_1,
            'city' => $city,
            'country' => $country,
            'postcode' => $postcode,
        ]);

        $addresses = Address::query()
            ->where('addressable_id', $addressable_id)
            ->where('addressable_type', $addressable_type)
            ->where('address_1', $address_1)
            ->where('city', $city)
            ->where('country', $country)
            ->where('postcode', $postcode)
            ->get();
        $this->assertCount(1, $addresses);
        $address = $addresses->first();

        $response->assertRedirect(route('address.index'));
        $response->assertSessionHas('address.id', $address->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $address = factory(Address::class)->create();

        $response = $this->get(route('address.show', $address));

        $response->assertOk();
        $response->assertViewIs('address.show');
        $response->assertViewHas('address');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $address = factory(Address::class)->create();

        $response = $this->get(route('address.edit', $address));

        $response->assertOk();
        $response->assertViewIs('address.edit');
        $response->assertViewHas('address');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AddressController::class,
            'update',
            \App\Http\Requests\AddressUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $address = factory(Address::class)->create();
        $addressable_id = $this->faker->randomNumber();
        $addressable_type = $this->faker->word;
        $address_1 = $this->faker->word;
        $city = $this->faker->city;
        $country = $this->faker->country;
        $postcode = $this->faker->postcode;

        $response = $this->put(route('address.update', $address), [
            'addressable_id' => $addressable_id,
            'addressable_type' => $addressable_type,
            'address_1' => $address_1,
            'city' => $city,
            'country' => $country,
            'postcode' => $postcode,
        ]);

        $address->refresh();

        $response->assertRedirect(route('address.index'));
        $response->assertSessionHas('address.id', $address->id);

        $this->assertEquals($addressable_id, $address->addressable_id);
        $this->assertEquals($addressable_type, $address->addressable_type);
        $this->assertEquals($address_1, $address->address_1);
        $this->assertEquals($city, $address->city);
        $this->assertEquals($country, $address->country);
        $this->assertEquals($postcode, $address->postcode);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $address = factory(Address::class)->create();

        $response = $this->delete(route('address.destroy', $address));

        $response->assertRedirect(route('address.index'));

        $this->assertDeleted($address);
    }
}
