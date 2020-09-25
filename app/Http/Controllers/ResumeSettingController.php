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
    public function toggle(Request $request)
    {
        $resumeSettings = ResumeSetting::where('resume_id', $resume_id)->get();

        return view('resume.show');
    }
}
