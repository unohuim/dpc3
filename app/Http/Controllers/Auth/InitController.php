<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;

class InitController extends Controller
{

	public function initUser(Request $request)
	{
		$company = new Company;
		
		$company->name = $request->company_name;

		$company->save();

		$request->user()->init($request, $company);

		
		return redirect($request->request_path);
	}



    public function showInitUser(Request $request)
    {
    	$requestPath = $request->requestPath;

    	return view('auth.init', compact('requestPath'));
    }


    public function test()
    {
    	return "testing ";
    }
}
