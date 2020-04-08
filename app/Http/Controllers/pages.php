<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class pages extends Controller
{
    public function index()
    {
        $post=DB::table('posts')->join('catagories','posts.catagorie_id','catagories.id')->select('posts.*','catagories.name')->paginate(2);
    	return view('pages.index',compact('post'));
    }
    public function about()
    {
    	return view('pages.about');
    }
     public function contact()
    {
    	return view('pages.contact');
    }
    
      public function writepost()
    {
        $show=DB::table('catagories')->get();
    	return view('post.writepost',compact('show'));

    }
     public function addcatagorie()
    {
    	return view('post.addcatagorie');
    }


    public function storeCatagorie(Request $request)
    {

    	$validatedData = $request->validate([
        'name' => 'required|unique:catagories|max:255|min:4',
        'slug' => 'required',
    	]);


    	$data=array();
    	$data['name']=$request->name;
    	$data['slug']=$request->slug;
    	 $catagorie=DB::table('catagories')->insert($data);
    	 if($catagorie)
    	 {
    	 	$notification=array(
    	 		'messege'=>'Successfully Catagoires Inserted','alert-type'=>'success'
    	 	);
    	 	return Redirect()->back()->with($notification);
    	 }
    	 else
    	 {
    	 	$notification=array(
    	 		'messege'=>'Something wrong','alert-type'=>'error'
    	 	);
    	 	return Redirect()->back()->with($notification);
    	 }
    	 
    	
    }

    public function allcatagorie()
    {
    	$show=DB::table('catagories')->get();
    	return view('post.allcatagorie',compact('show'));
    }

    public function viewcatagorie($id)
    {
    	$show=DB::table('catagories')->where('id',$id)->first();
    	return view('post.viewcatagorie',compact('show'));
    	// return response()->json($show);
    }

     public function deletecatagorie($id)
    {
    	$delete=DB::table('catagories')->where('id',$id)->delete();

    	 if($delete)
    	 {
    	 	$notification=array(
    	 		'messege'=>'Successfully Deleted','alert-type'=>'success'
    	 	);
    	 	return Redirect()->back()->with($notification);
    	 }
    	
    	
    }

    public function editecatagorie($id)
    {
    	 $show=DB::table('catagories')->where('id',$id)->first();
    	return view('post.editecatagorie',compact('show'));

    	
    }
     public function updatecatagorie(Request $request,$id)
    {
    	 

    	$validatedData = $request->validate([
        'name' => 'required|max:255|min:4',
        'slug' => 'required',
    	]);


    	$data=array();
    	$data['name']=$request->name;
    	$data['slug']=$request->slug;
    	 $catagorie=DB::table('catagories')->where('id',$id)->update($data);
    	 if($catagorie)
    	 {
    	 	$notification=array(
    	 		'messege'=>'Successfully Catagoires Update','alert-type'=>'success'
    	 	);
    	 	return Redirect()->route('allcatagorie')->with($notification);
    	 }
    	 else
    	 {
    	 	$notification=array(
    	 		'messege'=>'No any change','alert-type'=>'error'
    	 	);
    	 	return Redirect()->back()->with($notification);
    	 }

    	
    }
    
}
