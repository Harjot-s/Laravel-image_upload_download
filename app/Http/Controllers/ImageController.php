<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageUpload;
use File;
class ImageController extends Controller
{

    public function index (){
        $data = ImageUpload::all();
        return view('welcome', ['data' => $data]);
    }
    public function uploadImage(Request $request){
       
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            
            $data = new ImageUpload;
            $data->name = $name;
            $data->save();

            return redirect()->back()->with('status','Image Upload successfully');
        } else {
            return 'no';
        }
    }

    public function deleteImage($id){
        $data = ImageUpload::findOrFail($id);
        $delete = File::delete('public/images/'.$data->name);

        if($delete){
            $data->delete();
        }

        return redirect()->back()->with('status','Image Deleted successfully');
    }

    public function downloadImage($id){
        $image_cover = ImageUpload::findOrFail($id);

        // $ = Book::where('id', $imageId)->firstOrFail();
        $path ='public/images/'. $image_cover->name;
        // return $path;
        return response()->download($path, $image_cover
                 ->original_filename, ['Content-Type' => $image_cover->mime]);

    }
}
