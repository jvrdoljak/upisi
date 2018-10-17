<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Predmet;

class PredmetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $predmeti = Predmet::latest()->paginate(10);
        return view('predmeti.index', compact('predmeti'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('predmeti.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'naziv' => 'required|max:200',
        ]);
        Predmet::create($request->all());
        return redirect()->route('predmeti.index')
                        ->with('success', 'Predmet created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $predmet = Predmet::find($id);
        return view('predmeti.show', compact('predmet'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $predmet = Predmet::find($id);
        return view('predmeti.edit', compact('predmet'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'naziv' => 'required|max:200',
        ]);
        Predmet::find($id)->update($request->all());
        return redirect()->route('predmeti.index')
                        ->with('success','Predmet updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Predmet::find($id)->delete();
        return redirect()->route('predmeti.index')
                        ->with('success','Predmet deleted successfully');
    }
}
