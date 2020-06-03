<?php

namespace App\Http\Controllers;

use App\Route;
use App\Http\Resources\Route as RouteResource;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Route::all();
    }



}
