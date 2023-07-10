<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * 入力ページ
     */
    public function index()
    {
        return view('form.index');
    }

    /**
     * 完了ページ
     */
    public function complete()
    {
        return view('form.complete');
    }

    
}