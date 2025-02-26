<?php

namespace App\Http\Controllers\Backend\Academics;

use App\Http\Controllers\Controller;
use App\Models\AcademicCategory;
use App\Models\CampusNew;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AcademicsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $academicsCategories = AcademicCategory::all();


            return DataTables::of($academicsCategories)
                ->addColumn('status', function ($academicsCategory) {


                    if ($academicsCategory->status == 1) {
                        return ' <a class="status" id="adminStatus" href="javascript:void(0)"
                                               data-id="'.$academicsCategory->id.'" data-status="'.$academicsCategory->status.'"> <i
                                                        class="fa-solid fa-toggle-on fa-2x"></i>
                                            </a>';
                    } else {
                        return '<a class="status" id="adminStatus" href="javascript:void(0)"
                                               data-id="'.$academicsCategory->id.'" data-status="'.$academicsCategory->status.'"> <i
                                                        class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                                            </a>';
                    }


                })

                ->addColumn('action', function ($academicsCategory) {

                    $editAction = '';
                    $deleteAction = '';

                    $editAction= '<a class="editButton btn btn-sm btn-primary" href="javascript:void(0)"
                                    data-id="'.$academicsCategory->id.'" data-bs-toggle="modal" data-bs-target="#editAdminModal">
                                    <i class="fas fa-edit"></i></a>';



                    $deleteAction= '<a class="btn btn-sm btn-danger" href="javascript:void(0)"
                                    data-id="'.$academicsCategory->id.'" id="deleteAdminBtn""> 
                                    <i class="fas fa-trash"></i></a>';



                    return '<div class="d-flex gap-3"> '.$editAction.$deleteAction.'</div>';


                })
                ->rawColumns(['action', 'status'])
                ->make(true);

        }
        return view('backend.pages.academics_category.index');
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
        $academicCategory = new AcademicCategory();
        $academicCategory->title = $request->title;
        $academicCategory->short_desc = $request->short_desc;
        $academicCategory->long_desc = $request->long_desc;
        $academicCategory->link = $request->link;
        $academicCategory->status = $request->status;

        if ($request->hasFile('thumbnail_img')) {
            $file = $request->file('thumbnail_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/academics/'), $filename);
            $academicCategory->thumbnail_img ='backend/upload/academics/'. $filename;
        }

        if ($request->hasFile('main_img')) {
            $file = $request->file('main_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/academics/'), $filename);
            $academicCategory->main_img ='backend/upload/academics/'. $filename;
        }

        $academicCategory->save();

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
        $new = AcademicCategory::find($id);
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
        $academicCategory = AcademicCategory::find($id);
        $academicCategory->title = $request->title;
        $academicCategory->short_desc = $request->short_desc;
        $academicCategory->long_desc = $request->long_desc;
        $academicCategory->link = $request->link;
        $academicCategory->status = $request->status;

        if ($request->hasFile('thumbnail_img')) {

            if ( $academicCategory && file_exists(public_path($academicCategory->thumbnail_img)))
            {
                unlink(public_path($academicCategory->thumbnail_img));
            }
            $file = $request->file('thumbnail_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/academics/'), $filename);
            $academicCategory->thumbnail_img ='backend/upload/academics/'. $filename;
        }

        if ($request->hasFile('main_img')) {

            if ( $academicCategory && file_exists(public_path($academicCategory->main_img)))
            {
                unlink(public_path($academicCategory->main_img));
            }
            
            $file = $request->file('main_img');
            $filename = time() .uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/academics/'), $filename);
            $academicCategory->main_img ='backend/upload/academics/'. $filename;
        }

        $academicCategory->save();

        return response()->json(['message' => 'success'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = AcademicCategory::findOrFail($id);

        if ($news) {
            $news->delete();

            return response()->json(['messsage' => 'success'], 200);
        }
        return response()->json(['messsage' => 'error'], 402);
    }

    public function changeAcademicCategoryStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $news = AcademicCategory::findOrFail($id);
        $news->status = $stat;
        $news->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }
}
