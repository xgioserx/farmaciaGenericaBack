$(document).ready(function () {
  listarLaboratorios();
  $("#btnGuardarLaboratorio").click(guardarLaboratorio);
  $("#btnModificarLaboratorio").click(guardarLaboratorio);
  $("#btnEliminarLaboratorio").click(eliminarLaboratorio);
  $("#btnNuevoLaboratorio").click(limpiarLaboratorio);
  alerta("Laboratorios");
});

//Autoclose
function alerta(texto) {
  $(".alert").slideDown(0, function() {
    document.getElementById('alertaL').innerHTML=texto;
  });
  $(".alert").slideUp(4000, function() {
  });
}

function guardarLaboratorio() {
  let objLaboratorio = {
    id: $("#txtIdLaboratorio").val(),
    nombre: $("#txtNombreL").val(),
    descripcion: $("#txtDescripcionL").val(),
    type: "",
  };
  if (objLaboratorio.nombre !== "" && objLaboratorio.descripcion !== "") {
    if (objLaboratorio.id !== "") {
      objLaboratorio.type = "update";
    } else {
      objLaboratorio.type = "save";
    }
    $.ajax({
      type: "post",
      url: "controller/ctlLaboratorio.php",
      beforeSend: function () {},
      data: objLaboratorio,
      success: function (data) {
        var info = JSON.parse(data);
        if (info.res === "Success") {
          limpiarLaboratorio();
          alerta("Operacion exitosa");
          listarLaboratorios();
        } else {
          limpiarLaboratorio();
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
  listarLaboratorios();
}

function listarLaboratorios() {
  $.ajax({
    type: "post",
    url: "controller/ctlLaboratorio.php",
    beforeSend: function () {},
    data: { type: "list" },
    success: function (respuesta) {
     
      const res = JSON.parse(respuesta);
      
      const info = JSON.parse(res.data);
      
      if (info.length > 0) {
        var lista =
          "<table id='listarLaboratorio' class='display bg-primary mt-4 table table-bordered table-active'>";
        lista += "<thead>";
        lista += "<tr>";
        lista += "<th>Nombre</th>";
        lista += "<th>Descripcion</th>";
        lista += "</tr>";
        lista += "</thead>";
        lista += "<tbody>";

        for (var f = 0; f < info.length; f++) {
          lista += '<tr onclick="buscarLaboratorio(' + info[f].id + ')">';
          lista += "<td>" + info[f].nombre + "</td>";
          lista += "<td>" + info[f].descripcion + "</td>";
          lista += "</tr>";
        }

        lista += "</tbody>";
        lista += "</table>";
        $("#listadoLaboratorio").html(lista);
        try {
          $("#listarLaboratorio").dataTable();
        } catch (exception) {
          console.log("the table canot be converted");
        }
      } else {
        $("#listarLaboratorio").html("<b>No se encuentra informacion</b>");
        limpiarLaboratorio();
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alerta("verifique la ruta de archivo!");
    },
  });
}

function buscarLaboratorio(codigo) {
  $("#txtIdLaboratorio").val(codigo);
  const objLaboratorio = {
    id: $("#txtIdLaboratorio").val(),
    type: "search",
  };
  $.ajax({
    type: "post",
    url: "controller/ctlLaboratorio.php",
    beforeSend: function () {},
    data: objLaboratorio,
    success: function (res) {
      const info = JSON.parse(res);
      let data;
      if (info.res !== "NotInfo") {
        data = JSON.parse(info.data);
      }
      if (info.msj === "Success") {
        $("#txtNombreL").val(data[0].nombre);
        $("#txtDescripcionL").val(data[0].descripcion);
      } else {
        alerta("No se encuentra");
        limpiarLaboratorio();
      }
    },
  });
}

function eliminarLaboratorio() {
  var dato = $("#txtIdLaboratorio").val();
  if (dato === "") {
    alerta("Debe cargar los datos a eliminar");
  } else {
    const objLaboratorio = {
      id: dato,
      type: "delete",
    };

    $.ajax({
      type: "post",
      url: "controller/ctlLaboratorio.php",
      beforeSend: function () {},
      data: objLaboratorio,
      success: function (res) {
        var info = JSON.parse(res);
        if (info.res === "Success") {
          limpiarLaboratorio();
          alerta("Eliminado con exito");
          listarLaboratorios();
        } else {
          alerta("No se pudo eliminar");
          limpiarLaboratorio;
        }
      },
      error: (jqXHR, textStatus, errorThrown) => {
        alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
        alerta("verifique la ruta de archivo!");
      },
    });
  }
}

function limpiarLaboratorio() {
  $("#txtIdLaboratorio").val("");
  $("#txtNombreL").val("");
  $("#txtDescripcionL").val("");
}
