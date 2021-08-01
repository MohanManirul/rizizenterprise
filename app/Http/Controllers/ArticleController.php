<?php
namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;
use Response;
class ArticleController extends Controller
{
    public function index()
    {
        return view('article-form');
    }


public function uploadImage(Request $request) { 
    
   

//   if($request->hasFile('upload')) {
//             $originName = $request->file('upload')->getClientOriginalName();
//             $fileName = pathinfo($originName, PATHINFO_FILENAME);
//             $extension = $request->file('upload')->getClientOriginalExtension();
//             $fileName = $fileName.'_'.time().'.'.$extension;
        
//             $request->file('upload')->move(public_path('images'), $fileName);
   
//             $CKEditorFuncNum = $request->input('CKEditorFuncNum');
//             $url = asset('images/'.$fileName); 
//             $msg = 'Image uploaded successfully'; 
//             $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
//             @header('Content-type: text/html; charset=utf-8'); 
//             echo $response;
//         }

        
        $request->validate([
            'title'        => 'required|max:150',
            'description'  => 'required',
          ]);
          //dd($request->all());
          $product = new  Article();
      
          $product->title = $request->title;
          $product->description = ($request->description);
          $product->save();
          return back(); 
    
    }  
}
?>