<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function index()
    {
        // Fetch any necessary data for analysis view
        // For example: $data = Model::all();

        return view('admin.analysis.index');
    }
}
