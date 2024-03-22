@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="d-none d-md-block col-md-4 col-xl-10 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <table class="d-flex align-items-center justify-content-between mb-2">
                            <tr>
                                <td><label class="tx-32 fw-bolder mb-0 text-uppercase">How to use this application in a nutshell</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card rounded">
                    <div class="card-body">
                        <table class="d-flex align-items-center justify-content-between mb-2">
                            <tr>
                                <td><label class="tx-14 fw-bolder mb-0">1. Dashboard is only for beautiful UI showcase. The dashboard is taken from Noble UI.</label></td>
                            </tr>
                            <tr>
                                <td><label class="tx-14 fw-bolder mb-0">2. Admin can create and delete Users but cannot change their information such as name and password.</label></td>
                            </tr>
                            <tr>
                                <td><label class="tx-14 fw-bolder mb-0">3. User and Admin can change their respective information and password.</label></td>
                            </tr>
                            <tr>
                                <td><label class="tx-14 fw-bolder mb-0">4. Admin can see a list of users currently found in the database.</label></td>
                            </tr>
                            <tr>
                                <td><label class="tx-14 fw-bolder mb-0">5. Admin can change print user information.</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card rounded">
                    <div class="card-body">
                        <table class="d-flex align-items-center justify-content-between mb-2">
                            <tr>
                                <td><label class="tx-32 fw-bolder mb-0 text-uppercase">Notable Bugs</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card rounded">
                    <div class="card-body">
                        <table class="d-flex align-items-center justify-content-between mb-2">
                            <tr>
                                <td><label class="tx-14 fw-bolder mb-0">1. User is unable to upload image but admin can upload. It may be due to Laravel boilerplate template.</label></td>
                            </tr>
                            <tr>
                                <td><label class="tx-14 fw-bolder mb-0">2. No phone number validation.</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

