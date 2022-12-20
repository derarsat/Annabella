<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Helper\ImageHelper;

class GalleryImageController extends Controller
{
    use ImageHelper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = GalleryImage::all();
        return view("admin.gallery.all", ["images" => $images]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.gallery.create");
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,svg',
            'grid' => 'required|numeric|min:1|max:12',
            'featured' => "nullable"
        ]);
        $gallery_image = new GalleryImage();
        $gallery_image->grid = $validated["grid"];
        if ($request->has("featured")) {
            $gallery_image->featured = true;
        } else {
            $gallery_image->featured = false;
        }
        $imageFile = $request->file('image');
        $imagePath = 'gallery-images/';
        $imageUrl = $this->imageUploader($imageFile, $imagePath);
        if ($request->file('featured_image')) {
            $imageFile = $request->file('featured_image');
            $imagePath = 'gallery-images/';
            $imageUrl = $this->imageUploader($imageFile, $imagePath);
            $gallery_image->featured_image = $imageUrl;
        }
        $gallery_image->url = $imageUrl;
        $gallery_image->save();
        return redirect(route('gallery-images.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\GalleryImage $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryImage $galleryImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\GalleryImage $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryImage $galleryImage)
    {
        return view('admin.gallery.edit', [ "gallery_image" => $galleryImage]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GalleryImage $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryImage $galleryImage)
    {
        $validated = $request->validate([
            'grid' => 'required|numeric|min:1|max:12',
            'featured' => "nullable"
        ]);
        $galleryImage->grid = $validated["grid"];
        if ($request->has("featured")) {
            $galleryImage->featured = true;
        } else {
            $galleryImage->featured = false;
        }
        if ($request->file('featured_image')) {
            $imageFile = $request->file('featured_image');
            $imagePath = 'gallery-images/';
            $imageUrl = $this->imageUploader($imageFile, $imagePath);
            $galleryImage->featured_image = $imageUrl;
        }
        if ($request->file('image')) {
            $imageFile = $request->file('image');
            $imagePath = 'gallery-images/';
            $imageUrl = $this->imageUploader($imageFile, $imagePath);
            $galleryImage->url = $imageUrl;
        }
        $galleryImage->save();
        return redirect(route('gallery-images.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\GalleryImage $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryImage $galleryImage)
    {
        $galleryImage->delete();
        return redirect(route('gallery-images.index'));

    }
}
