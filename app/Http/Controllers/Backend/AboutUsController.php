<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use Image;
use File;
class AboutUsController extends Controller
{
   
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    $about = About::orderBy('id', 'desc')->get();
    return view('backend.pages.aboutus.index', compact('about'));
  }
  public function create()
  {
    return view('backend.pages.about.create');
  }

  public function edit($id)
  {
    $about = About::find($id);
    return view('backend.pages.about.edit')->with('aboutus', $about);
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'aboutUs'  => 'required',
      'sAbout'  => 'required',
      'qOne' => 'required',
      'qTwo' => 'required',
      'qThree' => 'required',
      'mAbout' => 'required',
    ],
    [
      'aboutUs.required'  => 'Please provide aboutUs',
      'sAbout.required'  => 'Please provide Short About',
      'qOne.required'  => 'Please provide Quality One',
      'qTwo.required'  => 'Please provide Quality Two',
      'qThree.required'  => 'Please provide Quality Three',
      'mAbout.required'  => 'Please provide More About',
    ]);

    $about = new About;

    $about->aboutUs = $request->aboutUs;
    $about->sAbout = $request->sAbout;
    $about->qOne = $request->qOne;
    $about->qTwo = $request->qTwo;
    $about->qThree = $request->qThree;
    $about->mAbout = $request->mAbout;
    

    $about->save();

    return redirect()->route('admin.about');

  }

public function update(Request $request, $id)
    {
        $this->validate($request, [
            'aboutUs'  => 'required',
            'sAbout'  => 'required',
            'qOne' => 'required',
            'qTwo' => 'required',
            'qThree' => 'required',
            'mAbout' => 'required',
          ],
          [
            'aboutUs.required'  => 'Please provide aboutUs',
            'sAbout.required'  => 'Please provide Short About',
            'qOne.required'  => 'Please provide Quality One',
            'qTwo.required'  => 'Please provide Quality Two',
            'qThree.required'  => 'Please provide Quality Three',
            'mAbout.required'  => 'Please provide More About',
          ]);

        $about = About::find($id);

        $about->aboutUs = $request->aboutUs;
        $about->sAbout = $request->sAbout;
        $about->qOne = $request->qOne;
        $about->qTwo = $request->qTwo;
        $about->qThree = $request->qThree;
        $about->mAbout = $request->mAbout;
        
        $about->save();

        session()->flash('success', 'AboutUs has updated successfully !!');
        return redirect()->route('admin.about');

    }

    public function delete($id)

    {
      $about = About::find($id);
      $about->delete();
      session()->flash('success', 'About Us has deleted successfully !!');
      return back();

    }
}
