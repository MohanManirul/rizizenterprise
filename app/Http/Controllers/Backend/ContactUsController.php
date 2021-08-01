<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contactus;
class ContactUsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    
    public function index()
    {
      $contactuses = Contactus::orderBy('id', 'desc')->get();
      return view('backend.pages.contactus.index', compact('contactuses'));
    }
  
    public function store(Request $request)
    {
      $this->validate($request, [
        'location'  => 'required',
        'phone_no'  => 'required|numeric',
        'email'  => 'required|email',
        'title'  => 'required',
        'twitter'  => 'required',
        'facebook'  => 'required',
        'instagram'  => 'required',
        'skype'  => 'required',
        'linkedin'  => 'required',
      ],
      [
        'location.required'  => 'Please provide contactus location',
        'phone_no.required'  => 'Please provide contactus phone_no',
        'email.required'  => 'Please provide contactus email',
        'title.required'  => 'Please provide contactus title',
        'twitter.required'  => 'Please provide contactus twitter',
        'facebook.required'  => 'Please provide contactus facebook',
        'instagram.required'  => 'Please provide contactus instagram',
        'skype.required'  => 'Please provide contactus skype',
        'linkedin.required'  => 'Please provide contactus linkedin'
      ]);
  
      $contactus = new Contactus();
      $contactus->location = $request->location;
      $contactus->phone_no = $request->phone_no;
      $contactus->email = $request->email;
      $contactus->title = $request->title;
      $contactus->twitter = $request->twitter;
      $contactus->facebook = $request->facebook;
      $contactus->instagram = $request->instagram;
      $contactus->skype = $request->skype;
      $contactus->linkedin = $request->linkedin;
  
      $contactus->save();
  
      session()->flash('success', 'A new contactus has added successfully !!');
      return redirect()->route('admin.contactus');
  
    }
  
      public function update(Request $request, $id)
      {
        $this->validate($request, [
            'location'  => 'required',
            'phone_no'  => 'required|numeric',
            'email'  => 'required|email',
            'title'  => 'required',
            'twitter'  => 'required',
            'facebook'  => 'required',
            'instagram'  => 'required',
            'skype'  => 'required',
            'linkedin'  => 'required',
          ],
          [
            'location.required'  => 'Please provide contactus location',
            'phone_no.required'  => 'Please provide contactus phone_no',
            'email.required'  => 'Please provide contactus email',
            'title.required'  => 'Please provide contactus title',
            'twitter.required'  => 'Please provide contactus twitter',
            'facebook.required'  => 'Please provide contactus facebook',
            'instagram.required'  => 'Please provide contactus instagram',
            'skype.required'  => 'Please provide contactus skype',
            'linkedin.required'  => 'Please provide contactus linkedin'
          ]);
      
          $contactus = Contactus::find($id);
          $contactus->location = $request->location;
          $contactus->phone_no = $request->phone_no;
          $contactus->email = $request->email;
          $contactus->title = $request->title;
          $contactus->twitter = $request->twitter;
          $contactus->facebook = $request->facebook;
          $contactus->instagram = $request->instagram;
          $contactus->skype = $request->skype;
          $contactus->linkedin = $request->linkedin;
      
          $contactus->save();
  
          session()->flash('success', 'Contactus has updated successfully !!');
          return redirect()->route('admin.contactus');
  
      }
  
      public function delete($id)
      {
        $contactus = Contactus::find($id);
        $contactus->delete();
        session()->flash('success', 'Contactus has deleted successfully !!');
        return back();
  
      }
  }
  