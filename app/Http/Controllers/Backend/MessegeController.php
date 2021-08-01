<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
class MessegeController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $msgs = Message::orderBy('id', 'desc')->get();
    return view('backend.pages.messege.index', compact('msgs'));
  }

  public function delete($id)
  {
    $msg = Message::find($id);
    if (!is_null($msg)) {
      $msg->delete();
    }
    session()->flash('success', 'Message has deleted successfully !!');
    return back();

  }

}
