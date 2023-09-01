@extends('admin-panel.layouts.layout_login')

@section('content')

<div class="card">

    <!-- Logo -->
    <div class="card-header py-4 text-center bg-primary">
        <a href="index.html">
            <span><img src="{{asset('admin-assets/images/logo.png')}}" alt="logo" height="22"></span>
        </a>
    </div>

    <div class="card-body p-4">
        
        <div class="text-center w-75 m-auto">
            <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
            <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
        </div>

        <form action="{{route('admin.login.submit')}}" method="post">
            @csrf
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Xəta - </strong> {{session('error')}}
                </div>
            
                
            @endif
            <div class="mb-3">
                <label for="emailaddress" class="form-label">Email address</label>
                <input class="form-control" type="email" id="emailaddress" required placeholder="Enter your email" name="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" placeholder="Enter your password" required name="password">
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                </div>
            </div>

            <div class="mb-3 mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                </div>
            </div>

            <div class="mb-3 mb-0 text-center">
                <button class="btn btn-primary btn-lg" type="submit"> Log In </button>
            </div>

        </form>
    </div> <!-- end card-body -->
</div>
    
@endsection