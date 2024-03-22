@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <!-- left wrapper start -->
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Create User</h6>

                            <form class="forms-sample" action="{{ route('admin.user.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span style="color: red">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                    @error('name') is-invalid @enderror>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address <span style="color: red">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="example@example.com"
                                    @error('email') is-invalid @enderror>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" autocomplete="off" placeholder="Optional"
                                    @error('phone') is-invalid @enderror>
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" autocomplete="off" placeholder="Optional">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Temporary Password <span style="color: red">*</span></label>
                                    <input type="text" name="password" class="form-control" id="password" autocomplete="off" placeholder="Minimum 8 characters">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Create!</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <div class="d-none d-xl-block col-xl-3">
            </div>
            <!-- right wrapper end -->
        </div>

    </div>
@endsection
