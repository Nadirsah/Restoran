<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Chefs_SocialRequest;
use App\Models\Chefs_social;

class Chefs_SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
       
        //;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.chefs_social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Chefs_SocialRequest $request)
    {
       
        $data = new Chefs_social;
        $data->name = $request->name;
        $data->social_url = $request->social_url;
        $data->chefs_id = $request->chefs_id;
        $data->save();

        return redirect()->route('admin.chefs.index')->with('type', 'success')
            ->with('message', 'Melumatlar ugurla yuklendi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Chefs_social::where('chefs_id',$id)->first();
        return view('admin.chefs_social.create',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $data = Chefs_social::findOrFail($id);

        return view('admin.chefs_social.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
