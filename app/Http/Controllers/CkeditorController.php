<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Product;
class CkeditorController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ckeditor');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        
        //dd($request->all());
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }        

    }

public function store(Request $request)
    {
    // dd($request->all());

    try{
        $input = $request->all();
        Product::updateOrCreate([
        'id' => $request->id,
        ],[
        'title' => $input['title'],
        'body'  => $input['description'],
        ]);
        if($request->id){
        $msg = 'update successfully' ;
        }else{
        $msg = 'added successfully' ;
        }
        $arr = array("status" => 200, "msg" =>$msg);
    }catch (\Illuminate\Database\QueryException $ex){
        $msg = $ex->getMessage();
        if(isset($ex->errorInfo[2])):
        $msg = $ex->errorInfo[2];
    endif;
    $arr = array("status" => 400, "msg" => $msg, "result" => array());
    }
    return \Response::json($arr);
        }

}