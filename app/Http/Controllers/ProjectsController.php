<?php

namespace App\Http\Controllers;

use App\Models\ProjectsAttribute;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $data['projects_att'] = ProjectsAttribute::first();
        $data['projects'] = Projects::where('is_active',1)->orderBy('id','DESC')->get();
        return view('projects',$data);
    }

    public function show($slug)
    {
        $projects = Projects::where('slug',$slug)->first();
        $data['projects'] = $projects;
        $data['projects_get'] = Projects::where('is_active',1)->orderBy('id','DESC')->take(3)->get();
        $data['previous'] = Projects::where('id', '<', $projects->id)->max('slug');
        $data['next'] = Projects::where('id', '>', $projects->id)->min('slug');
        return view('projects-details',$data);
    }
}
