$(document).ready(function() {

})
$('#login-admin').on('submit', function(e) {
    e.preventDefault();

    var datos = $(this).serializeArray();

    $.ajax({
        type: $(this).attr('method'),
        data: datos,
        url: $(this).attr('action'),
        dataType: 'json',
        success: function(data) {
            console.log(data);
            var resultado = data;

            if (resultado.respuesta == 'exitoso') {
                swal({
                    title: 'Login Correcto!',
                    text: 'Bienvenid@ ' + resultado.usuario + ' !! ',
                    type: 'success'
                });
                setTimeout(function() {
                    window.location.href = 'admin-area.php';
                }, 2000);
            } else {
                swal({
                    title: 'Error!',
                    text: 'Usuario o password incorresto!',
                    type: 'error'
                });
            }


        }
    })
});