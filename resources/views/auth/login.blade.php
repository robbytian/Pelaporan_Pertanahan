<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/icon.ico')}}" />

  <title>Login</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom2.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <div class="product-image">
            <img src="{{asset('images/Logo-3.webp')}}" alt="..." style="width:60%; margin:0" />
          </div>
          <form method="post" action="/login">
            @csrf
            <h1>Silahkan Masuk</h1>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <input type="text" name="username" class="form-control has-feedback-left" id="inputSuccess2" placeholder="First Name">
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <input type="password" name="password" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Password">
              <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class='col-md-12 col-sm-12 col-xs-12 form-group'>
              <button class="col-sm-12 col-xs-12 btn btn-primary submit" href="index.html">Masuk</button>

            </div>

            <div class="separator">



            </div>
          </form>
        </section>
      </div>

    </div>
  </div>
</body>

</html>