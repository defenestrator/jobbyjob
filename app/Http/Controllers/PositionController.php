<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionStoreRequest;
use App\Http\Requests\PositionUpdateRequest;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $positions = Position::all();

        return view('position.index', compact('positions'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('position.create');
    }

    /**
     * @param \App\Http\Requests\PositionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionStoreRequest $request)
    {
        $position = Position::create($request->validated());

        $request->session()->flash('position.id', $position->id);

        return redirect()->route('position.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Position $position)
    {
        return view('position.show', compact('position'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Position $position)
    {
        return view('position.edit', compact('position'));
    }

    /**
     * @param \App\Http\Requests\PositionUpdateRequest $request
     * @param \App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function update(PositionUpdateRequest $request, Position $position)
    {
        $position->update($request->validated());

        $request->session()->flash('position.id', $position->id);

        return redirect()->route('position.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Position $position)
    {
        $position->delete();

        return redirect()->route('position.index');
    }
}
