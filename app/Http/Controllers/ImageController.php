<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    public function formImage()
    {
        return view('image.resize');
    }

    public function resizeImage(Request $request)
    {
        $image = $request->file;
        $fileName = $image->getClientOriginalName();
        $manager = new ImageManager(new Driver());

        $imageResize = $manager->read($image->getRealPath());
        $imageResize->resize(300, 300);
        $imageResize->save(public_path('images/' . $fileName));
        return redirect('images/' . $fileName);
    }
}
