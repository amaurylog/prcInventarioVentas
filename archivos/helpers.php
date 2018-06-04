<script>

    // Script evento clic y AJAX
    $("#").click(function(){
        datos = $("#").serialize();
        $.ajax({
            type: "POST",
            data: datos,
            url: "../procesos/",
            success: function(r) {

            }
        });
    });

    // Función para validar campos vacíos
    function validarFormVacio(formulario) {
        datos = $(formulario).serialize();
        d = datos.split("&");
        vacios = 0;

        for(i = 0; i < d.length; i++)
        {
            controles = d[i].split("=");

            if (controles[1] == "A" || controles[1] == "")
            {
                vacios++;
            }

            return vacios;
        }
    }

</script>