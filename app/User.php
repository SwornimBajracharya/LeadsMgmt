<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
  use Authenticatable, Authorizable, CanResetPassword;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'users';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'email', 'password'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['password', 'remember_token'];

  /**
   * [counselor description]
   * @return [type] [description]
   */
  public function counselors(){
    return $this->hasOne('App\Models\Counselor', 'user_id');
  }

  /**
   * [setPasswordAttribute description]
   * @param [type] $value [description]
   */
  public function setPasswordAttribute($value){
    $this->attributes['password'] = bcrypt($value);
  }

  /**
   * [insertUser description]
   * @param  [type] $data [description]
   * @return [type]       [description]
   */
  public function insertUser($data){
    return $this->create($data);
  }

  /**
   * [deleteUser description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function deleteUser($id){
    return $this->where('id', $id)->delete();
  }

  /**
   * [updateUser description]
   * @param  [type] $id   [description]
   * @param  [type] $data [description]
   * @return [type]       [description]
   */
  public function updateUser($id, $data){
    return $this->where('id', $id)->update($data);
  }

  /**
   * [getUser description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function getUser($id){
    return $this->where('id', $id)->get();
  }


}//End Class, User
