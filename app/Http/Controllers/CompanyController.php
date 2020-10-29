<?php

namespace App\Http\Controllers;

use Auth;
use Log;
use Notification;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(Request $request, $companyId){
        $company = Company::findorfail($companyId);
        $company->load(['logo','goals','goals.objective']);
        return view('company.view',[
          'company' => $company
        ]);
    }

}
