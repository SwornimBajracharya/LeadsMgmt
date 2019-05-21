<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'counselors';
  /**
   * [$fillable description]
   * @var array
   */
  protected $fillable = ['user_id', 'contact_no', 'address', 'notes'];
  /**
   * [users description]
   * @return [type] [description]
   */
  public function users(){
    return $this->belongsTo('App\User', 'user_id');
  }
  /**
   * [leads description]
   * @return [type] [description]
   */
  public function leads(){
    return $this->hasMany('App\Models\Lead', 'counselor_id');
  }

  /**
   * [getAll description]
   * @return [type] [description]
   */
  public function getAll(){
    return $this->all();
  }

  /**
   * [insertCounselor description]
   * @param  [type] $data [description]
   * @return [type]       [description]
   */
  public function insertCounselor($data){
    return $this->create($data);
  }

  /**
   * [deleteCounselor description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function deleteCounselor($id){
    return $this->where('id', $id)->delete();
  }

  /**
   * [updateCounselor description]
   * @param  [type] $id   [description]
   * @param  [type] $data [description]
   * @return [type]       [description]
   */
  public function updateCounselor($id, $data){
    return $this->where('id', $id)->update($data);
  }

  /**
   * [getCounselor description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function getCounselor($id){
    return $this->where('id', $id)->get();
  }

}
