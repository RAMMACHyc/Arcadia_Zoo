<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alimentation_quotidienne;
use App\Models\Animal;
use RealRashid\SweetAlert\Facades\Alert;

class alimentation_quotidienneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alimentations = alimentation_quotidienne::all();
        $animals = Animal::all();
        return view('alimentation_quotidienne.index', compact('animals', 'alimentations'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'animal_id' => 'required', 
            'user_id' => 'required',
            'date_alimentation' => 'required|date',
            'heure_alimentation' => 'required',
            'type_nourriture' => 'required',
            'quantite_nourriture' => 'required|numeric',
        ]);

        alimentation_quotidienne::create($validatedData);

        if (!$validatedData) {
            Alert::error('Erreur', 'Alimentation quotidienne non ajoutée.');
            return redirect()->route('alimentation_quotidienne.index')->with('error', 'Alimentation quotidienne non ajoutée.');
        } else {
            Alert::success('Succès', 'Alimentation quotidienne ajoutée avec succès.');
        }

        

        
        

        return redirect()->route('alimentation_quotidienne.index')->with('success', 'Alimentation quotidienne ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'animal_id' => 'required', 
            'date_alimentation' => 'required|date',
            'heure_alimentation' => 'required',
            'type_nourriture' => 'required',
            'quantite_nourriture' => 'required|numeric',
        ]);

        $alimentation = alimentation_quotidienne::findOrFail($id);

        $alimentation->update($validatedData);

        if (!$alimentation) {
            Alert::error('Erreur', 'Alimentation quotidienne non trouvée.');
            return redirect()->route('alimentation_quotidienne.index')->with('error', 'Alimentation quotidienne non trouvée.');
        } else {
            Alert::success('Succès', 'Alimentation quotidienne modifiée avec succès.');
        }

        

        

        return redirect()->route('alimentation_quotidienne.index')->with('success', 'Alimentation quotidienne modifiée avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alimentation = alimentation_quotidienne::findOrFail($id);
        $alimentation->delete();

        if (!$alimentation) {
            Alert::error('Erreur', 'Alimentation quotidienne non trouvée.');
            return redirect()->route('alimentation_quotidienne.index')->with('error', 'Alimentation quotidienne non trouvée.');
        } else {
            Alert::success('Succès', 'Alimentation quotidienne supprimée avec succès.');
        }

        


        return redirect()->route('alimentation_quotidienne.index')->with('success', 'Alimentation quotidienne supprimée avec succès.');
    }
}
