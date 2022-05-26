function baja() {
  Swal.fire({
    title: '¿Que accion quieres realizar?',
    showCancelButton: true,
    showDenyButton: false,
    showConfirmButton:false,
    html:'<input type="button" value="id" onclick="consulta()">',
    
    
  })
}


function alta_pdfequipos() {
  window.open('<a href="PDF/bajapdf_equipos.php?id=<?php echo $res["id"]; ?>')
}
function baja_pdfequipos() {
  window.open("../PDF/pdfequipos.php")
}

function consulta() {
  $hola= document.getElementById('<?php echo $row["id"]; ?>');
  window.open('PDF/bajapdf_equipos.php?id="$hola"');
  
  $bd = new mysqli("localhost", "root", "", "inventariosg");
  $sql = "SELECT equipos.id, equipos.tipo, equipos.marca, equipos.modelo, equipos.serie, equipos.placa, colaboradores.nombrecolab, sucursales.nombresucursal, categoria.Nombre, equipos.nombre_equipo FROM equipos INNER JOIN colaboradores ON equipos.cargo=colaboradores.id INNER JOIN sucursales ON equipos.sucursal=sucursales.id INNER JOIN categoria ON equipos.unidad_negocio=categoria.id WHERE equipos.id='$id'";
  $res = mysqli_query($bd, $sql);
  $tot = mysqli_fetch_array($res);
  //return $data;
  
}
function consulta1(id) {
  $.ajax({
    
    data: {"id":id, "accion": "CONSULTAR ID"},
    type: 'POST',
    datatype: 'json'
  }).done(function(response) {
    document.getElementById('id').value=response.id;
  }).fall(function (response) {
    console.log(response);
  });
}

function hola(id) {
  parametros={
    "id":id
  }
  $.ajax({
    data:parametros,
    url:'http://localhost/inventarioSG1.8/PDF/bajapdf_equipos.php?id=7',
    type: 'POST',
    beforeSend:function (params) {},
    success:function (response) {
      console.log(response);
    }
  })
}