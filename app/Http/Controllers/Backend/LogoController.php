<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Logo;
use Image;
use File;
class LogoController extends Controller
{ 
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    
    public function index()
    {
      $logo = Logo::orderBy('id', 'asc')->get();
      return view('backend.pages.logo.index', compact('logo'));
    }
  
    public function store(Request $request)
    {

      $logo = new Logo();
  
      if ($request->image > 0) {
          $image = $request->file('image');
          $img = time() . '.'. $image->getClientOriginalExtension();
          $location = 'frontend/images/' .$img;
          Image::make($image)->save($location);
          $logo->image = $img;
      }
      $logo->save();
  
      session()->flash('success', 'A new logo has added successfully !!');
      return redirect()->route('admin.logos');
  
    }
  
      public function update(Request $request, $id)
      {
           
  
          $logo = Logo::find($id);

          if ($request->image > 0) {
              // Delete the old Logo
              if (File::exists('frontend/images/'.$logo->image)) {
                  File::delete('frontend/images/'.$logo->image);
                }
  
              $image = $request->file('image');
              $img = time() . '.'. $image->getClientOriginalExtension();
              $location = 'frontend/images/' .$img;
              Image::make($image)->save($location);
              $logo->image = $img;
          }
          $logo->save();
  
          session()->flash('success', 'Logo has updated successfully !!');
          return redirect()->route('admin.logos');
  
      }
  
      public function delete($id)
      {
        $logo = Logo::find($id);
        if (!is_null($logo)) {
          //Delete Image
          if (File::exists('frontend/images/'.$logo->image)) {
              File::delete('frontend/images/'.$logo->image);
            }
          $logo->delete();
        }
        session()->flash('success', 'Logo has deleted successfully !!');
        return back();
  
      }
  }
  