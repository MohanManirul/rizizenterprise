<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Footer;
class FooterController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    
    public function index()
    {
      $footer = Footer::orderBy('id', 'desc')->get();
      return view('backend.pages.footer.index', compact('footer'));
    }
  
    public function store(Request $request)
    {
      $this->validate($request, [
        'weare'  => 'required',
        'address'  => 'required',
        'email'  => 'required|email',
        'mobile'  => 'required|numeric',
        'website'  => 'required',
      ],
      [
        'weare.required'  => 'Please provide footer weare',
        'address.required'  => 'Please provide footer address',
        'email.required'  => 'Please provide footer email',
        'mobile.required'  => 'Please provide footer mobile',
        'website.required'  => 'Please provide footer website',
      ]);
  
      $footer = new Footer();
      $footer->weare = $request->weare;
      $footer->address = $request->address;
      $footer->email = $request->email;
      $footer->mobile = $request->mobile;
      $footer->website = $request->website;
  
      $footer->save();
  
      session()->flash('success', 'A new footer has added successfully !!');
      return redirect()->route('admin.footer');
  
    }
  
      public function update(Request $request, $id)
      {
        $this->validate($request, [
          'weare'  => 'required',
          'address'  => 'required',
          'email'  => 'required|email',
          'mobile'  => 'required|numeric',
          'website'  => 'required',
        ],
        [
          'weare.required'  => 'Please provide footer weare',
          'address.required'  => 'Please provide footer address',
          'email.required'  => 'Please provide footer email',
          'mobile.required'  => 'Please provide footer mobile',
          'website.required'  => 'Please provide footer website',
        ]);

            $footer = Footer::find($id);
            $footer->weare = $request->weare;
            $footer->address = $request->address;
            $footer->email = $request->email;
            $footer->mobile = $request->mobile;
            $footer->website = $request->website;
            $footer->save();
  
          session()->flash('success', 'Footer has updated successfully !!');
          return redirect()->route('admin.footer');
  
      }
  
      public function delete($id)
      {
        $footer = Footer::find($id);
        $footer->delete();
        session()->flash('success', 'Footer has deleted successfully !!');
        return back();
  
      }
  }
  