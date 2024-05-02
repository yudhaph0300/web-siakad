<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use App\Http\Requests\StoreLearningRequest;
use App\Http\Requests\UpdateLearningRequest;

class LearningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'data pembelajaran';
        $learnings = Learning::all();

        return view('pages.admin.data-pembelajaran.index', compact('title', 'learnings'));
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
    public function store(StoreLearningRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Learning $learning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Learning $learning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLearningRequest $request, Learning $learning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Learning $learning)
    {
        //
    }
}
