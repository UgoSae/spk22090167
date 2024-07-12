<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::orderBy('created_at', 'DESC')->get();
  
        return view('dosens.index', compact('dosen'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosens.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Dosen::create($request->all());
 
        return redirect()->route('dosens')->with('Sukses', 'Dosen Sukses Ditambahkan');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dosen = Dosen::findOrFail($id);
  
        return view('dosens.show', compact('dosens'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosen = Dosen::findOrFail($id);
  
        return view('dosens.edit', compact('dosen'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dosen = Dosen::findOrFail($id);
  
        $dosen->update($request->all());
  
        return redirect()->route('dosens')->with('sukses', 'Dosen Sukses di Update');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);
  
        $dosen->delete();
  
        return redirect()->route('dosens')->with('sukses', 'Dosen Sukses di Hapus');
    }
}
