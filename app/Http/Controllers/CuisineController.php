<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Helper\ImageHelper;

class CuisineController extends Controller
{
    use ImageHelper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuisines = Cuisine::with('menu')->get();
        return view("admin.cuisine.all", ["cuisines" => $cuisines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view("admin.cuisine.create", ["menus" => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:cuisines|max:255',
            'desc' => 'required',
            'menu' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,svg'
        ]);

        $cuisine = new Cuisine();
        $cuisine->name = $validated["name"];
        $cuisine->desc = $validated["desc"];
        $imageFile = $request->file('image');
        if ($request->file('featured_image')) {
            $imageFile = $request->file('featured_image');
            $imagePath = 'cuisines/';
            $imageUrl = $this->imageUploader($imageFile, $imagePath);
            $cuisine->featured_image = $imageUrl;
        }
        $imagePath = 'cuisines/';
        $imageUrl = $this->imageUploader($imageFile, $imagePath);
        $cuisine->image = $imageUrl;
        $cuisine->menu_id = $validated["menu"];
        if (isset($request->top)) {
            $cuisine->top = true;
        } else {
            $cuisine->top = false;
        }
        $cuisine->save();
        return redirect(route('cuisines.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuisine  $cuisine
     * @return \Illuminate\Http\Response
     */
    public function show(Cuisine $cuisine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuisine  $cuisine
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuisine $cuisine)
    {
        $menus = Menu::all();
        return view('admin.cuisine.edit', ["cuisine" => $cuisine, "menus" => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuisine  $cuisine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuisine $cuisine)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:cuisines,name,' . $cuisine->id,
            'desc' => 'required',
            'menu' => 'required',
        ]);

        $cuisine->name = $validated["name"];
        $cuisine->desc = $validated["desc"];
        if ($request->file('image')) {
            $imageFile = $request->file('image');
            $imagePath = 'cuisines/';
            $imageUrl = $this->imageUploader($imageFile, $imagePath);
            $cuisine->image = $imageUrl;
        }
        if ($request->file('featured_image')) {
            $imageFile = $request->file('featured_image');
            $imagePath = 'cuisines/';
            $imageUrl = $this->imageUploader($imageFile, $imagePath);
            $cuisine->featured_image = $imageUrl;
        }
        $cuisine->menu_id = $validated["menu"];
        $cuisine->save();
        return redirect(route('cuisines.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuisine  $cuisine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuisine $cuisine)
    {
        $cuisine->delete();
        return redirect(route('cuisines.index'));
    }
}
