<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.sejarah.index',
            [
                'sejarah' => Sejarah::all()
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
        return view('dashboard.sejarah.create', [
            'sejarah' => Sejarah::all()
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
            'isi_sejarah' => 'required'
        ]);

        Sejarah::create($validatedData);
        return redirect('/dashboard/sejarah')->with('success', 'Sejarah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function show(Sejarah $sejarah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sejarah $sejarah)
    {
        return view('dashboard.sejarah.edit', [
            'sejarah' => $sejarah,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sejarah $sejarah)
    {
        $rules = [
            'title' => 'required|max:255',
            'isi_sejarah' => 'required'
        ];
        $validatedData = $request->validate($rules);

        Sejarah::where('id', $sejarah->id)
            ->update($validatedData);
        return redirect('/dashboard/sejarah')->with('success', 'Sejarah terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sejarah $sejarah)
    {
        Sejarah::destroy($sejarah->id);
        return redirect('/dashboard/sejarah')->with('success', 'Sejarah dihapus');
    }
}
