<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Project;

class ProjectController extends Controller
{

    public function index () {

        $projects = Project::paginate(3);

        $response = [
            'success' => true,
            'projects' => $projects
        ];
    
        return response()->json($response);
    }

    public function show($slug)
    {
        $projects = Project::where('slug', $slug)->with('technologies', 'type')->first();

        if ($projects) {
            return response()->json([
                'success' => true,
                'projects' => $projects
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'projects' => $projects
            ]);
        }
    }
}