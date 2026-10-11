<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\Project;
use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['aboutMe']     = AboutMe::first();
        $data['projects']    = Project::get();
        $data['experiences'] = WorkExperience::orderBy('sort_order')->orderByDesc('id')->get();
        $data['skills']      = Skill::get()->groupBy('category');
        return view('welcome', $data);
    }
}

