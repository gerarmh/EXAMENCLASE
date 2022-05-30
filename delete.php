<script type="text/javascript">
    function ConfirmDelete() {

        //Antes de realizar la funcion de eliminar mostara en pantalla al usuario el sig mensaje
        var respuesta = confirm("¿ESTÁS SEGURO DE ELIMINAR ESTE REGISTRO?");
        //Enviara un valor de verdadero y se ejecutara la funcion de eliminar
        if (respuesta == true)

        {
            return true;
        }
        //Se ejecuta el valor de falso y se cancela la eliminacion de los datos
        else {
            return false;
        }

    }

  
</script>