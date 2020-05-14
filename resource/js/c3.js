let obj = {
  type: "cantidadProductos",
};

let obj2 = {
  type: "cantidadGeneros",
};

let obj3 = {
  type: "cantidadProductoVendidos",
};

let obj4 = {
  type: "ventasPorEmpleado",
};

let obj5 = {
  type: "ventasDiasDeLaSemana",
};

let obj6 = {
  type: "ventasDiasDelMes",
};

let datos = {};
let datos2 = {};
let datos3 = {};
let datos4 = {};
let datos5 = {};
let datos6 = {};

$.ajax({
  type: "post",
  url: "controller/ctlGrafica.php",
  beforeSend: function () {},
  data: obj,
  success: function (respuesta) {
    const res = JSON.parse(respuesta);
    datos = JSON.parse(res.data);
    graficaCantidadProductos();
  },
  error: function (jqXHR, textStatus, errorThrown) {
    alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
    alerta("verifique la ruta de archivo!");
  },
});

$.ajax({
  type: "post",
  url: "controller/ctlGrafica.php",
  beforeSend: function () {},

  data: obj2,

  success: function (respuesta) {
    const res = JSON.parse(respuesta);
    datos2 = JSON.parse(res.data);
    graficaGeneros();
  },
  error: function (jqXHR, textStatus, errorThrown) {
    alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
    alerta("verifique la ruta de archivo!");
  },
});

$.ajax({
  type: "post",
  url: "controller/ctlGrafica.php",
  beforeSend: function () {},

  data: obj3,

  success: function (respuesta) {
    const res = JSON.parse(respuesta);
    datos3 = JSON.parse(res.data);
    graficaCantidadProductosGanacias();
  },
  error: function (jqXHR, textStatus, errorThrown) {
    alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
    alerta("verifique la ruta de archivo!");
  },
});

$.ajax({
  type: "post",
  url: "controller/ctlGrafica.php",
  beforeSend: function () {},

  data: obj4,

  success: function (respuesta) {
    const res = JSON.parse(respuesta);
    datos4 = JSON.parse(res.data);
    graficaVentasPorEmpleados();
  },
  error: function (jqXHR, textStatus, errorThrown) {
    alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
    alerta("verifique la ruta de archivo!");
  },
});

$.ajax({
  type: "post",
  url: "controller/ctlGrafica.php",
  beforeSend: function () {},

  data: obj5,

  success: function (respuesta) {
    const res = JSON.parse(respuesta);
    datos5 = JSON.parse(res.data);
    graficaVentasPorDiaDeLaSemana();
  },
  error: function (jqXHR, textStatus, errorThrown) {
    alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
    alerta("verifique la ruta de archivo!");
  },
});

$.ajax({
  type: "post",
  url: "controller/ctlGrafica.php",
  beforeSend: function () {},

  data: obj6,

  success: function (respuesta) {
    const res = JSON.parse(respuesta);
    datos6 = JSON.parse(res.data);
    graficaVentasPorDiaDelMes();
  },
  error: function (jqXHR, textStatus, errorThrown) {
    alerta("Error detectado: " + textStatus + "\nException: " + errorThrown);
    alerta("verifique la ruta de archivo!");
  },
});

function graficaVentasPorDiaDelMes() {
  var arreglo = [];

  for (var i in datos6) {
    arreglo.push(["Dia " + datos6[i].dia + ": " + datos6[i].total_ventas,datos6[i].total_ingresos
    ]);
  }

  c3.generate({
    bindto: "#grafico6",
    data: {
      columns: arreglo,
      type: "bar",
    },
    bar: {
      width: {
        ratio: 0.97,
      },
    },
  });
}

function graficaVentasPorDiaDeLaSemana() {
  var arreglo = [];
  var nombreDia = "";

  for (var i in datos5) {
    switch (datos5[i].dia) {
      case "0":
        nombreDia = "Los lunes";
        break;
      case "1":
        nombreDia = "Los martes";
        break;
      case "2":
        nombreDia = "Los miercoles";
        break;
      case "3":
        nombreDia = "Los jueves";
        break;
      case "4":
        nombreDia = "Los viernes";
        break;
      case "5":
        nombreDia = "Los sabados";
        break;
      case "6":
        nombreDia = "Los domingos";
        break;
      default:
        console.log("error");
    }
    arreglo.push([nombreDia + ": " + datos5[i].total_ventas,
      datos5[i].total_ingresos
    ]);
  }

  c3.generate({
    bindto: "#grafico5",
    data: {
      columns: arreglo,
      type: "bar",
    },
    bar: {
      width: {
        ratio: 0.97,
      },
    },
  });
}

function graficaVentasPorEmpleados() {
  var arreglo = [];
  for (var i in datos4) {
    arreglo.push([
      datos4[i].usuario + ": " + datos4[i].cantidad,
      datos4[i].ingresos
    ]);
  }

  c3.generate({
    bindto: "#grafico4",
    data: {
      columns: arreglo,
      type: "bar",
    },
    bar: {
      width: {
        ratio: 0.97,
      },
    },
  });
}

function graficaCantidadProductosGanacias() {
  var arreglo = [];
  for (var i in datos3) {
    arreglo.push([
      datos3[i].nombre + ": " + datos3[i].cantidad,
      datos3[i].ganancia
    ]);
  }

  c3.generate({
    bindto: "#grafico2",
    data: {
      columns: arreglo,
      type: "bar",
    },
    bar: {
      width: {
        ratio: 0.97,
      },
    },
  });
}

function graficaGeneros() {
  var arreglo = [];
  for (var i in datos2) {
    arreglo.push([
      datos2[i].genero == 0
        ? "Hombres" + ": " + datos2[i].cantidad
        : "Mujeres" + ": " + datos2[i].cantidad,
      datos2[i].cantidad
    ]);
  }
  c3.generate({
    bindto: "#grafico3",
    data: {
      columns: arreglo,
      type: "donut",
      onclick: function (d, i) {
        console.log("onclick", d, i);
      },
      onmouseover: function (d, i) {
        console.log("onmouseover", d, i);
      },
      onmouseout: function (d, i) {
        console.log("onmouseout", d, i);
      },
    },
    donut: {
      title: "",
    },
  });
}

function graficaCantidadProductos() {
  var arreglo = [];

  for (var i in datos) {
    arreglo.push([
      datos[i].nombre + ": " + datos[i].cantidad,
      datos[i].cantidad
    ]);
  }
  c3.generate({
    bindto: "#grafico1",
    data: {
      columns: arreglo,

      type: "donut",
      onclick: function (d, i) {
        console.log("onclick", d, i);
      },
      onmouseover: function (d, i) {
        console.log("onmouseover", d, i);
      },
      onmouseout: function (d, i) {
        console.log("onmouseout", d, i);
      },
    },
    donut: {
      title: "",
    },
  });
}
