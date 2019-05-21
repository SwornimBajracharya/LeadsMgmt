<?php

namespace App\Http\Controllers\Lead;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyController;
use App\Http\Requests\PostNewLeadRequest;
use App\Http\Requests\PostNewFollowupRequest;

class LeadController extends MyController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getIndex()
  {
    $leads = $this->lead_model->getLeads($this->loggedInCounselor()->id);
    return view('leads.list_view', compact('leads'));
  }

  /**
   * [getNew description]
   * @return [type] [description]
   */
  public function getNew(){
    return view('leads.add_view');
  }

  /**
   * [postNew description]
   * @param  PostNewLeadRequest $request [description]
   * @return [type]                      [description]
   */
  public function postNew(PostNewLeadRequest $request){
    $data = $this->constructData($request);
    $data['counselor_id'] = $this->getLoggedInInfo()[0]->counselors->id;
    $this->lead_model->insertLead($data);
    return redirect('lead/new')->with('success_notice', 'New lead info has been registered successfully.');
  }

  public function getEdit($id){

  }

  public function postEdit(){

  }

  /**
   * [getChangeStatus description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function getFollowUp($id){
    $lead_info = $this->lead_model->getLead($id);
    if($lead_info->isEmpty()){
      return redirect('lead')->with('error_notice', 'Your request could not perform now. Please try again later.');
    }
    $followups = $this->validateFollowup($id);
    $sn_followups = $followups->count();
    if($sn_followups >= 8){
      return redirect('lead')->with('error_notice', 'You cannot make new followup of the selected lead. Maximum number of followups is 8.');
    }
    $lead_info['sn_followups'] = $sn_followups;
    return view('leads.followup_new_view', compact('lead_info'));
  }

  /**
   * [postChangeStatus description]
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function postFollowUp(PostNewFollowupRequest $request){
    $data = $this->constructData($request);
    $this->followup_model->insertFollowup($data);
    return redirect('lead')->with('success_notice', 'Lead followup has been made successfully.');
  }

  /**
   * [getCovertToStudent description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function getCovertToStudent($id){
    $lead_info = $this->lead_model->getLead($id);
    if($lead_info->isEmpty()){
      return redirect('lead')->with('error_notice', 'Could not perform your action now. Please try again later.');
    }
    $data = ['is_student' => 1];
    $this->lead_model->updateLead($id, $data);
    return redirect('lead')->with('success notice', 'Selected lead has been converted to student successfully.');

  }

  /**
   * [getStudents description]
   * @return [type] [description]
   */
  public function getStudents(){
    $leads = $this->lead_model->getStudents($this->loggedInCounselor()->id);
    return view('leads.students_list_view', compact('leads'));
  }

  /**
   * [validateFollowup description]
   * @param  [type] $lead_id [description]
   * @return [type]          [description]
   */
  public function validateFollowup($lead_id){
    $followups = $this->followup_model->getFollowups($lead_id);
    $leads = $this->lead_model->getLeads($this->loggedInCounselor()->id);
    $followups = $followups->filter(function($item) use($leads){
                $flag = false;
                foreach ($leads as $lead) {
                  if($item->lead_id == $lead->id){
                    $flag = true;
                  }
                }
                return $flag;
              });
    return $followups;
  }

  /**
   * [getFollowups description]
   * @return [type] [description]
   */
  public function getFollowups(){
    $followups = $this->followup_model->getAllFollowups();
    $leads = $this->lead_model->getLeads($this->loggedInCounselor()->id);
    $followups = $followups->filter(function($item) use($leads){
                $flag = false;
                foreach ($leads as $lead) {
                  if($item->lead_id == $lead->id){
                    $flag = true;
                  }
                }
                return $flag;
              });
    return view('leads.followup_list_view', compact('followups'));
  }

}
