<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function addblog()
    {
        return view('addblogform');
    }
   
    function save(Request $request)
    {
        //print_r($request->input());
        
        $user = new Blog;
      
        $user->title = $request->title;
        $user->description = $request->description;
        if($files=$request->file('myfile')){  
            $name=$files->getClientOriginalName();  
            $files->move('images',$name);  
            $user->bannerimage=$name;  
            }  
        $user->body = $request->body;
        echo $user->save();

    }

     public function dataview()
     {
         $cruds = Blog::all();  
  
         return view('allblogs', compact('cruds'));      
    }

    public function edit(Blog $crud,$id)
    {
        $cruds=Blog::find($id);
        return view('edit',['cruds'=>$cruds]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog  $crud,$id)
    {
         $cruds=Blog::find($id);
         $cruds->title = $request->get('title');
         $cruds->description = $request->get('description');
         if($files=$request->file('myfile')){  
            $name=$files->getClientOriginalName();  
            $files->move('images',$name);  
            $cruds->bannerimage= $request->get('$name');  
            }  
         $cruds->body = $request->get('body');
        
          $cruds->save();

          return redirect('allblogs');
    }

    public function destroy(Blog $crud,$id)
    {
        $crud=Blog::find($id);
        $crud->delete();
        return redirect('allblogs');

    }

}
