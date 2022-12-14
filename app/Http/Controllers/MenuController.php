<?php

namespace App\Http\Controllers;

use App\Helper\PdfHelper;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use PdfHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view("admin.menu.all",['menus' => $menus]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.menu.create");
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
            'name' => 'required|unique:menus|max:255',
            'pdf' => 'required|mimes:pdf',
        ]);
        $menu = new Menu();
        $menu->name = $validated["name"];
        // Pdf
        $pdfFile = $request->file('pdf');
        $pdfPath = 'menus/';
        $pdfUrl = $this->pdfUploader($pdfFile, $pdfPath);
        $menu->pdf = $pdfUrl;
        $menu->save();
        return redirect(route("menus.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect(route("menus.index"));

    }
}
