<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index(){
        return Idea::orderBy('id', 'ASC')->get();
    }

    public function store(Request $request){
        $this->validate($request, ['description' => 'required|min:8']);

        Idea::create($request->all());
        return;
    }

}

