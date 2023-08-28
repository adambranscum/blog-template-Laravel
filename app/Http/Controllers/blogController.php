<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\post;
use App\Models\carousel;
use DB;

class blogController extends Controller
{
    public function index(){
        $adv = carousel::all();
        $posts = post::orderBy('id', 'desc')->where('post_status', '=', 1)->get();
        $recentPosts = DB::table('posts')
                ->where('post_status', '=', 1)
                ->orderBy('id', 'desc')
                ->take(5)
                ->get();

        
       
        return view('blog.index')->with(['recentPosts' => $recentPosts, 'adv' => $adv, 'posts' => $posts]);
        
        
    }

    public function view(post $post){
        return view('blog.post', ['post' => $post]);
    }

    public function store(Request $request){

        $request->validate([
            'post_author' => 'required',
            'post_title' => 'required',
            'post_tags' => 'nullable',
            'post_excert' => 'nullable',
            'file' => 'required',
            'post' => 'required',
            'post_status' => 'required'
        ]);
        
        $post_author = $request->input('post_author');
        $post_title = $request->input('post_title');
        $post_tags = $request->input('post_tags');
        $post_excert = $request->input('post_excert');
        $post = $request->input('post');
        $post_status = $request->input('post_status');

            if($request)
            {
            $allowedfileExtension=['pdf','jpg','png','docx', 'txt'];
            $file = $request->file('file');
            $filename = time().'_'.$request->file->getClientOriginalName();
            $extension = $request->file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);
            //dd($check);
            if($check)
            {
            $request->file->storeAs('./public/headers', $filename);
            $user = DB::table('posts')->insert([
                'post_author' => $post_author,
                'post_title' => $post_title,
                'post_tags' => $post_tags,
                'post_excert' => $post_excert,
                'post_header' => $filename,
                'post' => $post,
                'post_status' => $post_status,
                'created_at' => Now(),
                'updated_at' => Now(),
            ]);


                        
                      }
                      return redirect(route('dashboard'))->with('success', 'Blog has been posted successfully!');

}
else
{
    return redirect(route('dashboard'))->with('error', 'Blog post failed to post.');
}
    }

    public function landing(){
        $posts = post::orderBy('id', 'desc')->where('post_status', '=', 1)->get();
        $posts_inactive = post::orderBy('id', 'desc')->where('post_status', '=', 0)->get();
        $adv = carousel::all();

        return view('dashboard')->with(['posts_inactive' => $posts_inactive, 'adv' => $adv, 'posts' => $posts]);
        
    }

    public function delete(post $post){
        $file = $post->post_header;
        if(Storage::exists('./public/headers/'.$file)){
            Storage::delete('./public/headers/'.$file);
            Storage::delete('headers/'.$file);
            $post->delete();

          
        }else{
            dd('File does not exist.');
        }
       

        return redirect(route('dashboard'))->with('success', 'Product deleted Succesffully');
    }

    public function edit(post $post){
        return view('admin.edit', ['post' => $post]);
    }

    public function update(Request $request, post $post)
    {
        $request->validate([
            'post_author' => 'required',
            'post_title' => 'required',
            'post_tags' => 'nullable',
            'post_excert' => 'nullable',
            'post' => 'required',
            'post_status' => 'required'
        ]);

        $post->update($request->all());

        return redirect()->route('dashboard')
                        ->with('success','Product updated successfully');
    }

    public function upload(post $post){
        return view('admin.upload', ['post' => $post]);
    }
   
    public function uploadFile(Request $request, post $post)
    {
        $request->validate([
            'old_file' => 'required',
            'file' => 'required',
            
        ]);

        if ($request){
            $allowedfileExtension=['pdf','jpg','png','docx', 'txt'];
            $file = $request->file('file');
            $filename = time().'_'.$request->file->getClientOriginalName();
            $extension = $request->file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension); 

             //dd($check);
             if($check)
             {
            if($request->file->storeAs('./public/headers', $filename)){

             $old_file = $request->old_file;
             if(Storage::exists('./public/headers/'.$old_file)){
                 Storage::delete('./public/headers/'.$old_file);
                 Storage::delete('headers/'.$old_file);

                if($post->update(['post_header' => $filename])){
                    return redirect()->route('dashboard')
                        ->with('success','Product updated successfully');
                }
                else {
                    dd("unable to uplaoad to db");
                }
        }
        else {
            if($post->update(['post_header' => $filename])){
                return redirect()->route('dashboard')
                    ->with('success','Product updated successfully');
            }
            else {
                dd("unable to uplaoad to db");
            }
        }
    }
    else {
        dd("file di not save");
    }
        
    }

}
    }
}