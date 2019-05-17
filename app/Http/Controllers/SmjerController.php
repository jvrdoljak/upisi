<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Smjer;
use App\OdabirSmjera;
class SmjerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smjerovi = Smjer::latest()->paginate(10);
        return view('smjerovi.index', compact('smjerovi'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('smjerovi.create');
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
        Smjer::create($request->all());
        return redirect()->route('smjerovi.index')
                        ->with('success', 'Smjer created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $smjer = Smjer::find($id);
        return view('smjerovi.show', compact('smjer'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $smjer = Smjer::find($id);
        return view('smjerovi.edit', compact('smjer'));
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
        Smjer::find($id)->update($request->all());
        return redirect()->route('smjerovi.index')
                        ->with('success','Smjer je uspješno kreiran');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OdabirSmjera::select()->where('smjer', '=', $id)->delete();
        Smjer::find($id)->delete();
        return redirect()->route('smjerovi.index')
                        ->with('success','Smjer deleted successfully');
    }
}
