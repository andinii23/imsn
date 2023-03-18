<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.visimisi.index',
            [
                'visimisi' => VisiMisi::all()
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
        return view('dashboard.visimisi.create', [
            'visimisi' => VisiMisi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'isi_visi_misi' => 'required'
        ]);

        VisiMisi::create($validatedData);
        return redirect('/dashboard/visimisi')->with('success', 'Visi dan Misi ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function show(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function edit(VisiMisi $visimisi)
    {
        return view('dashboard.visimisi.edit', [
            'visimisi' => $visimisi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisiMisi $visimisi)
    {
        $rules = [
            'title' => 'required|max:255',
            'isi_visi_misi' => 'required'
        ];
        $validatedData = $request->validate($rules);

        VisiMisi::where('id', $visimisi->id)
            ->update($validatedData);
        return redirect('/dashboard/visimisi')->with('success', 'Visi Misi terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisiMisi $visimisi)
    {
        VisiMisi::destroy($visimisi->id);
        return redirect('/dashboard/visimisi')->with('success', 'Visi & Misi dihapus');
    }
}
