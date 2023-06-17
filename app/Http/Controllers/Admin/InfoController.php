<?php

namespace App\Http\Controllers\Admin;

use App\Events\AuditEvent;
use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use App\Http\Requests\InfoStoreRequest;

class InfoController extends Controller
{
    public function index()
    {
        // return Info::count();
        $infos = Info::orderBy('id', 'DESC')->paginate(6);

        return view('admin.infos.index', compact('infos'));
    }

    public function create()
    {
        if(Info::count() >= 6)
            return redirect()->route('admin.infos.index')->with('warning','Ma`lumot yetarli');

        return view('admin.infos.create');
    }

    public function store(InfoStoreRequest $request)
    {

        $requestData = $request->all();

        if($request->hasFile('icon'))
        {
            $requestData['icon'] = $this->file_upload();
        }

        Info::create($requestData);

        $user = auth()->user()->name;

        event(new AuditEvent($user, 'infos', 'add', json_encode($requestData)));

        // return $event ;

        return redirect()->route('admin.infos.index')->with('success','Successfully added');
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
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'mimes:png,jpg|max:2048'
        ]);

        $requestData = $request->all();

        if($request->hasFile('icon'))
        {
            if(isset($info->icon) && file_exists(public_path('/files/'.$info->icon))){
                unlink(public_path('/files/'.$info->icon));
            }
            $requestData['icon'] = $this->file_upload();
        }

        $info->update($requestData);

        return redirect()->route('admin.infos.index')->with('success','Successfully Update');
    }

    public function destroy(Info $info)
    {
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'infos', 'delete', $info));

        if(isset($info->icon) && file_exists(public_path('/files/'.$info->icon)))
        {
            unlink(public_path('/files/'.$info->icon));
        }
        $info->delete();

        return redirect()->route('admin.infos.index')->with('warning','Successfully Delete');
    }

    public function file_upload(){
        $file = request()->file('icon');
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('files/', $fileName);
        return $fileName;
    }

}
