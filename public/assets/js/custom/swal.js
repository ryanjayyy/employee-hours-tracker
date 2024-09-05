document.addEventListener("success", function (event) {
    console.log('successssss');
    Swal.fire({
        text: event.__livewire.params[0].message,
        icon: "success",
        buttonsStyling: false,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-primary",
        },
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = event.__livewire.params[0].redirect;
        }
    });
});

document.addEventListener("error", function (event) {
    Swal.fire({
        html: '<h3 class="fw-bold">Oops! Something went wrong.</h3><p>' + event.__livewire.params[0].message + '</p>',
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-danger",
        },
    });
});

