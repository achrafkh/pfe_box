@extends('layouts.master')
@section('breadcumbs')
<div class="row bg-title">
  <!-- .page title -->
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Clients</h4>
  </div>
  <!-- /.page title -->
  <!-- .breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }} ">Dashboard</a></li>
      <li class="active">Clients</li>
    </ol>
  </div>
  <!-- /.breadcrumb -->
</div>
<!-- .row -->
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/libs/bootstrap-datepicker.css')}}">
@endsection
@section('css-top')
<link href="{{ asset('css/datatables.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/css/libs/wizard.css">
@endsection
@section('content1')
<div class="row">
  <div class="col-md-12 col-lg-12 col-sm-12">
    <div class="white-box">
      <div class="row row-in"><h4 class="page-title text-center" style="font-size:150%;color:#77797B;">Weekly Reports</h4><hr>
        <div class="col-lg-3 col-sm-6 row-in-br">
          <div class="col-in row">
            <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic" ></i>
              <h5 class="text-muted vb">Total Clients</h5>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3 class="counter text-right m-t-15 text-danger">5</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">{{ $stats['success']}}% Complete (success)</span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
          <div class="col-in row">
            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
              <h5 class="text-muted vb">Appointments</h5>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3 class="counter text-right m-t-15 text-megna">{{ $stats['week-total']}}</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="progress">
                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ $stats['week-total']}}%"> <span class="sr-only">{{$stats['week-total']}} % Complete (success)</span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 row-in-br">
          <div class="col-in row">
            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
              <h5 class="text-muted vb">Reschedules</h5>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3 class="counter text-right m-t-15 text-primary">{{ $stats['week-rescheduled']}}</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="progress">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6  b-0">
          <div class="col-in row">
            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
              <h5 class="text-muted vb">Success %</h5>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h3 class="counter text-right m-t-15 text-success">{{ number_format($stats['success'],1)}}%</h3>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">100% Complete (success)</span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content2')
<div class="row">
  <div class="col-sm-12">
    <div class="white-box">
      <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
        <button class="btn btn-block btn-outline btn-rounded btn-info" data-toggle="modal" data-target="#create-client">Add User</button>
      </div>
      <h3 class="box-title m-b-0">Clients</h3>
      <p class="text-muted m-b-30">All Clients By Groups</p>
      <div class="table-responsive">
        <table id="myTable" class="table table-striped">
          <thead>
            <tr>
              <th>source</th>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>City</th>
              <th>Created at</th>
              <th class="no-sort">Action</th>
            </tr>
          </thead>
          <tbody>
           
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->
<!-- create client -->
<div id="create-client" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add New Client</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="white-box">
             {{--  <h3 class="box-title m-b-0">Validation</h3>
              <p class="text-muted m-b-30 font-13"> This is the Validation wizard with validation.</p> --}}
              <div id="newClient" class="wizard">
                <ul class="wizard-steps" role="tablist">
                  <li class="active" role="tab">
                    <h4><span><i class="ti-user"></i></span>Informations</h4>
                  </li>
                  <li role="tab">
                    <h4><span><i class="ti-info-alt"></i></span>Contact Details</h4>
                  </li>
                  <li role="tab">
                    <h4><span><i class="ti-location-pin"></i></span>Adittional Information</h4>
                  </li>
                </ul>
                <form id="validation" class="form-horizontal">
                {{ csrf_field() }}
                  <div class="wizard-content">
                    <div class="wizard-pane active" role="tabpanel">
                      <div class="form-group">
                        <label class="col-xs-3 col-md-2 control-label pull-left">First name : </label>
                        <div class="col-xs-9 col-md-10">
                          <input type="text" class="form-control" name="firstname" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-xs-3 col-md-2 control-label">Last name : </label>
                        <div class="col-xs-9 col-md-10">
                          <input type="text" class="form-control" name="lastname" />
                        </div>
                      </div>
                      
                    </div>
                    <div class="wizard-pane" role="tabpanel">
                      <div class="form-group">
                        <label class="col-xs-3 col-md-2 control-label">Email address : </label>
                        <div class="col-xs-9 col-md-10">
                          <input type="text" class="form-control" name="email" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-xs-3 col-md-2 control-label">Phone Number:</label>
                        <div class="col-xs-9 col-md-10">
                          <input type="text" class="form-control" name="phone" />
                        </div>
                      </div>
                    </div>
                    <div class="wizard-pane" role="tabpanel">
                      <div class="form-group">
                        <label class="col-xs-3 col-md-2">Address : </label>
                        <div class="col-xs-9 col-md-10">
                          <input id="address" type="tel" class="form-control form-control-line" name="address" required autofocus>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-xs-3 col-sm-2">Select City : </label>
                        <div class="col-xs-9 col-sm-10">
                          <select class="form-control form-control-line" name="city">
                           @foreach($cities as $city)
                            <option value="{{ $city }}">{{ $city }}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-xs-3 col-md-2">Birth Date : </label>
                        <div class="col-xs-9 col-md-10">
                          <div class="input-group">
                            <input id="datepicker-autoclose" type="text" class="form-control mydatepicker" placeholder="yyyy/mm/dd" name="birthdate"  required> <span class="input-group-addon"><i class="icon-calender"></i></span>
                          </div>

                        </div>
                      </div>
                      
                    </div>
                  </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="close-create-client" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/datatables.js') }} "></script>
