<?php

namespace App\Http\Controllers;


use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class ServiceController extends Controller
{
    /**
     * Affiche la liste des services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('service.index', compact('services'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Stocke un nouveau service dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required',
        ]);
    
        $service = Service::create($validatedData);

        if (!$service) {
            Alert::error('Erreur', 'Service non ajouté.');
            return redirect()->route('services.index')->with('error', 'Service non ajouté.');
        } else {
            Alert::success('Succès', 'Service ajouté avec succès.');
        }

        
    
        return redirect()->route('services.index')->with('success', 'Service créé avec succès.');
    }

    /**
     * Affiche les détails d'un service spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    /**
     * Affiche le formulaire d'édition d'un service existant.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.index', compact('service'));
    }

    /**
     * Met à jour un service existant dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required',
        ]);

        $service = Service::findOrFail($id);
        $service->update($validatedData);

        if (!$service) {
            Alert::error('Erreur', 'Service non mis à jour.');
            return redirect()->route('services.index')->with('error', 'Service non mis à jour.');
        } else {
            Alert::success('Succès', 'Service mis à jour avec succès.');
        }

        
    
        

        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès.');
    }

    /**
     * Supprime un service de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        if (!$service) {
            Alert::error('Erreur', 'Service non supprimé.');
            return redirect()->route('services.index')->with('error', 'Service non supprimé.');
        } else {
            Alert::success('Succès', 'Service supprimé avec succès.');
        }
    
        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès.');
    }
}