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
              <h3>Counselor's Dashboard Page</h3>
              <div class="row">
                <p class="pull-left">Welcome to the counselor's dashboard page.</p>
                <p class="pull-right">Dashboard / <strong>Page</strong></p>
              </div>
            </div>
          </div>
        </div><!--panel for page info2 ends-->
        <!--panel1 for data/tables-->
        <div class="row col-md-12 col-sm-12 col-xs-12 panel2">
          <div class="panel panel-heading">Dashboard - Your Leads Table</div>
          <div class="panel panel-default">
            <div class="panel-body" style="border: none;">
              <!--table-->
              <table id="example" class="datatable table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>S-N</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sn = 1; ?>
                  @foreach ($leads as $lead)
                    <tr>
                      <td>{{$sn}}</td>
                      <td>{{$lead->name}}</td>
                      <td>{{$lead->mobile_phone}}</td>
                      <td>{{$lead->email}}</td>
                      <td>{{$lead->address}}</td>
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
      <p class="pull-left">ISMT College</p>
      <p class="pull-right">Leads Management System</p>
    </footer>
  </div><!--page-wrapper ends here-->
@stop