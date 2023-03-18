<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateDivisiRequest;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.divisi.index',
            [
                'divisi' => Divisi::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.divisi.create', [
            'divisi' => Divisi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_divisi' => 'required|max:255',
            'deskripsi' => 'required'
        ]);

        Divisi::create($validatedData);
        return redirect('/dashboard/divisi')->with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
    {
        return view('dashboard.divisi.edit', [
            'divisi' => $divisi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $divisi)
    {
        $rules = [
            'nama_divisi' => 'required|max:255',
            'deskripsi' => 'required'
        ];
        $validatedData = $request->validate($rules);

        Divisi::where('id', $divisi->id)
            ->update($validatedData);
        return redirect('/dashboard/divisi')->with('success', 'Divisi terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        Divisi::destroy($divisi->id);
        return redirect('/dashboard/divisi')->with('success', 'Divisi dihapus');
    }
}
