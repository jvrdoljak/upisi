<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OdabirSmjera;
use App\Prijava;
use App\Smjer;

class OdabirSmjeraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'prijava' => 'required',
            'smjer' => 'required',
            'izbor' => 'required',
            'bodovi' => 'required'
        ]);
        OdabirSmjera::create($request->all());
        return view('welcome.index')->with('success','Uspješno kreirana prijava');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        //dohvacanje ID korisnika koji kreira prijavu
        $korisnik = Prijava::select()->where('email', '=', $email )->get();
        $korisnik = $korisnik[0];
        //dohvacanje svih smjerova
        $smjerovi = Smjer::all();
        return view('odabir.show', compact('korisnik'), compact('smjerovi'), compact('izbor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
