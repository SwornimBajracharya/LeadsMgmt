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
              <h3>Lead Followups List Page</h3>
              <div class="row">
                <p class="pull-left">You can view your all available lead followups from here.</p>
                <p class="pull-right">Leads / Followups List <strong>All</strong></p>
              </div>
            </div>
          </div>
        </div><!--panel for page info2 ends-->
        <!--panel1 for data/tables-->
        <div class="row col-md-12 col-sm-12 col-xs-12 panel2">
          @include('layouts.notifications')
          <div class="panel panel-heading">Lead Followups Listing Table</div>
          <div class="panel panel-default">
            <div class="panel-body" style="border: none;">
              <!--table-->
              <table id="example" class="datatable table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>S-N</th>
                    <th>Followup Date</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Lead Feedback</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sn = 1; ?>
                  @foreach ($followups as $followup)
                    <tr>
                      <td>{{$sn}}</td>
                      <td>{{$followup->followup_date}}</td>
                      <td>{{$followup->leads->name}}</td>
                      <td>{{$followup->leads->mobile_phone}}</td>
                      <td>{{$followup->feedback}}</td>
                      <td>{{$followup->remarks or '--'}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table><!--table-ends-->
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
@stop