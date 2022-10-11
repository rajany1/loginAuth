<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>registration</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 20px">
            <h4>registration</h4>
            <hr>
                <form action="{{route('register-user')}}" method="post">
                    @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    <div class="from-group">
                        <label for="name">Full name</label><br>
                        <input type="text" class="from-control" name="name" placeholder="Enter Full name" value="{{old('name')}}"><br>
                        <span class="text-danger">
                            @error('name') {{$message}} @enderror
                        </span>
                    </div>
                    <div class="from-group">
                        <label for="email">Email</label><br>
                        <input type="text" class="from-control" name="email" placeholder="Enter email" value="{{old('email')}}"><br>
                        <span class="text-danger">
                            @error('email') {{$message}} @enderror
                        </span>
                    </div>
                    <div class="from-group">
                        <label for="password">password</label><br>
                        <input type="password" class="from-control" name="password" placeholder="Enter password" value="{{old('password')}}"><br>
                        <span class="text-danger">
                            @error('password') {{$message}} @enderror
                        </span>
                    </div>
                    <div class="from-group"><br>
                    <button class="btn btn-block btn-primary" type="submit">register</button>
                    </div>
                    <br>
                    <a href="login">Already register !!</a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</html>