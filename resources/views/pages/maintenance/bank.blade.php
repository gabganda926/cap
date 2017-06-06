@extends('master')

@section('title', 'Bank - Maintenance | i-Insure')

@section('maintenance','active')

@section('billing','active')

@section('bank','active')

@section('body')
    <section class="content">
        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                BANK
                            </b></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <li>
                                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#addBankModal">
                                    <i class="material-icons">business_center</i>
                                    <span>Add Bank</span>
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
                                        <th>Bank Name</th>
                                        <th>Branch</th>
                                        <th class="col-md-2">Date Created</th>
                                        <th class="col-md-2">Last Update</th>
                                        <th class="col-md-1">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                  @foreach($bank as $bnk)
                                    @if($bnk->del_flag == 0)
                                      @foreach($add as $address)
                                        @if($address->add_ID == $bnk->bank_add_ID)
                                          @foreach($cpr as $cper)
                                            @if($cper->cPerson_ID == $bnk->bank_cperson_ID)
                                             @foreach($pInfo as $Info)
                                              @if($Info->pinfo_ID == $cper->personal_info_ID)
                                            <tr>
                                                <td><input type="checkbox" id="{{$bnk->bank_ID}}" name = "del_check" class="filled-in chk-col-red checkCheckbox"
                                                data-id="{{$bnk->bank_ID}}"/>
                                                <label for="{{$bnk->bank_ID}}"></label></td>
                                                <td>{{ $bnk->bank_name }}</td>
                                                <td>{{ $bnk->bank_code .' '. $address->add_city .' '. 'Branch' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($bnk->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($bnk->created_at)->format('l, h:i:s A').")" }}</td>
                                                <td>{{ \Carbon\Carbon::parse($bnk->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($bnk->updated_at)->format('l, h:i:s A').")" }}</td>
                                                <td>
                                                <button type="button" class="btn bg-light-blue waves-effect" data-toggle="modal" data-target="#largeModal"
                                                data-id='{{ $bnk->bank_ID }}'
                                                data-bnkname='{{ $bnk->bank_name }}'
                                                data-bnkcode='{{ $bnk->bank_code }}'
                                                data-add='{{ $bnk->bank_add_ID }}'
                                                data-cpr='{{ $bnk->bank_cperson_ID }}'
                                                data-cpinfoid = "{{ $cper->personal_info_ID }}"

                                                data-lnumb='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_blcknum }}
                                                  @endif
                                                @endforeach'
                                                data-strt='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_street }}
                                                  @endif
                                                @endforeach'
                                                data-sdiv='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_subdivision }}
                                                  @endif
                                                @endforeach'
                                                data-brg='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_brngy }}
                                                  @endif
                                                @endforeach'
                                                data-distr='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_district }}
                                                  @endif
                                                @endforeach'
                                                data-city='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_city }}
                                                  @endif
                                                @endforeach'
                                                data-prov='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_province }}
                                                  @endif
                                                @endforeach'
                                                data-regn='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_region }}
                                                  @endif
                                                @endforeach'
                                                data-zip='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_zipcode }}
                                                  @endif
                                                @endforeach'

                                                data-cfname='
                                                @foreach($cpr as $cperson)
                                                  @if($cperson->cPerson_ID == $bnk->bank_cperson_ID)
                                                   @foreach($pInfo as $Info)
                                                    @if($cperson->personal_info_ID == $Info->pinfo_ID )
                                                      {{ $Info->pinfo_first_name }}
                                                    @endif
                                                   @endforeach
                                                  @endif
                                                @endforeach'
                                                data-cmname='
                                                @foreach($cpr as $cperson)
                                                  @if($cperson->cPerson_ID == $bnk->bank_cperson_ID)
                                                   @foreach($pInfo as $Info)
                                                    @if($cperson->personal_info_ID == $Info->pinfo_ID )
                                                      {{ $Info->pinfo_middle_name }}
                                                    @endif
                                                   @endforeach
                                                  @endif
                                                @endforeach'
                                                data-clname='
                                                @foreach($cpr as $cperson)
                                                  @if($cperson->cPerson_ID == $bnk->bank_cperson_ID)
                                                   @foreach($pInfo as $Info)
                                                    @if($cperson->personal_info_ID == $Info->pinfo_ID )
                                                      {{ $Info->pinfo_last_name }}
                                                    @endif
                                                   @endforeach
                                                  @endif
                                                @endforeach'
                                                data-ccont='
                                                @foreach($cpr as $cperson)
                                                  @if($cperson->cPerson_ID == $bnk->bank_cperson_ID)
                                                   @foreach($pInfo as $Info)
                                                    @if($cperson->cPerson_ID == $Info->pinfo_ID )
                                                      {{ $Info->pinfo_contact }}
                                                    @endif
                                                   @endforeach
                                                  @endif
                                                @endforeach'
                                                data-cmail='
                                                @foreach($cpr as $cperson)
                                                  @if($cperson->cPerson_ID == $bnk->bank_cperson_ID)
                                                   @foreach($pInfo as $Info)
                                                    @if($cperson->cPerson_ID == $Info->pinfo_ID )
                                                      {{ $Info->pinfo_mail }}
                                                    @endif
                                                   @endforeach
                                                  @endif
                                                @endforeach'


                                                onclick = "
                                                var lnum = $(this).data('lnumb').replace(/^\s+|\s+$/g, '');
                                                var strt = $(this).data('strt').replace(/^\s+|\s+$/g, '');
                                                var divi = $(this).data('sdiv').replace(/^\s+|\s+$/g, '');
                                                var brng = $(this).data('brg').replace(/^\s+|\s+$/g, '');
                                                var dist = $(this).data('distr').replace(/^\s+|\s+$/g, '');
                                                var city = $(this).data('city').replace(/^\s+|\s+$/g, '');
                                                var prov = $(this).data('prov').replace(/^\s+|\s+$/g, '');
                                                var regn = $(this).data('regn').replace(/^\s+|\s+$/g, '');
                                                var zipc = $(this).data('zip').replace(/^\s+|\s+$/g, '');

                                                var cfname = $(this).data('cfname').replace(/^\s+|\s+$/g, '');
                                                var cmname = $(this).data('cmname').replace(/^\s+|\s+$/g, '');
                                                var clname = $(this).data('clname').replace(/^\s+|\s+$/g, '');
                                                var cmail = $(this).data('cmail').replace(/^\s+|\s+$/g, '');
                                                var ccont = $(this).data('ccont').replace(/^\s+|\s+$/g, '');

                                                document.getElementById('abnkid').value = $(this).data('id');
                                                document.getElementById('abank_name').value = $(this).data('bnkname');
                                                document.getElementById('abank_code').value = $(this).data('bnkcode');

                                                document.getElementById('cpersonID').value = $(this).data('cpr');
                                                document.getElementById('pinfo_ID').value = $(this).data('cpinfoid');
                                                document.getElementById('acPerson_first_name').value = cfname;
                                                document.getElementById('acPerson_middle_name').value = cmname;
                                                document.getElementById('acPerson_last_name').value = clname;
                                                document.getElementById('acPerson_email').value = cmail;
                                                document.getElementById('acPerson_contact').value = ccont;

                                                document.getElementById('aaddid').value = $(this).data('add');
                                                document.getElementById('aadd_blcknum').value = lnum;
                                                document.getElementById('aadd_street').value = strt;
                                                document.getElementById('aadd_subdivision').value = divi;
                                                document.getElementById('aadd_brngy').value = brng;
                                                document.getElementById('aadd_district').value = dist;
                                                document.getElementById('aadd_city').value = city;
                                                document.getElementById('aadd_province').value = prov;
                                                document.getElementById('aadd_region').value = regn;
                                                $('#aadd_region').val(regn).change();
                                                document.getElementById('aadd_zipcode').value = zipc;
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
        </div>
    </section>

            <!--VIEW Bank Modal-->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4><br/>Bank Details
                            </h4>
                        </div><br/>
                        <button id = "Edit" style = "margin-left: 55em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('bank_view').action = 'bank/update';
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').show();
                        $('#aadd_blcknum').prop('readonly', false);
                        $('#aadd_street').prop('readonly', false);
                        $('#aadd_subdivision').prop('readonly', false);
                        $('#aadd_brngy').prop('readonly', false);
                        $('#aadd_district').prop('readonly', false);
                        $('#aadd_city').prop('readonly', false);
                        $('#aadd_province').prop('readonly', false);
                        $('#aadd_zipcode').prop('readonly', false);
                        $('#acPerson_first_name').prop('readonly', false);
                        $('#acPerson_middle_name').prop('readonly', false);
                        $('#acPerson_last_name').prop('readonly', false);
                        $('#acPerson_email').prop('readonly', false);
                        $('#acPerson_contact').prop('readonly', false);
                        $('#abank_name').prop('readonly', false);
                        $('#abank_code').prop('readonly', false);
                        $('#schange').html('SAVE CHANGES');
                        ">
                        <i class="material-icons">create</i>
                        <span>Edit</span>
                        </button>
                        <button id = "Delete" type="button" class="btn bg-red btn-lg waves-effect"
                        onclick = "
                        document.getElementById('bank_view').action = 'bank/delete';
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').show();
                        $('#aadd_blcknum').prop('readonly', true);
                        $('#aadd_street').prop('readonly', true);
                        $('#aadd_subdivision').prop('readonly', true);
                        $('#aadd_brngy').prop('readonly', true);
                        $('#aadd_district').prop('readonly', true);
                        $('#aadd_city').prop('readonly', true);
                        $('#aadd_province').prop('readonly', true);
                        $('#aadd_zipcode').prop('readonly', true);
                        $('#acPerson_first_name').prop('readonly', true);
                        $('#acPerson_middle_name').prop('readonly', true);
                        $('#acPerson_last_name').prop('readonly', true);
                        $('#acPerson_email').prop('readonly', true);
                        $('#acPerson_contact').prop('readonly', true);
                        $('#abank_name').prop('readonly', true);
                        $('#abank_code').prop('readonly', true);
                        $('#schange').html('DELETE RECORD');
                        ">
                            <i class="material-icons">delete_sweep</i>
                            <span>Delete</span>
                        </button>  <br/>
                        <div class="modal-body">
                            <form id="bank_view" name="bank_view" action = "" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <h3> <small><b>Basic Information</b></small></h3><br/>
                                <div class="row clearfix">
                                    <div class="col-md-4" style = "display: none;">
                                        <input id = "abnkid" name = "abnkid" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4" style = "display: none;">
                                        <input id = "pinfo_ID" name = "pinfo_ID" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Bank Name :</small></label>
                                                <input id = "abank_name" name = "abank_name" type="text" class="form-control" pattern="[A-Za-z'-]" readonly="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-8">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Bank Code :</small></label>
                                                <input id = "abank_code" name = "abank_code" type="text" class="form-control" readonly="true" pattern="[A-Za-z'-]" >
                                            </div>
                                          <div class="help-info">Ex.: BPI MARIKINA BR</div>
                                        </div>
                                    </div>
                                </div>
                                <h3> <small><b>Contact Person</b></small></h3><br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                      <div class="col-md-4" style = "display: none;">
                                          <input id = "cpersonID" name = "cpersonID" type="text" class="form-control">
                                      </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>First Name :</small></label>
                                                <input id = "acPerson_first_name" name = "acPerson_first_name" type="text" class="form-control" readonly="true" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                             <label><small>Middle Name :</small></label>
                                                <input id = "acPerson_middle_name" name = "acPerson_middle_name" type="text" class="form-control" readonly="true" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                             <label><small>Last Name :</small></label>
                                                <input id = "acPerson_last_name" name = "acPerson_last_name" type="text" class="form-control" readonly="true" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Contact Number :</small></label>
                                                <input id = "acPerson_contact" name = "acPerson_contact" type="text" class="form-control"  readonly="true" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>E-mail :</small></label>
                                                <input id = "acPerson_email" name = "acPerson_email" type="email" class="form-control"  readonly="true" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br/><br/>
                                <h3> <small><b>Bank Address</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Blk&Lot/Bldg/Unit :</small></label>
                                                <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" readonly="true" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Street :</small></label>
                                                <input id = "aadd_street" name = "aadd_street" type="text" class="form-control" readonly="true" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Subdivision :</small></label>
                                                <input id = "aadd_subdivision" name = "aadd_subdivision" type="text" class="form-control" readonly="true" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Barangay :</small></label>
                                                <input id = "aadd_brngy" name = "aadd_brngy" type="text" class="form-control" readonly="true" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>District :</small></label>
                                                <input id = "aadd_district" name = "aadd_district" type="text" class="form-control" readonly="true"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>City/Municipality :</small></label>
                                                <input id = "aadd_city" name = "aadd_city" type="text" class="form-control" readonly="true"  >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Province :</small></label>
                                                <input id = "aadd_province" name = "aadd_province" type="text" class="form-control" readonly="true"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <!-- <div class="form-line">
                                            <label><small>Region :</small></label>
                                                <input id = "aadd_region" name = "aadd_region" type="text" class="form-control" readonly="true"  >
                                            </div> -->
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
                                                <option value = "NCR">Region NCR</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Zip Code :</small></label>
                                                <input id = "aadd_zipcode" name = "aadd_zipcode" type="text" class="form-control" readonly="true" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                    <input id = "aaddid" name = "aaddid" type="text" class="form-control">
                                </div>
                              <br/><br/><br/>
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "atime" name = "atime" type="text" class="form-control">
                              </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                          <button id = "schange" class="btn btn-primary waves-effect" style = "display: none;" type="button" onclick = "
                          document.getElementById('atime').value = formatDate(new Date());
                          if($('#bank_view').valid())
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
                                $('#bank_view').submit();
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
            <!-- #END# VIEW Bank MOdal -->

            <!-- ADD BANK MODAL -->
            <div class="modal fade" id="addBankModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4><br/>Add Bank</h4>
                        </div> <br/>
                        <div class="modal-body">
                            <form id="bank_add" name="bank_add" action = "bank/submit" method="POST" >
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <h3> <small><b>Basic Information</b></small></h3><br/>
                                <div class="row clearfix">
                                    <div class="col-md-4" style = "display: none;">
                                        <input id = "bnkid" name = "bnkid" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">

                                                <input id = "bank_name" name = "bank_name" type="text" class="form-control">
                                                <label class="form-label">Bank Name</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-8">
                                        <div class="form-group form-float">
                                            <div class="form-line">

                                                <input id = "bank_code" name = "bank_code" type="text" class="form-control">
                                                <label class="form-label">Bank Code</label>
                                            </div>
                                          <div class="help-info">Ex.: BPI MARIKINA BR</div>
                                        </div>
                                    </div>
                                </div>
                                <h3> <small><b>Contact Person</b></small></h3><br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">First Name</label>
                                                <input id = "cPerson_first_name" name = "cPerson_first_name" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                             <label class="form-label">Middle Name</label>
                                                <input id = "cPerson_middle_name" name = "cPerson_middle_name" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                             <label class="form-label">Last Name</label>
                                                <input id = "cPerson_last_name" name = "cPerson_last_name" type="text" class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Contact Number</label>
                                                <input id = "cPerson_contact" name = "cPerson_contact" type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">E-mail</label>
                                                <input id = "cPerson_email" name = "cPerson_email" type="email" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br/><br/>
                                <h3> <small><b>Bank Address</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Blk&Lot/Bldg/Unit</label>
                                                <input id = "add_blcknum" name = "add_blcknum" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Street</label>
                                                <input id = "add_street" name = "add_street" type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Subdivision</label>
                                                <input id = "add_subdivision" name = "add_subdivision" type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Barangay</label>
                                                <input id = "add_brngy" name = "add_brngy" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">District</label>
                                                <input id = "add_district" name = "add_district" type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">City/Municipality</label>
                                                <input id = "add_city" name = "add_city" type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Province</label>
                                                <input id = "add_province" name = "add_province" type="text" class="form-control" >
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
                                            <label class="form-label">Zip Code</label>
                                                <input id = "add_zipcode" name = "add_zipcode" type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div> <br/><br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn-primary waves-effect" type="button" onclick = "
                            document.getElementById('time').value = formatDate(new Date());

                            if($('#bank_add').valid())
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
                                  $('#bank_add').submit();

                                document.getElementById('bank_name').value = '';
                                document.getElementById('bank_code').value = '';

                                document.getElementById('cPerson_first_name').value = '';
                                document.getElementById('cPerson_middle_name').value = '';
                                document.getElementById('cPerson_last_name').value = '';
                                document.getElementById('cPerson_email').value = '';
                                document.getElementById('cPerson_contact').value = '';

                                document.getElementById('add_blcknum').value = '';
                                document.getElementById('add_street').value = '';
                                document.getElementById('add_subdivision').value = '';
                                document.getElementById('add_brngy').value = '';
                                document.getElementById('add_district').value = '';
                                document.getElementById('add_city').value = '';
                                document.getElementById('add_province').value = '';
                                document.getElementById('add_region').value = '';
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
            <!-- #END OF MODAL -->

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
                              $("form[name='bank_add']").validate({
                                // Specify validation rules
                                rules: {
                                  // The key name on the left side is the name attribute
                                  // of an input field. Validation rules are defined
                                  // on the right side
                                  bank_name: {
                                    required: true,
                                    alpha: true,
                                    maxlength: 50
                                  },
                                  bank_code:
                                  {
                                    required: true,
                                    maxlength: 10
                                  },
                                  cPerson_first_name:
                                  {
                                    required: true,
                                    alpha: true,
                                    maxlength: 30
                                  },
                                  cPerson_middle_name:
                                  {
                                    alpha: true,
                                    maxlength: 20
                                  },
                                  cPerson_last_name:
                                  {
                                    required: true,
                                    alpha: true,
                                    maxlength: 20
                                  },
                                  cPerson_contact:
                                  {
                                    required: true,
                                    digits: true,
                                    minlength: 7,
                                    maxlength: 11
                                  },
                                  cPerson_email:
                                  {
                                    required: true,
                                    email: true,
                                    maxlength: 50
                                  },
                                  add_blcknum:
                                  {
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
                                    bank_name: {
                                        required: "Empty Bank Name"
                                    },
                                    bank_code:{
                                        required: "Empty Bank Code"
                                    },
                                    cPerson_first_name:{
                                        required: "Empty First Name"
                                    },
                                    cPerson_last_name:{
                                        required: "Empty Last Name"
                                    },
                                    cPerson_contact:{
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

                              $("form[name='bank_view']").validate({
                                // Specify validation rules
                                rules: {
                                  // The key name on the left side is the name attribute
                                  // of an input field. Validation rules are defined
                                  // on the right side
                                  abank_name: {
                                    required: true,
                                    alpha: true,
                                    maxlength: 50
                                  },
                                  abank_code:
                                  {
                                    required: true,
                                    maxlength: 10
                                  },
                                  acPerson_first_name:
                                  {
                                    required: true,
                                    alpha: true,
                                    maxlength: 30
                                  },
                                  acPerson_middle_name:
                                  {
                                    alpha: true,
                                    maxlength: 20
                                  },
                                  acPerson_last_name:
                                  {
                                    required: true,
                                    alpha: true,
                                    maxlength: 20
                                  },
                                  acPerson_contact:
                                  {
                                    required: true,
                                    digits: true,
                                    minlength: 7,
                                    maxlength: 11
                                  },
                                  acPerson_email:
                                  {
                                    required: true,
                                    email: true,
                                    maxlength: 50
                                  },
                                  aadd_blcknum:
                                  {
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
                                    abank_name: {
                                        required: "Empty Bank Name"
                                    },
                                    abank_code:{
                                        required: "Empty Bank Code"
                                    },
                                    acPerson_first_name:{
                                        required: "Empty First Name"
                                    },
                                    acPerson_last_name:{
                                        required: "Empty Last Name"
                                    },
                                    acPerson_contact:{
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

                $( document ).ready(function()
                {
                  $('bank_add').validate();
                  $('bank_view').validate();

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

                  $('#addBankModal').on('hidden.bs.modal', function() {
                    $('#bank_add').trigger('reset');
                  });

                  $('#largeModal').on('hidden.bs.modal', function() {
                      $('#bank_view').trigger('reset');
                      $('#Edit').prop('disabled', false);
                      $('#Delete').prop('disabled', false);
                      $('#schange').hide();
                      $('#aadd_blcknum').prop('readonly', true);
                      $('#aadd_street').prop('readonly', true);
                      $('#aadd_subdivision').prop('readonly', true);
                      $('#aadd_brngy').prop('readonly', true);
                      $('#aadd_district').prop('readonly', true);
                      $('#aadd_city').prop('readonly', true);
                      $('#aadd_province').prop('readonly', true);
                      $('#aadd_zipcode').prop('readonly', true);
                      $('#acPerson_first_name').prop('readonly', true);
                      $('#acPerson_middle_name').prop('readonly', true);
                      $('#acPerson_last_name').prop('readonly', true);
                      $('#acPerson_email').prop('readonly', true);
                      $('#acPerson_contact').prop('readonly', true);
                      $('#abank_name').prop('readonly', true);
                      $('#abank_code').prop('readonly', true);
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

                var IDS = [0];
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
                          url: '/admin/maintenance/bank/ardelete',
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
        </body>

        </html>

@endsection
