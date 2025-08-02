<!DOCTYPE html>
<html>

<head>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h3 class="text-center mb-4">Login Admin</h3>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="POST" action="{{ url('/admin/login') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button class="btn btn-primary w-100">Login</button>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">{{ $errors->first() }}</div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>

</html>
