jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });

    $("#deleteButton").click(function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'Estás seguro?',
            text: "Una vez borrado no podrás recuperarlo",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Confirmar borrado'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Borrado!',
                    'El archivo ha sido borrado.',
                    'success'

                ).then((result) => {
                    $("form").submit();
                });
            }
        });
    });
});




