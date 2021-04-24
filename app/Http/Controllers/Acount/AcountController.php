<?php

namespace App\Http\Controllers\Acount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcountController extends Controller
{

    public function index()
    {
        if (!session()->get('userId')){
            return redirect()->route('sys.login');
        }

        return view('acount/home', [
            'title' => "Minha conta"
        ]);
    }
}
