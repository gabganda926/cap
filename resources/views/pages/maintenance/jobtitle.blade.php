@extends('master')

@section('title','Job Title - Maintenance | i-Insure')

@section('maintenance','active')

@section('jobtitle','active')

@section('body')
    <section class="content">
        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                JOB TITLE
                            </b></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                <li>
                                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#addModal">
                                    <i class="material-icons">group_add</i>
                                    <span>Add Job Title</span>
                                </button>
                                </li>
                                <li>
                                <button type="button" id = "delete_many" style = "display:none;" class="btn bg-red waves-effect">
                                    <i class="material-icons">delete</i>
                                    <span>Delete</span>
                                </button>
                                </li>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example animated lightSpeedIn active">
                                <thead>
                                    <tr class="bg-blue-grey">
                                        <th class="col-md-1"></th>
                                        <th>Job Title</th>
                                        <th>Employees</th>
                                        <th class="col-md-2">Date Created</th>
                                        <th class="col-md-2">Latest Update</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                      $index = 1;
                                  ?>
                                  @foreach($jobtitle as $emp)
                                  @if($emp->del_flag == 0)
                                      <tr>
                                          <td><input type="checkbox" id="{{ $emp->jobtitle_ID }}" name = "del_check" class="filled-in chk-col-red checkCheckbox" data-id = "{{ $emp->jobtitle_ID }}"/>
                                          <label for="{{ $emp->jobtitle_ID }}"></label></td> <!--YUNG ID DAPAT NAG IIBA EVERY RECORD -->
                                          <td>{{ $emp->jobtitle_Name }}</td>
                                          <td><div class="icon-button-demo">
                                            <button type="button" class="btn bg-light-green waves-effect" data-toggle="modal" data-target="#empList"
                                            onclick = "
                                            var table = $('#view_list').DataTable();
                                            table.column(3).search({{ $emp->jobtitle_ID }}).draw();">
                                                <i class="material-icons">list</i>
                                                <span>View List</span>
                                            </button>
                                            </div></td>
                                            <td>{{ \Carbon\Carbon::parse($emp->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($emp->created_at)->format('l, h:i:s A').")" }}</td>
                                            <td>{{ \Carbon\Carbon::parse($emp->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($emp->updated_at)->format('l, h:i:s A').")" }}</td>
                                            <td>
                                            <div class="icon-button-demo">
                                                <button type="button" class="btn bg-light-blue waves-effect" data-toggle="modal" data-target="#largeModal"
                                                data-id = "{{ $emp->jobtitle_ID }}"
                                                data-name = "{{ $emp->jobtitle_Name }}"
                                                data-desc = "{{ $emp->jobtitle_Desc }}"
                                                onclick= "

                                                document.getElementById('id').value = $(this).data('id');
                                                document.getElementById('aEmployee_type').value = $(this).data('name');
                                                document.getElementById('aEmployeeType_desc').value = $(this).data('desc');
                                                ">
                                                    <i class="material-icons">remove_red_eye</i>
                                                    <span>View</span>
                                                </button>
                                            </div>
                                          </td>
                                      </tr>
                                  @endif
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

            <!-- ADD INST MODAL -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
                <div class="modal-dialog animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4><br/>Add Job Title</h4>
                        </div><br/><br/>
                        <div class="modal-body">
                            <form id="add" name = "add" action = "title/submit" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input id = "Employee_type" name = "Employee_type" type="text" class="form-control" required>
                                                    <label class="form-label">Job Title Name </label>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input id = "EmployeeType_desc" name = "EmployeeType_desc" type="text" class="form-control">
                                                    <label class="form-label">Description </label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn-primary waves-effect" type="button" onclick = "
                            document.getElementById('time').value = formatDate(new Date());
                            if($('#add').valid())
                            {
                              swal({
                                title: 'Are you sure?',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#DD6B55',
                                confirmButtonText: 'Continue',
                                cancelButtonText: 'Cancel',
                                closeOnConfirm: false,
                                closeOnCancel: false
                              },
                              function(isConfirm){
                                if (isConfirm) {
                                  $('#add').submit();

                                    document.getElementById('Employee_type').value = '';
                                    document.getElementById('EmployeeType_desc').value = '';
                                } else {
                                    swal({
                                    title: 'Cancelled',
                                    type: 'warning',
                                    timer: 500,
                                    showConfirmButton: false
                                    });
                                }
                              });
                            }">SUBMIT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- #END# ADD INST MODAL -->

            <!-- View INST MODAL-->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4><br/>Job Title Details
                            </h4>
                        </div><br/>
                        <button id = "Edit" style = "margin-left: 32em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'title/update';
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').show();
                        $('#aEmployee_type').prop('disabled', false);
                        $('#aEmployeeType_desc').prop('disabled', false);
                        $('#schange').html('SAVE CHANGES');
                        ">
                        <i class="material-icons">create</i>
                        <span>Edit</span>
                        </button>
                        <button id = "Delete" type="button" class="btn bg-red btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'title/delete';
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').show();
                        $('#aEmployee_type').prop('disabled', true);
                        $('#aEmployeeType_desc').prop('disabled', true);
                        $('#schange').html('DELETE RECORD');
                        ">
                        <i class="material-icons">delete_sweep</i>
                        <span>Delete</span>
                        </button>
                        <br/>
                        <div class="modal-body">
                            <form id="view" name = "view" method="POST">
                              <div class="col-md-4" style = "display: none;">
                                <input id = "id" type="text" class="form-control" name="id" pattern="[A-Za-z'-]">
                              </div>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Job Title Name :</small></label>
                                                    <input id = "aEmployee_type" name = "aEmployee_type" type="text" class="form-control" disabled="disable" required>
                                                </div>
                                            </div>
                                    </div>

                                     <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Description :</small></label>
                                                    <input id = "aEmployeeType_desc" name = "aEmployeeType_desc" type="text" class="form-control" disabled="disable">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "atime" name = "atime" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button id = "schange" class="btn btn-primary waves-effect" style = "display: none;" type="button" onclick = "
                            document.getElementById('atime').value = formatDate(new Date());
                            if($('#view').valid())
                            {
                              swal({
                                title: 'Are you sure?',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#DD6B55',
                                confirmButtonText: 'Continue',
                                cancelButtonText: 'Cancel',
                                closeOnConfirm: false,
                                closeOnCancel: false
                              },
                              function(isConfirm){
                                if (isConfirm) {
                                  $('#view').submit();
                                } else {
                                    swal({
                                    title: 'Cancelled',
                                    type: 'warning',
                                    timer: 500,
                                    showConfirmButton: false
                                    });
                                }
                              });
                            }">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- #END# VIEW INST MODAL -->

            <!-- View INST MODAL-->
              <div class="modal fade" id="empList" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view-list">
                            <h4><br/>Employee List
                            </h4>
                        </div><br/>
                        </button>
                        <div class="modal-body">
                            <form id="vmodel_view" method="POST">
                              <table id = "view_list" class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Date Created</th>
                                        <th>Last Update</th>
                                        <th>Job Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($empd as $empdata)
                                    @if($empdata->del_flag == 0)
                                      @foreach($pnf as $Info)
                                        @if($empdata->personal_info_ID == $Info->pinfo_ID)
                                        <tr>
                                          <td>{{ $Info->pinfo_first_name." ".$Info->pinfo_last_name }}</td>
                                          <td>{{ \Carbon\Carbon::parse($empdata->created_at)->format('M-d-Y') }} {{ '('.\Carbon\Carbon::parse($empdata->created_at)->format('l, h:i:s A').')' }}</td>
                                          <td>{{ \Carbon\Carbon::parse($empdata->updated_at)->format('M-d-Y') }} {{ '('.\Carbon\Carbon::parse($empdata->updated_at)->format('l, h:i:s A').')' }}</td>
                                          <td>{{ $empdata->job_title }}</td>
                                        </tr>
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                </tbody>
                            </table>
                                <br/><br/><br/>
                            </form>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# VIEW INST MODAL -->
    </section>

    <script>
            $.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[A-Za-z][A-Za-z0-9 '-.]*$/i.test(value);
             }, "This field must contain only letters, numbers, dashes, space, apostrophe or dot.");
            $.validator.addMethod("alpha", function(value, element) {
                return this.optional(element) || /^[A-Za-z][A-Za-z '-.]*$/i.test(value);
             }, "This field must contain only letters, space, dash, apostrophe or dot.");
            $.validator.addMethod("blcknumber", function(value, element) {
                return this.optional(element) || /^[A-Za-z0-9][A-Za-z0-9 '-.]*$/i.test(value);
             }, "This field must contain only letters, numbers, space, dash, apostrophe or dot.");


        // Wait for the DOM to be ready
            $(function() {
              // Initialize form validation on the registration form.
              // It has the name attribute "registration"
              $("form[name='add']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  Employee_type:{
                    required: true,
                    alpha: true,
                    maxlength: 20
                  },
                  EmployeeType_desc:{
                    maxlength: 50
                  }
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                  form.submit();
                }
              });

              $("form[name='view']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  aEmployee_type:{
                    required: true,
                    alpha: true,
                    maxlength: 20
                  },
                  aEmployeeType_desc:{
                    maxlength: 50
                  }
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                  form.submit();
                }
              });
            });
    </script>

    <script>
        $(document).ready(function()
        {
          $('add').validate();
          $('view').validate();
          if ($('.checkCheckbox:checked').length > 0)
          {
               $("#delete_many").show();
          }
          else
          {
              $("#delete_many").hide();
          }

          $(".checkCheckbox").change(
            function()
            {
              if ($('.checkCheckbox:checked').length > 0)
              {
                   $("#delete_many").show();
              }
              else
              {
                  $("#delete_many").hide();
              }
             }
          );
        });

         $(".checkCheckbox").change(
            function()
            {
              if ($('.checkCheckbox:checked').length > 0)
              {
                   $("#delete_many").show();
              }
              else
              {
                   $("#delete_many").hide();
              }
             }
          );

        $('#addModal').on('hidden.bs.modal', function() {
          $('#add').trigger('reset');
        })

        $('#largeModal').on('hidden.bs.modal', function() {
            $('#view').trigger('reset');
            $('#Edit').prop('disabled', false);
            $('#Delete').prop('disabled', false);
            $('#schange').hide();
            $('#ainstallment_type').prop('disabled', true);
            $('#ainstallment_desc').prop('disabled', true);
        })

        function addZero(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function formatDate(date)
        {
          var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
          ];

          var day = date.getDate();
          var monthIndex = date.getMonth() + 1;
          var year = date.getFullYear();
          var h = addZero(date.getHours());
          var m = addZero(date.getMinutes());
          var s = addZero(date.getSeconds());

          return year + '-' + monthIndex + '-' + day + ' ' + h + ':' + m + ':' + s;
        }

        var table = $('#view_list').DataTable();
        table.column( 3 ).visible( false );
        $('#view_list').css('width', '100%');

        var IDS;
        var timenow = formatDate(new Date());
        $('#delete_many').click(function(event){
          IDS = $(".checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#delete_many').click(function(event){
          event.preventDefault();
              $.ajax({

                  type: 'POST',
                  url: '/admin/maintenance/job/title/ardelete',
                  data: {asd:IDS, time:timenow},
                  success:function(xhr){
                      console.log('success');
                      console.log(xhr.responseText);
                      window.location.reload();
                  },
                    error:function(xhr, ajaxOptions, thrownError,data){
                      console.log(xhr.status);
                      console.log(xhr.responseText);
                  }
              });
          });

    </script>

    @endsection
