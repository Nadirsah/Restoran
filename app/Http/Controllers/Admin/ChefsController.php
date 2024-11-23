<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChefRequest;
use App\Models\Chefs;
use App\Models\Lang;
use Illuminate\Http\Request;

class ChefsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Chefs::all();

        return view('admin.chefs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = Lang::all();

        return view('admin.chefs.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChefRequest $request)
    {
        $data = new Chefs;
        $data->name = $request->name;
        $data->position = $request->position;
        $filename = time().'-'.$request->picture->getClientOriginalName();
        $filePath = $request->picture->storeAs('uploads', $filename, 'public');
        $data->picture = time().'-'.$request->picture->getClientOriginalName();
        $data->file_path = '/storage/'.$filePath;

        $data->save();

        return redirect()->route('admin.chefs.index')
            ->with('type', 'success')->with('message', 'Məlumat əlavə olundu!');
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
        $langs = Lang::all();
        $data = Chefs::findOrFail($id);

        return view('admin.chefs.edit', compact('data', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Chefs::findOrFail($id);
        $data->name = $request->name;
        $data->position = $request->position;
        $filename = time().'-'.$request->picture->getClientOriginalName();
        $filePath = $request->picture->storeAs('uploads', $filename, 'public');
        $data->picture = time().'-'.$request->picture->getClientOriginalName();
        $data->file_path = '/storage/'.$filePath;

        $data->save();

        return redirect()->route('admin.chefs.index')
            ->with('type', 'success')->with('message', 'Məlumat əlavə olundu!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(Chefs $id)
    {

        $id->delete();

        return response()->json([
            'success' => 'Record deleted successfully!',
        ]);
    }
}
