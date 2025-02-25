<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('backend.pages.settings.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $setting= new Setting();
        $setting->site_name= $request->site_name;
        $setting->phone_1= $request->phone_1;
        $setting->mail= $request->mail;
        $setting->fb_link= $request->fb_link;
        $setting->insta_link= $request->insta_link;
        $setting->twitter_link= $request->twitter_link;
        $setting->youtube_link= $request->youtube_link;
        $setting->linkedin_link= $request->linkedin_link;
        $setting->itunes_link= $request->itunes_link;
        $setting->p_link= $request->p_link;
        
        $setting->meta_title= $request->meta_title;
        $setting->meta_desc= $request->meta_desc;
        $setting->meta_keywords= $request->meta_keywords;

        if ($request->hasFile('meta_img')) {

            $file = $request->file('meta_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move('backend/upload/meta/', $filename);
            $setting->meta_img ='backend/upload/meta/' . $filename;
        }
        $setting->save();
        
        
        return redirect()->back()->with('success','Data Stored Successfully');
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

        $setting= Setting::where('id',$id)->first();
        $setting->site_name= $request->site_name;
        $setting->phone_1= $request->phone_1;
        $setting->mail= $request->mail;
        $setting->fb_link= $request->fb_link;
        $setting->insta_link= $request->insta_link;
        $setting->twitter_link= $request->twitter_link;
        $setting->youtube_link= $request->youtube_link;
        $setting->linkedin_link= $request->linkedin_link;
        $setting->itunes_link= $request->itunes_link;
        $setting->p_link= $request->p_link;

        $setting->meta_title= $request->meta_title;
        $setting->meta_desc= $request->meta_desc;
        $setting->meta_keywords= $request->meta_keywords;

        if ($request->hasFile('meta_img')) {
            
            if ($setting && file_exists(public_path($setting->meta_img)))
            {
                unlink(public_path($setting->meta_img));
            }

            $file = $request->file('meta_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move('backend/upload/meta/', $filename);
            $setting->meta_img ='backend/upload/meta/' . $filename;
        }
        $setting->save();


        return redirect()->back()->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
