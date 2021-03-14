<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApproveController extends Controller
{
    //
    public function approveDokumen(){
        return view('client/approve-dokumen');
    }
    public function approveSertifikasi(){
        return view('client/approve-sertifikasi');
    }
}
