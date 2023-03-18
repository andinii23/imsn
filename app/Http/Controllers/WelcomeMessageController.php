<?php

namespace App\Http\Controllers;

use App\Models\WelcomeMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard.welcomemessage.index',
            [
                'welcomemessage' => WelcomeMessage::all()
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
        return view('dashboard.welcomemessage.create', [
            'welcomemessage' => WelcomeMessage::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWelcomeMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required',
            'msg_img' => 'image|file|max:1024',
        ]);

        if ($request->file('msg_img')) {
            $validatedData['msg_img'] = $request->file('msg_img')->store('post-images');
        }

        WelcomeMessage::create($validatedData);
        return redirect('/dashboard/welcomemessage')->with('success', 'Welcome Message ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WelcomeMessage  $welcomeMessage
     * @return \Illuminate\Http\Response
     */
    public function show(WelcomeMessage $welcomeMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WelcomeMessage  $welcomeMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(WelcomeMessage $welcomemessage)
    {
        return view('dashboard.welcomemessage.edit', [
            'welcomemessage' => $welcomemessage,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWelcomeMessageRequest  $request
     * @param  \App\Models\WelcomeMessage  $welcomeMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WelcomeMessage $welcomemessage)
    {
        $rules = [
            'title' => 'required|max:255',
            'subtitle' => 'required',
            'msg_img' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('msg_img')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['msg_img'] = $request->file('msg_img')->store('post-images');
        }

        WelcomeMessage::where('id', $welcomemessage->id)
            ->update($validatedData);
        return redirect('/dashboard/welcomemessage')->with('success', 'Welcome Message terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WelcomeMessage  $welcomeMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(WelcomeMessage $welcomemessage)
    {
        if ($welcomemessage->msg_img) {
            Storage::delete($welcomemessage->msg_img);
        }
        WelcomeMessage::destroy($welcomemessage->id);
        return redirect('/dashboard/welcomemessage')->with('success', 'Welcome Message dihapus');
    }
}
