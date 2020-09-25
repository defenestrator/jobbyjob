<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ResumeSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ResumeSettingController
 */
class ResumeSettingControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function toggle_displays_view()
    {
        $resumeSettings = factory(ResumeSetting::class, 3)->create();

        $response = $this->get(route('resume-setting.toggle'));

        $response->assertOk();
        $response->assertViewIs('resume.show');
    }
}
