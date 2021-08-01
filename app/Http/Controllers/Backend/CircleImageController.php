<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\CircleImage;
use Image;
use File;

class CircleImageController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    $circleimages = CircleImage::orderBy('id', 'desc')->get();
    return view('backend.pages.circleimages.index', compact('circleimages'));
  }
  public function create()
  {
    return view('backend.pages.circleimages.create');
  }

  public function edit($id)
  {
    $circleimages = CircleImage::find($id);
    return view('backend.pages.circleimages.edit')->with('circleimages', $circleimages);
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'slogan'  => 'required',
    ],
    [
      'slogan.required'  => 'Please provide slogan',
    ]);

    $circleimage = new CircleImage;

    $circleimage->slogan = $request->slogan;
    
    // imageOne
    if ($request->imageOne > 0) {
      $imageOneimage = $request->file('imageOne');
      $imageOneimg = rand() . '.'. $imageOneimage->getClientOriginalExtension();
      $location = 'frontend/images/' .$imageOneimg;
      Image::make($imageOneimage)->save($location);
      $circleimage->imageOne = $imageOneimg;
      }

    // imageTwo
    if ($request->imageTwo > 0) {
      $imageTwoimage = $request->file('imageTwo');
      $imageTwoimg = rand() . '.'. $imageTwoimage->getClientOriginalExtension();
      $location = 'frontend/images/' .$imageTwoimg;
      Image::make($imageTwoimage)->save($location);
      $circleimage->imageTwo = $imageTwoimg;
      }

    // imageThree
    if ($request->imageThree > 0) {
      $imageThreeimage = $request->file('imageThree');
      $imageThreeimg = rand() . '.'. $imageThreeimage->getClientOriginalExtension();
      $location = 'frontend/images/' .$imageThreeimg;
      Image::make($imageThreeimage)->save($location);
      $circleimage->imageThree = $imageThreeimg;
      }

    // imageFour
    if ($request->imageFour > 0) {
      $imageFourimage = $request->file('imageFour');
      $imageFourimg = rand() . '.'. $imageFourimage->getClientOriginalExtension();
      $location = 'frontend/images/' .$imageFourimg;
      Image::make($imageFourimage)->save($location);
      $circleimage->imageFour = $imageFourimg;
      }

      $circleimage->save();

    return redirect()->route('admin.circleimages');

  }

  
  
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'slogan'  => 'required',
      ],
      [
        'slogan.required'  => 'Please provide slogan',
      ]);
        $circleimage = CircleImage::find($id);
        $circleimage->slogan = $request->slogan;

        // imageOne
        if ($request->imageOne > 0) {
            // Delete the old CircleImage
            if (File::exists('frontend/images/'.$circleimage->imageOne)) {
                File::delete('frontend/images/'.$circleimage->imageOne);
              }

            $imageOne = $request->file('imageOne');
            $imageOneimg = rand() . '.'. $imageOne->getClientOriginalExtension();
            $location = 'frontend/images/' .$imageOneimg;
            Image::make($imageOne)->save($location);
            $circleimage->imageOne = $imageOneimg;
        }

        // imageTwo
        if ($request->imageTwo > 0) {
            // Delete the old CircleImage
            if (File::exists('frontend/images/'.$circleimage->imageTwo)) {
                File::delete('frontend/images/'.$circleimage->imageTwo);
              }

            $imageTwo = $request->file('imageTwo');
            $imageTwoimg = rand() . '.'. $imageTwo->getClientOriginalExtension();
            $location = 'frontend/images/' .$imageTwoimg;
            Image::make($imageTwo)->save($location);
            $circleimage->imageTwo = $imageTwoimg;
        }

        // imageThree
        if ($request->imageThree > 0) {
            // Delete the old CircleImage
            if (File::exists('frontend/images/'.$circleimage->imageThree)) {
                File::delete('frontend/images/'.$circleimage->imageThree);
              }

            $imageThree = $request->file('imageThree');
            $imageThreeimg = rand() . '.'. $imageThree->getClientOriginalExtension();
            $location = 'frontend/images/' .$imageThreeimg;
            Image::make($imageThree)->save($location);
            $circleimage->imageThree = $imageThreeimg;
        }

        // imageFour
        if ($request->imageFour > 0) {
            // Delete the old CircleImage
            if (File::exists('frontend/images/'.$circleimage->imageFour)) {
                File::delete('frontend/images/'.$circleimage->imageFour);
              }

            $imageFour = $request->file('imageFour');
            $imageFourimg = rand() . '.'. $imageFour->getClientOriginalExtension();
            $location = 'frontend/images/' .$imageFourimg;
            Image::make($imageFour)->save($location);
            $circleimage->imageFour = $imageFourimg;
        }

        $circleimage->save();

        session()->flash('success', 'CircleImage has updated successfully !!');
        return redirect()->route('admin.circleimages');

    }

    public function delete($id)
    {
      $circleimage = CircleImage::find($id);
      if (!is_null($circleimage)) {
        //Delete Image
        if (File::exists('frontend/images/'.$circleimage->imageOne)) {
            File::delete('frontend/images/'.$circleimage->imageOne);
          }
        $circleimage->delete();
      }

      if (!is_null($circleimage)) {
        //Delete Image
        if (File::exists('frontend/images/'.$circleimage->imageTwo)) {
            File::delete('frontend/images/'.$circleimage->imageTwo);
          }
        $circleimage->delete();
      }

      if (!is_null($circleimage)) {
        //Delete Image
        if (File::exists('frontend/images/'.$circleimage->imageThree)) {
            File::delete('frontend/images/'.$circleimage->imageThree);
          }
        $circleimage->delete();
      }

      if (!is_null($circleimage)) {
        //Delete Image
        if (File::exists('frontend/images/'.$circleimage->imageFour)) {
            File::delete('frontend/images/'.$circleimage->imageFour);
          }
        $circleimage->delete();
      }
      session()->flash('success', 'CircleImage has deleted successfully !!');
      return back();

    }
}
