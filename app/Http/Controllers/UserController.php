<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Role as RoleResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user = new User;
       
       $user->email = $request->input('email');

       $user->save();

       $user->giveRole($request->input('role_slug'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new UserResource(User::find($id));
    }


     /**
     * Get a user's permissions, using either the passed id or the authenticated user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUserPermissions($id = NULL)
    {
        if(! is_null($id)) {

            return RoleResource::collection(User::findOrFail($id)->roles);

        }
        else {

            return RoleResource::collection(auth()->user()->roles);
        }


        return false;
    }


    /**
     * Display the authenticated user, or NULL if there isn't one.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function authUser(Request $request)
    {
        if(auth()->check()) {

            return new UserResource(auth()->user());
        }
        
        return NULL;
    }



    /**
     * Display the authenticated user, or NULL if there isn't one.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        
        
        return NULL;
    }







    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
