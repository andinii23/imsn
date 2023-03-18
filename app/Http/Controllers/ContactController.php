<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.contact.index',
            [
                'contact' => Contact::all()
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
        return view('dashboard.contact.create', [
            'contact' => Contact::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'contact' => 'required|max:255',
            'icon' => 'required',
            'deskripsi' => 'required'
        ]);

        Contact::create($validatedData);
        return redirect('/dashboard/contact')->with('success', 'Contact ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('dashboard.contact.edit', [
            'contact' => $contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $rules = [
            'contact' => 'required|max:255',
            'icon' => 'required',
            'deskripsi' => 'required'
        ];
        $validatedData = $request->validate($rules);

        Contact::where('id', $contact->id)
            ->update($validatedData);
        return redirect('/dashboard/contact')->with('success', 'Contact terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        Contact::destroy($contact->id);
        return redirect('/dashboard/contact')->with('success', 'Contact dihapus');
    }
}
