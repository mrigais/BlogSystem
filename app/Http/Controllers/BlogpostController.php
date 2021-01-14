<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Blogpost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class BlogpostController extends Controller
{
    //
    public function index(){
        
        // $blogposts = DB::table('posts')->paginate(2);
        $blogposts = Blogpost::paginate(3);
        // return $blogposts;

        return view("blogsystem_pages.home", ["blogposts"=>$blogposts]);
    }

    public function create(){

        return view('admin.createbBlogpost');
    }

    public function allPosts(){
        $blogposts = Blogpost::paginate(1);

        return view('admin.posts', ["blogposts"=>$blogposts]);

    }


    public function submitForm(Request $request){

        $blogpost = new Blogpost();
        if(isset($request->image) && !empty($request->image)){
            $file_extension = strtolower($request->file('image')->extension());

            if($file_extension == 'jpg'|| $file_extension == 'jpeg'|| $file_extension == 'png'){
    
                $request->file('image')->storeAs('','blog_image_'.$request->title.'.'.$file_extension);
    
    
                $blogpost->title = $request->title;
                $blogpost->user_id = Auth::user()->id;
                $blogpost->text = $request->content;
                $blogpost->image = $request->title.'.'.$file_extension;
                $blogpost->created_at = Carbon::now();
                $blogpost->published = 0;
        
                $blogpost->save();
        
                return redirect()->back()->with(['status' => 'Your post has been successfully uploaded!!!']);
            }else{
                return redirect()->back()->with(['status' => 'Please upload image files!!']);
            }
        }else{

            return redirect()->back()->with(['status' => 'Uploading Image is mandatory']);

        }
    }

    public function deletePost($id){

        
        $post_to_be_deleted = Blogpost::find($id);
        $post_to_be_deleted->delete();

        return \redirect()->back()->with(['status' => 'Post has been successfully deleted!']);

    }

    public function edit($id){

        $post_to_be_edited = Blogpost::find($id);
        return view('admin.editpostform', ['post'=>$post_to_be_edited]);

    }

    public function currentUserPosts(){

        $is_user_logged_in = Auth::check();
        if($is_user_logged_in){
            $user_id = Auth::user()->id;
            $blogposts = DB('posts')->where('user_id', $id)->get();
            
            return view('blogsystem_pages.home', ['blogposts'=>$blogposts]);
        }else{
            return ('Kindly Login to Default Laravel home page by going to localhost/home !');
        }
        
        
    }

    public function update(Request $request){

        $blogpost = Blogpost::find($request->post_id);

        if((isset($request->image) && !empty($request->image))){
            $file_extension = strtolower($request->file('image')->extension());

            if($file_extension == 'jpg'|| $file_extension == 'jpeg'|| $file_extension == 'png'){
    
                $request->file('image')->storeAs('','blog_image_'.$request->title.'.'.$file_extension);

                $updated_data = ['title'=>$request->title, 'text'=>$request->content, 'image'=> $request->title.'.'.$file_extension];

                    Blogpost::where('id', $request->post_id)->update($updated_data);
            
                    // $existing_data = Blogpost::where('id', $request->post_id)->first();
                    // return $existing_data->title;
                
        
                return redirect()->back()->with(['status' => 'Your post has been successfully updated!!!']);
            }else{

                return redirect()->back()->with(['status' => 'Please try uploading an image!']);
            }
        
                
            }else{

                $updated_data = ['title'=>$request->title, 'text'=>$request->content];
                Blogpost::where('id', $request->id)->update($updated_data);
                return redirect()->back()->with(['status' => 'Post has been successfully updated!']);


                

            }

    }
}

    
