<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Setting::first();
        return view('admin.setting.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Setting::findOrFail($id);
        return view('admin.setting.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, string $id)
    {
            $data=Setting::findOrFail($id);
            $data->phone_1 = $request->phone_1;
            $data->phone_2 = $request->phone_2;
            $data->adress = $request->adress;
            $data->email = $request->email;
            $data->activ = $request->activ;
            if ($request->hasFile('logo') && $request->hasFile('favicon')) {
            $filenameloco = time() . '-' . $request->file('logo')->getClientOriginalName();
            $filenamefavicon = time() . '-' . $request->file('favicon')->getClientOriginalName();
            $filePathlogo = $request->file('logo')->storeAs('uploads', $filenameloco, 'public');
            $filePathfavicon = $request->file('favicon')->storeAs('uploads', $filenamefavicon, 'public');
            $data->logo = time() . '-' . $filenameloco;
            $data->logo_file_path = '/storage/' . $filePathlogo;
            $data->favicon = time() . '-' . $filenamefavicon;
            $data->favicon_file_path = '/storage/' . $filePathfavicon;
            }
            $data->save();
    
    
            return redirect()->route('admin.setting.index')->with('type','success')
                ->with('message','Məlumatlar uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateSite(Request $request)
    {
        $id = $request->id;
        $isActive = $request->is_active == 'true' ? 1 : 0;
        Setting::where('id', $id)->update(['activ' => $isActive]);
        return response()->json(['message' => 'Status updated successfully']);
    }
}