

let dataTable;
let dataTableIsIniatilizated = false;

const dataTableOptions = {
    columnDefs:[{
        'orderable': false, 
         'targets':[2],
        'data': null,
        'defaultContent': "<button type='button' class='deleteBtn' name='delete'><i class='bx bxs-trash'></i></button><button type='button' class='editBtn' name='modify'><i class='bx bxs-edit'></i></button><button type='button' class='saveBtn' style='display: none;'>Guardar</button><button type='button' class='confirmBtn' style='display: none;'>Confirmar</button><button type='button' class='cancelBtn' style='display: none;'>Cancelar</button>"
         }],
    dom: 'rtip',
    pageLenght: 5,
    destroy: true,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningun registro encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningun registro encontrado",
        infoFiltered: "(filtrados desde _MAX_ registros totales)",
        search: "Buscar:",
        loadingRecords: "Cargando...",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
        }
    }
};

 $('#mySearch').keyup( function() {
     dataTable.search($('#mySearch').val()).draw();
  } );

const initDataTable = async() =>{
    if(dataTableIsIniatilizated){
        dataTable.destroy();
    }
    
    dataTable = $("#marcaTable").DataTable(dataTableOptions);
    dataTableIsIniatilizated = true;
};



$('#marcaForm').submit(function(e){
    e.preventDefault();
    $('#userData').css('opacity', '.5');
    var tableName = $('#marcaTable').data('table-name');
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
        type:'POST',
        url:'sqlfunctions/marcas.php',
        dataType: "json",
        data:'action=insert&' + formData + '&table=' + tableName,
        error: function(ts) { console.log(ts.responseText) },
        success:function(listado){
            if(listado.status == 1){
                console.log(listado);
                id = listado.data[listado.data.length -1].id;
                nombre = listado.data[listado.data.length -1].nombre;
                
                var newRowHtml = '<tr id="' + id + '">' +
                 '<td>' + id + '</td>' +
                 '<td>' +
                 '    <span class="editSpan nombre">' + nombre + '</span>' +
                 '    <input class="form-control editInput nombre" type="text" name="nombre" value="' + nombre + '" style="display: none;">' +
                 '    <input type="hidden" class="tu-clase-aqui" value="valor_oculto">' +
                 '</td>' +
                 '<td></td>' +
                 '</tr>';
                dataTable.row.add($(newRowHtml)).draw();
                   $('#marcaForm')[0].reset(); // Reiniciar el formulario
            }else{
                alert(listado.msg);
            }
            
        }
    });
     $('#userData').css('opacity', '');
});


//table functions

$(document).on('click','.editBtn',function(){
        //hide edit span
        $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

        //hide edit button
        $(this).closest("tr").find(".editBtn").hide();

        //hide delete button
        $(this).closest("tr").find(".deleteBtn").hide();
        
        //show save button
        $(this).closest("tr").find(".saveBtn").show();

        //show cancel button
        $(this).closest("tr").find(".cancelBtn").show();
        
});

$(document).on('click','.saveBtn',function(){
        $('#userData').css('opacity', '.5');
        var trObj = $(this).closest("tr");
        var ID = $(this).closest("tr").attr('id');
        var inputData = $(this).closest("tr").find(".editInput").serialize();
        var tableName = $('#marcaTable').data('table-name');
        $.ajax({
            type:'POST',
            url:'sqlfunctions/marcas.php',
            dataType: "json",
            data:'action=edit&id='+ID+'&'+inputData+'&table='+tableName,
            success:function(response){
                
                if(response.status == 1){
                    trObj.find(".editSpan.nombre").text(response.data.nombre);
                    
                    trObj.find(".editInput.nombre").val(response.data.nombre);
                    
                    trObj.find(".editInput").hide();
                    trObj.find(".editSpan").show();
                    trObj.find(".saveBtn").hide();
                    trObj.find(".cancelBtn").hide();
                    trObj.find(".editBtn").show();
                    trObj.find(".deleteBtn").show();
                }else{
                    alert(response.msg);
                }
                $('#userData').css('opacity', '');
            },
             error: function(ts) { console.log(ts.responseText) }
        });
    });

$(document).on('click','.cancelBtn',function(){
    //hide & show buttons
    $(this).closest("tr").find(".saveBtn").hide();
    $(this).closest("tr").find(".cancelBtn").hide();
    $(this).closest("tr").find(".confirmBtn").hide();
    $(this).closest("tr").find(".editBtn").show();
    $(this).closest("tr").find(".deleteBtn").show();

    //hide input and show values
    $(this).closest("tr").find(".editInput").hide();
    $(this).closest("tr").find(".editSpan").show();
});

$(document).on('click','.deleteBtn',function(){
    //hide edit & delete button
    $(this).closest("tr").find(".editBtn").hide();
    $(this).closest("tr").find(".deleteBtn").hide();
    
    //show confirm & cancel button
    $(this).closest("tr").find(".confirmBtn").show();
    $(this).closest("tr").find(".cancelBtn").show();
});
$(document).on('click','.confirmBtn',function(){
    $('#userData').css('opacity', '.5');

    var trObj = $(this).closest("tr");
    var ID = $(this).closest("tr").attr('id');
     var tableName = $('#marcaTable').data('table-name');
    $.ajax({
        type:'POST',
        url:'sqlfunctions/marcas.php',
        dataType: "json",
        data:'action=delete&id='+ID+'&table='+tableName,
        success:function(response){
            if(response.status == 1){
                dataTable.row(trObj).remove().draw();
            }else{
                trObj.find(".confirmBtn").hide();
                trObj.find(".cancelBtn").hide();
                trObj.find(".editBtn").show();
                trObj.find(".deleteBtn").show();
                alert(response.msg);
            }
            $('#userData').css('opacity', '');
        },
        error: function(ts) { console.log(ts.responseText) }
    });
});


window.addEventListener("load", async()=>{
 await initDataTable();                        
});
    