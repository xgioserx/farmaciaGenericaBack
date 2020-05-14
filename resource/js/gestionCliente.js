$(document).ready(function () {
  listarClientes();
  $("#btnGuardarCliente").click(guardarCliente);
  $("#btnModificarCliente").click(guardarCliente);
  $("#btnEliminarCliente").click(eliminarCliente);
  $("#btnNuevoCliente").click(limpiarCliente);
  alerta("Clientes");
});

//Autoclose
function alerta(texto) {
  $(".alert").slideDown(0, function() {
    document.getElementById('alertaC').innerHTML=texto;
  });
  $(".alert").slideUp(4000, function() {
  });
}

function guardarCliente() {
  let objCliente = {
    id: $("#txtIdCliente").val(),
    nombre: $("#txtNombreC").val(),
    apellido: $("#txtApellidoC").val(),
    cedula: $("#txtCedulaC").val(),
    genero: $("#selGenero").val(),
    fecha_nacimiento: $("#txtFechaNacimientoC").val(),
    type: "",
  };
  if (
    objCliente.nombre !== "" &&
    objCliente.apellido !== "" &&
    objCliente.cedula !== "" &&
    objCliente.genero !== "2" &&
    objCliente.fecha_nacimiento !== ""
  ) {
    if (objCliente.id !== "") {
      objCliente.type = "update";
    } else {
      objCliente.type = "save";
    }
    $.ajax({
      type: "post",
      url: "controller/ctlCliente.php",
      beforeSend: function () {},
      data: objCliente,
      success: function (data) {
        var info = JSON.parse(data);
        if (info.res === "Success") {
          limpiarCliente();
          alerta("Operacion exitosa");
          listarClientes();
        } else {
          alerta(
            "ya existe un cliente registrado con este usuario o numero de cedula"
          );
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

function buscarCliente(codigo) {
  $("#txtIdCliente").val(codigo);
  const objCliente = {
    id: $("#txtIdCliente").val(),
    type: "search",
  };
  $.ajax({
    type: "post",
    url: "controller/ctlCliente.php",
    beforeSend: function () {},
    data: objCliente,
    success: function (res) {
      const info = JSON.parse(res);
      let data;
      if (info.res !== "NotInfo") {
        data = JSON.parse(info.data);
      }
      if (info.msj === "Success") {
        $("#txtNombreC").val(data[0].nombre);
        $("#txtApellidoC").val(data[0].apellido);
        $("#txtCedulaC").val(data[0].cedula);
        $("#selGenero").val(data[0].genero);
        $("#txtFechaNacimientoC").val(data[0].fecha_nacimiento);
      } else {
        alerta("No se encuentra");
        limpiarCliente();
      }
    },
  });
}

function eliminarCliente() {
  var dato = $("#txtIdCliente").val();
  if (dato === "") {
    alerta("Debe cargar los datos a eliminar");
  } else {
    const objCliente = {
      id: dato,
      type: "delete",
    };
    $.ajax({
      type: "post",
      url: "controller/ctlCliente.php",
      beforeSend: function () {},
      data: objCliente,
      success: function (res) {
        var info = JSON.parse(res);
        if (info.res === "Success") {
          limpiarCliente();
          alerta("Eliminado con exito");
          listarClientes();
        } else {
          alerta("No se pudo eliminar");
          limpiarClientes();
        }
      },
      error: (jqXHR, textStatus, errorThrown) => {
        alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
        alerta("verifique la ruta de archivo!");
      },
    });
  }
}

function listarClientes() {
  $.ajax({
    type: "post",
    url: "controller/ctlCliente.php",
    beforeSend: function () {},
    data: { type: "list" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      if (info.length > 0) {
        var lista =
          "<table id='listarCliente' class='display bg-primary mt-4 table table-bordered table-active'>";
        lista += "<thead>";
        lista += "<tr>";
        lista += "<th>Cedula</th>";
        lista += "<th>Nombre</th>";
        lista += "<th>Apellido</th>";
        lista += "<th>Genero</th>";
        lista += "<th>Fecha de Nacimiento</th>";
        lista += "</tr>";
        lista += "</thead>";
        lista += "<tbody>";

        for (var f = 0; f < info.length; f++) {
          lista += '<tr onclick="buscarCliente(' + info[f].id + ')">';
          lista += "<td>" + info[f].cedula + "</td>";
          lista += "<td>" + info[f].nombre + "</td>";
          lista += "<td>" + info[f].apellido + "</td>";
          if (info[f].genero === "0") {
            lista += "<td>Maculino</td>";
          } else {
            lista += "<td>Femenino</td>";
          }
          lista += "<td>" + info[f].fecha_nacimiento + "</td>";
          lista += "</tr>";
        }

        lista += "</tbody>";
        lista += "</table>";
        $("#listadoCliente").html(lista);
        try {
          $("#listarCliente").dataTable();
        } catch (exception) {
          console.log("the table canot be converted");
        }
      } else {
        $("#listarCliente").html("<b>No se encuentra informacion</b>");
        limpiarLaboratorio();
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alerta("verifique la ruta de archivo!");
    },
  });
}

function limpiarCliente() {
  $("#txtIdCliente").val("");
  $("#txtNombreC").val("");
  $("#txtApellidoC").val("");
  $("#txtCedulaC").val("");
  $("#selGenero").val(2);
  $("#txtFechaNacimientoC").val("");
}
