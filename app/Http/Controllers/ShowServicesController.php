<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Avis;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Http\Request;

class ShowServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('avis')->get();

        return view('avis_client.service', ['services' => $services]);
       
    }

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
            return redirect()->route('service')->with('error', 'Avis non ajouté.');
        } else {
            Alert::success('Succès', 'Avis ajouté avec succès.');
        }
        
        return redirect()->route('service')->with('success', 'Avis created successfully.');
    }


}
