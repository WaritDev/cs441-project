<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PipelineStage;
use App\Models\Deal;

class PipelineStageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stages = PipelineStage::orderBy('position')->get();
        // Load deals with customer and nested organization data
        $deals = Deal::with(['customer.organization'])->get();

        return view('pipeline-stages.index', compact('stages', 'deals'));
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
        //
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
