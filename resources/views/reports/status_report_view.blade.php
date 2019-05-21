@extends('layouts.master')
@section('main-content')
  <!--main page wrapper starts-->
  <div id="page-wrapper" class="">
    <div class="container-fluid">
      <!--container body starts-->
      <div class="container-body">
        <!--panel for page info2-->
        <div class="row col-md-02 col-sm-02 col-xs-02">
          <div class="panel panel-default page-info2">
            <div class="panel-body" style="border: none;">
              <h3>Status Report Page</h3>
              <div class="row">
                <p class="pull-left">You can view the status report here.</p>
                <p class="pull-right">Reports / Status <strong>Report</strong></p>
              </div>
            </div>
          </div>
        </div><!--panel for page info2 ends-->
        <!--panel0 for data/tables-->
        <div class="row col-md-02 col-sm-02 col-xs-02 panel2">
          @include('layouts.notifications')
          <div class="panel panel-heading">Status Report Table</div>
          <div class="panel panel-default">
            <div class="panel-body" style="border: none;">
              <!--table-->
              <table id="example" class="datatable table table-striped table-bordered dt-responsive" cellspacing="0" width="000%">
                <thead>
                  <tr>
                    <th>S-N</th>
                    <th>Status</th>
                    <th>Nos. of Leads</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sn = 0; ?>
                  <tr>
                    <td>0</td>
                    <td>Active</td>
                    <td>
                      <?php $lead_nos = 0; ?>
                      @foreach ($leads as $lead)
                        @if($lead->status == "active")
                          <?php $lead_nos++; ?>
                        @endif
                      @endforeach
                      {{$lead_nos}}
                    </td>
                    <td>--</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Expired</td>
                    <td>
                      <?php $lead_nos = 0; ?>
                      @foreach ($leads as $lead)
                        @if($lead->status == "expired")
                          <?php $lead_nos++; ?>
                        @endif
                      @endforeach
                      {{$lead_nos}}
                    </td>
                    <td>--</td>

                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Dismissed</td>
                    <td>
                      <?php $lead_nos = 0; ?>
                      @foreach ($leads as $lead)
                        @if($lead->status == "dismissed")
                          <?php $lead_nos++; ?>
                        @endif
                      @endforeach
                      {{$lead_nos}}
                    </td>
                    <td>--</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Postponed</td>
                    <td>
                      <?php $lead_nos = 0; ?>
                      @foreach ($leads as $lead)
                        @if($lead->status == "postponed")
                          <?php $lead_nos++; ?>
                        @endif
                      @endforeach
                      {{$lead_nos}}
                    </td>
                    <td>--</td>
                  </tr>
                </tbody>
              </table><!--table-ends-->
            </div>
          </div>
        </div><!--panel for data/tables ends-->
      </div><!--.container-body ends-->
    </div><!--.container-fluid ends-->
    <footer class="row">
      <p class="pull-left">Islington College 2005-2006</p>
      <p class="pull-right">Leads Management System</p>
    </footer>
  </div><!--page-wrapper ends here-->
@stop