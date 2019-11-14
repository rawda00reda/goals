@include('admin.layouts.head')

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Orange</b>SOFT</a>
  </div>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Password</p>
    <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">

        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus type="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <span class="help-block ">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus type="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="help-block ">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group has-feedback">
        <input id="password-confirm" type="password" class="form-control" name="password-confirm" required placeholder="Confirm Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
        </div>
        <!-- /.col -->
      </div>

    </form>
  </div>
  <!-- /.login-box-body -->  
</div>
<!-- /.login-box -->

</body>


<!-- jQuery 3 -->
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('admin/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
