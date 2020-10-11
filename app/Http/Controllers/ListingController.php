<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingStoreRequest;
use App\Http\Requests\ListingUpdateRequest;
use App\Models\Listing;
use App\Models\Position;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listings = Listing::active()->with('position')->get();

        return view('listing.index', compact('listings'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('listing.create');
    }

    /**
     * @param \App\Http\Requests\ListingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListingStoreRequest $request)
    {
        $listing = Listing::create($request->validated());

        $request->session()->flash('listing.id', $listing->id);

        return redirect()->route('listing.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Listing $listing, Position $position)
    {
        $model = $position->find($listing->position_id);
        $skills = $model->with('skills');

        return view('listing.show', compact('listing', 'skills'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Listing $listing)
    {
        return view('listing.edit', compact('listing'));
    }

    /**
     * @param \App\Http\Requests\ListingUpdateRequest $request
     * @param \App\Models\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function update(ListingUpdateRequest $request, Listing $listing)
    {
        $listing->update($request->validated());

        $request->session()->flash('listing.id', $listing->id);

        return redirect()->route('listing.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Listing $listing)
    {
        $listing->delete();

        return redirect()->route('listing.index');
    }
}
