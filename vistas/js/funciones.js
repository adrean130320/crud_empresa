function maximo(campo,limite){
if(campo.value.length>=limite){
campo.value=campo.value.substring(0,limite);
 }
}

$(document).ready(function () {
    //Datatable Español
    $('.dataTable').DataTable({
        "iDisplayLength": 20, //cantidad de filas visualizadas
        "sPaginationType": "full_numbers", // todos los botones en el paginador
        "bLengthChange": false, //no mostrar el selector de filas por página
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "decimal": ",",
            "thousands": "."
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: 'Copiar',
            },
            {
                extend: 'csv',
                text: 'Exportar a CSV'
            },
            {
                extend: 'excel',
                text: 'Exportar a Excel',
            },
            {
                extend: 'pdf',
                text: 'Generar PDF',
            },
        ],

    });

    // $.datepicker.setDefaults($.datepicker.regional['es']);


    // Datepicker Español
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $.datepicker.formatDate("dd/mm/yy");

    $('.date-picker').datepicker({
    }).datepicker("setDate", new Date());

});
