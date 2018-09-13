<?php

namespace App\Http\Controllers;

use App\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 5;
        $cats = Cat::paginate($perPage);
        return view('cats.index')->with('cat',$cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all())
        $name = $request->get('name');
        $dob= $request->get('dob');
        $breed_id=$request->get('breed_id');
        $catData = [
            'name' => $name,
            'dob' => $dob,
            'breed_id' => $breed_id
        ];
        $cat = Cat::create($catData);
        return redirect()->route('cats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat $cat)
    {
        return view('cats.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cat $cat)
    {
        //dd($request->all());
        $data = $request->all();
        $cat->update($data);
        return redirect()->route('cats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat $cat)
    {
        $cat->delete();
        return redirect()->route('cats.index');
    }
}
