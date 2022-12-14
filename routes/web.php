<?php

use App\Http\Controllers\CuisineController;
use App\Http\Controllers\MenuController;
use App\Models\Cuisine;
use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => ['web']], function () {
    Route::view("/", 'admin.dashboard');
    Route::resource("gallery-images", \App\Http\Controllers\GalleryImageController::class);
    Route::resource("menus", MenuController::class);
    Route::resource("cuisines", CuisineController::class);
    Route::get("reservations", function () {
        $reservations = Reservation::orderBy("id","DESC")->orderBy("archived")->get();
        return view("admin.reservations", ["reservations" => $reservations]);
    });

    Route::post("reservations/archive", function (Request $request) {
        $reservation = Reservation::find($request->id);
        $reservation->archived = true;
        $reservation->save();
        return redirect()->back();
    });
});
Route::get('/', function () {
    return view('front');
});

Route::get('/front-gallery-images', function () {
    $images = \App\Models\GalleryImage::where("featured", "=", true)->get();
    foreach ($images as $image) {
        $image->url = @App::make('url')->to('/') . '/storage' . $image->url;
    }
    return response()->json([
        "images" => $images
    ]);
});
Route::get('/gallery', function () {
    $images = \App\Models\GalleryImage::all();
    foreach ($images as $image) {
        $image->url = @App::make('url')->to('/') . '/storage' . $image->url;
    }
    return response()->json([
        "images" => $images
    ]);
});

Route::get('/menus', function () {
    $menus = Menu::with("cuisines")->get();
    foreach ($menus as &$menu) {
        foreach ($menu["cuisines"] as &$cuisine) {
            $cuisine["image"] = @App::make('url')->to('/') . '/storage' . $cuisine->image;
        }
    }
    return response()->json($menus);
});

Route::get('/top-cuisines', function () {
    $cuisines = Cuisine::where("top", "=", true)->get();
    foreach ($cuisines as &$cuisine) {
        $cuisine["image"] = @App::make('url')->to('/') . '/storage' . $cuisine->image;
    }
    return response()->json($cuisines);
});

Route::post('/reserve', function (Request $request) {
    $data = $request->input();
    $reservation = new Reservation();
    $reservation->name = $data["name"];
    $reservation->date = $data["date"];
    $reservation->time = $data["time"];
    $reservation->people = $data["people"];
    $reservation->email = $data["email"];
    $reservation->archived = false;
    $reservation->save();
});
