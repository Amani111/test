<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use App\Models\Marque;
use App\Models\Modele;
use Validator;
use App\Http\Resources\VehiculesCollection;
use App\Http\Resources\VehiculeResource;
use App\Http\Resources\MarqueCollection;
use App\Http\Resources\ModeleCollection;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllVehicle()
    {
        return new vehiculesCollection(Vehicule::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Allmarques()
    {
        return  new MarqueCollection(Marque::paginate());
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AllModeles(Request $request)
    {
        return new  ModeleCollection(Modele::paginate());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showVehicule($id)
    {
        $vehicule = Vehicule::find($id);
  
        if (is_null($vehicule)) {
            return response()->json('vehicule not found.');
        }
   
        return new VehiculeResource($vehicule);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVehicule(Request $request, $id)
    {
        
        //find vehicule
        $vehicule = Vehicule::find($id);

        if (is_null($vehicule)) {
            return response()->json('vehicule not found.');
        }

        //validation vehicule
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'nom' => 'String',
           
        ]);
   
        if($validator->fails()){
            return response()->json(['Validation Error.', $validator->errors()]);       
        }

        //update vehicule
        $vehicule->nom = $request->nom;
        $vehicule->marque_id =  $request->marque_id;
        $vehicule->modele_id = $request->modele_id;
        $vehicule->save();

      
        return response()->json([new VehiculeResource($vehicule), 'vehicule updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
