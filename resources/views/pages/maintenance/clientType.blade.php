@extends('master')

@section('title','Client Type - Maintenance | i-Insure')

@section('maintenance','active')

@section('ctype','active')

@section('body')

    <section class="content">
        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                CLIENT TYPE
                            </b></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <li>
                                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#addCTypeModal">
                                    <i class="material-icons">contacts</i>
                                    <span>Add Client Type</span>
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
                                        <th>Client Type</th>
                                        <th class="col-md-2">Date Created</th>
                                        <th class="col-md-2">Last Update</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                  $index = 1;
                                  ?>
                                  @foreach($clienttype as $ctype)
                                    @if($ctype->del_flag == 0)
                                        <tr>
                                            <td><input type="checkbox" id="{{ $ctype->clientType_ID }}" name = "del_check" class="filled-in chk-col-red checkCheckbox" data-id = "{{ $ctype->clientType_ID }}"/>
                                            <label for="{{ $ctype->clientType_ID }}"></label></td>
                                            <td>{{ $ctype->clientType_type }}</td>
                                            <td>{{ \Carbon\Carbon::parse($ctype->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($ctype->created_at)->format('l, h:i:s A').")" }}</td>
                                            <td>{{ \Carbon\Carbon::parse($ctype->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($ctype->updated_at)->format('l, h:i:s A').")" }}</td>
                                            <td>
                                            <button type="button" class="btn bg-light-blue waves-effect" data-toggle="modal" data-target="#largeModal"
                                            data-id = "{{ $ctype->clientType_ID }}"
                                            data-name = "{{ $ctype->clientType_type }}"
                                            data-desc = "{{ $ctype->clientType_desc }}"
                                            onclick= "

                                            document.getElementById('id').value = $(this).data('id');
                                            document.getElementById('aclientType_type').value = $(this).data('name');
                                            document.getElementById('aclientType_desc').value = $(this).data('desc');
                                            ">


                                            <i class="material-icons">remove_red_eye</i>
                                            <span>View</span>
                                            </button>
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
            <div class="modal fade" id="addCTypeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4><br/>Add Client Type</h4>
                        </div><br/><br/>
                            <div class="modal-body">
                                <form id="ctype_add" name = "ctype_add" action = "type/submit" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input id = "clientType_type" name = "clientType_type" type="text" class="form-control" required>
                                                    <label class="form-label">Client Type Name </label>
                                                </div>
                                                <div class="help-info">Ex.: Individual, Family, Company, etc.</div>
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <textarea id = "clientType_desc" name = "clientType_desc" rows="1" class="form-control no-resize auto-growth"></textarea>
                                              <label class="form-label">Description </label>
                                          </div>
                                      </div>
                                    </div>
                                    <br/><br/>
                                    <div class="col-md-4" style = "display: none;">
                                       <input id = "time" name = "time" type="text" class="form-control" pattern="[A-Za-z'-]">
                                    </div>
                            </div>
                        <div class="modal-footer js-sweetalert">
                            <button id = "sbmit" class="btn btn-primary waves-effect" type="button" onclick="
                            document.getElementById('time').value = formatDate(new Date());
                            if($('#ctype_add').valid())
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
                                  $('#ctype_add').submit();

                                document.getElementById('clientType_type').value = '';
                                document.getElementById('clientType_desc').value = '';
                                } else {
                              	    swal({
                                    title: 'Cancelled',
                                    type: 'warning',
                                    timer: 500,
                                    showConfirmButton: false
                                    });
                                }
                              });
                            }"
                            >SUBMIT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
          </div>
            <!-- #END# ADD INST MODAL -->

            <!-- View INST MODAL-->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4><br/>Client Type Details
                            </h4>
                        </div><br/>
                        <button id = "Edit" style = "margin-left: 32em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('ctype_view').action = 'type/update';
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').show();
                        $('#aclientType_type').prop('disabled', false);
                        $('#aclientType_desc').prop('disabled', false);
                        $('#schange').html('SAVE CHANGES');
                        ">
                        <i class="material-icons">create</i>
                        <span>Edit</span>
                        </button>
                        <button id = "Delete" type="button" class="btn bg-red btn-lg waves-effect"
                        onclick = "
                        document.getElementById('ctype_view').action = 'type/delete';
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').show();
                        $('#aclientType_type').prop('disabled', true);
                        $('#aclientType_desc').prop('disabled', true);
                        $('#schange').html('DELETE RECORD');
                        ">
                        <i class="material-icons">delete_sweep</i>
                        <span>Delete</span>
                        </button>
                        <br/>
                            <div class="modal-body">
                                <form id="ctype_view" name = "ctype_view" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-4" style = "display: none;">
                                  <input id = "id" type="text" class="form-control" name="id" pattern="[A-Za-z'-]">
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Client Type Name :</small></label>
                                                    <input id = "aclientType_type" name = "aclientType_type" type="text" class="form-control" name="name" disabled="disable" required>
                                                </div>
                                            </div>
                                    </div>

                                     <div class="col-md-12">
                                       <div class="form-group form-float">
                                           <div class="form-line">
                                               <textarea id = "aclientType_desc" name = "aclientType_desc" rows="1" class="form-control no-resize auto-growth" disabled></textarea>
                                               <label class="form-label">Description </label>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                                    <br/>
                                    <div class="col-md-4" style = "display: none;">
                                       <input id = "atime" name = "atime" type="text" class="form-control">
                                    </div>
                            </div>
                        <div class="modal-footer js-sweetalert">
                            <button id = "schange" style = "display: none;" class="btn btn-primary waves-effect" type="button" onclick = "
                            document.getElementById('atime').value = formatDate(new Date());
                            if($('#ctype_view').valid())
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
                                  $('#ctype_view').submit();
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
        </div>
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
              $("form[name='ctype_add']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  clientType_type:{
                    required: true,
                    alpha: true,
                    maxlength: 20
                  },
                  clientType_desc:{
                    maxlength: 50
                  }
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                  form.submit();
                }
              });

              $("form[name='ctype_view']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  aclientType_type:{
                    required: true,
                    alpha: true,
                    maxlength: 20
                  },
                  aclientType_desc:{
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
          $('ctype_add').validate();
          $('ctype_view').validate();
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

        function addZero(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        $('#addCTypeModal').on('hidden.bs.modal', function() {
            $('#ctype_add').trigger('reset');
        });

        $('#largeModal').on('hidden.bs.modal', function() {
            $('#ctype_view').trigger('reset');
            $('#Edit').prop('disabled', false);
            $('#Delete').prop('disabled', false);
            $('#schange').hide();
            $('#aclientType_type').prop('disabled', true);
            $('#aclientType_desc').prop('disabled', true);
        });

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
                  url: '/admin/maintenance/client/type/ardelete',
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
