<?php

namespace App\Http\Controllers\Counselor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyController;
use App\Http\Requests\PostNewCounselorRequest;
use App\Http\Requests\PostEditCounselorRequest;

class CounselorController extends MyController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getIndex(){
    $counselors = $this->counselor_model->getAll();
    return view('counselors.list_view', compact('counselors'));
  }

  /**
   * [getNew description]
   * @return [type] [description]
   */
  public function getNew(){
    return view('counselors.add_view');
  }

  /**
   * [postNew description]
   * @param  PostNewCounselorRequest $request [description]
   * @return [type]                           [description]
   */
  public function postNew(PostNewCounselorRequest $request){
    $data = $this->constructData($request);
    $user_data = [
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => 'password',
      'user_type' => 'counselor'
    ];
    $insert_user = $this->user_model->insertUser($user_data);
    $counselor_data = [
      'user_id' => $insert_user->id,
      'contact_no' => $data['contact_no'],
      'address' => $data['address'],
      'notes' => $data['notes']
    ];
    $this->counselor_model->insertCounselor($counselor_data);
    return redirect('counselor/new')->with('success_notice', 'New Counselor has been registered successfully.');
  }//End postNew function

  /**
   * [deleteDelete description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function getDelete($id){
    $counselor_info = $this->counselor_model->getCounselor($id);
    if($counselor_info->isEmpty()){
      return redirect('counselor')->with('error_notice', 'Could not delete requested counselor now. Please try again later.');
    }
    $this->counselor_model->deleteCounselor($id);
    $this->user_model->deleteUser($counselor_info[0]->user_id);
    return redirect('counselor')->with('success_notice', 'Selected counselor has been deleted successfully.');
  }//End getDelete function

  /**
   * [getEdit description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function getEdit($id){
    $counselor_info = $this->counselor_model->getCounselor($id);
    if($counselor_info->isEmpty()){
      return redirect('counselor')->with('error_notice', 'Could not perform your request now. Please try again later.');
    }
    return view('counselors.add_view', compact('counselor_info'));
  }

  /**
   * [postEdit description]
   * @return [type] [description]
   */
  public function postEdit(PostEditCounselorRequest $request){
    $data = $this->constructData($request);
    $user_data = [
      'name' => $data['name'],
      'email' => $data['email'],
      'user_type' => 'counselor'
    ];
    $this->user_model->updateUser($data['user_id'], $user_data);
    $counselor_data = [
      'contact_no' => $data['contact_no'],
      'address' => $data['address'],
      'notes' => $data['notes']
    ];
    $this->counselor_model->updateCounselor($data['counselor_id'], $counselor_data);
    return redirect('counselor')->with('success_notice', 'Selected Counselor info has been updated successfully.');
  }
}//End Class