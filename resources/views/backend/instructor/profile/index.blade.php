@extends('backend.instructor.master')
@section('content')
  <!--start page wrapper -->
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">User Profile</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
      <div class="ms-auto">
        <div class="btn-group">
          <a href="{{ route('instructor.settings') }}" class="btn btn-primary">Settings</a>
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

              <form action="{{ route('instructor.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ auth()->user()->name }}" />

                      @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ auth()->user()->email }}" />
                      @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        value="{{ auth()->user()->phone }}" />
                      @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <select class="form-select" name="gender">
                        <option value="male" {{ auth()->user()->gender === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ auth()->user()->gender === 'female' ? 'selected' : '' }}>Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Experience</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="experience" class="form-control @error('experience') is-invalid @enderror"
                        value="{{ auth()->user()->experience }}"
                        placeholder="Example : Web Developer, Designer, and Teacher" />
                      @error('experience')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                        value="{{ auth()->user()->address }}" />
                      @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">City</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                        value="{{ auth()->user()->city }}" />
                      @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Country</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="country" class="form-control @error('country') is-invalid @enderror"
                        value="{{ auth()->user()->country }}" />
                      @error('country')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Bio</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <textarea placeholder="Enter your bio" class="form-control @error('bio') is-invalid @enderror"
                        name="bio" rows="6">{{ auth()->user()->bio }}</textarea>
                      @error('bio')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Profile Image</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                        name="photo" />
                      @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
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