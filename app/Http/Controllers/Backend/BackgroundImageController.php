<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\BackgroundImage;
use Image;
use File;
class BackgroundImageController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    
    public function index()
    {
      $bgimage = BackgroundImage::orderBy('id', 'asc')->get();
      return view('backend.pages.bgimage.index', compact('bgimage'));
    }
  
    public function store(Request $request)
    {

      $bgimage = new BackgroundImage();
  
      if ($request->image > 0) {
          $image = $request->file('image');
          $img = time() . '.'. $image->getClientOriginalExtension();
          $location = 'frontend/images/' .$img;
          Image::make($image)->save($location);
          $bgimage->image = $img;
      }
      $bgimage->save();
  
      session()->flash('success', 'A new bgimage has added successfully !!');
      return redirect()->route('admin.bgimages');
  
    }
  
      public function update(Request $request, $id)
      {
           
  
          $bgimage = BackgroundImage::find($id);

          if ($request->image > 0) {
              // Delete the old BackgroundImage
              if (File::exists('frontend/images/'.$bgimage->image)) {
                  File::delete('frontend/images/'.$bgimage->image);
                }
  
              $image = $request->file('image');
              $img = time() . '.'. $image->getClientOriginalExtension();
              $location = 'frontend/images/' .$img;
              Image::make($image)->save($location);
              $bgimage->image = $img;
          }
          $bgimage->save();
  
          session()->flash('success', 'BackgroundImage has updated successfully !!');
          return redirect()->route('admin.bgimages');
  
      }
  
      public function delete($id)
      {
        $bgimage = BackgroundImage::find($id);
        if (!is_null($bgimage)) {
          //Delete Image
          if (File::exists('frontend/images/'.$bgimage->image)) {
              File::delete('frontend/images/'.$bgimage->image);
            }
          $bgimage->delete();
        }
        session()->flash('success', 'BackgroundImage has deleted successfully !!');
        return back();
  
      }
  }
  