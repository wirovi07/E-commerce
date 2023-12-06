<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="bg-success d-flex justify-content-center align-items-center vh-100">

        <form class="bg-white p-5 rounded text-secondary shadow" style="width: 25rem" action="{{ route('login')}}" method="POST">

            @csrf

            <div class="d-flex justify-content-center">
                <img src="https://cdn-icons-png.flaticon.com/512/2609/2609282.png" alt="login-icon" style="height: 7rem"/>
            </div>

            <div class="text-center fs-1 fw-bold">Login</div>

            <!-- Email input -->
            <div class="input-group mt-4">
                <div class="input-group-text bg-success">
                    <img src="https://cdn-icons-png.flaticon.com/512/2321/2321232.png" alt="login-icon"  style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="text" name="email" placeholder="Username" />
            </div>
            @error('email')
                <div class="text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <!-- Password input -->
            <div class="input-group mt-1">
                <div class="input-group-text bg-success">
                    <img src="https://cdn-icons-png.flaticon.com/512/2889/2889676.png" alt="password-icon" style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="password" name="password" placeholder="Password"/>
            </div>
            @error('password')
                <div class="text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <div class="d-flex justify-content-around mt-1">
                <div class="d-flex align-items-center gap-1">
                    <input class="form-check-input" type="checkbox" />
                    <div class="pt-1" style="font-size: 0.9rem">Remember me</div>
                </div>
                <div class="pt-1">
                    <a href="#" class="text-decoration-none text-success fw-semibold fst-italic" style="font-size: 0.9rem">Forgot your password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button class="btn btn-success text-white w-100 mt-4 fw-semibold shadow-sm" type="submit" >Sign in</button>

            <!-- Register buttons -->
            <div class="d-flex gap-1 justify-content-center mt-1">
                <div>Don't have an account?</div>
                    <a href="{{ route('register')}}" class="text-decoration-none text-success fw-bold">Register</a>
            </div>

            <div class="p-3">
                <div class="border-bottom text-center" style="height: 0.9rem">
                    <span class="bg-white px-3">or</span>
                </div>
            </div>

            <div class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm">
                <img src="https://cdn-icons-png.flaticon.com/512/2702/2702602.png" alt="google-icon" style="height: 1.6rem"/>
                <div class="fw-semibold text-secondary">Continue with Google</div>
            </div>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
