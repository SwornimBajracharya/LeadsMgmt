@extends('layouts.master')
@section('main-content')
  <!--main page wrapper starts-->
  <div id="page-wrapper" class="">
    <div class="container-fluid">
      <!--container body starts-->
      <div class="container-body">
        <!--panel for page info2-->
        <div class="row col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default page-info2">
            <div class="panel-body" style="border: none;">
              <h3>{{ isset($lead_info) ? 'Edit' : 'Register New' }} Lead</h3>
              <div class="row">
                <p class="pull-left">
                  @if(isset($lead_info))
                    You can update the lead's info from here.
                  @else
                    You can register new lead from here.
                  @endif
                </p>
                <p class="pull-right">Lead / <strong>{{ isset($lead_info) ? 'Edit' : 'Add' }}</strong></p>
              </div>
            </div>
          </div>
        </div><!--panel for page info2 ends-->
        <!--notifications-->
        @if(session('success_notice'))
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> {{session('success_notice')}}
          </div>
        @endif
        <!--notifications-->
        <!--panel1 for data/tables-->
        <div class="row col-md-12 col-sm-12 col-xs-12 panel2">
          <div class="panel panel-heading">Enter following fields to {{ isset($lead_info) ? "edit lead's info." : 'register new lead.' }}</div>
          <div class="panel panel-default">
            <div class="panel-body" style="border: none;">
              <form class="form-no-horizontal-spacing" id="" method="post">
                {{csrf_field()}}
                <div class="row form-row">
                  <!-- Name -->
                  <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ $lead_info[0]->users->name or old('name') }}">
                    <span class="error">
                      <label for="name" class="error" style="font-weight: normal">
                        {{ $errors->first('name') }}
                      </label>
                    </span>
                  </div>
                  <!-- Name -->
                  <!-- Email -->
                  <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="{{ $lead_info[0]->users->email or old('email')}}">
                    <span class="error">
                      <label for="email" class="error" style="font-weight: normal">
                        {{ $errors->first('email') }}
                      </label>
                    </span>
                  </div>
                  <!-- Email -->
                </div>
                <div class="row form-row">
                  <!-- Phone -->
                  <div class="col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{$lead_info[0]->phone or old('phone')}}">
                    <span class="error">
                      <label for="phone" class="error" style="font-weight: normal">
                        {{ $errors->first('phone') }}
                      </label>
                    </span>
                  </div>
                  <!-- Phone -->
                  <!-- Mobile Phone -->
                  <div class="col-md-6">
                    <label for="mobile_phone">Mobile Phone</label>
                    <input type="text" class="form-control" placeholder="Mobile Phone" name="mobile_phone" value="{{$lead_info[0]->mobile_phone or old('mobile_phone')}}">
                    <span class="error">
                      <label for="mobile_phone" class="error" style="font-weight: normal">
                        {{ $errors->first('mobile_phone') }}
                      </label>
                    </span>
                  </div>
                  <!-- Mobile Phone -->
                  <!-- Login password -->
                  <!-- <div class="col-md-6">
                    <label for="password">Login Password</label>
                    <input type="password" class="form-control" placeholder="**********" name="password" value="{{old('password')}}">
                    <span class="error">
                      <label for="password" class="error" style="font-weight: normal">
                        {{ $errors->first('password') }}
                      </label>
                    </span>
                  </div> -->
                  <!-- Login Password -->
                </div>
                <div class="row form-row">
                  <!-- Address -->
                  <div class="col-md-6">
                    <label for="address">Address Info</label>
                    <textarea name="address" rows="3" cols="3" class="form-control" placeholder="Address Info.">{{$lead_info[0]->address or old('address')}}</textarea>
                    <span class="error">
                      <label for="address" class="error" style="font-weight: normal">
                        {{ $errors->first('address') }}
                      </label>
                    </span>
                  </div>
                  <!-- Address -->
                  <!-- Notes -->
                  <!-- <div class="col-md-6">
                    <label for="notes">Notes</label>
                    <textarea name="notes" rows="3" cols="3" class="form-control" placeholder="Notes">{{$lead_info[0]->notes or old('notes')}}</textarea>
                    <span class="error">
                      <label for="notes" class="error" style="font-weight: normal">
                        {{ $errors->first('notes') }}
                      </label>
                    </span>
                  </div> -->
                  <!-- Notes -->
                  <!-- <div class="col-md-6">
                    <label for="notes">Status</label>
                    <select class="form-control">
                      <option>Select Below</option>
                      <option>Active</option>
                      <option>Dismissed</option>
                      <option>Expired</option>
                      <option>Postponed</option>
                    </select>
                    <span class="error">
                      <label for="notes" class="error" style="font-weight: normal">
                        {{ $errors->first('notes') }}
                      </label>
                    </span>
                  </div> -->
                </div>
                @if(isset($lead_info))
                  <input type="hidden" name="lead_id" value="{{$lead_info[0]->id}}">
                  <input type="hidden" name="counselor_id" value="{{$lead_info[0]->counselors->id}}">
                @endif
                <div class="row form-row">
                  <div class="col-md-12">
                    <button class="btn btn-success btn-cons" id="" type="submit">{{ isset($lead_info) ? 'EDIT' : 'ADD' }}</button>
                    <button class="btn btn-success btn-cons" id="" type="button"><a href="{{route('counselor.getIndex')}}" style="color:white;">CANCEL</a></button>
                  </div>
                </div><!--form actions-->
                </div>
              </form>
          </div>
          </div>
        </div><!--panel for data/tables ends-->
      </div><!--.container-body ends-->
    </div><!--.container-fluid ends-->
    <footer class="row">
      <p class="pull-left">Islington College 2015-2016</p>
      <p class="pull-right">Leads Management System</p>
    </footer>
  </div><!--page-wrapper ends here-->
  <?php //echo "<pre>"; print_r(session()->all()); ?>
@stop