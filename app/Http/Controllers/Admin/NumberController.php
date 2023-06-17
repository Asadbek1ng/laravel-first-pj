<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Human;
use Illuminate\Http\Request;
use App\Models\Number;
use Illuminate\Support\Facades\DB;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numbers = DB::table('streets')
        ->leftJoin('regions', 'streets.id_region', '=', 'regions.id')
        ->leftJoin('districts', 'streets.id_district', '=', 'districts.id')
        ->select('streets.*', 'regions.reg_name_uz', 'districts.d_name_uz')->offset(499)->limit(100)->get();

        return $numbers;
        return view('admin.numbers.index', compact('numbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $humans = Human::all();
        return view('admin.numbers.create', compact('humans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Number::where('human_id', $request->human_id)->count() >= 3)
            return back()->with('warning', 'Limit to`lgan');

        Number::create($request->all());
        return redirect()->route('admin.numbers.index')->with('success', 'Success done');
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
    public function edit(Number $number)
    {
        $humans = Human::all();
        return view('admin.numbers.edit', compact('number', 'humans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Number $number)
    {
        $number->update($request->all());
        return redirect()->route('admin.numbers.index')->with('success', 'Update done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Number $number)
    {
        $number->delete();
        return redirect()->route('admin.numbers.index')->with('success', 'Delete done');
    }
}
