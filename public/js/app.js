function deleteFitness(id) {
    event.preventDefault(); // prevent el submit del formulario
    var form = document.getElementById('deleteFitness-'+id)
    swal({
        title: '¿Estás seguro?',
        text: "No podrás deshacer esta operación",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Borrar',
    }).then((result) => {
        if (result.value) {
        form.submit()
    }
})
}