<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\carousel;
use DB;

class carouselController extends Controller
{
    public function delete(carousel $post){
        $file = $post->filename;
        $filename='./public/carousel'.$file;
        File::delete($filename);
        $post->delete();
        return redirect(route('dashboard'))->with('success', 'Product deleted Succesffully');
    }

    public function store(Request $request){

        $request->validate([
            'url' => 'required',
            'alt' => 'required',
            'file' => 'required',
        ]);

        $url = $request->input('url');
        $alt = $request->input('alt');

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
            $request->file->storeAs('./public/carousel', $filename);
            if ($request){
            $user = DB::table('carousel')->insert([
                'url' => $url,
                'alt' => $alt,
                'file' => $filename,
                'created_at' => Now(),
                'updated_at' => Now(),
            ]);
            return redirect(route('dashboard'))->with('success', 'Image uploaded Succesffully');
        }
        else {
            dd();
        }
        }
        else {
            dd('File did not upload');
        }
    }
   else {
    dd('File does not exist.');
   }
}

public function edit(carousel $adv){
    return view('carousel.edit', ['add' => $adv]);
}

public function update(Request $request, post $adv)
{
    $request->validate([
        'url' => 'required',
        'alt' => 'required',
    ]);

    $adv->update($request->all());

    return redirect()->route('dashboard')
                    ->with('success','Product updated successfully');
}
}
