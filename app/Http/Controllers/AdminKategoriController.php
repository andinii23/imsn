<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view(
            'dashboard.kategoris.index',
            [
                'kategoris' => Kategori::all()
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
        return view('dashboard.kategoris.create', [
            'kategoris' => Kategori::all()
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
            'kategori_news' => 'required|max:255',
            'slug' => 'required|unique:news',
        ]);

        Kategori::create($validatedData);
        return redirect('/dashboard/kategoris')->with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategoris.edit', [
            'kategoris' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $rules = [
            'kategori_news' => 'required|max:255',
        ];

        if ($request->slug != $kategori->slug) {
            $rules['slug'] = 'required|unique:kategoris';
        }
        $validatedData = $request->validate($rules);

        Kategori::where('id', $kategori->id)
            ->update($validatedData);
        return redirect('/dashboard/kategoris')->with('success', 'Kategori terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('/dashboard/kategoris')->with('success', 'Kategori dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->kategori_news);
        return response()->json(['slug' => $slug]);
    }
}
