@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form id="login-form">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" type="text" name="username" class="form-control" required>
                            <div id="username-error" class="text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" class="form-control" required>
                            <div id="password-error" class="text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" onclick="comeHerethere()">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function comeHerethere() {
        console.log("jQuery loaded:", $);
        $.ajax({
            url: '{{ route('login') }}',
            type: 'POST',
            data: $('#login-form').serialize(),
            success: function(response) {
                if (response.success) {
                    window.location.href = response.redirectUrl;
                } else {
                    $('#username-error').text(response.errors.username || '');
                    $('#password-error').text(response.errors.password || '');
                }
            },
            error: function(xhr) {
                console.error('AJAX Error:', xhr.responseText);
            }
        });
    }
</script>

@endsection
