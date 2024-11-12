<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\Lang;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Menu::all();
        return view('admin.menu.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = Lang::all();
        $data = Menu::whereNull('parent_id')->get();
        return view('admin.menu.create', compact('langs', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $data = new Menu;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->parent_id = $request->parent_id;
        $data->price = $request->price;
        if ($request->hasFile('picture')) {
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $filePath = $request->picture->storeAs('uploads', $filename, 'public');
            $data->picture = $filename;
            $data->file_path = '/storage/' . $filePath;
        } else {
            $data->picture = null;
            $data->file_path = null;
        }

        $data->save();
        return redirect()->route('admin.menu.index')
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
        $data = Menu::findOrFail($id);
        $menu = Menu::whereNull('parent_id')->where('id', '!=', $data->id)->orderby('name', 'asc')->get();
        return  view('admin.menu.edit', compact('langs', 'data', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Menu::findOrFail($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->parent_id = $request->parent_id;
        $data->price = $request->price;
        if ($request->hasFile('picture')) {
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $filePath = $request->picture->storeAs('uploads', $filename, 'public');
            $data->picture = $filename;
            $data->file_path = '/storage/' . $filePath;
        } else {
            $data->picture = null;
            $data->file_path = null;
        }

        $data->save();
        return redirect()->route('admin.menu.index')
            ->with('type', 'success')->with('message', 'Məlumat əlavə olundu!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function delete(Menu $id)
    {

        $id->delete();

        return response()->json([
            'success' => 'Record deleted successfully!',
        ]);
    }
}
