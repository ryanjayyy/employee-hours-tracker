<div wire:ignore.self class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <form id="completeProfileForm" class="form" wire:submit.prevent="completeProfile" id="kt_modal_add_customer_form" data-kt-redirect="{{ route('user.dashboard') }}">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Complete Profile</h2>
                    <!--end::Modal title-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                        data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">

                        <!--begin::Personal Information toggle-->
                        <div class="fw-bold fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
                            href="#kt_modal_add_customer_billing_info" role="button" aria-expanded="false"
                            aria-controls="kt_customer_view_details">Personal Information
                        </div>
                        <!--end::Personal Information toggle-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold mb-2">Name</label>
                            <!--end::Label-->
                            <!--begin::Row-->
                            <div class="row g-3">
                                <!--begin::Column for first name-->
                                <div class="col">
                                    <input type="text" wire:model="firstName" class="form-control form-control-solid"
                                        placeholder="First name" name="first_name" />
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                        @error('firstName')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Column for first name-->
                                <!--begin::Column for middle name-->
                                <div class="col">
                                    <input type="text" wire:model="middleName"
                                        class="form-control form-control-solid" placeholder="Middle name"
                                        name="middle_name" />
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                        @error('middleName')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Column for middle name-->
                                <!--begin::Column for last name-->
                                <div class="col">
                                    <input type="text" wire:model="lastName" class="form-control form-control-solid"
                                        placeholder="Last name" name="last_name" />
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                        @error('lastName')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Column for last name-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Company Information toggle-->
                            <div class="fw-bold fs-3 rotate collapsible mt-7 mb-4" data-bs-toggle="collapse"
                                href="#kt_modal_add_customer_billing_info" role="button" aria-expanded="false"
                                aria-controls="kt_customer_view_details">Company Information
                            </div>
                            <!--end::Company Information toggle-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Row-->
                                <div class="row g-3">
                                    <!--begin::Column for first name-->
                                    <div class="col">
                                        <input type="text" wire:model="companyName"
                                            class="form-control form-control-solid" placeholder="Company Name"
                                            name="companyName" />
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('companyName')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Column for first name-->
                                    <!--begin::Column for middle name-->
                                    <div class="col">
                                        <input type="number" wire:model="ratePerHr" step="0.01" min="0"
                                            class="form-control form-control-solid" placeholder="Rate per hour(PHP)"
                                            name="ratePerHr" pattern="^[0-9.]*$" />
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('ratePerHr')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Column for middle name-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Input group-->
                        </div>




                    </div>
                    <!--end::Scroll-->

                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Reset
                            Form</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button id="completeProfileButton" type="submit" class="btn btn-primary">
                            <span class="indicator-label">Complete Profile</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
            </form>

        </div>
        <!--end::Modal content-->
    </div>
</div>
<script>
    const completeProfileButton = document.getElementById('completeProfileButton');
    completeProfileButton.addEventListener('click', e => {
        e.preventDefault();
        Swal.fire({
            html: `Are you sure you want to confirm this action?`,
            icon: "warning",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Ok, got it!",
            cancelButtonText: 'Nope, cancel it',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then(result => {
            if (result.isConfirmed) {
                // Get the form element
                const form = document.getElementById('completeProfileForm');
                // Dispatch form submission event only if user confirmed and form exists
                if (form) {
                    form.dispatchEvent(new Event('submit', {
                        bubbles: true,
                        cancelable: true
                    }));
                } else {
                    console.error("Form element not found.");
                }
            }
        });
    });
</script>
