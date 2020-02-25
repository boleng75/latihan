<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index',compact('dosen'));
    }
    public function create()
    {
        return view('dosen.create');
    }
    public function store(Request $request)
    {
        $dosen = new Dosen();
        $dosen->nama=$request->nama;
        $dosen->nama=$request->nipd;
        $dosen->save();
        return redirect()->route('dosen.index')->with(['message'=>'Dosen Berhasil Dibuat']);
    }
    public function show($id)
    {
        $dosen = Dosen::findOrfail($id);
        return view('dosen.show');
    }  
    
    
}