<script src="{{ asset('js/libs/jquery-wizard.min.js') }} "></script>
<link rel="stylesheet" href="{{ asset('/css/libs/formValidation.min.css') }}">
<script src="{{ asset('js/libs/formvalidation/formValidation.min.js') }} "></script>
<script src="{{ asset('js/libs/formvalidation/bootstrap.min.js') }} "></script>

<script type="text/javascript" src="{{asset('js/libs/bootstrap-datepicker.min.js')}}"></script>

<script>

    $(document).ready(function() {
     
        var datepicker = jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: false,
            format: 'yyyy/mm/dd',
        });

      var table = $('#myTable').DataTable({
          columnDefs: [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            order: [
                [5, 'desc']
            ],
            displayLength: 10,
            processing: true,
            serverSide: true,
            ajax: '/op/getclients',
            columns: 
            [
                { 'data': 'src', render: function(data, type, full, meta)
                  {
                    if(data == 'fb')
                    {
                      return  '<i class="fa fa-facebook-official" aria-hidden="true"></i>';
                    } 
                    return '';
                  }
                },
                { 'data': 'id', 'name': 'id' },
                { 'data': 'name', 'name': 'name' },
                { 'data': 'email', 'name': 'email' },
                { 'data': 'phone', 'name': 'phone' },
                { 'data': 'address', 'name': 'address' },
                { 'data': 'city', 'name': 'city' },
                { 'data': 'created_at', 'name': 'created_at' },
                { 'data': 'id', render: function(data, type, full, meta)
                  {
                    return  '<a href="/op/client/'+data+'" class="btn btn-info waves-effect waves-light m-t-10">View</a>';
                  }
                }
            ]
        });
        function addRow(data) {
          var link = '<a href="/op/client/' + data.id + '" class="btn btn-info waves-effect waves-light m-t-10">View</a>';
          
          var rowNode = table.row.add( {
                   'name': data.firstname +' '+ data.lastname,
                   'email': data.email,
                   'phone':  data.phone,
                   'address':  data.address,
                   'city':  data.city,
                   'created_at':  data.created_at,
                   'id':  link,
                } ).draw( false ).node();

              $(rowNode)
                  .addClass('newClient');
        }
        $('#newClient').wizard({

            onInit: function() {

                $(this).parents(".myadmin-alert").fadeToggle(350);
                $('#validation').formValidation({
                    framework: 'bootstrap',
                    fields: {
                        firstname: {
                            validators: {
                                notEmpty: {
                                    message: 'The First name is required'
                                },
                                stringLength: {
                                    min: 3,
                                    max: 30,
                                    message: 'The First name must be more than 6 and less than 30 characters long'
                                },
                                regexp: {
                                    regexp: /^([ \u00c0-\u01ffa-zA-Z'\-])+$/,
                                    message: 'The First name can only consist of alphabetical, number, dot and underscore'
                                }
                            }
                        },
                        lastname: {
                            validators: {
                                notEmpty: {
                                    message: 'The Last name is required'
                                },
                                stringLength: {
                                    min: 3,
                                    max: 30,
                                    message: 'The Last name must be more than 6 and less than 30 characters long'
                                },
                                regexp: {
                                    regexp: /^([ \u00c0-\u01ffa-zA-Z'\-])+$/,
                                    message: 'The Last name can only consist of alphabetical, number, dot and underscore'
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'The email address is required'
                                },
                                emailAddress: {
                                    message: 'The input is not a valid email address'
                                }
                            }
                        },

                        phone: {
                            validators: {
                                digits: true,
                                notEmpty: {
                                    message: 'The Phone Number is required'
                                },
                                stringLength: {
                                    min: 8,
                                    max: 15,
                                    message: 'Use a valid phone Number'
                                },
                            }
                        },
                         birthdate: {
                            validators: {
                                notEmpty: {
                                    message: 'BirthDate is required'
                                },
                            }
                        }
                    }
                });
            },

            validator: function() {
                var fv = $('#validation').data('formValidation');
                var $this = $(this);
                // Validate the container
                fv.validateContainer($this);
                var isValidStep = fv.isValidContainer($this);
                if (isValidStep === false || isValidStep === null) {
                    return false;
                }
                return true;
            },
            onFinish: function() {
              $('#close-create-client').click();
                $.ajax({
                    url: '/op/client/create',
                    type: 'post',
                    dataType: 'json',
                    data: $("#validation").serialize(),
                    success: function(response) {
                        addRow(response.data);
                        showAlert('success', 'Success','Client Added Successfuly');
                    },
                    error: function(response) {
                        //Error message
                        showAlert('error', 'Error','OOps Something Went Wrong');

                        $('#close-create-client').click();
                        
                    },
                });

                $("#validation").trigger('reset'); 
                $( ".wizard-back" ).click();
                $( ".wizard-back" ).click();
                 $("#newClient > ul > li:nth-child(2)").removeClass().removeClass('current').addClass('disabled');
                $('li.active').addClass('current');
                $("#validation").data('formValidation').resetForm();
                
               
            }

        });
    });
</script>



@endsection