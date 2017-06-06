@extends('master')

@section('title','Maintenance - Sales Agent | CIMIS')

@section('maintenance','active')

@section('salesagent','active')

@section('body')
    <section class="content">
        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-7 col-sm-7 col-xs-7">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                SALES AGENT
                            </b></h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#addEmpModal">
                                    <i class="material-icons">group_add</i>
                                    <span>Add Sales Agent</span>
                                </button>
                                </li>
                                <li>
                                  <button type="button" id = "delete_many" style = "display:none;" class="btn bg-red waves-effect">
                                      <i class="material-icons">delete</i>
                                      <span>Delete</span>
                                  </button>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable animated lightSpeedIn active">
                                <thead>
                                    <tr class="bg-blue-grey">
                                        <th class="col-md-0.10"></th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Clients</th>
                                        <th class="col-md-2">Date Created</th>
                                        <th class="col-md-2">Last Update</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($agent as $agentdata)
                                    @if($agentdata->del_flag == 0)
                                    @foreach($pnf as $pInfo)
                                      @if($agentdata->personal_info_ID == $pInfo->pinfo_ID)
                                    <tr>
                                        <td><input type="checkbox" id="{{$agentdata->agent_ID}}" class="filled-in chk-col-red checkCheckbox" data-id = "{{$agentdata->agent_ID}}"/>
                                        <label for="{{$agentdata->agent_ID}}"></label></td> <!--YUNG ID DAPAT NAG IIBA EVERY RECORD -->
                                        @if($pInfo->pinfo_picture == null)
                                        <td><img src="{!! '/image/'.'default-image.png' !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                        @else
                                        <td><img src="{!! '/image/'.$pInfo->pinfo_picture !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                        @endif
                                        <td>
                                          @if($pInfo->pinfo_middle_name == null)
                                          {{ $pInfo->pinfo_last_name.", ".$pInfo->pinfo_first_name}}
                                          @else
                                          {{ $pInfo->pinfo_last_name.", ".$pInfo->pinfo_first_name." ".$pInfo->pinfo_middle_name }}
                                          @endif
                                        </td>
                                        <td><div class="icon-button-demo">
                                            <button type="button" class="btn bg-light-green waves-effect" data-toggle="modal" data-target="#clientList">
                                                <i class="material-icons">list</i>
                                                <span>View List</span>
                                            </button>
                                            </div></td>
                                          <td>{{ \Carbon\Carbon::parse($agentdata->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($agentdata->created_at)->format('l, h:i:s A').")" }}</td>
                                          <td>{{ \Carbon\Carbon::parse($agentdata->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($agentdata->updated_at)->format('l, h:i:s A').")" }}</td>
                                        <td>
                                        <button type="button" class="btn bg-light-blue waves-effect" data-toggle="modal" data-target="#largeModal"
                                        class="btn btn-success btn-xs waves-effect"
                                        data-agentid='{{ $agentdata->agent_ID }}'
                                        data-fname='{{ $pInfo->pinfo_first_name }}'
                                        data-mname='{{ $pInfo->pinfo_middle_name }}'
                                        data-lname='{{ $pInfo->pinfo_last_name }}'
                                        data-contact='{{ $pInfo->pinfo_contact }}'
                                        data-mail='{{ $pInfo->pinfo_mail }}'
                                        data-add='{{ $agentdata->agent_add_ID }}'
                                        data-pinfo='{{ $agentdata->personal_info_ID }}'
                                        data-source = '{!! '/image/'.$pInfo->pinfo_picture !!}'
                                        data-comm = '{{ $agentdata->commision }}'

                                        data-lnumb='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_blcknum }}
                                          @endif
                                        @endforeach'
                                        data-strt='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_street }}
                                          @endif
                                        @endforeach'
                                        data-sdiv='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_subdivision }}
                                          @endif
                                        @endforeach'
                                        data-brg='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_brngy }}
                                          @endif
                                        @endforeach'
                                        data-distr='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_district }}
                                          @endif
                                        @endforeach'
                                        data-city='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_city }}
                                          @endif
                                        @endforeach'
                                        data-prov='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_province }}
                                          @endif
                                        @endforeach'
                                        data-regn='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_region }}
                                          @endif
                                        @endforeach'
                                        data-zip='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_zipcode }}
                                          @endif
                                        @endforeach'

                                        onclick = "

                                        var id = $(this).data('agentid');
                                        var addid = $(this).data('agentid');
                                        var fname = $(this).data('fname');
                                        var mname = $(this).data('mname');
                                        var lname = $(this).data('lname');
                                        var contact = $(this).data('contact');
                                        var mail = $(this).data('mail');
                                        var pinfo = $(this).data('pinfo');
                                        var src = $(this).data('source');
                                        var comm = $(this).data('comm');

                                        var addid = $(this).data('add');
                                        var lotnum = $(this).data('lnumb').replace(/^\s+|\s+$/g, '');
                                        var strt = $(this).data('strt').replace(/^\s+|\s+$/g, '');
                                        var subdiv = $(this).data('sdiv').replace(/^\s+|\s+$/g, '');
                                        var brngy = $(this).data('brg').replace(/^\s+|\s+$/g, '');
                                        var dist = $(this).data('distr').replace(/^\s+|\s+$/g, '');
                                        var city = $(this).data('city').replace(/^\s+|\s+$/g, '');
                                        var prov = $(this).data('prov').replace(/^\s+|\s+$/g, '');
                                        var reg = $(this).data('regn').replace(/^\s+|\s+$/g, '');
                                        var zipcode = $(this).data('zip').replace(/^\s+|\s+$/g, '');

                                        document.getElementById('aemp_id').value = id;
                                        document.getElementById('aemp_first_name').value = fname;
                                        document.getElementById('aemp_middle_name').value = mname;
                                        document.getElementById('aemp_last_name').value = lname;
                                        document.getElementById('aemp_contact').value = contact;
                                        document.getElementById('aemp_mail').value = mail;

                                        document.getElementById('aadd_id').value = addid;
                                        document.getElementById('pInfo_ID').value = pinfo;
                                        document.getElementById('aadd_blcknum').value = lotnum;
                                        document.getElementById('aadd_street').value = strt;
                                        document.getElementById('aadd_subdivision').value = subdiv;
                                        document.getElementById('aadd_brngy').value = brngy;
                                        document.getElementById('aadd_district').value = dist;
                                        document.getElementById('aadd_city').value = city;
                                        document.getElementById('aadd_province').value = prov;
                                        document.getElementById('aadd_region').value = reg;
                                        document.getElementById('acomm').value = comm;
                                        $('#aadd_region').val(reg).change();
                                        document.getElementById('aadd_zipcode').value = zipcode;
                                        $('#editImg').attr('src', src);
                                        ">
                                            <i class="material-icons">remove_red_eye</i>
                                            <span>View</span>
                                        </button>
                                        </td>
                                    </tr>
                                      @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

            <!-- VIEW EMP DETAILS MODAL -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4><br/>Sales Agent Details
                            </h4>
                        </div><br/>
                        <button id = "Edit" style = "margin-left: 55em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('emp_view').action = 'salesagent/update';
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').show();
                        $('#aadd_blcknum').prop('disabled', false);
                        $('#aadd_street').prop('disabled', false);
                        $('#aadd_subdivision').prop('disabled', false);
                        $('#aadd_brngy').prop('disabled', false);
                        $('#aadd_district').prop('disabled', false);
                        $('#aadd_city').prop('disabled', false);
                        $('#aadd_province').prop('disabled', false);
                        $('#aadd_zipcode').prop('disabled', false);
                        $('#aemp_first_name').prop('disabled', false);
                        $('#aemp_middle_name').prop('disabled', false);
                        $('#aemp_last_name').prop('disabled', false);
                        $('#aemp_mail').prop('disabled', false);
                        $('#aemp_contact').prop('disabled', false);
                        $('#apicture').prop('disabled', false);
                        $('#acomm').prop('disabled', false);
                        $('#schange').html('SAVE CHANGES');
                        ">
                        <i class="material-icons">create</i>
                        <span>Edit</span>
                        </button>
                        <button id = "Delete" type="button" class="btn bg-red btn-lg waves-effect"
                        onclick = "
                        document.getElementById('emp_view').action = 'salesagent/delete';
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').show();
                        $('#aadd_blcknum').prop('disabled', true);
                        $('#aadd_street').prop('disabled', true);
                        $('#aadd_subdivision').prop('disabled', true);
                        $('#aadd_brngy').prop('disabled', true);
                        $('#aadd_district').prop('disabled', true);
                        $('#aadd_city').prop('disabled', true);
                        $('#aadd_province').prop('disabled', true);
                        $('#aadd_zipcode').prop('disabled', true);
                        $('#aemp_first_name').prop('disabled', true);
                        $('#aemp_middle_name').prop('disabled', true);
                        $('#aemp_last_name').prop('disabled', true);
                        $('#aemp_mail').prop('disabled', true);
                        $('#aemp_contact').prop('disabled', true);
                        $('#apicture').prop('disabled', true);
                        $('#acomm').prop('disabled', true);
                        $('#schange').html('DELETE RECORD');
                        ">
                            <i class="material-icons">delete_sweep</i>
                            <span>Delete</span>
                        </button>  <br/>
                        <div class="modal-body">
                            <form id="emp_view" name = "emp_view" method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "aemp_id" name = "aemp_id" type="text" class="form-control">
                                 <input id = "pInfo_ID" name = "pInfo_ID" type="text" class="form-control">
                             </div>
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="float: right">
                                     <div class="card">
                                         <div class="body">

                                             <div class="fallback">
                                                <img id="editImg" src="#" alt="your image" style="height: 210px; width: 215px;" onerror="this.onerror=null;this.src='/image/default-image.png';">
                                                 <input id = "apicture" name="apicture" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*" disabled="disable">
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                <h3><small><b>Personal Information</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>First Name :</small></label>
                                                <input id = "aemp_first_name" name = "aemp_first_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Middle Name :</small></label>
                                                <input id = "aemp_middle_name" name = "aemp_middle_name" type="text" class="form-control" disabled="disable" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Last Name :</small></label>
                                                <input id = "aemp_last_name" name = "aemp_last_name" type="text" class="form-control" disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Contact Number :</small></label>
                                                <input id = "aemp_contact" name = "aemp_contact" type="text" class="form-control" name="number" disabled="disable" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Email :</small></label>
                                                <input id = "aemp_mail" name = "aemp_mail" type="email" class="form-control" name="email" disabled="disable" >
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                <div class="col-md-10">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Commission (in percentage) :</small></label>
                                                <input id = "acomm" name = "acomm" type="text" class="form-control" disabled="disable">
                                            </div>
                                        </div>
                                </div>
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "aadd_id" name = "aadd_id" type="text" class="form-control">
                               </div>
                                <br/><br/>
                                <h3> <small><b>Residential Address</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Blk&Lot/Bldg/Unit :</small></label>
                                                <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Street :</small></label>
                                                <input id = "aadd_street" name = "aadd_street" type="text" class="form-control"  disabled="disable" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Subdivision :</small></label>
                                                <input id = "aadd_subdivision" name = "aadd_subdivision" type="text" class="form-control"  disabled="disable" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Barangay :</small></label>
                                                <input id = "aadd_brngy" name = "aadd_brngy" type="text" class="form-control" disabled="disable" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>District :</small></label>
                                                <input id = "aadd_district" name = "aadd_district" type="text" class="form-control"  disabled="disable" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>City/Municipality :</small></label>
                                                <input id = "aadd_city" name = "aadd_city" type="text" class="form-control"   disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Province :</small></label>
                                                <input id = "aadd_province" name = "aadd_province" type="text" class="form-control"  disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true">
                                          <option selected value = "" style = "display: none;">-- Select Region --</option>
                                                <option value = "I">Region I</option>
                                                <option value = "II">Region II</option>
                                                <option value = "III">Region III</option>
                                                <option value = "IV-A">Region IV-A</option>
                                                <option value = "IV-B">Region IV-B</option>
                                                <option value = "V">Region V</option>
                                                <option value = "VI">Region VI</option>
                                                <option value = "VII">Region VII</option>
                                                <option value = "VIII">Region VIII</option>
                                                <option value = "IX">Region IX</option>
                                                <option value = "X">Region X</option>
                                                <option value = "XI">Region XI</option>
                                                <option value = "XII">Region XII</option>
                                                <option value = "XIII">Region XIII</option>
                                                <option value = "ARMM">Region ARMM</option>
                                                <option value = "CAR">Region CAR</option>
                                                <option value = "NCR">Region NCR</option>\
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Zip Code :</small></label>
                                                <input id = "aadd_zipcode" name = "aadd_zipcode" type="text" class="form-control"  disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/><br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "atime" name = "atime" type="text" class="form-control">
                                </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                          <button id = "schange" class="btn btn-primary waves-effect" style = "display: none;" type="button" onclick = "
                          document.getElementById('atime').value = formatDate(new Date());
                          if($('#emp_view').valid())
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
                                $('#emp_view').submit();
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
            <!-- #END OF MODAL -->

            <!-- ADD Sales Agent MODAL -->
            <div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4><br/>Add Sales Agent</h4>
                        </div>
                        <div class="modal-body">
                            <form id="emp_add" name = "emp_add" action = "salesagent/submit" method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="float: right;">
                                    <div class="card">
                                        <div class="body">

                                            <div class="fallback">
                                                <img id="addImg" src="#" alt="your image" style="height: 210px; width: 215px;">
                                                <input id = "picture" name="picture" type="file" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3><br/> <small><b>Personal Information</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "emp_first_name" name = "emp_first_name" type="text" class="form-control">
                                                <label class="form-label">First Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "emp_middle_name" name = "emp_middle_name" type="text" class="form-control" >
                                                <label class="form-label">Middle Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "emp_last_name" name = "emp_last_name" type="text" class="form-control">
                                                <label class="form-label">Last Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "emp_contact" name = "emp_contact" type="text" class="form-control">
                                                <label class="form-label">Contact Number</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "emp_mail" name = "emp_mail" type="text" class="form-control" name="email">
                                                <label class="form-label">Email</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "comm" name = "comm" type="text" class="form-control">
                                                <label class="form-label">Commission (in percentage)</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br/><br/>
                                <h3> <small><b>Residential Address</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_blcknum" name = "add_blcknum" type="text" class="form-control">
                                                <label class="form-label">Blk&Lot/Bldg/Unit</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_street" name = "add_street" type="text" class="form-control" >
                                                <label class="form-label">Street</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_subdivision" name = "add_subdivision" type="text" class="form-control" >
                                                <label class="form-label">Subdivision</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_brngy" name = "add_brngy" type="text" class="form-control">
                                                <label class="form-label">Barangay</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_district" name = "add_district" type="text" class="form-control" >
                                                <label class="form-label">District</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_city" name = "add_city" type="text" class="form-control">
                                                <label class="form-label">City/Municipality</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_province" name = "add_province" type="text" class="form-control">
                                                <label class="form-label">Province</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <select id = "add_region" name = "add_region" class="form-control show-tick" data-live-search="true">
                                          <option selected value = "" style = "display: none;">-- Select Region --</option>
                                                <option value = "I">Region I</option>
                                                <option value = "II">Region II</option>
                                                <option value = "III">Region III</option>
                                                <option value = "IV-A">Region IV-A</option>
                                                <option value = "IV-B">Region IV-B</option>
                                                <option value = "V">Region V</option>
                                                <option value = "VI">Region VI</option>
                                                <option value = "VII">Region VII</option>
                                                <option value = "VIII">Region VIII</option>
                                                <option value = "IX">Region IX</option>
                                                <option value = "X">Region X</option>
                                                <option value = "XI">Region XI</option>
                                                <option value = "XII">Region XII</option>
                                                <option value = "XIII">Region XIII</option>
                                                <option value = "ARMM">Region ARMM</option>
                                                <option value = "CAR">Region CAR</option>
                                                <option value = "NCR">Region NCR</option>\
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_zipcode" name = "add_zipcode" type="text" class="form-control" >
                                                <label class="form-label">Zip Code</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/><br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control" pattern="[A-Za-z'-]">
                               </div>

                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn-primary waves-effect" type="button" onclick = "
                            document.getElementById('time').value = formatDate(new Date());
                            if($('#emp_add').valid())
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
                                if (isConfirm) {;
                                  $('#emp_add').submit();
                                    document.getElementById('emp_first_name').value = '';
                                    document.getElementById('emp_middle_name').value = '';
                                    document.getElementById('emp_last_name').value = '';
                                    document.getElementById('emp_contact').value = '';
                                    document.getElementById('emp_mail').value = '';

                                    document.getElementById('add_blcknum').value = '';
                                    document.getElementById('add_street').value = '';
                                    document.getElementById('add_subdivision').value = '';
                                    document.getElementById('add_brngy').value = '';
                                    document.getElementById('add_district').value = '';
                                    document.getElementById('add_city').value = '';
                                    document.getElementById('add_province').value = '';
                                    document.getElementById('add_region').value = '';
                                    $('#add_region').val('').change();
                                    document.getElementById('add_zipcode').value = '';
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
          </div>
            <!-- #END OF MODAL -->

            <!-- View INST MODAL-->
              <div class="modal fade" id="clientList" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view-list">
                            <h4><br/>Client List
                            </h4>
                        </div><br/>
                        </button>
                        <div class="modal-body">
                            <form id="vmodel_view" method="POST">
                              <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Date Created</th>
                                        <th>Last Update</th>
                                    </tr>
                                </thead>
                                <tbody>
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
              $("form[name='emp_add']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  emp_first_name:{
                    required: true,
                    alpha:true,
                    maxlength: 30
                  },
                  emp_middle_name:{
                    alpha:true,
                    maxlength: 20
                  },
                  emp_last_name:{
                    required: true,
                    alpha:true,
                    maxlength: 20
                  },
                  emp_contact:{
                    required: true,
                    digits: true,
                    minlength: 7,
                    maxlength: 11
                  },
                  comm:{
                    required: true,
                    digits: true
                  },
                  emp_mail:{
                    required:true,
                    email: true,
                    maxlength: 50
                  },
                  add_blcknum:{
                      blcknumber: true,
                      maxlength: 10
                  },
                  add_street:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  add_subdivision:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  add_brngy:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  add_district:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  add_city:
                  {
                      required: true,
                      alphanumeric: true,
                      maxlength: 20
                  },
                  add_province:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  add_region:
                  {
                      required: true,
                      alphanumeric: true,
                      maxlength: 11
                  },
                  add_zipcode:
                  {
                      digits: true,
                      maxlength: 4
                  }
                },
                // Specify validation error messages
                messages: {
                    emp_first_name:{
                        required: "Empty First Name"
                    },
                    emp_last_name:{
                        required: "Empty Last Name"
                    },
                    emp_contact:{
                        required: "Empty Contact Number",
                        digits: "This field is Digits only",
                        minlength: "This field requires minimum length of 7",
                        maxlength: "This field requires max length of 11"
                    },
                    add_blcknum:{
                        digits: "This field is Digits only"
                    },
                    add_zipcode:
                    {
                       digits: "This field is Digits only"
                    }

                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                  form.submit();
                }
              });

              $("form[name='emp_view']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  aemp_first_name:{
                    required: true,
                    alpha:true,
                    maxlength: 30
                  },
                  aemp_middle_name:{
                    alpha:true,
                    maxlength: 20
                  },
                  aemp_last_name:{
                    required: true,
                    alpha:true,
                    maxlength: 20
                  },
                  aemp_contact:{
                    required: true,
                    digits: true,
                    minlength: 7,
                    maxlength: 11
                  },
                  acomm:{
                    required: true,
                    digits: true
                  },
                  aemp_mail:{
                    required:true,
                    email: true,
                    maxlength: 50
                  },
                  aadd_blcknum:{
                      blcknumber: true,
                      maxlength: 10
                  },
                  aadd_street:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  aadd_subdivision:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  aadd_brngy:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  aadd_district:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  aadd_city:
                  {
                      required: true,
                      alphanumeric: true,
                      maxlength: 20
                  },
                  aadd_province:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  aadd_region:
                  {
                      required: true,
                      alphanumeric: true,
                      maxlength: 11
                  },
                  aadd_zipcode:
                  {
                      digits: true,
                      maxlength: 4
                  }
                },
                // Specify validation error messages
                messages: {
                    aemp_first_name:{
                        required: "Empty First Name"
                    },
                    aemp_last_name:{
                        required: "Empty Last Name"
                    },
                    aemp_contact:{
                        required: "Empty Contact Number",
                        digits: "This field is Digits only",
                        minlength: "This field requires minimum length of 7",
                        maxlength: "This field requires max length of 11"
                    },
                    aadd_zipcode:
                    {
                       digits: "This field is Digits only"
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
          $('emp_add').validate();
          $('emp_view').validate();
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
             function areadURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#addImg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            }
        }

        $("#picture").change(function(){
            areadURL(this);
        });

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#editImg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            }
        }

        $("#apicture").change(function(){
            readURL(this);
        });
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

          $('#addEmpModal').on('hidden.bs.modal', function() {
            $('#emp_add').trigger('reset');
          });

          $('#largeModal').on('hidden.bs.modal', function() {
              $('#emp_view').trigger('reset');
              $('#Edit').prop('disabled', false);
              $('#Delete').prop('disabled', false);
              $('#schange').hide();
              $('#aadd_blcknum').prop('disabled', true);
              $('#aadd_street').prop('disabled', true);
              $('#aadd_subdivision').prop('disabled', true);
              $('#aadd_brngy').prop('disabled', true);
              $('#aadd_district').prop('disabled', true);
              $('#aadd_city').prop('disabled', true);
              $('#aadd_province').prop('disabled', true);
              $('#aadd_zipcode').prop('disabled', true);
              $('#aemp_first_name').prop('disabled', true);
              $('#aemp_middle_name').prop('disabled', true);
              $('#aemp_last_name').prop('disabled', true);
              $('#aemp_mail').prop('disabled', true);
              $('#aemp_contact').prop('disabled', true);
              $('#acomm').prop('disabled', true);
          });

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
                  url: '/admin/maintenance/salesagent/ardelete',
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
