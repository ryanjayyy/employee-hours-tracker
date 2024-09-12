@section('title')
    {{ 'Dashboard' }}
@endsection
@section('fullname')
    {{ $fullName }}
@endsection
<div class='m-4'>

    <h2 class=''>{{ $fullName }} </h2>
    <span class="text-muted fw-bold">#{{ $userInfo->employee_id }}</span>
    <hr>
    <div class="card mb-5 mb-xl-8 py-4">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Weekly Time Sheet</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Total Hours: 20H</span>
            </h3>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-7 my-6">

            <div class="d-flex justify-between w-100">
                <div class="d-flex flex-column">
                    <div class="text-end mx-7 mb-2 card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-trigger="hover" data-bs-original-title="Click to add a user" data-kt-initialized="1">
                        <a href="#" class="btn btn-sm btn-success btn-active-success" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_invite_friends">
                            <i class="ki-outline ki-plus fs-2"></i> New Company
                        </a>
                    </div>
                    <!--begin::Table container-->
                    <div class="table-responsive mx-7 p-4 border" style="width: 500px;">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="min-w-200px">Company</th>
                                    <th class="min-w-200px">Grand Total Pay</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                                <tr>
                                    <a href="">
                                        <td>
                                            <span class="fw-semibold d-block fs-7">Leap Out Digital</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold d-block fs-7">PHP 300.00</span>
                                        </td>
                                    </a>
                                </tr>

                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>

                <div class="d-flex flex-column w-100">
                    <div class="d-flex justify-content-end gap-4">
                        <div class="text-end mb-2 card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-trigger="hover" data-bs-original-title="Click to add a user"
                            data-kt-initialized="1">
                            <a href="#" class="btn btn-sm btn-success btn-active-success" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_invite_friends">
                                <i class="ki-duotone ki-arrow-down fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i> Time-in
                            </a>
                        </div>
                        <div class="text-end mb-2 card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-trigger="hover" data-bs-original-title="Click to add a user"
                            data-kt-initialized="1">
                            <a href="#" class="btn btn-sm btn-success btn-active-success" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_invite_friends">
                                <i class="ki-duotone ki-arrow-up fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i> Time-out
                            </a>
                        </div>
                    </div>
                    <!--begin::Table container-->
                    <div class="table-responsive p-4 border mx-7">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="min-w-200px">Date</th>
                                    <th class="min-w-150px">Start Time</th>
                                    <th class="min-w-150px">Finish Time</th>
                                    <th class="min-w-100px">Total Hours</th>
                                    <th class="min-w-100px">Total Pay</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="fw-semibold d-block fs-7">September 09, 2024</span>
                                    </td>

                                    <td>
                                        <span class="fw-semibold d-block fs-7">10:00 AM</span>
                                    </td>

                                    <td>
                                        <span class="fw-semibold d-block fs-7">10:00 PM</span>
                                    </td>

                                    <td>
                                        <span class="fw-semibold d-block fs-7">10:00 PM</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold d-block fs-7">PHP 300.00</span>
                                    </td>
                                </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
            </div>
        </div>
    </div>
    <!--begin::Body-->

    @include('partials.complete-profile')
</div>
</div>

<script>
    $(document).ready(function() {
        // Pass PHP variable to JavaScript
        let userInfo = @json($userInfo);
        console.log(userInfo);

        // Check if userInfo is null and show the modal
        if (userInfo === null) {
            $('#kt_modal_add_customer').modal('show');
        }
    });
</script>
