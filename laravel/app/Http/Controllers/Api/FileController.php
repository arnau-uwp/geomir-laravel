<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return response()->json([
            'success' => true,
            'data'    => File::all()
        ], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
       // Validar fitxer
       $validatedData = $request->validate([
           'upload' => 'required|mimes:gif,jpeg,jpg,png|max:2048'
       ]);
       // Desar fitxer al disc i inserir dades a BD
       $upload = $request->file('upload');
       $file = new File();
       $ok = $file->diskSave($upload);
 
       if ($ok) {
           return response()->json([
               'success' => true,
               'data'    => $file
           ], 201);
       } else {
           return response()->json([
               'success'  => false,
               'message' => 'Error uploading file'
           ], 500);
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
        if($file = File::find($id)){
            return response()->json([
                'success' => true,
                'data'    => $file
            ], 200);

        }else{
            return response()->json([
                'success' => false,
                'message'    => "File read ERROR"
            ], 404);
        }
        
        
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
        $file = File::find($id);
        if($file == null){
            return response()->json([
                'success' => false,
                'message'    => "File read ERROR"
            ], 404);
        }

        $validatedData = $request->validate([
            'upload' => 'required|mimes:gif,jpeg,jpg,png|max:2048'
        ]);

        // Desar fitxer al disc i actualitzar dades a BD
        $upload = $request->file('upload');
        
        $ok = $file->diskSave($upload);
        if ($ok) {
            // Patró PRG amb missatge d'èxit
            return response()->json([
                'success' => true,
                'data'    => $file
            ], 200);
        } else {
            // Patró PRG amb missatge d'error
            return response()->json([
                'success' => false,
                'message'    => "File read ERROR"
            ], 422);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar fitxer del disc i BD
        $file = File::find($id);
        
        // Patró PRG amb missatge d'èxit
        if($file == null){
            return response()->json([
                'success' => false,
                'message'    => "File read ERROR"
            ], 404);
        }

        $ok = $file->diskDelete();
        if($ok){
            return response()->json([
                'success' => true,
                'data'    => $file
            ], 200);
        }
    }


    public function update_workaround(Request $request, $id)
    {
        return $this->update($request, $id);
    }
 
}
