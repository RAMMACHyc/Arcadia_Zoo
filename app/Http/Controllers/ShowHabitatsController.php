<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\habitat;



class ShowHabitatsController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habitats = habitat::with('animals')->get();
        return view('habitat', compact('habitats'));
    }

}
