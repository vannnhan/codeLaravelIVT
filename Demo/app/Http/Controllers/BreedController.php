<?php

namespace App\Http\Controllers;

use App\Breed;
use App\Cat;
use Illuminate\Http\Request;
use App\Http\Requests\BreedsRequest;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breeds = Breed::all();
        return view('breeds.index', compact('breeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('breeds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreedsRequest $request)
    {
        $data = $request->all();
        $breed = Breed::create($data);
        return redirect()->route('breed.index')->withsuccess('Create breed successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function show(Breed $breed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breed = Breed::find($id);
        return view('breeds.edit', compact('breed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function update(BreedsRequest $request, $id)
    {
        $data= $request->all();
        $breed=Breed::find($id);
        $breed->update($data);
        return redirect()->route('breed.index')->withsuccess('Update breed successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $breed= Breed::find($id);
        $breed->delete();
        return redirect()->route('breed.index')->withsuccess('Delete breed successfully!');
    }

    public function GetCatByBreedId($breed_id)
    {
        $cats = Cat::where('breed_id',$breed_id)->get();
        // $cats= Breed::where('id', $breed_id)->first()->cats;
        // $breed= Breed::with('cats')->where('id', $breed_id)->first();
        // dd($breed->cats);
        return view('breeds.catlist', compact('cats', 'breed_id'));
    }
}
