<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyController;

class DashboardController extends MyController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getIndex()
  {
    $user_type = \Auth::user()->user_type;
    if($user_type == "counselor"){
      $leads = $this->lead_model->getLeads($this->loggedInCounselor()->id);
      return view('dashboard.counselor_dashboard_view', compact('leads'));
    }
    return view('dashboard.admin_dashboard_view');
  }
}
