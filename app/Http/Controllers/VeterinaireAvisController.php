<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\VeterinaireAvis;
use RealRashid\SweetAlert\Facades\Alert;



class VeterinaireAvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avis = VeterinaireAvis::all();
        $animals = Animal::all();
        return view('veterinaire-avis.index', compact('animals', 'avis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Animal $animal)
    {
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Animal $animal)
    {
        $validatedData = $request->validate([
            'animal_id' => 'required', 
            'etat_animal' => 'required',
            'nourriture' => 'required',
            'grammage_nourriture' => 'required|numeric',
            'date_passage' => 'required|date',
            'detail_etat' => 'nullable',
            'user_id' => 'required|integer|exists:users,id',
            'comment' => 'nullable|string|max:255',
        

        ]);

        VeterinaireAvis::create($validatedData);

        if (!$validatedData) {
            Alert::error('Erreur', 'Avis vétérinaire non ajouté.');
            return redirect()->route('veterinaire-avis.index')->with('error', 'Avis vétérinaire non ajouté.');
        } else {
            Alert::success('Succès', 'Avis vétérinaire ajouté avec succès.');
        }

        return redirect()->route('veterinaire-avis.index')->with('success', 'Avis vétérinaire ajouté avec succès.');
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'etat_animal' => 'required',
            'nourriture' => 'required',
            'grammage_nourriture' => 'required|numeric',
            'date_passage' => 'required|date',
            'detail_etat' => 'nullable',
            'comment' => 'nullable|string|max:255',
        ]);

        $avis = VeterinaireAvis::findOrFail($id);

        $avis->update($validatedData);

        if (!$avis) {
            Alert::error('Erreur', 'Avis vétérinaire non mis à jour.');
            return redirect()->route('veterinaire-avis.index')->with('error', 'Avis vétérinaire non mis à jour.');
        } else {
            Alert::success('Succès', 'Avis vétérinaire mis à jour avec succès.');
        }

        return redirect()->route('veterinaire-avis.index')->with('success', 'Avis vétérinaire mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $avis = VeterinaireAvis::findOrFail($id);
        $avis->delete();

        if (!$avis) {
            Alert::error('Erreur', 'Avis vétérinaire non supprimé.');
            return redirect()->route('veterinaire-avis.index')->with('error', 'Avis vétérinaire non supprimé.');
        } else {
            Alert::success('Succès', 'Avis vétérinaire supprimé avec succès.');
        }


        return redirect()->route('veterinaire-avis.index')->with('success', 'Avis vétérinaire supprimé avec succès.');
    }
}
