<?php

namespace App\Http\Controllers;

use App\Auth;
use App\Leads\Source;
use App\Http\Resources\Leads\Source as SourceResource;
use Illuminate\Http\Request;

class SourceController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Source::class);

        //return Source::all()->sortBy('created_at', 2);
        return SourceResource::collection( Source::orderBy('created_at', 'desc')->get() );
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
        $this->authorize('store', Source::class);


        $sourceName = $request->input('source_name');

        $sourceTypeId = $request->input('source_type_id');

        $source = new Source;
        
        $source->name = $sourceName; 

        $source->source_type_id = $sourceTypeId;

        $source->company_id = auth()->user()->company->id;

        $source->save();
        

        return $source;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Leads\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leads\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leads\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leads\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        //
    }
}
