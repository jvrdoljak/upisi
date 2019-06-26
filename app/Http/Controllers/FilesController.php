<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Files;
use App\Prijava;
use File;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(array('download', 'destroy'));
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
        $files = $request->file();
        if(!empty($files)){
            foreach($files as $file){
                $original_name = str_replace(" ","-",$file->getClientOriginalName());
                $extension = $file->getClientOriginalExtension();
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
                    }
            }
            return view('welcome.index')->with('success','Uspješno kreirana prijava');   
        }
        else
            return redirect()->back()->with('error', 'Dokumenti nisu priloženi. Pokušajte ponovno.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prijava = Prijava::select()->where('id', '=', $id)->get();
        $prijava = $prijava[0];
        if($prijava->verified == 1){
            $files = array(
                0   =>  array(
                        'name'      => 'file-1',
                        'message'   =>  'Ispod priložite svjedodžbu 5. razreda'
                    ),        
                1   =>  array(
                        'name'      => 'file-2',
                        'message'   =>  'Ispod priložite svjedodžbu 6. razreda'
                    ),
                2   =>  array(
                        'name'      => 'file-3',
                        'message'   =>  'Ispod priložite svjedodžbu 7. razreda'
                    ),
                3   =>  array(
                        'name'      => 'file-4',
                        'message'   =>  'Ispod priložite svjedodžbu 8. razreda'
                    ),
            );
            return view('files.fileupload', compact('id'),compact('files'));
        }
        else
            return view('files.fileupload')->withErrors(array("
            Ne možete pristupiti stranici jer vaš email nije verificiran.
            Molimo, verificirajte svoj email.
            "));
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
            return redirect()->back()->with('error', 'Tražena datoteka ne postoji na serveru');
    }

    /**
     * Function for delete file from public.
     * 
     */
    public function destroy($filename){
        $file_path = public_path() . '\pdfs\\' . $filename;
        if(File::exists($file_path))
            dd($file_path);
            
    }
}   
