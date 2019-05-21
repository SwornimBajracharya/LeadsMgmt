<!--notifications-->
@if(session('success_notice'))
  <div class="alert alert-success alert-dismissible" role="alert" style="padding:10px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Success!</strong> {{session('success_notice')}}
  </div>
@endif
@if(session('error_notice'))
  <div class="alert alert-danger alert-dismissible" role="alert" style="padding:10px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> {{session('error_notice')}}
  </div>
@endif
<!--notifications-->