<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modele;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modeles = Modele::latest()->paginate(5);
  
        return view('modele.index',compact('modeles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modele.create');
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
        ]);
  
        Modele::create($request->all());
   
        return redirect()->route('modele.index')
                        ->with('success','modele created successfully.');
        
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
    public function edit(Modele $modele)
    {
        return view('modele.edit', compact('modele'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modele $modele)
    {
        $request->validate([
            'nom' => 'required',
        ]);
  
        $modele->update($request->all());
  
        return redirect()->route('modele.index')
                        ->with('success','modele updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Modele $modele)
    {
        $modele->delete();
  
        return response()->json([
            'success' => 'modele deleted successfully!'
        ]);
    }
}
