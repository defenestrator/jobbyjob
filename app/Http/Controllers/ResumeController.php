<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeStoreRequest;
use App\Http\Requests\ResumeUpdateRequest;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resumes = Resume::all();

        return view('resume.index', compact('resumes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('resume.create');
    }

    /**
     * @param \App\Http\Requests\ResumeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResumeStoreRequest $request)
    {
        $resume = Resume::create($request->validated());

        $request->session()->flash('resume.id', $resume->id);

        return redirect()->route('resume.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Resume $resume
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Resume $resume)
    {
        return view('resume.show', compact('resume'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Resume $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Resume $resume)
    {
        return view('resume.edit', compact('resume'));
    }

    /**
     * @param \App\Http\Requests\ResumeUpdateRequest $request
     * @param \App\Models\Resume $resume
     * @return \Illuminate\Http\Response
     */
    public function update(ResumeUpdateRequest $request, Resume $resume)
    {
        $resume->update($request->validated());

        $request->session()->flash('resume.id', $resume->id);

        return redirect()->route('resume.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Resume $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Resume $resume)
    {
        $resume->delete();

        return redirect()->route('resume.index');
    }
}
