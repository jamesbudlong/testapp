<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Value;
use App\Models\Category;

class ValuesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $values = Value::with('category')->orderBy('name','desc')->get();

        return view('pages.values.index', compact('values'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.values.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:values',
            'category_id' => 'required|exists:categories,id'
        ]);

        Value::create($request->all());

        return redirect()->route('values.index')
                        ->with('success','Value created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Value $value)
    {
        $categories = Category::all();
        return view('pages.values.edit', compact('value','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Value $value)
    {
        $request->validate([
            'name' => 'required|unique:values,name,' . $value->id,
            'category_id' => 'required|exists:categories,id'
        ]);

        $value->update($request->all());

        return redirect()->route('values.index')
                        ->with('success','Value updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Value $value)
    {
        $value->delete();

        return redirect()->route('values.index')
                        ->with('success','Value deleted successfully');
    }
}
