<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Carbon;

class Followup extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'followups';
  /**
   * [$fillable description]
   * @var array
   */
  protected $fillable = ['lead_id', 'feedback', 'followup_date', 'remarks'];

  /**
   * [leads description]
   * @return [type] [description]
   */
  public function leads(){
    return $this->belongsTo('App\Models\Lead', 'lead_id');
  }

  /**
   * [setFollowupDateAttribute description]
   * @param [type] $value [description]
   */
  // public function setFollowupDateAttribute($value){
    // $value = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    // $this->attributes['followup_date'] = $value;
  // }

  /**
   * [getFollowups description]
   * @param  [type] $lead_id [description]
   * @return [type]          [description]
   */
  public function getFollowups($lead_id){
    return $this->where('lead_id', $lead_id)
                ->get();
  }

  /**
   * [insertFollowup description]
   * @param  [type] $data [description]
   * @return [type]       [description]
   */
  public function insertFollowup($data){
    $data = $this->setNullAttributes($data);
    return $this->create($data);
  }

  /**
   * [setNullAttributes description]
   * @param [type] $data [description]
   */
  public function setNullAttributes($data){
    $null_attributes = ['remarks'];
    foreach ($null_attributes as $attribute) {
      if(isset($data[$attribute]) && !$data[$attribute]){
        $data[$attribute] = null;
      }
    }
    return $data;
  }

  /**
   * [getAllFollowups description]
   * @return [type] [description]
   */
  public function getAllFollowups(){
    return $this->all();
  }

}//End Class
