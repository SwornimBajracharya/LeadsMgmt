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
              <h3>{{ isset($counselor_info) ? 'Edit' : 'Add' }} Counselor Page</h3>
              <div class="row">
                <p class="pull-left">
                  @if(isset($counselor_info))
                    You can update the counselor's info from here.
                  @else
                    You can register new counselor from here.
                  @endif
                </p>
                <p class="pull-right">Counselor / <strong>{{ isset($counselor_info) ? 'Edit' : 'Add' }}</strong></p>
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
          <div class="panel panel-heading">Enter following fields to {{ isset($counselor_info) ? "edit counselor's info." : 'register new counselor.' }}</div>
          <div class="panel panel-default">
            <div class="panel-body" style="border: none;">
              <form class="form-no-horizontal-spacing" id="" method="post">
                {{csrf_field()}}
                <div class="row form-row">
                  <!-- Name -->
                  <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ $counselor_info[0]->users->name or old('name') }}">
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
                    <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="{{ $counselor_info[0]->users->email or old('email')}}">
                    <span class="error">
                      <label for="email" class="error" style="font-weight: normal">
                        {{ $errors->first('email') }}
                      </label>
                    </span>
                  </div>
                  <!-- Email -->
                </div>
                <div class="row form-row">
                  <!-- Contact -->
                  <div class="col-md-6">
                    <label for="contact_no">Phone</label>
                    <input type="text" class="form-control" placeholder="Contact No." name="contact_no" value="{{$counselor_info[0]->contact_no or old('contact_no')}}">
                    <span class="error">
                      <label for="contact_no" class="error" style="font-weight: normal">
                        {{ $errors->first('contact_no') }}
                      </label>
                    </span>
                  </div>
                  <!-- Contact -->
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
                    <textarea name="address" rows="3" cols="3" class="form-control" placeholder="Address Info.">{{$counselor_info[0]->address or old('address')}}</textarea>
                    <span class="error">
                      <label for="address" class="error" style="font-weight: normal">
                        {{ $errors->first('address') }}
                      </label>
                    </span>
                  </div>
                  <!-- Address -->
                  <!-- Notes -->
                  <div class="col-md-6">
                    <label for="notes">Notes</label>
                    <textarea name="notes" rows="3" cols="3" class="form-control" placeholder="Notes">{{$counselor_info[0]->notes or old('notes')}}</textarea>
                    <span class="error">
                      <label for="notes" class="error" style="font-weight: normal">
                        {{ $errors->first('notes') }}
                      </label>
                    </span>
                  </div>
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
                @if(isset($counselor_info))
                  <input type="hidden" name="user_id" value="{{$counselor_info[0]->users->id}}">
                  <input type="hidden" name="counselor_id" value="{{$counselor_info[0]->id}}">
                @endif
                <div class="row form-row">
                  <div class="col-md-12">
                    <button class="btn btn-success btn-cons" id="" type="submit">{{ isset($counselor_info) ? 'EDIT' : 'ADD' }}</button>
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
      <p class="pull-left">ISMT College</p>
      <p class="pull-right">Leads Management System</p>
    </footer>
  </div><!--page-wrapper ends here-->
  <?php echo "<pre>"; print_r(session()->all()); ?>
@stop