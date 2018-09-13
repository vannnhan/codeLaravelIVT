<?php

namespace App\Http\Controllers;

use App\Cat;
use Illuminate\Http\Request;
use App\Http\Requests\CatsRequest;
use Auth;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('checklogin')->only('destroy');
    }

    public function index()
    {
        $cats = Cat::paginate(10);
        //dd($cat);
        //$cat = Cat::all();
        // return response()->json($cats,200); //API
        return view('cats.index', compact('cats'));
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
    public function store(CatsRequest $request )
    {
        $user_id = Auth::User()->id;
        $request->request->add(['user_id'=>$user_id]);
        $validated = $request->validated();
        // dd($request->all());
        $cat = Cat::create($request->all());
        return redirect()->route('cats.index')->withsuccess('Create cat success');
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
    public function edit($id)
    {
        $cat= Cat::find($id);
        return view('cats.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(CatsRequest $request, Cat $cat)
    {
        $data= $request->all();
        $cat->update($data);
        return redirect()->route('cats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= Cat::find($id);
        $cat->delete();
        return redirect()->route('cats.index');
    }
}
