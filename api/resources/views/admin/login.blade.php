@extends('admin.admin_theme_blank')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center vh-100">
        <div class="col-md-4">
            
            <form class="card p-4 shadow" action="{{ route('adminLoginAction') }}">
                <div class="text-center card-header bg-white border-0">
                    <h1>Login</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="card-footer bg-white border-0">
                    <center>
                        <button type="submit" class="btn btn-primary btn-lg">Login to continue</button>
                    </center>
                </div>
            </div>
            
        </div>
    </div>
</div>
    
@endsection