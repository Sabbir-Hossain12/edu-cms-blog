<?php

namespace App\Http\Controllers\Backend\HealthCare;

use App\Http\Controllers\Controller;
use App\Models\HealthCare;
use App\Models\HealthCareCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HealthCareCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $categories = HealthCareCategory::all();


            return DataTables::of($categories)
                ->addColumn('status', function ($category) {


                    if ($category->status == 1) {
                        return ' <a class="status" id="adminStatus" href="javascript:void(0)"
                                               data-id="'.$category->id.'" data-status="'.$category->status.'"> <i
                                                        class="fa-solid fa-toggle-on fa-2x"></i>
                                            </a>';
                    } else {
                        return '<a class="status" id="adminStatus" href="javascript:void(0)"
                                               data-id="'.$category->id.'" data-status="'.$category->status.'"> <i
                                                        class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                                            </a>';
                    }


                })

                ->addColumn('action', function ($category) {

                    $editAction = '';
                    $deleteAction = '';

                    $editAction= '<a class="editButton btn btn-sm btn-primary" href="javascript:void(0)"
                                    data-id="'.$category->id.'" data-bs-toggle="modal" data-bs-target="#editAdminModal">
                                    <i class="fas fa-edit"></i></a>';



                    $deleteAction= '<a class="btn btn-sm btn-danger" href="javascript:void(0)"
                                    data-id="'.$category->id.'" id="deleteAdminBtn""> 
                                    <i class="fas fa-trash"></i></a>';



                    return '<div class="d-flex gap-3"> '.$editAction.$deleteAction.'</div>';


                })
                ->rawColumns(['action', 'status'])
                ->make(true);

        }
        
        return view('backend.pages.health_care_categories.index');
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
        $category = new HealthCareCategory();
        $category->title = $request->title;
        $category->short_desc = $request->short_desc;
        $category->long_desc = $request->long_desc;
        $category->link = $request->link;
        $category->type = $request->type;
        $category->status = $request->status;

        if ($request->hasFile('thumbnail_img')) {
            $file = $request->file('thumbnail_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/health/'), $filename);
            $category->thumbnail_img ='backend/upload/health/'. $filename;
        }
        
        $category->save();
        
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
        $new = HealthCareCategory::find($id);
        if ($new) {
            return response()->json(['message' => 'success', 'data' => $new], 200);
        }

        return response()->json(['message' => 'failed'], 400);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = HealthCareCategory::find($id);
        $category->title = $request->title;
        $category->short_desc = $request->short_desc;
        $category->long_desc = $request->long_desc;
        $category->link = $request->link;
        $category->type = $request->type;
        $category->status = $request->status;

        if ($request->hasFile('thumbnail_img')) {

            if ( $category && file_exists(public_path($category->thumbnail_img)))
            {
                unlink(public_path($category->thumbnail_img));
            }
            
            $file = $request->file('thumbnail_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/health/'), $filename);
            $category->thumbnail_img ='backend/upload/health/'. $filename;
        }

        $category->save();

        return response()->json(['message' => 'success'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = HealthCareCategory::findOrFail($id);

        if ($news) {
            $news->delete();

            return response()->json(['messsage' => 'success'], 200);
        }
        return response()->json(['messsage' => 'error'], 402);
    }

    public function changeHealthCategoryStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $news = CampusNew::findOrFail($id);
        $news->status = $stat;
        $news->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }
}
