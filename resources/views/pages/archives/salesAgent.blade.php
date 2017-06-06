@extends('master')

@section('title','Sales Agent - Archives | i-Insure')

@section('archives','active')

@section('asalesagent','active')

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
                                <button id = "reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                    <span>Reactivate</span>
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
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th class="col-md-2">Date Created</th>
                                        <th class="col-md-2">Date Deactivated</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($agent as $agentdata)
                                  @if($agentdata->del_flag == 1)
                                  @foreach($pnf as $pInfo)
                                    @if($agentdata->personal_info_ID == $pInfo->pinfo_ID)
                                  <tr>
                                      <td><input type="checkbox" id="{{$agentdata->agent_ID}}" class="filled-in chk-col-red checkCheckbox" data-id = "{{$agentdata->agent_ID}}"/>
                                      <label for="{{$agentdata->agent_ID}}"></label></td> <!--YUNG ID DAPAT NAG IIBA EVERY RECORD -->
                                      <td><img src="{!! '/image/'.$pInfo->pinfo_picture !!}" style="border:1px solid black;width:150px;height:150px;"></td>
                                      <td>
                                        @if($pInfo->pinfo_middle_name == null)
                                        {{ $pInfo->pinfo_first_name." ".$pInfo->pinfo_last_name }}
                                        @else
                                        {{ $pInfo->pinfo_first_name." ".$pInfo->pinfo_middle_name." ".$pInfo->pinfo_last_name }}
                                        @endif
                                      </td>
                                      <td>{{ $pInfo->pinfo_contact }}</td>
                                      <td>{{ $pInfo->pinfo_mail }}</td>
                                        <td>{{ \Carbon\Carbon::parse($agentdata->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($agentdata->created_at)->format('l, h:i:s A').")" }}</td>
                                        <td>{{ \Carbon\Carbon::parse($agentdata->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($agentdata->updated_at)->format('l, h:i:s A').")" }}</td>
                                        <td>
                                        <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" data-id = "{{$agentdata->agent_ID}}">
                                            <i class="material-icons">autorenew</i>
                                        </button>
                                        <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                            <i class="material-icons">delete_sweep</i>
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

            <!-- View INST MODAL-->
            <div class="modal fade" id="Reactivate" tabindex="-1" role="dialog">
                <div class="modal-dialog animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4>Reactivate
                            </h4>
                        </div><br/>
                            <div class="modal-body">
                                <form id="ctype_view" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-4" style = "display: none;">
                                  <input id = "id" type="text" class="form-control" name="id" pattern="[A-Za-z'-]">
                                </div>
                                    <h5>Are you sure you want to reactivate the selected records?</h5>
                                </form>
                            </div>
                        <div class="modal-footer js-sweetalert">
                            <button id = "reactivate_all" class="btn btn-primary waves-effect" type="button">YES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">NO</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# VIEW INST MODAL -->
        </div>
    </section>

    <script>
        $( document ).ready(function()
        {
          if ($('.checkCheckbox:checked').length > 0)
          {
               $("#reactivate").show();
          }
          else
          {
              $("#reactivate").hide();
          }

          $(".checkCheckbox").change(
            function()
            {
              if ($('.checkCheckbox:checked').length > 0)
              {
                   $("#reactivate").show();
              }
              else
              {
                  $("#reactivate").hide();
              }
             }
          );
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
        $('#reactivate_all').click(function(event){
          IDS = $(".checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('.rbutton').click(function(event){
              $.ajax({

                  type: 'POST',
                  url: '/admin/archives/salesagent/reactive',
                  data: {asd:$(this).data('id'), time:timenow},
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

        $('#reactivate_all').click(function(event){
          event.preventDefault();
              $.ajax({

                  type: 'POST',
                  url: '/admin/archives/salesagent/areactive',
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
