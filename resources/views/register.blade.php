<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>

<body class="bg-success d-flex justify-content-center align-items-center vh-100">

    <form class="bg-white p-5 rounded text-secondary shadow row" style="width: 40rem" action="{{ route('register') }}"
        method="POST">

        @csrf

        <div class="d-flex justify-content-center">
            <img src="https://cdn-icons-png.flaticon.com/512/2609/2609282.png" alt="login-icon" style="height: 7rem" />
        </div>

        <div class="text-center fs-1 fw-bold">Register</div>

        <!-- Name input -->
        <div class="col-md-6">
            <div class="input-group mt-4">
                <div class="input-group-text bg-success">
                    <img src="https://cdn-icons-png.flaticon.com/512/2321/2321232.png" alt="login-icon"
                        style="height: 1rem" />
                </div>
                <input class="form-control bg-light" autofocus="autofocus" type="text" name="username"
                    placeholder="Username" value="{{ old('username') }}" />
            </div>
            @error('username')
                <div class="text-danger font-bold">
                    <strong class="font-weight">{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <!-- Email input -->
        <div class="col-md-6">
            <div class="input-group mt-4">
                <div class="input-group-text bg-success">
                    <img src="https://cdn-icons-png.flaticon.com/512/542/542638.png" alt="login-icon"
                        style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="text" name="email" placeholder="Email" value="{{ old('email') }}" />
            </div>
            @error('email')
                <div class="text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <!--Sexo input -->
        <div class="col-md-3">
            <div class="input-group mt-4 ml-auto">
                <div class="input-group-text bg-success">
                    <img src="https://cdn-icons-png.flaticon.com/512/1725/1725962.png" alt="login-icon" style="height: 1rem" />
                </div>
                <select name="option_sex" id="option_sex" class="form-select font-italic">
                    <option selected>Sexo...</option>
                    <option>Masculino</option>
                    <option>Femenino</option>
                </select>
            </div>
            @error('option_sex')
            <div class="text-danger font-bold">
                <strong class="font-weight">{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <!-- Tipo Document input -->
        <div class="col-md-3">
            <div class="input-group mt-4">
                <div class="input-group-text bg-success">
                    <img src="https://cdn-icons-png.flaticon.com/512/1865/1865661.png" alt="login-icon"
                        style="height: 1rem" />
                </div>
                <select name="option_document" id="option_document" class="form-select">
                    <option selected>Doc...</option>
                    <option>TI</option>
                    <option>CC</option>
                </select>
            </div>
            @error('option_document')
                <div class="text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <!--Document input -->
        <div class="col-md-6">
            <div class="input-group mt-4">
                <div class="input-group-text bg-success">
                    <img src="https://cdn-icons-png.flaticon.com/512/2807/2807696.png" alt="login-icon"
                        style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="text" name="documento" placeholder="Document" value="{{ old('documento') }}" />
            </div>
            @error('documento')
                <div class="text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <!-- Adress input -->
        <div class="col-md-6">
            <div class="input-group mt-4">
                <div class="input-group-text bg-success">
                    <img src="https://cdn-icons-png.flaticon.com/512/3465/3465687.png" alt="password-icon" style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="text" name="direccion" placeholder="Address" value="{{ old('direccion') }}" />
            </div>
            @error('direccion')
                <div class="text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <!-- Telefono input -->
        <div class="col-md-6">
            <div class="input-group mt-4">
                <div class="input-group-text bg-success">
                    <img src="https://cdn-icons-png.flaticon.com/512/15/15874.png" alt="password-icon" style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="text" name="telefono" placeholder="Phone" value="{{ old('telefono') }}" />
            </div>
            @error('telefono')
                <div class="text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <!-- Password input -->
        <div class="col-md-6">
            <div class="input-group mt-4">
                <div class="input-group-text bg-success">
                    <img src="https://cdn-icons-png.flaticon.com/512/2889/2889676.png" alt="password-icon"
                        style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="password" name="password" placeholder="Password" />
            </div>
            @error('password')
                <div class="text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <!-- Confirmation Password input -->
        <div class="col-md-6">
            <div class="input-group mt-4">
                <div class="input-group-text bg-success">
                    <img src="https://cdn-icons-png.flaticon.com/512/11598/11598491.png" alt="password-icon"
                        style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="password" name="password_confirmation"
                    placeholder="Confirm Password" />
            </div>
            @error('password_confirmation')
                <div class="text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="d-flex justify-content-around">
            <div class="d-flex gap-1 align-items-center mt-4">
                <a href="{{ route('login') }}" class="text-decoration-none text-success fw-bold">Login</a>
            </div>
            <div class="d-flex gap-1 align-items-center">
                <button class="btn btn-success text-white w-100 mt-4 fw-semibold shadow-sm"
                    type="submit">Register</button>
            </div>
        </div>
        @isset($success)
            <div class="alert alert-success">
                {{ $success }}

            </div>
        @endisset
        @error('error')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
