<?php

namespace App\Http\Controllers;

use App\Models\Event;

use App\Models\KategoriEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.event.index',
            [
                'event' => Event::all()
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
        return view('dashboard.event.create', [
            'kategorie' => KategoriEvent::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'kategori_event_id' => 'required',
            'img_event' => 'image|file|max:1024',
            'tgl_event' => 'required',
            'isi_event' => 'required'
        ]);

        if ($request->file('img_event')) {
            $validatedData['img_event'] = $request->file('img_event')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['kutipan'] = Str::limit(strip_tags($request->isi_event), 100);

        Event::create($validatedData);
        return redirect('/dashboard/event')->with('success', 'Event berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('dashboard.event.edit', [
            'event' => $event,
            'kategorie' => KategoriEvent::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $rules = [
            'judul' => 'required|max:255',
            'kategori_event_id' => 'required',
            'img_event' => 'image|file|max:1024',
            'tgl_event' => 'required',
            'isi_event' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('img_event')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['img_event'] = $request->file('img_event')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['kutipan'] = Str::limit(strip_tags($request->isi_news), 100);
        Event::where('id', $event->id)
            ->update($validatedData);
        return redirect('/dashboard/event')->with('success', 'Event terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Event::destroy($event->id);
        return redirect('/dashboard/event')->with('success', 'Event dihapus');
    }
}
