$(document).ready(function () {
  listLaboratorios();
  listMedicamentos();
  listClientes();
});

function listLaboratorios() {
  $.ajax({
    type: "post",
    url: "controller/ctlList.php",
    beforeSend: function () {},
    data: { type: "loadListLaboratorios" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      var lista = "<option value='-1'>Seleccionar laboratorio</option>";
      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista += "<option value='" + info[k].id + "'>" + info[k].nombre + "</option>";
        }
        $("#selLaboratorio").html(lista);
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alert("verifique la ruta de archivo!");
    },
  });
}

function listMedicamentos() {
  $.ajax({
    type: "post",
    url: "controller/ctlList.php",
    beforeSend: function () {},
    data: { type: "loadListMedicamentos" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      var lista = "<option value='-1'>Seleccionar producto</option>";
      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista += "<option value='" + info[k].id + "'>" + info[k].nombre + "</option>";
        }
        $("#selProducto").html(lista);
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alert("verifique la ruta de archivo!");
    },
  });
}

function listClientes() {
  $.ajax({
    type: "post",
    url: "controller/ctlList.php",
    beforeSend: function () {},
    data: { type: "loadListClientes" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      var lista = "<option value='-1'>Seleccionar cliente</option>";
      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista += "<option value='" + info[k].id + "'>" + info[k].cedula + "</option>";
        }
        $("#selCliente").html(lista);
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alert("verifique la ruta de archivo!");
    },
  });
}
