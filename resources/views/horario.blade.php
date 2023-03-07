<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - CRUD javascript</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/colreorder/1.4.1/css/colReorder.dataTables.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/select/1.2.5/css/select.bootstrap4.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
<link rel='stylesheet' href='https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap4.min.css'>

</head>
<body>
<!-- partial:index.partial.html -->
<div id="CRUD">
  <table id="datos" class="table table-striped table-bordered animated zoomIn" style="width:100%">
  </table>
  <!-- Modal -->
  <div class="modal animated fadeInDown" id="ModalCRUD" tabindex="-1" role="dialog" aria-labelledby="MyDialogLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="ModalCRUDlable"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button id="btnGuardar" type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
<script src='http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/colreorder/1.4.1/js/dataTables.colReorder.min.js'></script>
<script src='https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap4.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js'></script>
<script src='https://use.fontawesome.com/releases/v5.0.10/js/all.js'></script>
<script src='https://unpkg.com/axios/dist/axios.min.js'></script>
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script><script  src="./script.js"></script>

</body>
</html>


<script>
    $(document).ready(function() {
  let $urlWS = "https://randomuser.me/api/?results=100";
  //let $JSON = ["results"][0]["login"];
  /**
   * Clase en donde defino las propiedades y metodos CRUD
   **/
  class CRUD {
    Formulario(datos, titulo,formulario) {
      $("#ModalCRUD")
        .find(".modal-title")
        .text(titulo);
      // Obtengo el encabezado de la tabla
      let $encabezado = $("#datos")
        .parent()
        .parent()
        .parent()
        .parent()
        .find("th");
      datos = datos === null ? $encabezado : datos;
      let $Objdato = {};
      // Genero la estructura JSON que mostraré en el modal

      $.each($encabezado, function(index, col) {
        //Descarto la columna con los botones de control
        if (!$($(datos)[index].innerHTML)[index]) {
          $Objdato[$(col)[0].textContent] = $(datos)[index].textContent;
        }
        if ($($(datos)[index].innerHTML).selector === "Action") {
          delete $Objdato[$(col)[0].textContent];
        }
      });

      let $nodos = Object.keys($Objdato);
      $("#ModalCRUD")
        .find("form")
        .remove();
      let $campo = '<form id="'+formulario+'">';
      $nodos.map(key => {
        $campo += '<div class="form-group">';
        $campo +=
          '<label name="' +
          key +
          '" for="recipient-name" class="control-label">' +
          key +
          "</label>";
        $campo +=
          '<input name="' +
          key +
          '"  type="text" class="form-control" id="recipient-name" value="' +
          ($Objdato[key] === key ? " " : $Objdato[key]) +
          '">';
        $campo += "</div>";
      });
      $campo += "</form>";
      $("#ModalCRUD")
        .find(".modal-body")
        .append($campo);
    }
    Insertar(datos) {}
    Eliminar(Tabla, Fila) {
      Fila.parents("tr").addClass("animated fadeOutRight");
      setTimeout(function() {
        Tabla.row(Fila.parents("tr"))
          .remove()
          .draw();
      }, 500);
    }

    Modificar(datos) {}
  }

  $.ajax({
    type: "GET",
    url: $urlWS,
    beforeSend: () => {
      $("#datos").append(
        '<i class="fas fa-spinner fa-pulse fa-5x" style="margin: 15% 0 0 50%; color:#343a40;"></i>'
      );
    }
  })
    .done(response => {
      let crud = new CRUD();
      let $nodos = Object.keys(response.results[0].login);
      let $datos = response.results;
      let columnas = [];
      let datos = [];
      columnas.push({ title: "Action" });
      $nodos.map(title => {
        columnas.push({ title });
      });
      $datos.map(({ login }) => {
        let $dato = Object.values(login);
        let dato = [];
        dato.push("");
        $dato.map(valor => {
          dato.push(valor);
        });
        datos.push(dato);
      });
      let $tabla = $("#datos").DataTable({
        data: datos,
        lengthChange: false,
        dom: "Bfrtip",
        buttons: [
          {
            text:
              '<a><i class="fas fa-plus" title="Insertar"></i><span data-toggle="modal" data-target="#ModalCRUD"> Insertar</span></a>',
            className: "btn btn-dark",
            action: function(e, dt, node, config) {
              crud.Formulario(null, "Insertar registro","frmInsertar");
            }
          },
          {
            extend: "copyHtml5",
            text:
              '<a><i class="far fa-copy" title="Copiar"></i><span> Copiar</span></a>',
            className: "btn btn-dark",
            title: "Exportación de datos",
            exportOptions: {
              columns: ":visible"
            }
          },
          {
            extend: "excelHtml5",
            text:
              '<a><i class="far fa-file-excel" title="Excel"></i><span> Excel</span></a>',
            className: "btn btn-dark",
            title: "Exportación de datos",
            exportOptions: {
              columns: ":visible"
            }
          },
          {
            extend: "pdfHtml5",
            text:
              '<a><i class="far fa-file-pdf" title="PDF"></i><span> PDF</span></a>',
            className: "btn btn-dark",
            title: "Exportación de datos",
            exportOptions: {
              columns: ":visible"
            }
          },
          {
            extend: "csvHtml5",
            text:
              '<a><i class="fas fa-table" title="CSV"></i><span> CSV</span></a>',
            className: "btn btn-dark",
            title: "Exportación de datos",
            exportOptions: {
              columns: ":visible"
            }
          },
          {
            extend: "print",
            text:
              '<a><i class="fas fa-print" title="Imprimir"></i><span> Imprimir</span></a>',
            className: "btn btn-dark",
            title: "Exportación de datos",
            exportOptions: {
              columns: ":visible"
            }
          },
          {
            extend: "colvis",
            text:
              '<a><i class="far fa-eye-slash"></i><span> Columnas</span></a>',
            className: "btn btn-dark"
          }
        ],
        columns: columnas,
        columnDefs: [
          // Defino mi primer columna con 2 botones de control
          {
            targets: 0,
            width: "40%", //considero un porcentaje de celda
            className: "text-center",
            data: null, // Indico que no hay datos para mapear para la primer columna
            defaultContent:
              '<i id="btnModificar" data-toggle="modal" data-target="#ModalCRUD" class="fas fa-edit text-success" style="cursor:pointer;"></i> <i id="btnEliminar" class="fas fa-trash-alt text-danger" style="cursor:pointer;"></i>'
          },
          {
            targets: 1,
            width: "40%",
            className: "text-center"
          }
        ],
        select: {
          style: "single", // Necesito que solo una fila se pueda mapear
          selector: "td:first-child"
        },
        responsive: true, // Necesito que se adapte a cualquier resolución
        colReorder: true, // Ordenamiento de columnas
        language: {
          url:
            "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
      });
      /**
       * Evento de modificar y eliminar
       **/

      $tabla.on("click", "svg", function(e, dt, type, indexes) {
        // Obtengo la fila a modificar
        let $datos = $(this)
          .parent()
          .parent()
          .find("td"); 
        if ($(this)[0].id === "btnEliminar") {
          crud.Eliminar($tabla, $(this));
        } else {
          crud.Formulario($datos, "Modificación de datos","frmModificar");
        }
      });
    })
    .fail((jqXHR, textStatus) => {
      console.log("Request fallo: " + textStatus);
    })
    .always(() => {
      $(".fa-spinner").remove();
      console.log("Petición terminada");
    });

  $(".modal-content").resizable({
    minHeight: 100,
    minWidth: 100
  });
  $(".modal-dialog").draggable();
  $(document).tooltip({
    show: null,
    position: {
      my: "left top",
      at: "left bottom"
    },
    open: (event, ui) => {
      ui.tooltip.animate({ top: ui.tooltip.position().top + 10 }, "fast");
    }
  });

  $("#ModalCRUD").on("show.bs.modal", function() {
    let $Objeto = $(this);
    $Objeto.find(".modal-body").css({
      "max-height": "100%"
    });
  });
  setTimeout(function() {
    $("div.dataTables_filter input").css({
      "border-radius": "20px",
      "padding-left": "25px"
    });
    $("div.dataTables_filter label").append(
      '<label id="iconBuscar"> <i class="fas fa-search"></i></label>'
    );
    $("div.dataTables_filter #iconBuscar").css({ "margin-left": "-175px" });
    $("div.modal-header").css({ cursor: "move" });
  }, 2000);
  $(document).click(evt => {
    if (evt.target.id === "btnGuardar") {
      let form = $("#ModalCRUD").find("form label");
      let $json = [];
      $.map(form, valor => {
        let $nombre = $(valor);
        let $valor = $nombre.parent().find("input");
$json.push({[$nombre[0].innerText] : $valor[0].value}); 
      });
      swal("Transacción exitosa!", JSON.stringify($json), "success");
    }
  });
});
</script>