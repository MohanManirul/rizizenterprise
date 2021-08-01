<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Enlisted;
use App\Models\Backend\Logo;
use App\Models\Backend\CircleImage;
use App\Models\Backend\Footer;
use App\Models\Backend\BackgroundImage;
class PagesController extends Controller
{ 
  
  public function index()
    { 
      $enlists = Enlisted::orderBy('id', 'desc')->get();
      $logo = Logo::orderBy('id', 'asc')->get();
      $bgimage = BackgroundImage::orderBy('id', 'asc')->get();
      $circleimages = CircleImage::orderBy('id', 'desc')->get();
      $footer = Footer::orderBy('id', 'desc')->get();
      return view('frontend.index', compact('enlists', 'logo','circleimages' , 'footer','bgimage'));
    }

    public function contact()
    {
      return view('frontend.pages.contact');
    }

    public function search(Request $request)
    {
      $search = $request->search;

        $products = Product::orWhere('title', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->orWhere('slug', 'like', '%'.$search.'%')
        ->orWhere('price', 'like', '%'.$search.'%')
        ->orWhere('quantity', 'like', '%'.$search.'%')
        ->orderBy('id', 'desc')
        ->paginate(9);

        return view('frontend.pages.product.search', compact('search', 'products'));
    }

    public function sendmsgstore(Request $request)
    {
      $this->validate($request, [
        'name'  => 'required',
        'email' => 'required|string|email|max:100',
        'subject'  => 'required|min:10',
        'mobile'  => 'required|numeric|min:11',
        'message'  => 'required|min:40',
      ],
      [
        'name.required'  => 'Please provide name',
        'email.required'  => 'Please provide email',
        'subject.required'  => 'Please provide at least 10 charecters in subject field',
        'mobile.required'  => 'Please provide at least 11 charecters in mobile field',
        'message.required'  => 'Please provideat least 10 charecters in message field',
      ]);

      $msg = new Message;

      $msg->name = $request->name;
      $msg->email = $request->email;
      $msg->subject = $request->subject;
      $msg->mobile = $request->mobile;
      $msg->message = $request->message;     
  
      $msg->save();
      session()->flash('success', 'Thanks ! Your Message Received , We will Contact Later !!');
      return redirect()->route('index');
    }

}
