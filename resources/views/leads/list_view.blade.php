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
              <h3>Leads List Page</h3>
              <div class="row">
                <p class="pull-left">You can view all available leads from here.</p>
                <p class="pull-right">Leads / List <strong>All</strong></p>
              </div>
            </div>
          </div>
        </div><!--panel for page info2 ends-->
        <!--panel1 for data/tables-->
        <div class="row col-md-12 col-sm-12 col-xs-12 panel2">
          @include('layouts.notifications')
          <div class="panel panel-heading">Leads Listing Table</div>
          <div class="panel panel-default">
            <div class="panel-body" style="border: none;">
              <!--table-->
              <table id="example" class="datatable table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>S-N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Address</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sn = 1; ?>
                  @foreach ($leads as $lead)
                    <tr>
                      <td>{{$sn}}</td>
                      <td>{{$lead->name}}</td>
                      <td>{{$lead->email}}</td>
                      <td>{{$lead->phone or 'N/A'}}</td>
                      <td>{{$lead->mobile_phone}}</td>
                      <td>{{$lead->status}}</td>
                      <td>{{$lead->address}}</td>
                      <td>
                        <a href="{{route('lead.getFollowUp', $lead->id)}}"><i class="glyphicon glyphicon-repeat" style="color: #58B72B; font-size: 15px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Make Followup" onclick="return confirm('Are you sure want to make new followup of this lead?')"></i></a>&nbsp;&nbsp;
                        <a href="{{route('lead.getCovertToStudent', $lead->id)}}"><i class="glyphicon glyphicon-ok" style="color: #58B72B; font-size: 15px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Convert to Student" onclick="return confirm('Are you sure want to convert this lead to student?')"></i></a>&nbsp;&nbsp;
                        <a href=""><i class="glyphicon glyphicon-pencil" style="color: #58B72B; font-size: 15px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"></i></a>&nbsp;&nbsp;
                      </td>
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