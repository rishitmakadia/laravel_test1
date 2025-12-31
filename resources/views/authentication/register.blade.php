@extends('welcome')
@section('title', 'Register Page')

@section('content')
    <h1 class="text-center my-4">Register Page</h1>

    <form class="mx-auto" style="max-width: 400px;" action="{{route('register.post')}}" name="registerForm">
        {{--        @csrf--}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="sno" id="sno">

        <div class="mb-3">
            <label for="registerName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="registerName" name="name" required>
        </div>

        <div class="mb-3">
            <label for="registerUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="registerUsername" name="username" required>
        </div>

        <div class="mb-3">
            <label for="registerEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="registerEmail" name="email" required>
        </div>

        <div class="mb-3">
            <label for="registerPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="registerPassword" name="password" required>
        </div>

        <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" id="termsCheck" required>
            <label class="form-check-label" for="termsCheck">
                I agree to the terms and conditions
            </label>
        </div>

        <button type="button" class="btn btn-primary w-100 mb-4" id="submitRegister" >
            Submit
        </button>

        <div class="text-center">
            <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            <p>or sign up with:</p>

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
        $(document).ready(function () {
            $('#submitRegister').click(function () {
                const form = $("form[name='registerForm']")[0];
                const formData = new FormData(form);
                const url = $(form).attr("action");
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.success) {
                            alert(response.name+" - Registered Successfully")
                            form.reset();
                            window.location.href = response.redirect_url;
                        }else{
                            let errorMsg = "Validation failed:\n";
                            response.errors.forEach(function (err) {
                                errorMsg += "- " + err + "\n";
                            });
                            alert(errorMsg);
                            // window.location.href = response.redirect_url;
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
