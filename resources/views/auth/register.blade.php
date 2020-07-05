<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> {{-- Custom styles css --}}
    <link rel="stylesheet" href="{{ asset('assets/folder_form_register_login/css/style.css') }}">

    <!--Custom styles html-->
    {{--
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"> --}}

</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <!-- signup -->
            <div class="card ">
                <div class="card-header">
                    <h3>Sign up</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off">
                        </div>
                        @if($errors->has('username'))
                        <div class="alert alert-danger">
                            {{ $errors->first('username') }}
                        </div>
                        @endif
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
                        </div>
                        @if($errors->has('password'))
                        <div class="alert alert-danger">
                            {{ $errors->first('password') }}
                        </div>
                        @endif
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="confirmpassword" class="form-control" placeholder="Re-password" required autocomplete="off">
                        </div>
                        @if($errors->has('confirmpassword'))
                        <div class="alert alert-danger">
                            {{ $errors->first('confirmpassword') }}
                        </div>
                        @endif
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Full name" required autocomplete="off">
                        </div>
                        @if($errors->has('name'))
                        <div class="alert alert-danger">
                            {{ $errors->first('name') }}
                        </div>
                        @endif

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="Email" required autocomplete="off">
                        </div>
                        @if($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                        <div class="form-group">
                            <input type="submit" class="btn float-right btn_loginpage" value="Get started">
                        </div> 
                    </form>
                </div>
                <div class="card-footer">
                  <div class="d-flex justify-content-center signup-link">
                      Has an account<a href="{{  route('login') }}"> Login</a>
                  </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('assets/folder_form_register_login/js/index.js') }}"></script>
    <!-- 
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

</body>

</html>