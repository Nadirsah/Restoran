<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;
use App\Models\Lang;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Services::all();

        return view('admin.services.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = Lang::all();

        return view('admin.services.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        $data = new Services;
        $data->header = $request->header;
        $data->text = $request->text;
        $filename = time().'-'.$request->picture->getClientOriginalName();
        $filePath = $request->picture->storeAs('uploads', $filename, 'public');
        $data->picture = time().'-'.$request->picture->getClientOriginalName();
        $data->file_path = '/storage/'.$filePath;
        $data->save();

        return redirect()->route('admin.services.index')
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
        $data = Services::findOrFail($id);

        return view('admin.services.edit', compact('data', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Services::findOrFail($id);
        $data->header = $request->header;
        $data->text = $request->text;
        $filename = time().'-'.$request->picture->getClientOriginalName();
        $filePath = $request->picture->storeAs('uploads', $filename, 'public');
        $data->picture = time().'-'.$request->picture->getClientOriginalName();
        $data->file_path = '/storage/'.$filePath;
        $data->save();

        return redirect()->route('admin.services.index')
            ->with('type', 'success')->with('message', 'Məlumat əlavə olundu!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(Services $id)
    {

        $id->delete();

        return response()->json([
            'success' => 'Record deleted successfully!',
        ]);
    }
}
