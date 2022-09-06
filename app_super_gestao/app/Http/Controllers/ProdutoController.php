<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {
        return view('app.produto');
    }
}
