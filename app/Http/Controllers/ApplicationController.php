<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationStoreRequest;
use App\Http\Requests\ApplicationUpdateRequest;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $applications = Application::all();

        return view('application.index', compact('applications'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('application.create');
    }

    /**
     * @param \App\Http\Requests\ApplicationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationStoreRequest $request)
    {
        $application = Application::create($request->validated());

        $request->session()->flash('application.id', $application->id);

        return redirect()->route('application.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Application $application)
    {
        return view('application.show', compact('application'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Application $application)
    {
        return view('application.edit', compact('application'));
    }

    /**
     * @param \App\Http\Requests\ApplicationUpdateRequest $request
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationUpdateRequest $request, Application $application)
    {
        $application->update($request->validated());

        $request->session()->flash('application.id', $application->id);

        return redirect()->route('application.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Application $application)
    {
        $application->delete();

        return redirect()->route('application.index');
    }
}
