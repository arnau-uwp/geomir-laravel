<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::withCount('favorites')->get();

        return view("places.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("places.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'upload'      => 'required|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'    => 'required',
            'longitude'   => 'required',
            'visibility_id' => 'required',
        ]);
        
        // Obtenir dades del formulari
        $name        = $request->get('name');
        $description = $request->get('description');
        $upload      = $request->file('upload');
        $latitude    = $request->get('latitude');
        $longitude   = $request->get('longitude');
        $visibility_id = $request->get('visibility_id');

        // Desar fitxer al disc i inserir dades a BD
        $file = new File();
        $fileOk = $file->diskSave($upload);

        if ($fileOk) {
            // Desar dades a BD
            Log::debug("Saving place at DB...");
            $place = Place::create([
                'name'        => $name,
                'description' => $description,
                'file_id'     => $file->id,
                'latitude'    => $latitude,
                'longitude'   => $longitude,
                'author_id'   => auth()->user()->id,
                'visibility_id' =>$visibility_id,
            ]);
            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('places.show', $place)
                ->with('success', __('Place successfully saved'));
        } else {
            \Log::debug("Disk storage FAILS");
            // Patró PRG amb missatge d'error
            return redirect()->route("places.create")
                ->with('error', __('ERROR Uploading file'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {   
        $place->loadCount('favorites');

        return view("places.show", [
            'place'  => $place,
            'file'   => $place->file,
            'author' => $place->user,
            'numFavorites' => $place->favorites_count,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        if(Auth::id() == $place->author_id){
            return view("places.edit", [
                'place'  => $place,
                'file'   => $place->file,
                'author' => $place->user,
            ]);
        }else{
            return abort('403');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'upload'      => 'nullable|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'    => 'required',
            'longitude'   => 'required',
            'visibility_id' => 'required',
        ]);
        
        // Obtenir dades del formulari
        $name        = $request->get('name');
        $description = $request->get('description');
        $upload      = $request->file('upload');
        $latitude    = $request->get('latitude');
        $longitude   = $request->get('longitude');
        $visibility_id = $request->get('visibility_id');

        // Desar fitxer (opcional)
        if (is_null($upload) || $place->file->diskSave($upload)) {
            // Actualitzar dades a BD
            Log::debug("Updating DB...");
            $place->name        = $name;
            $place->description = $description;
            $place->latitude    = $latitude;
            $place->longitude   = $longitude;
            $place->visibility_id = $visibility_id;
            $place->save();
            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('places.show', $place)
                ->with('success', __('Place successfully saved'));
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("places.create")
                ->with('error', __('ERROR Uploading file'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        if(Auth::id() == $place->author_id){

        // Eliminar place de BD
        $place->delete();
        // Eliminar fitxer associat del disc i BD
        $place->file->diskDelete();
        // Patró PRG amb missatge d'èxit
        return redirect()->route("places.index")
            ->with('success', 'Place successfully deleted');
        }else{
            return abort('403');
        }
    }
    public function favorite(Place $place)
    {
        DB::table('favorites')
        ->insert([
            'user_id' => Auth::id(),
            'place_id' => $place->id
    ]);
        return back();
    }

    public function unfavorite(Place $place)
    {
        DB::table('favorites')
        ->where(['user_id' => Auth::id(), 'place_id' => $place->id ])
        ->delete();
    
        return back();
    }
}
