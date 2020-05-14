$(document).ready(function () {
  listarCarrito();
  listarVentas();
  $("#btnGuardarVenta").click(guardarVenta);
  $("#btnModificarVenta").click(guardarVenta);
  $("#btnEliminarVenta").click(eliminarVenta);
  $("#btnNuevaVenta").click(limpiarVenta);
  $("#btnAgregarProductoVenta").click(guardarItemCarrito);
  alerta("Ventas");
  vaciarCarrito();
});

//Autoclose
function alerta(texto) {
  $(".alert").slideDown(0, function() {
    document.getElementById('alertaV').innerHTML=texto;
  });
  $(".alert").slideUp(4000, function() {
  });
}


function eliminarVenta() {
  var dato = $("#txtIdVenta").val();
  if (dato === "") {
    alerta("Debe cargar los datos a eliminar");
  } else {
    const objVentas = {
      id: dato,
      type: "delete",
    };
    $.ajax({
      type: "post",
      url: "controller/ctlVenta.php",
      beforeSend: function () {},
      data: objVentas,
      success: function (res) {
        var info = JSON.parse(res);
        if (info.res === "Success") {
          limpiarVenta();
          alerta("Eliminado con exito");
          listarVentas();
        } else {
          alerta("No se pudo eliminar");
          limpiarVenta();
        }
      },
      error: (jqXHR, textStatus, errorThrown) => {
        alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
        alerta("verifique la ruta de archivo!");
      },
    });
  }
}

