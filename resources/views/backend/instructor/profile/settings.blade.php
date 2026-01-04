@extends('backend.instructor.master')
@section('content')
  <!--start page wrapper -->
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">User Settings</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">User Settings</li>
          </ol>
        </nav>
      </div>
      <div class="ms-auto">
        <div class="btn-group">
          <a href="{{ route('instructor.profile') }}" class="btn btn-primary">Profile</a>          
        </div>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
      <div class="main-body">
        <div class="row">

          @include('backend.instructor.profile.sidebar')

          <div class="col-lg-8">
            <div class="card">

              <form action="{{ route('instructor.update') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Current Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="password" name="password" class="form-control" placeholder="Enter Your Current Password" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">New Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="password" name="new_password" class="form-control" placeholder="Enter Your new Password" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Confirm Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Your Password" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                    </div>
                  </div>
                </div>
              </form>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--end page wrapper -->


@endsection