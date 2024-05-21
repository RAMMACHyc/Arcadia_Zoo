<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::all();
        return view('users.index', compact('users', 'roles'));
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
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', 'min:8'],
        'role' => ['required', 'exists:roles,id'], // Validate that role ID exists in the roles table
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Associate the role directly with the user
    $user->role_id = $request->role;
    $user->save();

    event(new Registered($user));

    if (!$user) {
        Alert::error('Erreur', 'Utilisateur non ajouté.');
        return redirect()->route('users.index')->with('error', 'Utilisateur non ajouté.');
    } else {
        Alert::success('Succès', 'Utilisateur ajouté avec succès.');
    }

    

    return redirect()->route('users.index'); // Redirect to users index or wherever appropriate
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $id],
            'role' => ['required', 'exists:roles,id'], 
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Associate the role directly with the user
        $user->role_id = $request->role;
        $user->save();

        if (!$user) {
            Alert::error('Erreur', 'Utilisateur non modifié.');
            return redirect()->route('users.index')->with('error', 'Utilisateur non modifié.');
        } else {
            Alert::success('Succès', 'Utilisateur modifié avec succès.');
        }

        

        

        return redirect()->route('users.index'); // Redirect to users index or wherever appropriate
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if (!$user) {
            Alert::error('Erreur', 'Utilisateur non trouvé.');
            return redirect()->route('users.index')->with('error', 'Utilisateur non trouvé.');
        } else {
            Alert::success('Succès', 'Utilisateur supprimé avec succès.');
        }

        return redirect()->route('users.index');
    }
}
