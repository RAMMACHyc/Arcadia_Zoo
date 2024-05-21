<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitat;
use RealRashid\SweetAlert\Facades\Alert;



class HabitatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habitats = Habitat::all();
        return view('habitats.index', compact('habitats'));
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
            'nom' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $filename = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $filename, 'public');
        $validatedData["image"] = '/storage/'.$path;


        Habitat::create($validatedData);

        if (!$validatedData) {
            Alert::error('Erreur', 'Habitat non ajouté.');
            return redirect()->route('habitats.index')->with('error', 'Habitat non ajouté.');
        } else {
            Alert::success('Succès', 'Habitat ajouté avec succès.');
        }

        
    
        

        return redirect()->route('habitats.index')->with('success', 'Habitat created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          
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
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $habitat = Habitat::findOrFail($id);
    
        if ($request->hasFile('image')) {
            $filename = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $filename, 'public');
            $validatedData['image'] = '/storage/' . $path;
        }
    
        $habitat->update($validatedData);

        if (!$validatedData) {
            Alert::error('Erreur', 'Habitat non modifié.');
            return redirect()->route('habitats.index')->with('error', 'Habitat non modifié.');
        } else {
            Alert::success('Succès', 'Habitat modifié avec succès.');
        }
    
        
    
        return redirect()->route('habitats.index')->with('success', 'Habitat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $habitat = Habitat::findOrFail($id);
        $habitat->delete();

        if (!$habitat) {
            Alert::error('Erreur', 'Habitat non trouvé.');
            return redirect()->route('habitats.index')->with('error', 'Habitat non trouvé.');
        } else {
            Alert::success('Succès', 'Habitat supprimé avec succès.');
        }

        

        
    
        return redirect()->route('habitats.index')->with('success', 'Habitat deleted successfully.');
    }
}
