<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::orderBy('id', 'DESC')->paginate(2);

        return view('admin.infos.index', compact('infos'));
    }

    public function create()
    {
        return view('admin.infos.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        if($request->hasFile('icon'))
        {
            $file = request()->file('icon');
            $fileName = time().'-'.$file->getClientoriginalName();
            $file->move('files/', $fileName);
            $requestData['icon'] = $fileName;
        }
        Info::create($request->all());

        return redirect()->route('admin.infos.index');
    }

    public function show(Info $info)
    {
        return view('admin.infos.show', compact('info'));
    }

    public function edit(Info $info)
    {
        return view('admin.infos.edit', compact('info'));
    }

    public function update(Request $request, Info $info)
    {
        $info->update($request->all());

        return redirect()->route('admin.infos.index');
    }

    public function destroy(Info $info)
    {
        $info->delete();

        return redirect()->route('admin.infos.index');
    }
}
