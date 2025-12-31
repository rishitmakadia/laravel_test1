@extends('welcome')
@section('title', 'Login Page')
@section('content')
    <h1 class="text-center my-4">Login Page</h1>

    <form class="mx-auto" style="max-width: 400px;" action="{{route('login.post')}}" name="loginForm">
        @csrf
        <input type="hidden" name="sno" id="sno">

        <div class="mb-3">
            <label for="loginEmail" class="form-label">Email/Username</label>
            <input type="email" class="form-control" id="loginEmail" name="emailname" required>
        </div>

        <div class="mb-3">
            <label for="loginPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="loginPassword" name="password" required>
        </div>

        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberCheck">
                    <label class="form-check-label" for="rememberCheck">Remember me</label>
                </div>
            </div>
            <div class="col text-end">
                <a href="#!">Forgot password?</a>
            </div>
        </div>

        <button type="button" class="btn btn-primary w-100 mb-4" id="submitLogin" name="submit">
            Sign in
        </button>

        <div class="text-center">
            <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
            <p>or sign in with:</p>

            <button type="button" class="btn btn-outline-secondary btn-sm mx-1">
                <i class="fab fa-facebook-f"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm mx-1">
                <i class="fab fa-google"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm mx-1">
                <i class="fab fa-x-twitter"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm mx-1">
                <i class="fab fa-github"></i>
            </button>
        </div>
    </form>
    <script>
        $(document).ready(function (){
            $('#submitLogin').click(function (){
                const form = $("form[name='loginForm']")[0];
                const formData = new FormData(form);
                const url = $(form).attr("action");
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    xhrFields: {
                        withCredentials: true // THIS IS CRUCIAL
                    },
                    success: function (response) {
                        if (response.success) {
                        console.log('Response:', response);
                            alert("Login successful");
                            window.location.href = response.redirect_url;
                        } else {
                            let errorMsg = "Login failed:\n";
                            response.errors.forEach(function (err) {
                                errorMsg += "- " + err + "\n";
                            });
                            alert(errorMsg);
                        }
                    },
                    error: function () {
                        alert("Error performing operation");
                    }
                });
            });
        });
    </script>
@endsection
