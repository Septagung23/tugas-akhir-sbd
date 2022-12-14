<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    body {
        background-color: #fefae0;
    }
    </style>
</head>

<body>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        <b>Oops!</b> {{ session('error') }}
    </div>
    @endif
    <h1 class="text-center mt-4">DATABASE AKSESORIS GAMING</h1>
    <div class="d-flex align-items-center justify-content-center vh-80">
        <div class="login-form rounded" style="background-color: #faedcd">
            <form action="{{ route('actionLogin') }}" class="mx-4 my-3" method="post">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" />
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button class="btn btn-primary btn-block mb-4">Login</button>
                </div>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Buat akun baru? <a href="/register" style="color: cornflowerblue">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>