<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Vehicule;
use  App\Models\Modele;
use  App\Models\Marque;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::latest()->paginate(15);
  
        return view('vehicule.index',compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $modeles= Modele::all();
        $marques = Marque::all();
        return view('vehicule.create',compact('modeles','marques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'nom' => 'required',
            'marque_id' => 'required',
            'modele_id' => 'required',
        ]);

        $modele = Modele::find($request->modele_id);
        $marque = Marque::find($request->marque_id);
        $vehicule = new Vehicule();
        $vehicule->nom = $request->nom;
        $vehicule->save();

        $vehicule->modele()->associate($modele)->save();
        $vehicule->marque()->associate($marque)->save();
        // $modele->vehicules()->save($vehicule);
        // $marque->vehicules()->save($vehicule);

  
        //Vehicule::create($request->all());
   
        return redirect()->route('vehicule.index')
                        ->with('success','vehicule created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicule= Vehicule::find($id);
        $modeles= Modele::all();
        $marques = Marque::all();

        return view('vehicule.edit',compact('vehicule','modeles','marques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        $vehicule->update($request->all());
  
        return redirect()->route('vehicule.index')
                        ->with('success','vehicule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();
  
        return response()->json([
            'success' => 'vehicule deleted successfully!'
        ]);
    }
}