function listarVentas() {
  $.ajax({
    type: "post",
    url: "controller/ctlVenta.php",
    beforeSend: function () {},
    data: { type: "list" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      if (info.length > 0) {
        var lista =
          "<table id='listarVenta' class='display bg-primary mt-4 table table-bordered table-active'>";
        lista += "<thead>";
        lista += "<tr>";
        lista += "<th>Venta</th>";
        lista += "<th>Fecha</th>";
        lista += "<th>Hora</th>";
        lista += "<th>Valor total</th>";
        lista += "<th>Cliente</th>";
        lista += "<th>Usuario responsable</th>";
        lista += "</tr>";
        lista += "</thead>";
        lista += "<tbody>";

        for (var f = 0; f < info.length; f++) {
          lista += '<tr onclick="buscarVenta(' + info[f].id + ')">';
          lista += "<td>" + info[f].id + "</td>";
          lista += "<td>" + info[f].fecha + "</td>";
          lista += "<td>" + info[f].hora + "</td>";
          lista += "<td>" + info[f].valor_total + "</td>";
          lista += "<td>" + info[f].cliente + "</td>";
          lista += "<td>" + info[f].usuario + "</td>";
          lista += "</tr>";
        }

        lista += "</tbody>";
        lista += "</table>";
        $("#listadoVenta").html(lista);
        try {
          $("#listarVenta").dataTable();
        } catch (exception) {
          console.log("the table canot be converted");
        }
      } else {
        $("#listarVenta").html("<b>No se encuentra informacion</b>");
        limpiarLaboratorio();
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alerta("verifique la ruta de archivo!");
    },
  });
}

function buscarVenta(codigo) {
  $("#txtIdVenta").val(codigo);
  const objVentas = {
    id: $("#txtIdVenta").val(),
    type: "search",
  };
  $.ajax({
    type: "post",
    url: "controller/ctlVenta.php",
    beforeSend: function () {},
    data: objVentas,
    success: function (res) {
      const info = JSON.parse(res);
      let data;
      if (info.res !== "NotInfo") {
        data = JSON.parse(info.data);
      }
      if (info.msj === "Success") {
        $("#txtIdVenta").val(data[0].id);
        $("#txtFechaVentaV").val(data[0].fecha_venta);
        $("#txtHoraV").val(data[0].hora);
        $("#selCliente").val(data[0].cliente_id);
        
        listarCarritoDeVenta(codigo);
        
      } else {
        alerta("No se encuentra");
        limpiarVenta();
      }
    },
  });
}

function listarCarritoDeVenta(codigo) {
  $.ajax({
    type: "post",
    url: "controller/ctlDetalleVenta.php",
    beforeSend: function () {},
    data: {type: "search",venta_id:codigo},
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      if (res.msj === "Success") {
        
        if (info.length > 0) {
          var lista =
            "<table id='listarCarrito' class='display bg-primary mt-4 table table-bordered table-active'>";
          lista += "<thead>";
          lista += "<tr>";
          lista += "<th>Producto</th>";
          lista += "<th>Cantidad</th>";
          lista += "<th>Accion</th>";
          lista += "</tr>";
          lista += "</thead>";
          lista += "<tbody>";
  
          for (var f = 0; f < info.length; f++) {
            lista += '<tr>';
            lista += "<td>" + info[f].producto + "</td>";
            lista += "<td>" + info[f].cantidad + "</td>";
            lista += "<td class='text-center'><input class='btn btn-primary border border-dark' type='button' value='Devolución' onclick='eliminarDetalle(" + info[f].id + ")'></td>";
            lista += "</tr>";
          }
  
          lista += "</tbody>";
          lista += "</table>";
          $("#listadoCarrito").html(lista);
          try {
            $("#listarCarrito").dataTable();
          } catch (exception) {
            console.log("the table canot be converted");
          }
        } else {

          vaciarCarrito();
        }

      } else {
        vaciarCarrito();
        alerta("No se encuentra");
        limpiarVenta();
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alerta("verifique la ruta de archivo!");
    },
  });
}


function eliminarDetalle(codigo) {
    const objDetalle = {
      id: codigo,
      type: "delete",
    };
    $.ajax({
      type: "post",
      url: "controller/ctlDetalleVenta.php",
      beforeSend: function () {},
      data: objDetalle,
      success: function (res) {
        var info = JSON.parse(res);
        if (info.res === "Success") {
          limpiarCarrito();
          alerta("Devolucion exitosa");
          listarCarrito(codigo);
          listarVentas();
        } else {
          alerta("No se pudo eliminar");
          limpiarCarrito();
        }
      },
      error: (jqXHR, textStatus, errorThrown) => {
        alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
        alerta("verifique la ruta de archivo!");
      },
    });
}

function vaciarCarrito() {
  var lista =
    "<table id='listarCarrito' class='display bg-primary mt-4 table table-bordered table-active'>";
  lista += "<thead>";
  lista += "<tr>";
  lista += "<th>Producto</th>";
  lista += "<th>Cantidad</th>";
  lista += "<th>Accion</th>";
  lista += "</tr>";
  lista += "</thead>";
  lista += "<tbody>";
  lista += "</tbody>";
  lista += "</table>";
  $("#listadoCarrito").html(lista);
  try {
    $("#listarCarrito").dataTable();
  } catch (exception) {
    console.log("the table canot be converted");
  }
}

function limpiarVenta() {
  $("#txtIdVenta").val("");
  $("#txtFechaVentaV").val("");
  $("#txtHoraV").val("");
  $("#selCliente").val("-1");
  $("#txtCantidadV").val("");
  $("#selProducto").val("-1");
  eliminarTodosLosItems();
  vaciarCarrito();
}

function limpiarCarrito() {
  $("#txtCantidadV").val("");
  $("#selProducto").val("-1");
  vaciarCarrito();
}


function guardarVenta() {
  let objVentas = {
    id: $("#txtIdVenta").val(),
    fecha_venta: $("#txtFechaVentaV").val(),
    hora: $("#txtHoraV").val(),
    valor_total: $("#txtTotalV").val(),
    cliente_id: $("#selCliente").val(),
    usuario_id: $("#txtCedulaUsuarioV").val(),
    type: "",
  };
  if (
    objVentas.fecha_venta !== "" &&
    objVentas.valor_total !== "" &&
    objVentas.hora !== "" &&
    objVentas.cliente_id !== "" 
  ) {
    if (objVentas.id !== "") {
      objVentas.type = "update";
    } else {
      objVentas.type = "save";
    }
    $.ajax({
      type: "post",
      url: "controller/ctlVenta.php",
      beforeSend: function () {},
      data: objVentas,
      success: function (data) {
        var info = JSON.parse(data);
        if (info.res === "Success") {
          limpiarVenta();
          alerta("Operacion exitosa");
          listarVentas();
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



function listarCarrito() {
  $.ajax({
    type: "post",
    url: "controller/ctlDetalleVenta.php",
    beforeSend: function () {},
    data: { type: "listItems" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
            
      if (info.length > 0) {
        var lista =
          "<table id='listarCarrito' class='display bg-primary mt-4 table table-bordered table-active'>";
        lista += "<thead>";
        lista += "<tr>";
        lista += "<th>Producto</th>";
        lista += "<th>Cantidad</th>";
        lista += "<th>Accion</th>";
        lista += "</tr>";
        lista += "</thead>";
        lista += "<tbody>";

        for (var f = 0; f < info.length; f++) {
          lista += '<tr>';
          lista += "<td>" + info[f].producto + "</td>";
          lista += "<td>" + info[f].cantidad + "</td>";
          lista += "<td class='text-center'><input class='btn btn-primary border border-dark' type='button' value='Eliminar' onclick='eliminarItemCarrito(" + info[f].id + ")'></td>";
          lista += "</tr>";
        }

        lista += "</tbody>";
        lista += "</table>";
        $("#listadoCarrito").html(lista);
        try {
          $("#listarCarrito").dataTable();
        } catch (exception) {
          console.log("the table canot be converted");
        }
      } else {
        $("#listarCarrito").html("<b>No se encuentra informacion</b>");
        limpiarLaboratorio();
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alerta("verifique la ruta de archivo!");
    },
  });
}

function eliminarItemCarrito(codigo) {
  const objDetalle = {
    id: codigo,
    type: "deleteItem",
  };
  $.ajax({
    type: "post",
    url: "controller/ctlDetalleVenta.php",
    beforeSend: function () {},
    data: objDetalle,
    success: function (res) {
      var info = JSON.parse(res);
      if (info.res === "Success") {
        limpiarCarrito();
        alerta("Eliminado con exito");
        listarCarrito();
      } else {
        alerta("No se pudo eliminar");
        limpiarCarrito();
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alerta("verifique la ruta de archivo!");
    },
  });
}


function guardarItemCarrito() {
  let objItem = {
    cantidad: $("#txtCantidadV").val(),
    inventario_medico_id: $("#selProducto").val(),
    type: "",
  };
  if (
    objItem.cantidad !== "" &&
    objItem.inventario_medico_id !== "-1" 
  ) {
    objItem.type = "saveItem";
    $.ajax({
      type: "post",
      url: "controller/ctlDetalleVenta.php",
      beforeSend: function () {},
      data: objItem,
      success: function (data) {
        
        var info = JSON.parse(data);
        if (info.res === "Success") {
          alerta("Operacion exitosa");
          listarCarrito()
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

function eliminarTodosLosItems() {
  const objDetalle = {
    type: "deleteAllItem",
  };
  $.ajax({
    type: "post",
    url: "controller/ctlDetalleVenta.php",
    beforeSend: function () {},
    data: objDetalle,
    success: function (res) {
      var info = JSON.parse(res);
      if (info.res === "Success") {
        limpiarCarrito();
        listarCarrito();
      } else {
        limpiarCarrito();
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alerta("verifique la ruta de archivo!");
    },
  });
}





/* listadoCarrito
txtCantidadV
txtTotalV
selProducto */

