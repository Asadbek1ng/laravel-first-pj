<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos = Info::orderBy('id','DESC')->paginate(2);

        return view('admin.infos.index', compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.infos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Info::create($request->all());

        return redirect()->route('admin.infos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $info = Info::find($id);

        return view('admin.infos.show', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $info = Info::find($id);

        return view('admin.infos.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Info::find($id)->update($request->all());
        return redirect()->route('admin.infos.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Info::find($id)->delete();
        return redirect()->route('admin.infos.index'); 
    }
}
