<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Files;
use App\Prijava;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('download');
    }
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
            $original_name = str_replace(" ","-",$file->getClientOriginalName());
            $extension = $request->file('file')->getClientOriginalExtension();
            //Making unique filename original name + md5 of original name and time + extension
            $unique_name = str_replace(".pdf","-",$original_name) . md5($original_name.time()) . '.' . $extension;
            if(!(Files::where('unique_name', '=', $unique_name)->exists()))
                if($file->move('pdfs', $unique_name)){
                    $path = 'public/pdfs';
                    $pdf = new Files();
                    $pdf->original_name = $original_name;
                    $pdf->unique_name = $unique_name;
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
    /** 
     * Function that make unique filename.
     *
     * 
     */
    public function uniqueFileNameMaker($original_name,$extension){
        $original_name = str_replace(" ","-",$original_name);
        return md5($original_name) . $extension;
    }   
    /**
     * Function for download file.
     * 
     */
    public function download($filename){
        $file_path = public_path() . '\pdfs\\' . $filename;
        if(file_exists($file_path))
            return response()->download($file_path);
        else
            exit('Tražena datoteka ne postoji na serveru');
    }
}   
