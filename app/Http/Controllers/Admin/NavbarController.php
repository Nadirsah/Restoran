<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NavbarRequest;
use App\Models\Lang;
use App\Models\Navbar;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Navbar::all();

        return view('admin.navbar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = Lang::all();

        return view('admin.navbar.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NavbarRequest $request)
    {
        $data = new Navbar;
        $data->title = $request->title;
        $data->text = $request->text;

        $background_filename = time().'-'.$request->background_image->getClientOriginalName();
        $background_filePath = $request->background_image->storeAs('uploads', $background_filename, 'public');
        $data->background_filename = $background_filename;
        $data->background_file_path = '/storage/'.$background_filePath;

        $image_filename = time().'-'.$request->image->getClientOriginalName();
        $image_filePath = $request->image->storeAs('uploads', $image_filename, 'public');
        $data->picture = $image_filename;
        $data->image_file_path = '/storage/'.$image_filePath;
        $data->save();

        return redirect()->route('admin.navbar.index')
            ->with('type', 'success')->with('message', 'Məlumat əlavə olundu!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $langs = Lang::all();
        $data = Navbar::findOrFail($id);

        return view('admin.navbar.edit', compact('data', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Navbar::findOrFail($id);
        $data->title = $request->title;
        $data->text = $request->text;

        $background_filename = time().'-'.$request->background_image->getClientOriginalName();
        $background_filePath = $request->background_image->storeAs('uploads', $background_filename, 'public');
        $data->background_filename = $background_filename;
        $data->background_file_path = '/storage/'.$background_filePath;

        $image_filename = time().'-'.$request->image->getClientOriginalName();
        $image_filePath = $request->image->storeAs('uploads', $image_filename, 'public');
        $data->picture = $image_filename;
        $data->image_file_path = '/storage/'.$image_filePath;
        $data->save();

        return redirect()->route('admin.navbar.index')
            ->with('type', 'success')->with('message', 'Məlumat əlavə olundu!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(Navbar $id)
    {

        $id->delete();

        return response()->json([
            'success' => 'Record deleted successfully!',
        ]);
    }
}
