@extends('master')

@section('title','Form - Controller | i-Insure')

@section('body')
	<section class="content">
        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-7 col-sm-7 col-xs-7">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                Form
                            </b></h2>
                        </div>
                        <div class="body">
                            <input type="text" name="title">
                            <textarea name="shit"></textarea>
                            <div class="form"></div>
                            <input type="submit" name="hello" value="hello">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
    <script type="text/javascript" src="{{URL::asset('jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('form-builder.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('form-render.min.js')}}"></script>
    <script type="text/javascript">
        options = {
            dataType: 'json',
            
        }
        form = $('#form').formBuilder(options);
    </script>
@stop