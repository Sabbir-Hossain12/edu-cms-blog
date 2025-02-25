<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Controller;
use App\Models\CampusNew;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $news = CampusNew::all();


            return DataTables::of($news)
                ->addColumn('status', function ($new) {

        
                        if ($new->status == 1) {
                            return ' <a class="status" id="adminStatus" href="javascript:void(0)"
                                               data-id="'.$new->id.'" data-status="'.$new->status.'"> <i
                                                        class="fa-solid fa-toggle-on fa-2x"></i>
                                            </a>';
                        } else {
                            return '<a class="status" id="adminStatus" href="javascript:void(0)"
                                               data-id="'.$new->id.'" data-status="'.$new->status.'"> <i
                                                        class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                                            </a>';
                        }
          

                })

                ->addColumn('action', function ($new) {

                    $editAction = '';
                    $deleteAction = '';
                    
                        $editAction= '<a class="editButton btn btn-sm btn-primary" href="javascript:void(0)"
                                    data-id="'.$new->id.'" data-bs-toggle="modal" data-bs-target="#editAdminModal">
                                    <i class="fas fa-edit"></i></a>';

                        

                        $deleteAction= '<a class="btn btn-sm btn-danger" href="javascript:void(0)"
                                    data-id="'.$new->id.'" id="deleteAdminBtn""> 
                                    <i class="fas fa-trash"></i></a>';



                    return '<div class="d-flex gap-3"> '.$editAction.$deleteAction.'</div>';


                })
                ->rawColumns(['action', 'status'])
                ->make(true);
            
        }
        
        return view('backend.pages.news.index');
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
        $new = new CampusNew();
        $new->title = $request->title;
        $new->short_desc = $request->short_desc;
        $new->long_desc = $request->long_desc;
        $new->video_link = $request->video_link;
        $new->category_name = $request->category_name;
        $new->status = $request->status;
        
        if ($request->hasFile('thumbnail_img')) {
            $file = $request->file('thumbnail_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/news'), $filename);
            $new->thumbnail_img = $filename;
        }
        
        if ($request->hasFile('main_img')) {
            $file = $request->file('main_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/news'), $filename);
            $new->main_img = $filename;
        }
        
        if ($request->hasFile('video_thumbnail_img')) {
            $file = $request->file('video_thumbnail_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/news'), $filename);
            $new->video_thumbnail_img = $filename;
        }
        
        $new->save();


        return response()->json(['message' => 'success'], 201);
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
        $new = CampusNew::find($id);
        $new->title = $request->title;
        $new->short_desc = $request->short_desc;
        $new->long_desc = $request->long_desc;
        $new->video_link = $request->video_link;
        $new->category_name = $request->category_name;
        $new->status = $request->status;

        if ($request->hasFile('thumbnail_img')) {
            
            if ( $new && file_exists(public_path($new->thumbnail_img)))
            {
                unlink(public_path($new->thumbnail_img));
            }
            
            $file = $request->file('thumbnail_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/news'), $filename);
            $new->thumbnail_img = $filename;
        }

        if ($request->hasFile('main_img')) {
            if ( $new && file_exists(public_path($new->main_img)))
            {
                unlink(public_path($new->main_img));
            }
            $file = $request->file('main_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/news'), $filename);
            $new->main_img = $filename;
        }

        if ($request->hasFile('video_thumbnail_img')) {
            
            if ( $new && file_exists(public_path($new->video_thumbnail_img)))
            {
                unlink(public_path($new->video_thumbnail_img));
            }
            $file = $request->file('video_thumbnail_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/news'), $filename);
            $new->video_thumbnail_img = $filename;
        }

        $new->save();


        return response()->json(['message' => 'success'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = CampusNew::findOrFail($id);

        if ($news) {
            $news->delete();

            return response()->json(['messsage' => 'success'], 200);
        }
        return response()->json(['messsage' => 'error'], 402);
    }
}
