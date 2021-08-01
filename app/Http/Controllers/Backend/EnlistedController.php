<?php

namespace App\Http\Controllers\Backend;

use App\r;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Enlisted;
class EnlistedController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    
    public function index()
    {
      $enlists = Enlisted::orderBy('id', 'desc')->get();
      return view('backend.pages.enlists.index', compact('enlists'));
    }
  
    public function store(Request $request)
    {
      $this->validate($request, [
        'name'  => 'required',
        'link'  => 'required',
      ],
      [
        'name.required'  => 'Please provide enlists name',
        'link.required'  => 'Please provide enlists link',
      ]);
  
      $enlists = new Enlisted();
      $enlists->name = $request->name;
      $enlists->link = $request->link;
  
      $enlists->save();
  
      session()->flash('success', 'A new enlists has added successfully !!');
      return redirect()->route('admin.enlists');
  
    }
  
      public function update(Request $request, $id)
      {
        $this->validate($request, [
            'name'  => 'required',
            'link'  => 'required',
          ],
          [
            'name.required'  => 'Please provide enlists name',
            'link.required'  => 'Please provide enlists link',
          ]);
      
          $enlists = Enlisted::find($id);
          $enlists->name = $request->name;
          $enlists->link = $request->link;
          $enlists->save();
  
          session()->flash('success', 'Enlisted has updated successfully !!');
          return redirect()->route('admin.enlists');
  
      }
  
      public function delete($id)
      {
        $enlists = Enlisted::find($id);
        $enlists->delete();
        session()->flash('success', 'Enlisted has deleted successfully !!');
        return back();
  
      }
  }
  