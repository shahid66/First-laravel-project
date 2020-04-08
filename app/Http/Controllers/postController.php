<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class postController extends Controller
{
    public function storePost(Request $request)
    {
    	$data=array();
    	$data['title']=$request->title;
    	$data['catagorie_id']=$request->catagorie_id;
    	$data['details']=$request->details;
    	$image=$request->file('image');

    	if($image)
    	{
    		$image_name=hexdec(uniqid());
    		$ext=strtolower($image->getClientOriginalExtension());
    			if(in_array($ext, ['png','jpg','jpeg']))
    			{
    				$image_full_name=$image_name.'.'.$ext;
		    		$upload_path='public/fontend/postImages/';
		    		$image_url=$upload_path.$image_full_name;
		    		$success=$image->move($upload_path,$image_full_name);
		    		$data['image']=$image_url;
		    		DB::table('posts')->insert($data);
		    		$notification=array
		    		(
    	 				'messege'=>'Successfully Inserted','alert-type'=>'success'
    	 			);

    	 			return Redirect()->back()->with($notification);
    			}
    		
    	}
    	else
    	{
    		DB::table('posts')->insert($data);
    		$notification=array
		    		(
    	 				'messege'=>'Successfully Inserted','alert-type'=>'success'
    	 			);
    	 			return Redirect()->back()->with($notification);

    	}
    }

    public function allPost()
    {
    	$show=DB::table('posts')->join('catagories','posts.catagorie_id','catagories.id')
    	->select('posts.*','catagories.name')->get();
    	return view('post.allpost',compact('show'));
    	return response()->json($show);
    }
    public function viewPost($id)
    {
    	$show=DB::table('posts')->join('catagories','posts.catagorie_id','catagories.id')->where('posts.id',$id)
    	->select('posts.*','catagories.name')->first();
    	return view('post.viewPost',compact('show'));
    }

    public function editePost($id)
    {
    	$cata=DB::table('catagories')->get();
    	$post=DB::table('posts')->where('id',$id)->first();
    	return view('post.editPost',compact('cata','post'));
    }
    public function updatepost(Request $request,$id)
    {
    	$data=array();
    	
    	$data['title']=$request->title;
    	$data['catagorie_id']=$request->catagorie_id;
    	$data['details']=$request->details;
    	$data['details']=$request->details;
    	$image=$request->file('image');

    	if($image)
    	{
    		$image_name=hexdec(uniqid());
    		$ext=strtolower($image->getClientOriginalExtension());
    			if(in_array($ext, ['png','jpg','jpeg']))
    			{
    				$image_full_name=$image_name.'.'.$ext;
		    		$upload_path='public/fontend/postImages/';
		    		$image_url=$upload_path.$image_full_name;

		    		unlink($request->old_photo);
		    		$success=$image->move($upload_path,$image_full_name);
		    		$data['image']=$image_url;
		    		

		    		DB::table('posts')->where('id',$id)->update($data);

		    		$notification=array
		    		(
    	 				'messege'=>'Successfully Inserted','alert-type'=>'success'
    	 			);

    	 			return Redirect()->back()->with($notification);
    			}
    		
    	}
    	else
    	{
    		$data['image']=$request->old_photo;
    		DB::table('posts')->where('id',$id)->update($data);
    		$notification=array
		    		(
    	 				'messege'=>'Successfully Inserted','alert-type'=>'success'
    	 			);
    	 			return Redirect()->back()->with($notification);

    	}
    }


    public function deletepost($id)
    {
    	$post=DB::table('posts')->where('id',$id)->first();
    	$image=$post->image;
    	$delete=DB::table('posts')->where('id',$id)->delete();
    	 if($delete)
    	 {
    	 	unlink($image);
    	 	$notification=array(
    	 		'messege'=>'Successfully Deleted','alert-type'=>'success'
    	 	);
    	 	return Redirect()->back()->with($notification);
    	 }
    	 else
    	 {
    	 	$notification=array(
    	 		'messege'=>'Somthing was wrong','alert-type'=>'error'
    	 	);
    	 	return Redirect()->back()->with($notification);
    	 }
    }

}
