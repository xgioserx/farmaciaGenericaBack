$(document).ready(function () {
  listarInventario();
  $("#btnGuardarInventario").click(guardarInventario);
  $("#btnModificarInventario").click(guardarInventario);
  $("#btnEliminarInventario").click(eliminarInventario);
  $("#btnNuevoProducto").click(limpiarInventario);
  alerta("Inventario");
});

//Autoclose
function alerta(texto) {
  $(".alert").slideDown(0, function() {
    document.getElementById('alertaI').innerHTML=texto;
  });
  $(".alert").slideUp(4000, function() {
  });
}

function guardarInventario() {
  let objInventario = {
    id: $("#txtIdInventarioMedico").val(),
    nombre: $("#txtNombreI").val(),
    descripcion: $("#txtDescripcionI").val(),
    fecha_vencimiento: $("#txtFechaVencimientoI").val(),
    cantidad: $("#txtCantiadI").val(),
    fecha_fabricacion: $("#txtFechaFabricacionI").val(),
    precio: $("#txtPrecioI").val(),
    usuario_id: $("#txtCedulaUsuarioI").val(),
    laboratorio_id: $("#selLaboratorio").val(),
    type: "",
  };
  if (
    objInventario.nombre !== "" &&
    objInventario.descripcion !== "" &&
    objInventario.fecha_vencimiento !== "" &&
    objInventario.cantidad !== "" &&
    objInventario.fecha_fabricacion !== "" &&
    objInventario.precio !== "" &&
    objInventario.laboratorio_id !== "-1"
  ) {
    if (objInventario.id !== "") {
      objInventario.type = "update";
    } else {
      objInventario.type = "save";
    }
    $.ajax({
      type: "post",
      url: "controller/ctlInventarioMedico.php",
      beforeSend: function () {},
      data: objInventario,
      success: function (data) {
        var info = JSON.parse(data);
        if (info.res === "Success") {
          limpiarInventario();
          alerta("Operacion exitosa");
          listarInventario();
        } else {
          alerta("No se pudo almacenar");
        }
      },
      error: (jqXHR, textStatus, errorThrown) => {
        alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
        alerta("verifique la ruta de archivo!");
      },
    });
  } else {
    alerta("Ingrese todos los datos");
  }
}

function buscarInventario(codigo) {
  $("#txtIdInventarioMedico").val(codigo);
  const objInventario = {
    id: $("#txtIdInventarioMedico").val(),
    type: "search",
  };
  $.ajax({
    type: "post",
    url: "controller/ctlInventarioMedico.php",
    beforeSend: function () {},
    data: objInventario,
    success: function (res) {
      const info = JSON.parse(res);
      let data;
      if (info.res !== "NotInfo") {
        data = JSON.parse(info.data);
      }
      if (info.msj === "Success") {
        $("#txtNombreI").val(data[0].nombre);
        $("#txtDescripcionI").val(data[0].descripcion);
        $("#txtFechaVencimientoI").val(data[0].fecha_vencimiento);
        $("#txtCantiadI").val(data[0].cantidad);
        $("#txtFechaFabricacionI").val(data[0].fecha_fabricacion);
        $("#txtPrecioI").val(data[0].precio);
        $("#selLaboratorio").val(data[0].laboratorio_id);
      } else {
        alerta("No se encuentra");
        limpiarInventario();
      }
    },
  });
}

function eliminarInventario() {
  var dato = $("#txtIdInventarioMedico").val();
  if (dato === "") {
    alerta("Debe cargar los datos a eliminar");
  } else {
    const objInventario = {
      id: dato,
      type: "delete",
    };
    $.ajax({
      type: "post",
      url: "controller/ctlInventarioMedico.php",
      beforeSend: function () {},
      data: objInventario,
      success: function (res) {
        var info = JSON.parse(res);
        if (info.res === "Success") {
          limpiarInventario();
          alerta("Eliminado con exito");
          listarInventario();
        } else {
          alerta("No se pudo eliminar");
          limpiarInventario;
        }
      },
      error: (jqXHR, textStatus, errorThrown) => {
        alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
        alerta("verifique la ruta de archivo!");
      },
    });
  }
}

function listarInventario() {
  $.ajax({
    type: "post",
    url: "controller/ctlInventarioMedico.php",
    beforeSend: function () {},
    data: { type: "list" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
       
      if (info.length > 0) {
        var lista =
          "<table id='listarInventario' class='display bg-primary mt-4 table table-bordered table-active'>";
        lista += "<thead>";
        lista += "<tr>";
      lista += "<th>Nombre</th>";
      lista += "<th>Descripcion</th>";
      lista += "<th>Cantidad</th>";
      lista += "<th>Precio</th>";
      lista += "<th>Fecha fabricacion</th>";
      lista += "<th>Fecha vencimiento</th>";
      lista += "<th>Laboratorio</th>";
      lista += "<th>Usuario responsable</th>";
      lista += "</tr>";
      lista += "</thead>";
      lista += "<tbody>";

      for (var f = 0; f < info.length; f++) {
        lista += '<tr onclick="buscarInventario(' + info[f].id + ')">';
        lista += "<td>" + info[f].nombre + "</td>";
        lista += "<td>" + info[f].descripcion + "</td>";
        lista += "<td>" + info[f].cantidad + "</td>";
        lista += "<td>" + info[f].precio + "</td>";
        lista += "<td>" + info[f].fabricacion + "</td>";
        lista += "<td>" + info[f].vencimiento + "</td>";
        lista += "<td>" + info[f].laboratorio + "</td>";
        lista += "<td>" + info[f].usuario + "</td>";
          lista += "</tr>";
        }

        lista += "</tbody>";
        lista += "</table>";
        $("#listadoInventario").html(lista);
        try {
          $("#listarInventario").dataTable();
        } catch (exception) {
          console.log("the table canot be converted");
        }
      } else {
        $("#listarInventario").html("<b>No se encuentra informacion</b>");
        limpiarLaboratorio();
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alerta("verifique la ruta de archivo!");
    },
  });
}

function limpiarInventario() {
  $("#txtIdInventarioMedico").val("");
  $("#txtNombreI").val("");
  $("#txtDescripcionI").val("");
  $("#txtFechaVencimientoI").val("");
  $("#txtCantiadI").val("");
  $("#txtFechaFabricacionI").val("");
  $("#txtPrecioI").val("");
  $("#selLaboratorio").val("-1");
}
