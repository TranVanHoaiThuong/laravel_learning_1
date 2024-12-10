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
                <div class="d-none d-md-block">
                <button class="btn btn-primary btn-icon-text">
                    <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                </button>
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
                <h5 class="text-center">Update profile</h5>
                <form class="forms-sample" method="post" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{$profile->username}}" autocomplete="off" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$profile->name}}" autocomplete="off" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$profile->email}}" autocomplete="off" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$profile->phone}}" autocomplete="off" placeholder="Phone">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$profile->address}}" autocomplete="off" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <img class="wd-70 rounded" id="show-image" src="{{!empty($profile->photo) ? url('upload/admin_images/' . $profile->photo) : url('upload/no_image.jpg')}}" alt="profile">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Save change</button>
                </form>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#photo').on('change', function(e) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#show-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        })
    });
</script>
@endsection