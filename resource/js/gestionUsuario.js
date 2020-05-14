$(document).ready(function () {
  listarUsuarios();
  $("#btnGuardarUsuario").click(guardarUsuario);
  $("#btnModificarUsuario").click(guardarUsuario);
  $("#btnEliminarUsuario").click(eliminarUsuario);
  $("#btnNuevoUsuario").click(limpiarUsuario);
  alerta("Usuarios");
});

//Autoclose
function alerta(texto) {
  $(".alert").slideDown(0, function() {
    document.getElementById('alertaU').innerHTML=texto;
  });
  $(".alert").slideUp(4000, function() {
  });
}

function guardarUsuario() {
  let objUsuario = {
    id: $("#txtIdUsuario").val(),
    cedula: $("#txtCedulaU").val(),
    nombre: $("#txtNombreU").val(),
    apellido: $("#txtApellidoU").val(),
    correo: $("#txtCorreoU").val(),
    usuario: $("#txtUsuarioU").val(),
    password: $("#txtPass1").val(),
    type: "",
  };
  if (
    objUsuario.cedula !== "" &&
    objUsuario.nombre !== "" &&
    objUsuario.apellido !== "" &&
    objUsuario.correo !== "" &&
    objUsuario.usuario !== "" &&
    objUsuario.password !== ""
  ) {
    if (
      /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/.test(
        objUsuario.correo
      )
    ) {
      if (objUsuario.id !== "") {
        objUsuario.type = "update";
      } else {
        objUsuario.type = "save";
      }
      $.ajax({
        type: "post",
        url: "controller/ctlUsuario.php",
        beforeSend: function () {},
        data: objUsuario,
        success: function (data) {
          var info = JSON.parse(data);
          if (info.res === "Success") {
            limpiarUsuario();
            alerta("Operacion exitosa");
            listarUsuarios();
          } else {
            alerta(
              "ya existe un usuario registrado con este numero de cedula o usuario"
            );
          }
        },
        error: (jqXHR, textStatus, errorThrown) => {
          alerta(
            "Error detectado: " + textStatus + "\nException: " + errorThrown
          );
          alerta("verifique la ruta de archivo!");
        },
      });
    } else {
      alerta("Correo no valido");
    }
  } else {
    alerta("Ingrese todos los datos");
  }
}

function listarUsuarios() {
  $.ajax({
    type: "post",
    url: "controller/ctlUsuario.php",
    beforeSend: function () {},
    data: { type: "list" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      if (info.length > 0) {
        var lista =
          "<table id='listarUsuario' class='display bg-primary mt-4 table table-bordered table-active'>";
        lista += "<thead>";
        lista += "<tr>";
        lista += "<th>Cedula</th>";
        lista += "<th>Nombre</th>";
        lista += "<th>Apellido</th>";
        lista += "<th>Correo</th>";
        lista += "<th>Usuario</th>";
        lista += "</tr>";
        lista += "</thead>";
        lista += "<tbody>";

        for (var f = 0; f < info.length; f++) {
          lista += '<tr onclick="buscarUsuario(' + info[f].id + ')">';
          lista += "<td>" + info[f].cedula + "</td>";
          lista += "<td>" + info[f].nombre + "</td>";
          lista += "<td>" + info[f].apellido + "</td>";
          lista += "<td>" + info[f].correo + "</td>";
          lista += "<td>" + info[f].usuario + "</td>";
          lista += "</tr>";
        }

        lista += "</tbody>";
        lista += "</table>";
        $("#listadoUsuario").html(lista);
        try {
          $("#listarUsuario").dataTable();
        } catch (exception) {
          console.log("the table canot be converted");
        }
      } else {
        $("#listarUsuario").html("<b>No se encuentra informacion</b>");
        limpiarLaboratorio();
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alerta("verifique la ruta de archivo!");
    },
  });
}

function limpiarUsuario() {
  $("#txtIdUsuario").val("");
  $("#txtCedulaU").val("");
  $("#txtNombreU").val("");
  $("#txtApellidoU").val("");
  $("#txtCorreoU").val("");
  $("#txtUsuarioU").val("");
  $("#txtPass1").val("");
  $("#txtPass2").val("");
}

function buscarUsuario(codigo) {
  $("#txtIdUsuario").val(codigo);
  const objUsuario = {
    id: $("#txtIdUsuario").val(),
    type: "search",
  };
  $.ajax({
    type: "post",
    url: "controller/ctlUsuario.php",
    beforeSend: function () {},
    data: objUsuario,
    success: function (res) {
      const info = JSON.parse(res);
      let data;
      if (info.res !== "NotInfo") {
        data = JSON.parse(info.data);
      }
      if (info.msj === "Success") {
        $("#txtCedulaU").val(data[0].cedula);
        $("#txtNombreU").val(data[0].nombre);
        $("#txtApellidoU").val(data[0].apellido);
        $("#txtCorreoU").val(data[0].correo);
        $("#txtUsuarioU").val(data[0].usuario);
      } else {
        alerta("No se encuentra");
        limpiarUsuario();
      }
    },
  });
}

function eliminarUsuario() {
  var dato = $("#txtIdUsuario").val();
  if (dato === "") {
    alerta("Debe cargar los datos a eliminar");
  } else {
    const objUsuario = {
      id: dato,
      type: "delete",
    };
    $.ajax({
      type: "post",
      url: "controller/ctlUsuario.php",
      beforeSend: function () {},
      data: objUsuario,
      success: function (res) {
        console.log(res);
        var info = JSON.parse(res);
        if (info.res === "Success") {
          limpiarUsuario();
          alerta("Eliminado con exito");
          listarUsuarios();
        } else {
          alerta("No se pudo eliminar");
          limpiarUsuario;
        }
      },
      error: (jqXHR, textStatus, errorThrown) => {
        alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
        alerta("verifique la ruta de archivo!");
      },
    });
  }
}
