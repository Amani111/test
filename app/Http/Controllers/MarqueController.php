<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marque;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marques = Marque::latest()->paginate(5);
  
        return view('Marque.index',compact('marques'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marque.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate([
            'nom' => 'required',
        ]);
  
        Marque::create($request->all());
   
        return redirect()->route('marque.index')
                        ->with('success','marque created successfully.');
        
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
    public function edit(Marque $marque)
    {
        return view('marque.edit', compact('marque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marque $marque)
    {
        $request->validate([
            'nom' => 'required',
        ]);
  
        $marque->update($request->all());
  
        return redirect()->route('marque.index')
                        ->with('success','marque updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marque $marque)
    {
        $marque->delete();
  
        return response()->json([
            'success' => 'marque deleted successfully!'
        ]);
        
    }
}
