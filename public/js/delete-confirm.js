$(".delete-user").on("click", function () {
    const dataId = $(this).data("id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/user/delete/" + dataId + "";
            Swal.fire(
                "Deleted!",
                "User with id " + dataId + "",
                "success"
            );
        } else {
            Swal.fire({
                text: "Your Data is safe :)",
                icon: "info",
            });
        }
    });
});
