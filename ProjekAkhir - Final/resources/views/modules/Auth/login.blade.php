<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body class="bg-black">

<div class="d-flex justify-content-center" style="justify-content: center; margin-top: 100px;">
    <div class="card bg-dark text-white col-lg-4 col-xxl-4" style="align-items: center;">
        <div class="card-header border-0 pt-3 mt-3">
            <h5 class="card-title"><img src="/assets/logo-only.png" alt="Warung Amel" style="width: 300px; height: 75px;"></h5>
        </div>
        <div class="card-body py-3">
            @if (session()->has('loginerror'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginerror') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="/login" method="POST" autocomplete="off" id="form-product" enctype="multipart/form-data">
                @csrf
                <div class="mb-8">
                    <label class="required form-label">Username</label>
                    <input type="text" class="form-control username" name="username" required value="{{ old('username') }}" />
                    @error('username')
                        <div>{{ $message }}</div>
                    @enderror

                    <!-- @if(session()->has('loginerror'))
                        <div role="alert">
                            {{ session('loginerror') }}
                            <button type="button" aria-label="close"></button>
                        </div>
                    @endif -->
                </div>
                <div class="mb-8">
                    <label class="required form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control password" required/>
                </div>
                <div class="text-center mt-1 mb-10">
                    <button class="py-2  px-4 btn btn-md btn-danger mt-3" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>