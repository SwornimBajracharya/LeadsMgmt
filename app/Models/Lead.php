<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
  use SoftDeletes;
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'leads';
  /**
   * [$dates description]
   * @var array
   */
  protected $dates = ['deleted_at'];
  /**
   * [$fillable description]
   * @var array
   */
  protected $fillable = ['counselor_id', 'name', 'email', 'phone', 'mobile_phone', 'address', 'status', 'is_student', 'semester'];
  /**
   * [counselor description]
   * @return [type] [description]
   */
  public function counselors(){
    return $this->belongsTo('App\Models\Counselor', 'counselor_id');
  }
  /**
   * [followups description]
   * @return [type] [description]
   */
  public function followups(){
    return $this->hasMany('App\Models\Followup', 'lead_id');
  }

  /**
   * [getLeads description]
   * @param  [type] $counselor_id [description]
   * @return [type]               [description]
   */
  public function getLeads($counselor_id){
    return $this->where('counselor_id', $counselor_id)
                ->where('is_student', 0)
                ->get();
  }

  /**
   * [getStudents description]
   * @param  [type] $counselor_id [description]
   * @return [type]               [description]
   */
  public function getStudents($counselor_id){
    return $this->where('counselor_id', $counselor_id)
                ->where('is_student', 1)
                ->get();
  }

  /**
   * [setNullAttributes description]
   * @param [type] $data [description]
   */
  public function setNullAttributes($data){
    $null_attributes = ['phone', 'semester'];
    foreach ($null_attributes as $attribute) {
      if(isset($data[$attribute]) && !$data[$attribute]){
        $data[$attribute] = null;
      }
    }
    return $data;
  }

  /**
   * [insertLead description]
   * @param  [type] $data [description]
   * @return [type]       [description]
   */
  public function insertLead($data){
    $data = $this->setNullAttributes($data);
    return $this->create($data);
  }

  /**
   * [updateLead description]
   * @param  [type] $id   [description]
   * @param  [type] $data [description]
   * @return [type]       [description]
   */
  public function updateLead($id, $data){
    $data = $this->setNullAttributes($data);
    return $this->where('id', $id)->update($data);
  }

  /**
   * [getLead description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function getLead($id){
    return $this->where('id', $id)
                ->get();
  }

  /**
   * [getAllLeads description]
   * @return [type] [description]
   */
  public function getAllLeads(){
    return $this->all();
  }



}//End Class
