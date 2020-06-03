<?php

namespace App\Http\Controllers;


use App\Auth;
use App\Leads\SourceType;
use App\Http\Resources\Leads\SourceType as SourceTypeResource;
use Illuminate\Http\Request;

class SourceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', SourceType::class);

        return SourceTypeResource::collection( SourceType::all() );
    }



    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Leads\SourceType  $sourceType
     * @return \Illuminate\Http\Response
     */
    public function show(SourceType $sourceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leads\SourceType  $sourceType
     * @return \Illuminate\Http\Response
     */
    public function edit(SourceType $sourceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leads\SourceType  $sourceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SourceType $sourceType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leads\SourceType  $sourceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SourceType $sourceType)
    {
        //
    }
}
