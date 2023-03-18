<?php

namespace App\Http\Controllers;

use App\Models\DivisiMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Divisi;

class DivisiMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.divisimember.index',
            [
                'divisimember' => DivisiMember::all()
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
        return view('dashboard.divisimember.create', [
            'divisis' => Divisi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDivisiMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_member' => 'required|max:255',
            'divisi_id' => 'required',
            'img_member' => 'image|file|max:1024',
            'univ_member' => 'required'
        ]);

        if ($request->file('img_member')) {
            $validatedData['img_member'] = $request->file('img_member')->store('post-images');
        }

        DivisiMember::create($validatedData);
        return redirect('/dashboard/divisimember')->with('success', 'Member Divisi Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DivisiMember  $divisiMember
     * @return \Illuminate\Http\Response
     */
    public function show(DivisiMember $divisiMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DivisiMember  $divisiMember
     * @return \Illuminate\Http\Response
     */
    public function edit(DivisiMember $divisimember)
    {
        return view('dashboard.divisimember.edit', [
            'divisimember' => $divisimember,
            'divisis' => Divisi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDivisiMemberRequest  $request
     * @param  \App\Models\DivisiMember  $divisiMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DivisiMember $divisimember)
    {
        $rules = [
            'nama_member' => 'required|max:255',
            'divisi_id' => 'required',
            'img_member' => 'image|file|max:1024',
            'univ_member' => 'required'
        ];


        $validatedData = $request->validate($rules);

        if ($request->file('img_member')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['img_member'] = $request->file('img_member')->store('post-images');
        }

        DivisiMember::where('id', $divisimember->id)
            ->update($validatedData);
        return redirect('/dashboard/divisimember')->with('success', 'Member terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DivisiMember  $divisiMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(DivisiMember $divisimember)
    {
        if ($divisimember->img_member) {
            Storage::delete($divisimember->img_member);
        }
        DivisiMember::destroy($divisimember->id);
        return redirect('/dashboard/divisimember')->with('success', 'Member dihapus');
    }
}
