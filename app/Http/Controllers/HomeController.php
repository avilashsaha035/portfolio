<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['aboutMe'] = AboutMe::first();
        $data['projects'] = Project::get();
        return view('welcome', $data);
    }
}
