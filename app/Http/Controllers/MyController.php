<?php

/**
 * MyController.php
 *
 * Handles common/essentials functionalities and related operations for this project.
 *
 * @access    public
 * @package   angebotmanager
 * @author    Ashwin Gurung <ashwin.gurung@cloudyfox.com>
 * @copyright 2015-2016 Ashwin
 * @since     0.0.0
 **/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Lead as Lead;
use App\Models\Counselor as Counselor;
use App\Models\Followup as Followup;
use App\User as User;
use DateTime;
use Exception;
use Validator;
use File;
use Auth;

class MyController extends Controller
{
  public function __construct()
  {
    $this->lead_model = new Lead;
    $this->followup_model = new Followup;
    $this->counselor_model = new Counselor;
    $this->user_model = new User;
  }

  /**
   * [constructData description]
   * @param  [type] $request [description]
   * @return [type]          [description]
   */
  public function constructData($request)
  {
    $post_data = array();
    foreach ($request->input() as $key => $value) {
        $post_data[$key] = $value;
    }
    return $post_data;
  }

  /**
   * [getDateFormat description]
   * @param  [type] $input_date [description]
   * @return [type]             [description]
   */
  public function getDateFormat($input_date){
    return DateTime::createFromFormat('d/m/Y', $input_date)->format('Y-m-d');
  }

  /**
   * [generateRandomCode description]
   * @param  integer $length [description]
   * @return [type]          [description]
   */
  public function generateRandomCode($length = 8) {
    $randstring = '';
    $string_array = array_merge(range(0, 9), range('a', 'z'), range('A', 'Zå'));
    for ($i = 0; $i < $length; $i++) {
      $randstring .= $string_array[array_rand($string_array)];
    }
    return $randstring;
  }

  /**
   * Return true if file exists otherwise return false.
   * @param  [string] $file_path
   * @return [bool]
   */
  public function checkIfFileExists($file_path)
  {
    if (File::exists($file_path)):
      return true;
    else:
      return false;
    endif;
  }

  /**
   * Return logged in user's info.
   * @return [object] User
   */
  public function loggedInInfo(){
    return Auth::user();
  }

  /**
   * [loggedInId description]
   * @return [type] [description]
   */
  public function loggedInId(){
    return Auth::user()->id;
  }

  /**
   * [getLoggedInInof description]
   * @return [type] [description]
   */
  public function getLoggedInInfo(){
    return $this->user_model->getUser(Auth::user()->id);
  }

  /**
   * [loggedInCounselor description]
   * @return [type] [description]
   */
  public function loggedInCounselor(){
    $counselor_info = $this->getLoggedInInfo();
    return $counselor_info[0]->counselors;
  }

}
