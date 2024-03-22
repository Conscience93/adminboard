@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="d-none d-md-block col-md-4 col-xl-10 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <table class="d-flex align-items-center justify-content-between mb-2">
                            <tr>
                                <td><label class="tx-11 fw-bolder mb-0 text-uppercase">Image</label></td>
                                <td><label class="tx-11 fw-bolder mb-0 text-uppercase">Name</label></td>
                                <td><label class="tx-11 fw-bolder mb-0 text-uppercase">Email</label></td>
                                <td><label class="tx-11 fw-bolder mb-0 text-uppercase">Phone</label></td>
                                <td><label class="tx-11 fw-bolder mb-0 text-uppercase">Action</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
            @foreach($userList as $user)
                <div class="card rounded">
                    <div class="card-body">
                        <table class="d-flex align-items-center justify-content-between mb-2">
                            <tr>
                                <td><img class="wd-50 rounded-circle" src="{{ (!empty($user->photo)) ? url('upload/user_images/'.$user->photo) : url('upload/no_image.jpg') }}" alt="profile"></td>
                                <td><label class="tx-11 fw-bolder mb-0">{{ $user->name }}</label></td>
                                <td><label class="tx-11 fw-bolder mb-0">{{ $user->email }}</label></td>
                                <td><label class="tx-11 fw-bolder mb-0">{{ $user->phone }}</label></td>
                                <td>
                                    <a href="{{ url('admin/user/'.$user->id) }}"><button class="btn btn-primary me-2">View</button></a>
                                    <a href="{{ url('admin/user/delete/'.$user->id) }}" class="btn btn-danger me-2 ml-2">Delete</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

@endsection
