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
              <h3>Counselors List Page</h3>
              <div class="row">
                <p class="pull-left">You can view all available counselors from here.</p>
                <p class="pull-right">Counselors / List <strong>All</strong></p>
              </div>
            </div>
          </div>
        </div><!--panel for page info2 ends-->
        <!--panel1 for data/tables-->
        <div class="row col-md-12 col-sm-12 col-xs-12 panel2">
          @include('layouts.notifications')
          <div class="panel panel-heading">Counselors Listing Table</div>
          <div class="panel panel-default">
            <div class="panel-body" style="border: none;">
              <!--table-->
              <table id="example" class="datatable table table-striped table-bordered dt-responsive table-responsive" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>S-N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sn = 1; ?>
                  @foreach ($counselors as $counselor)
                    <tr>
                      <td>{{$sn}}</td>
                      <td>{{$counselor->users->name}}</td>
                      <td>{{$counselor->users->email}}</td>
                      <td>{{$counselor->contact_no}}</td>
                      <td>{{$counselor->address}}</td>
                      <td>
                        <a href="{{route('counselor.getEdit', $counselor->id)}}"><i class="glyphicon glyphicon-pencil" style="color: #58B72B; font-size: 15px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"></i></a>&nbsp;&nbsp;
                        <a href="{{route('counselor.getDelete', $counselor->id)}}" onclick="return confirm('Are you sure want to delete this counselor?')"><i class="glyphicon glyphicon-trash" style="color: #58B72B; font-size: 15px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"></i></a>
                      </td>
                    </tr>
                  <?php $sn++; ?>
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