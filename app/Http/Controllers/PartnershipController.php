<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.partnership.index',
            [
                'partnership' => Partnership::all()
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
        return view('dashboard.partnership.create', [
            'partnership' => Partnership::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePartnershipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_partner' => 'required|max:255',
            'partner_img' => 'image|file|max:1024',
        ]);

        if ($request->file('partner_img')) {
            $validatedData['partner_img'] = $request->file('partner_img')->store('post-images');
        }

        partnership::create($validatedData);
        return redirect('/dashboard/partnership')->with('success', 'Partner ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partnership  $partnership
     * @return \Illuminate\Http\Response
     */
    public function show(Partnership $partnership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partnership  $partnership
     * @return \Illuminate\Http\Response
     */
    public function edit(Partnership $partnership)
    {
        return view('dashboard.partnership.edit', [
            'partnership' => $partnership,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePartnershipRequest  $request
     * @param  \App\Models\Partnership  $partnership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partnership $partnership)
    {
        $rules = [
            'nama_partner' => 'required|max:255',
            'partner_img' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('partner_img')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['partner_img'] = $request->file('partner_img')->store('post-images');
        }

        Partnership::where('id', $partnership->id)
            ->update($validatedData);
        return redirect('/dashboard/partnership')->with('success', 'Partnership terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partnership  $partnership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partnership $partnership)
    {
        if ($partnership->partner_img) {
            Storage::delete($partnership->partner_img);
        }
        Partnership::destroy($partnership->id);
        return redirect('/dashboard/partnership')->with('success', 'Partnership dihapus');
    }
}
