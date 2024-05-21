<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avis = Avis::all();
        return view('avis.index', compact('avis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pseudo' => 'nullable|string|max:255',
            'commentaire' => 'nullable|string|max:255',
            'service_id' => 'nullable|integer',
            'isVisible' => 'nullable|boolean',
        ]);
    
        Avis::create($validatedData);

        if (!$validatedData) {
            Alert::error('Erreur', 'Avis non ajouté.');
            return redirect()->route('avis.index')->with('error', 'Avis non ajouté.');
        } else {
            Alert::success('Succès', 'Avis ajouté avec succès.');
        }

        
        
        return redirect()->route('avis.index')->with('success', 'Avis created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Avis $avi)
    {
    
    }

    public function toggleVisibility(Avis $avi)
    {
        $avi->isVisible = !$avi->isVisible; 
        $avi->save();

        if (!$avi) {
            Alert::error('Erreur', 'Avis visibility non modifié.');
            return redirect()->route('avis.index')->with('error', 'Avis visibility non modifié.');
        } else {
            Alert::success('Succès', 'Avis visibility modifié avec succès.');
        }

        

        
    
        return redirect()->route('avis.index')->with('success', 'Avis visibility updated successfully.');
    }


    /**
     * Show the form for destroy the specified resource.
     */

    public function destroy(Avis $avi)
    {
        $avi->delete();

        if (!$avi) {
            Alert::error('Erreur', 'Avis non supprimé.');
            return redirect()->route('avis.index')->with('error', 'Avis non supprimé.');
        } else {
            Alert::success('Succès', 'Avis supprimé avec succès.');
        }

        

        return redirect()->route('avis.index')->with('success', 'Avis deleted successfully.');
    }
}