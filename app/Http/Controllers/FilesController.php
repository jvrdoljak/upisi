<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Files;
use App\Prijava;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.fileupload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            if(!(Files::where('name', '=', $name)->exists()))
                if($file->move('pdfs', $name)){
                    $path = 'public/pdfs';
                    $pdf = new Files();
                    $pdf->name = $name;
                    $pdf->path = $path;
                    $pdf->prijava_id = $request->input('prijava_id');
                    $pdf->save();
                    return view('welcome.index')->with('success','Uspješno kreirana prijava');
                }
            return redirect()->back();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('files.fileupload', compact('id'));
    }
    private function fileNameMaker($name){

    }

}   
