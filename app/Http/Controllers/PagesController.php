<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
        return view('welcome');
        }

        public function groups(){
        return view ('pages.groups');
        }

        public function teachers(){
            return view ('pages.teachers');
        }

        public function achievements(){
            return view ('pages.achievements');
        }

        public function gallery(){
            return view ('pages.gallery');
        }

        public function blogs(){
            return view ('pages.blogs');
        }
}
