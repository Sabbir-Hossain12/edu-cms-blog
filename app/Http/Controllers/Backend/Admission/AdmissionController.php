<?php

namespace App\Http\Controllers\Backend\Admission;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admission = Admission::first();
        
        return view('backend.pages.admission.index',compact('admission'));
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
        $admission = new Admission();
        $admission->title1 = $request->title1;
        $admission->desc1 = $request->desc1;

        $admission->title2 = $request->title2;
        $admission->desc2 = $request->desc2;

        $admission->title1 = $request->title;
        $admission->desc1 = $request->desc1;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
