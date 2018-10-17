<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prijava;

class PrijavaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prijave = Prijava::latest()->paginate(10);
        return view('prijave.index', compact('prijave'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prijave.create');
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
        Prijava::create($request->all());
        return redirect()->route('prijave.index')
                        ->with('success', 'Prijava uspješno kreirana');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $smjer = Prijava::find($id);
        return view('prijave.show', compact('smjer'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prijava = Prijava::find($id);
        return view('prijave.edit', compact('prijava'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'naziv' => 'required|max:200',
        ]);
        Prijava::find($id)->update($request->all());
        return redirect()->route('prijave.index')
                        ->with('success', 'Prijava uspješno izmjenjena');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prijava::find($id)->delete();
        return redirect()->route('prijave.index')
                        ->with('success','Prijava uspješno pobrisana');
    }
}