@extends('admin.template')
@section('title', 'Create admin user')
@section('styles')
<!-- date-range-picker -->
<script src="{{asset('assets/adminlte/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('assets/adminlte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{asset('assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin User
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.box-header -->
      <div class="box box-info">
        <div class="box-body">
            <fieldset>
                <div id="legend">
                    <legend class="">Add</legend>
                </div>
                <form id="form-record" action="/admin/admin-users/new" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="form-group row">
                        <!-- Date Time Start -->
                        <label class="control-label col-md-3 required " for="datetime_start">Fullname: </label>
                        <div class="controls controlsDisplay col-md-7">
                            <div>
                                <input value="{{old('user.name')}}" data-validation="length"  data-validation-length="3-100" type="text" name="user[name]" placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- Date Time Start -->
                        <label class="control-label col-md-3 required " for="datetime_start">Email: </label>
                        <div class="controls controlsDisplay col-md-7">
                            <div>
                                <input value="{{old('user.email')}}" data-validation="email" type="text" name="user[email]" placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- Date Time Start -->
                        <label class="control-label col-md-3 required " for="datetime_start">Password: </label>
                        <div class="controls controlsDisplay col-md-7">
                            <div>
                                <input value="{{old('user.password')}}" data-validation="password_rq" type="password" id="user_password" name="password" placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>  
                     
                    <div class="form-group row">
                        <!-- Date Time Start -->
                        <label class="control-label col-md-3 required " for="datetime_start">Confirm password:</label>
                        <div class="controls controlsDisplay col-md-7">
                            <div>
                              <input value="{{old('user.password')}}" data-validation="confirm_password_df" type="password" name="password_confirm" placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>                                      

                    <div class="form-group">
                        <!-- Avata -->
                        <label class="control-label col-md-3" for="avata">Avatar</label>
                        <div class="controls col-md-7">
                            <input value="{{old('image')}}" type="file" name="image" placeholder="" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                      <div class="controls col-md-10">
                          <a style="margin-left:10px;" href="/admin/admin-users/all" class="btn btn-info cancelBtt pull-right">Cancel</a>
                          <input class="btn btn-success pull-right" type="submit" name="btn_submit" value="Add">
                      </div>
                    </div>     

                </form>
            </fieldset>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box-body -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('scripts')
<script>
  $( document ).ready( function () {
    $.formUtils.addValidator({
      name : 'confirm_password_df',
      validatorFunction : function(value, $el, config, language, $form) {
          var password_new  = $("#user_password").val();
          if(value.length < 5 || value.length > 15){
            this.errorMessage = "Input Password and Submit [5 to 15 characters which contain not alow * &]";
            return false;
          }
          if(value === password_new){
            return true;
          }else{
            this.errorMessage = "Confirm password does not match !";
            return false;
          }
      },
      errorMessage : 'Confirm password does not match !',
      errorMessageKey: 'badEvenNumber'
    });

    $.formUtils.addValidator({
      name : 'password_rq',
      validatorFunction : function(value, $el, config, language, $form) {
        if(value.length < 5 || value.length > 15){
          return false;
        }
        if((value.indexOf("&")>-1) || (value.indexOf("*") >-1)){
          return false;
        }else{
          return true;
        }
      },
      errorMessage : 'Input Password and Submit [5 to 15 characters which contain not alow * &]',
      errorMessageKey: 'badEvenNumber'
    });
    $.validate({
    });
  });
</script>
@endsection