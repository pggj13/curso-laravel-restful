<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //
    public function index(){

        $title = 'titulo teste';

        $sidebar = 'teste sidebar';

        $xss = '<script>alert("Ataque XSS");</scritp>';

        return view('site.home.index',compact('title','xss','sidebar'));
    }
    public function contatos(){
        return view('site.contato.index');
    }
}
