<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
{{--    layout from web--}}
<div class="container pt-3">
    <div class="row justify-content-sm-center">
        <div class="col-sm-6 col-md-4">

            <div class="card border-info text-center">
                <div class="card-header">
                    Sign in to continue
                </div>
                <div class="card-body">
                    <img src="https://placeimg.com/128/128/tech/sepia">
                    <h4 class="text-center">Aptech C2202_01</h4>
                    <form class="form-signin" method="post" action="{{ route('admin.checklogin') }}">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="Email" required autofocus
                               name="email">
                        <input type="password" class="form-control mb-2" placeholder="Password" required
                               name="password">
                        <button class="btn btn-lg btn-primary btn-block mb-1" type="submit">Sign in</button>
                        <label class="checkbox float-left">
                            <input type="checkbox" value="remember-me">
                            Remember me
                        </label>
                        <a href="#" class="float-right">Need help?</a>
                    </form>
                </div>
            </div>
            <a href="#" class="float-right">Create an account </a>
        </div>
    </div>
</div>
{{--    end layout from web--}}
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
