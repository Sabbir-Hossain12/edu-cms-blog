<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about=About::first();
        
        return view('backend.pages.about.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $about= new About();
        
        $about->about_title=$request->about_title;
        $about->short_desc1=$request->short_desc1;
        $about->short_desc2=$request->short_desc2;
        $about->learnmore_desc=$request->learnmore_desc;
        $about->btn_text=$request->btn_text;
        $about->btn_link=$request->btn_link;
       

        
        
        if ($request->hasFile('about_image1')) {

            $file = $request->file('about_image1');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move('backend/upload/about/', $filename);
            $about->about_image1 ='backend/upload/about/' . $filename;
        }

        if ($request->hasFile('about_image2'))
        {
            $file = $request->file('about_image2');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move('backend/upload/about/', $filename);
            $about->about_image2 ='backend/upload/about/' . $filename;
        }   
        
        $about->save();
        
        return redirect()->back()->with('success','About Section Updated Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about= About::where('id',$id)->first();

        $about->about_title=$request->about_title;
        $about->short_desc1=$request->short_desc1;
        $about->short_desc2=$request->short_desc2;
        $about->learnmore_desc=$request->learnmore_desc;
        $about->btn_text=$request->btn_text;
        $about->btn_link=$request->btn_link;




        if ($request->hasFile('about_image1')) {
            
            if ($about && file_exists(public_path($about->about_image1)))
            {
                unlink(public_path($about->about_image1));
            }

            $file = $request->file('about_image1');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move('backend/upload/about/', $filename);
            $about->about_image1 ='backend/upload/about/' . $filename;
        }

        if ($request->hasFile('about_image2'))
        {
            if ($about && file_exists(public_path($about->about_image2)))
            {
                unlink(public_path($about->about_image2));
            }
            
            $file = $request->file('about_image2');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move('backend/upload/about/', $filename);
            $about->about_image2 ='backend/upload/about/' . $filename;
        }

        $about->save();

        return redirect()->back()->with('success','About Section Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
