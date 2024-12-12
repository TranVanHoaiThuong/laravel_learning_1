@extends('admin.dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="page-content">

    <div class="row">
        <div class="col-12 grid-margin">
        <div class="card">
            <div class="position-relative">
                <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                    <img src="https://via.placeholder.com/1560x370"class="rounded-top" alt="profile cover">
                </figure>
                <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                    <div>
                        <img class="wd-70 rounded-circle" src="{{!empty($profile->photo) ? url('upload/admin_images/' . $profile->photo) : url('upload/no_image.jpg')}}" alt="profile">
                        <span class="h4 ms-3 text-dark">{{$profile->name}}</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
            <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="card-title mb-0">About</h6>
            </div>
            <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                <p class="text-muted">{{$profile->email}}</p>
            </div>
            <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                <p class="text-muted">{{$profile->address}}</p>
            </div>
            <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                <p class="text-muted">{{$profile->phone}}</p>
            </div>
            <div class="mt-3 d-flex social-links">
                <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
                </a>
                <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
                </a>
                <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
                </a>
            </div>
            </div>
        </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8">
            <div class="p-4 border rounded" style="background-color: #0c1427;">
                <h5 class="text-center">Change password</h5>
                <form class="forms-sample" method="post" action="{{route('admin.update.password')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="oldpassword" class="form-label">Old password</label>
                        <input type="password" class="form-control @error('oldpassword') is-invalid @enderror" id="oldpassword" name="oldpassword" autocomplete="off" required>
                        @error('oldpassword')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newpassword" class="form-label">New password</label>
                        <input type="password" class="form-control @error('newpassword') is-invalid @enderror" id="newpassword" name="newpassword" autocomplete="off" required>
                        @error('newpassword')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newpassword_confirmation" class="form-label">Comfirm new password</label>
                        <input type="password" class="form-control" id="newpassword_confirmation" name="newpassword_confirmation" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Save change</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection