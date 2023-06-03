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
        $infos = Info::orderBy('id','DESC')->paginate(10);

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
        $requestData = $request->all();

        if($request->hasFile('icon'))
        {
            $requestData['icon'] = $this->file_upload();
        }


        Info::create($requestData);

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
    public function update(Request $request, Info $info)
    {

        $requestData = $request->all();

        if($request->hasFile('icon'))
        {
            $this->file_delete($info);
            $requestData['icon'] = $this->file_upload();
        }

        $info->update($requestData);

        return redirect()->route('admin.infos.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Info $info)
    {
        $this->file_delete($info);
        $info->delete();
        return redirect()->route('admin.infos.index'); 
    }

    public function file_upload(){
        $file = request()->file('icon');
        $fileName = time(). '-' .$file->getClientOriginalName();
        $file->move('files/', $fileName);
        return $fileName;
    }

    public function file_delete($info){
        if(isset($info->icon) && file_exists((public_path('/files/' .$info->icon))))
        {
            unlink(public_path('/files/'.$info->icon));
        }
    }
}
