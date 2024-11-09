<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use App\Models\AboutPicture;
use App\Models\Lang;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = About::with('pictures')->get();

        return view('admin.about.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = Lang::all();

        return view('admin.about.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        try {
            $data = new About;
            $data->experience = $request->experience;
            $data->text = $request->text;
            $data->save();

            try {
                if ($request->hasFile('picture')) {
                    foreach ($request->file('picture') as $key => $image) {
                        $fileModel = new AboutPicture;
                        $filename = time().'-'.$image->getClientOriginalName();
                        $filePath = $image->storeAs('uploads', $filename, 'public');
                        $fileModel->picture = time().'-'.$image->getClientOriginalName();
                        $fileModel->file_path = '/storage/'.$filePath;
                        $fileModel->about_id = $data->id;
                        $fileModel->save();
                    }
                }
            } catch (\Exception $e) {
                $data->delete();
                throw new \Exception('Image upload failed: '.$e->getMessage());
            }

            return redirect()->route('admin.about.index')->with('type', 'success')
                ->with('message', 'Melumatlar ugurla yuklendi!');
        } catch (\Exception $e) {
            return redirect()->route('admin.about.index')->with('type', 'error')
                ->with('message', 'Yuklenme de xeta bas verdi: '.$e->getMessage());
        }
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
        $data = About::findOrFail($id);

        return view('admin.about.edit', compact('data', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = About::findOrFail($id);
            $data->experience = $request->experience;
            $data->text = $request->text;
            $data->save();

            try {
                if ($request->hasFile('picture')) {
                    foreach ($request->file('picture') as $key => $image) {
                        $fileModel = new AboutPicture;
                        $filename = time().'-'.$image->getClientOriginalName();
                        $filePath = $image->storeAs('uploads', $filename, 'public');
                        $fileModel->picture = time().'-'.$image->getClientOriginalName();
                        $fileModel->file_path = '/storage/'.$filePath;
                        $fileModel->about_id = $data->id;
                        $fileModel->save();
                    }
                }
            } catch (\Exception $e) {
                $data->delete();
                throw new \Exception('Image upload failed: '.$e->getMessage());
            }

            return redirect()->route('admin.about.index')->with('type', 'success')
                ->with('message', 'Melumatlar ugurla yuklendi!');
        } catch (\Exception $e) {
            return redirect()->route('admin.about.index')->with('type', 'error')
                ->with('message', 'Yuklenme de xeta bas verdi: '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(About $id)
    {
        foreach ($id->pictures as $image) {
            if (file_exists(public_path($image->file_path))) {
                unlink(public_path($image->file_path));
            }
            $image->delete();
        }

        $id->delete();

        return response()->json([
            'success' => 'Record deleted successfully!',
        ]);
    }

    public function deleteimg($id)
    {

        AboutPicture::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!',
        ]);
    }
}
