<?php

namespace App\Http\Controllers;

use App\Models\Advisors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvisorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.advisors.index',
            [
                'advisors' => Advisors::all()
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
        return view('dashboard.advisors.create', [
            'advisors' => Advisors::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdvisorsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'adv_img' => 'image|file|max:1024',
            'ket_foto' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->file('adv_img')) {
            $validatedData['adv_img'] = $request->file('adv_img')->store('post-images');
        }

        Advisors::create($validatedData);
        return redirect('/dashboard/advisors')->with('success', 'Advisors ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advisors  $advisors
     * @return \Illuminate\Http\Response
     */
    public function show(Advisors $advisors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advisors  $advisors
     * @return \Illuminate\Http\Response
     */
    public function edit(Advisors $advisor)
    {
        return view('dashboard.advisors.edit', [
            'advisors' => $advisor,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdvisorsRequest  $request
     * @param  \App\Models\Advisors  $advisors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advisors $advisor)
    {
        $rules = [
            'title' => 'required|max:255',
            'adv_img' => 'image|file|max:1024',
            'ket_foto' => 'required',
            'deskripsi' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('adv_img')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['adv_img'] = $request->file('adv_img')->store('post-images');
        }

        Advisors::where('id', $advisor->id)
            ->update($validatedData);
        return redirect('/dashboard/advisors')->with('success', 'Advisors terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advisors  $advisors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advisors $advisor)
    {
        if ($advisor->adv_img) {
            Storage::delete($advisor->adv_img);
        }
        Advisors::destroy($advisor->id);
        return redirect('/dashboard/advisors')->with('success', 'Advisors dihapus');
    }
}
