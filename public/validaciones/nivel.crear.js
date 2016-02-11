$(document).ready(function(){
    $("#nivel").keyup(function () {
        var nivel = $('#nivel').val();
        if (nivel != "") {
            $.ajax({
                method: "GET",
                url: "nivels",
                data: "nivel="+nivel,
                success: function (data) {
                    if(data == 'Disponible'){
                        $('#info').html("<div class='alert alert-success'><b>Disponible</b></div>");
                        return true;
                    }else{
                        $('#info').html("<div class='alert alert-danger'><b>No Disponible</b></div>");
                        return false;
                    }
                }
            });
        }
    });

    $('#form').submit(function(){
        var nivel = $('#nivel').val();
        if(nivel.length > 80 || nivel.length == ""){
            $('#info').html("<div class='alert alert-danger'><b>El campo Nombre de Nivel debe ser menor a 80 caracteres y no debe estar vacio.</b></div>");
            return false;
        }
    });


});