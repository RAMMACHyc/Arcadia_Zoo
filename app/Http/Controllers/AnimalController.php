<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Habitat;
use RealRashid\SweetAlert\Facades\Alert;



class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::all();
        $habitats = Habitat::all();
        return view('animals.index', compact('animals', 'habitats'));
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
            'prenom' => 'required',
            'race' => 'required',
            'habitat_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $filename = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $filename, 'public');
        $validatedData["image"] = '/storage/'.$path;

        Animal::create($validatedData);

        if (!$validatedData) {
            Alert::error('Erreur', 'Animal non ajouté.');
            return redirect()->route('animals.index')->with('error', 'Animal non ajouté.');
        } else {
            Alert::success('Succès', 'Animal ajouté avec succès.');
        }

        

        return redirect()->route('animals.index')->with('success', 'Animal created successfully.');
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
        $animal = Animal::findOrFail($id);
        $habitats = Habitat::all();
        return view('animals.edit', compact('animal', 'habitats'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'prenom' => 'required',
            'race' => 'required',
            'habitat_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $animal = Animal::findOrFail($id);
        
        if ($request->hasFile('image')) {
            $filename = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $filename, 'public');
            $validatedData['image'] = '/storage/' . $path;
        }
        
        $animal->update($validatedData);

        if (!$validatedData) {
            Alert::error('Erreur', 'Animal non mis à jour.');
            return redirect()->route('animals.index')->with('error', 'Animal non mis à jour.');
        } else {
            Alert::success('Succès', 'Animal mis à jour avec succès.');
        }

        

        
        
        return redirect()->route('animals.index')->with('success', 'Animal updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */public function destroy(string $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        if (!$animal) {
            Alert::error('Erreur', 'Animal non trouvé.');
            return redirect()->route('animals.index')->with('error', 'Animal non trouvé.');
        } else {
            Alert::success('Succès', 'Animal supprimé avec succès.');
        }

        
        
        return redirect()->route('animals.index')->with('success', 'Animal deleted successfully.');
    }
}
