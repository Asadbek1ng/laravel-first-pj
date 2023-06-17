<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function get_index(){

        $infos = \App\Models\Info::latest()->take(6)->get();

        return view('welcome', compact('infos'));
    }

    public function get_groups(){
        return view('pages.groups');
    }

    public function get_teachers(){
        return view('pages.teachers');
    }

    public function get_wins(){
        return view('pages.wins');
    }

    public function get_gallery(){
        return view('pages.gallery');
    }

    public function get_blogs(){
        return view('pages.blogs');
    }

    public function post_store(Request $request){

        DB::table('orders')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'group' => $request->group
        ]);

        return back();
    }

    public function get_AllName($name)
    {
        return $name ;
    }


}
