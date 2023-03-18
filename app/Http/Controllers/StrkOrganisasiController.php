<?php

namespace App\Http\Controllers;

use App\Models\StrkOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrkOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.strkorganisasi.index',
            [
                'strkorganisasi' => StrkOrganisasi::all()
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
        return view('dashboard.strkorganisasi.create', [
            'strkorganisasi' => StrkOrganisasi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStrkOrganisasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'strk_img' => 'image|file|max:1024',
            'ket_foto' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->file('strk_img')) {
            $validatedData['strk_img'] = $request->file('strk_img')->store('post-images');
        }

        StrkOrganisasi::create($validatedData);
        return redirect('/dashboard/strkorganisasi')->with('success', 'Struktur Organisasi ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StrkOrganisasi  $strkOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function show(StrkOrganisasi $strkOrganisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StrkOrganisasi  $strkOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(StrkOrganisasi $strkorganisasi)
    {
        return view('dashboard.strkorganisasi.edit', [
            'strkorganisasi' => $strkorganisasi,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStrkOrganisasiRequest  $request
     * @param  \App\Models\StrkOrganisasi  $strkOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StrkOrganisasi $strkorganisasi)
    {
        $rules = [
            'title' => 'required|max:255',
            'strk_img' => 'image|file|max:1024',
            'ket_foto' => 'required',
            'deskripsi' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('strk_img')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['strk_img'] = $request->file('strk_img')->store('post-images');
        }

        StrkOrganisasi::where('id', $strkorganisasi->id)
            ->update($validatedData);
        return redirect('/dashboard/strkorganisasi')->with('success', 'Welcome Message terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StrkOrganisasi  $strkOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(StrkOrganisasi $strkorganisasi)
    {
        if ($strkorganisasi->msg_img) {
            Storage::delete($strkorganisasi->msg_img);
        }
        StrkOrganisasi::destroy($strkorganisasi->id);
        return redirect('/dashboard/strkorganisasi')->with('success', 'Welcome Message dihapus');
    }
}
