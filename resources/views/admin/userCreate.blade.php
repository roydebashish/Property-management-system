@extends('master')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">New User</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>

<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Fill Up The Form Below</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form class="text-center border border-light p-5" method="POST">
                     {{ csrf_field() }}
            
                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- First name -->
                            <input type="text" name="first_name" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input type="text" name="last_name" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
                        </div>
                    </div>
            
                    <!-- E-mail -->
                    <input type="email" id="email" class="form-control mb-4" placeholder="E-mail">
            
                    <!-- Password -->
                    <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password" aria-describedby="password">
            
                    <!-- Phone number -->
                    <input type="text" id="phone" name="phone" class="form-control mb-4" placeholder="Phone number" aria-describedby="phone">
                
            
                    <!-- Newsletter -->
                    <div class="custom-control custom-checkbox ">
                        <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
                        <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
                    </div>
            
                    <!-- Sign up button -->
                    <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>
                </form>
                <!-- Default form register -->
            </div>
        </div>

    </div>

</div>
 
@endsection