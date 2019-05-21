<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyController;

class ReportController extends MyController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getIndex()
  {
    //
  }

  /**
   * [getCounselorReport description]
   * @return [type] [description]
   */
  public function getCounselorReport(){
    $counselors = $this->counselor_model->getAll();
    return view('reports.counselor_report_view', compact('counselors'));
  }

  /**
   * [getStatusReport description]
   * @return [type] [description]
   */
  public function getStatusReport(){
    $leads = $this->lead_model->getAllLeads();
    return view('reports.status_report_view', compact('leads'));
  }
  
  /**
   * [getActiveLeadsReport description]
   * @return [type] [description]
   */
  public function getActiveLeadsReport(){

  }

}
