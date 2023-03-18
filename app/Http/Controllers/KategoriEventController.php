<?php

namespace App\Http\Controllers;

use App\Models\KategoriEvent;
use Illuminate\Http\Request;

class KategoriEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.kategorievent.index',
            [
                'kategorievent' => KategoriEvent::all()
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
        return view('dashboard.kategorievent.create', [
            'kategorievent' => KategoriEvent::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_event' => 'required|max:255',
            'slug' => 'required|unique:kategori_events',
        ]);

        KategoriEvent::create($validatedData);
        return redirect('/dashboard/kategorievent')->with('success', 'Kategori Event ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriEvent  $kategoriEvent
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriEvent $kategoriEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriEvent  $kategoriEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriEvent $kategorievent)
    {
        return view('dashboard.kategorievent.edit', [
            'kategorievent' => $kategorievent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriEventRequest  $request
     * @param  \App\Models\KategoriEvent  $kategoriEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriEvent $kategorievent)
    {
        $rules = [
            'kategori_event' => 'required|max:255',
        ];

        if ($request->slug != $kategorievent->slug) {
            $rules['slug'] = 'required|unique:kategori_events';
        }
        $validatedData = $request->validate($rules);

        KategoriEvent::where('id', $kategorievent->id)
            ->update($validatedData);
        return redirect('/dashboard/kategorievent')->with('success', 'Kategori Event terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriEvent  $kategoriEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriEvent $kategorievent)
    {
        KategoriEvent::destroy($kategorievent->id);
        return redirect('/dashboard/kategorievent')->with('success', 'Kategori Event dihapus');
    }
}
