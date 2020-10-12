<?php

namespace App\Http\Controllers;

use App\Models\ResumeSetting;
use Illuminate\Http\Request;

class ResumeSettingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toggle(Request $request, $resume_id, $column)
    {
        dd($column);
        $resumeSettings = ResumeSetting::where('resume_id', $resume_id)->get($column);
        dd($resumeSettings);
        $resumeSettings->update([
            $column => !$column
        ]);

        return view('resume.show', $resumeSettings->toArray());
    }
}
