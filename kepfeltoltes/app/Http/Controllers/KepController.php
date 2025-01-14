<?php

namespace App\Http\Controllers;

use App\Models\Kepek;
use Illuminate\Http\Request;

class KepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = Kepek::latest()->get(); 
        return $files;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // a kérés validálásához a validate függvényt használjuk. Beállítjuk az elfogadott képformátumokat
        // és a feltölthető kép maximális méretét. 
        $request->validate([
            'title' => 'required',
            'name' =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $file = $request->file('name');   // fájl nevének lekérése  
        $extension = $file->getClientOriginalName(); //kiterjesztés
        $imageName = time() . '.' . $extension; // a kép neve az időbéjegnek köszönhetően egyedi lesz. 
        $file->move(public_path('kepek'), $imageName); //átmozgatjuk a public mappa kepek könyvtárába 
        $kepek = new Kepek(); // Létrehozzuk a kép objektumot. 
        $kepek->name = 'kepek/' . $imageName; // megadjuk az új fájl elérési utját
        $kepek->title = $request->title; // megadjuk a kép címét
        $kepek->save(); //elmentjük

        return redirect()->route('file.upload')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
