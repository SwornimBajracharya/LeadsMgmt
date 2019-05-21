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
              <h3>Followup {{$lead_info['sn_followups']+1}}</h3>
              <div class="row">
                <p class="pull-left">You can register new followups from here.</p>
                <p class="pull-right">Lead / <strong>New Followup</strong></p>
              </div>
            </div>
          </div>
        </div><!--panel for page info2 ends-->
        <!--panel1 for data/tables-->
        <div class="row col-md-12 col-sm-12 col-xs-12 panel2">
          @include('layouts.notifications')
          <div class="panel panel-heading">Enter the following details in order to make new followup of this lead.</div>
          <div class="panel panel-default">
            <div class="panel-body" style="border: none;">
              <form class="form-no-horizontal-spacing" id="" method="post">
                {{csrf_field()}}
                <div class="row form-row">
                  <!-- Followup date -->
                  <div class="col-md-6">
                    <label for="followup_date">Followup Date</label>
                    <input type="date" class="form-control" placeholder="Followup Date" name="followup_date" id="followup_date" value="{{ old('followup_date') }}">
                    <span class="error">
                      <label for="followup_date" class="error" style="font-weight: normal">
                        {{ $errors->first('followup_date') }}
                      </label>
                    </span>
                  </div>
                  <!-- Followup date ends -->
                  <!-- Select Status -->
                  <div class="col-md-6">
                    <label for="status">Lead Status</label>
                    <select class="form-control" name="status">
                      <option value="active"
                        @if($lead_info[0]->status == "active")
                          selected="selected"
                        @endif
                      >Active</option>
                      <option value="dismissed"
                      @if($lead_info[0]->status == "dismissed")
                        selected="selected"
                      @endif
                      >Dismissed</option>
                      <option value="expired"
                      @if($lead_info[0]->status == "expired")
                        selected="selected"
                      @endif
                      >Expired</option>
                      <option value="postponed"
                      @if($lead_info[0]->status == "postponed")
                        selected="selected"
                      @endif
                      >Postponed</option>
                    </select>
                    <span class="error">
                      <label for="status" class="error" style="font-weight: normal">
                        {{ $errors->first('status') }}
                      </label>
                    </span>
                  </div><!--Select Status-->
                </div>
                <div class="row form-row">
                  <!-- Feedback -->
                  <div class="col-md-6">
                    <label for="feedback">Lead's Feedback</label>
                    <textarea name="feedback" rows="4" cols="3" class="form-control" placeholder="Enter Lead's feedback">{{old('feedback')}}</textarea>
                    <span class="error">
                      <label for="feedback" class="error" style="font-weight: normal">
                        {{ $errors->first('feedback') }}
                      </label>
                    </span>
                  </div>
                  <!-- Feedback -->
                  <!-- Feedback -->
                  <div class="col-md-6">
                    <label for="remarks">Remarks</label>
                    <textarea name="remarks" rows="4" cols="3" class="form-control" placeholder="Enter remarks">{{old('remarks')}}</textarea>
                    <span class="error">
                      <label for="remarks" class="error" style="font-weight: normal">
                        {{ $errors->first('remarks') }}
                      </label>
                    </span>
                  </div>
                  <!-- Feedback -->
                </div>
                <input type="hidden" name="lead_id" value="{{$lead_info[0]->id}}">
                <div class="row form-row">
                  <div class="col-md-12">
                    <button class="btn btn-success btn-cons" id="" type="submit">SUBMIT</button>
                    <button class="btn btn-success btn-cons" id="" type="button"><a href="{{route('lead.getIndex')}}" style="color:white;">CANCEL</a></button>
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
  <?php echo "<pre>"; print_r(session()->all()); ?>
@stop