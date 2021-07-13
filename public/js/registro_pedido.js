/* Limpiador
window.addEventListener('load',function(){
    var buscar_producto = document.getElementById("buscar_producto");
    if(){

    }
    buscar_producto.addEventListener("keyup", () => {
        var contenedor_tbody        = document.getElementById("tbody_buscador");
        var contenedor_thead        = document.getElementById("thead_buscador");
        var contenedor_res_buscador = document.getElementById("contenedor_res_buscador");
        if((document.getElementById("buscar_producto").value.length) < 1)
        {
            contenedor_tbody.innerHTML        = "";
            contenedor_thead.innerHTML        = "";
            contenedor_res_buscador.innerHTML = '<h3>Productos no encontrados</h3>';

        }
    });
});
*/
function buscar_producto(url){
    var token = $('input[name=_token]').val();
    var ref_producto = document.getElementById('buscar_producto').value;
    var contenedor_tbody = document.getElementById("tbody_buscador");
    var contenedor_thead = document.getElementById("thead_buscador");
    var contenedor_res_buscador = document.getElementById("contenedor_res_buscador");
    contenedor_thead.innerHTML = "";
    contenedor_tbody.innerHTML = "";
    if(ref_producto != null){
        $.ajax({
            type:'POST',
            headers: { 'X-CSRF-TOKEN': token },
            url:url,
            dataType:'json',
            data:{ref_producto:ref_producto},
            success: function(respuesta){
                if(respuesta.length != 0){
                    contenedor_res_buscador.innerHTML = "";
                    thead = '<tr>'+
                                '<th scope="col">Referencia</th>'+
                                '<th scope="col">Nombre</th>'+
                                '<th scope="col">Precio</th>'+
                                '<th class="text-center">Acciones</th>'+
                            '</tr>';
                    contenedor_thead.innerHTML += thead;

                    for(var i=0; i<respuesta.length; i++ ){
                        var part_num = String("'"+respuesta[i]['PartNum']+"'");
                        var name     = String("'"+respuesta[i]['Name']+"'");
                        var precio   = String("'"+respuesta[i]['precio']+"'");
                        tx ='<tr>'+
                                '<td>'+respuesta[i]['PartNum']+'</td>'+
                                '<td class="text-truncate" style="max-width: 150px;">'+respuesta[i]['Name']+'</td>'+
                                '<td class="text-truncate"> $ '+respuesta[i]['precio']+'</td>'+
                                '<td class="">'+
                                    '<div class="row justify-content-center" style="font-size: 20px">'+
                                        '<div class="col-3">'+
                                            '<a style="color: #2BB930; cursor: pointer;" onclick="agregar_producto('+part_num+','+name+','+precio+')">'+
                                                '<i class="fas fa-plus" data-toggle="tooltip" title="Agregar producto a mi pedido"></i>'+
                                            '</a>'+
                                        '</div>'+
                                    '</div>'+
                                '</td>'+
                            '</tr>';
                        contenedor_tbody.innerHTML += tx;
                    }
                    console.log(respuesta);
                }else{
                    contenedor_thead.innerHTML = "";
                    contenedor_tbody.innerHTML = "";
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                imprimirError(jqXHR, textStatus, errorThrown);
            }
        });
    }
}

var contador = 0;
function agregar_producto(part_num, name, precio){
    var contenedor_tbody = document.getElementById("tbody_pedido");
    contador++;
    console.log(part_num+name+precio+" "+contador);
    var referencia = String("'"+part_num+"'");

    tx ='<tr id='+part_num+'>'+
            '<th scope="row" style="max-width: 60px;">'+contador+'</th>'+
            '<td class="text-truncate" style="max-width: 150px;">'+part_num+'</td>'+
            '<input type="hidden" value="'+part_num+'" name="referencias_productos[]">'+
            '<td class="text-truncate" style="max-width: 100px;" title="'+name+'">'+name+'</td>'+
            '<td>'+
                '<div class="row">'+
                    '<div class="col-12">'+
                        '<input type="number" class="form-control form-control-sm" id="cantidad" name="cantidades[]" placeholder="1" min="1" max="20" value="1">'+
                    '</div>'+
                '</div>'+
            '</td>'+
            '<td class="text-truncate" name="precios_productos[]">'+precio+'</td>'+
            '<td class="">'+
                '<div class="row justify-content-center" style="font-size: 20px">'+
                    '<div class="col-3">'+
                        '<a href="" style="color: #f44336; cursor: pointer;">'+
                            '<i class="la icon-trash" data-toggle="tooltip" title="Eliminar producto" onclick="eliminar_producto('+referencia+')"></i>'+
                        '</a>'+
                    '</div>'+
                '</div>'+
            '</td>'+
        '</tr>';

    contenedor_tbody.innerHTML += tx;
    calcular_totales();

}

function eliminar_producto(part_num){
    var id = part_num;
    el = document.getElementById(id);
    padre = el.parentNode;
    padre.removeChild(el);
    event.preventDefault();
    calcular_totales();
    contador = contador - 1;
}

function calcular_totales(){
    var total_cantidad=0;
    var array_total = document.getElementsByName('precios_productos[]');
    for (var i = 0; i < array_total.length; i++) {
        total_cantidad+=parseFloat(array_total[i].innerHTML);
    }
    document.getElementById('tfoot_total').innerHTML = "$ "+total_cantidad;
}


