$(document).ready(function(){
    cargarEstados();
    
        function cargarEstados(){
            console.log("Hola Mundo");
            $.ajax({
                url: "crud/estados.php",
                type: "POST",
                data: {'lista' : 'todos' },
                dataType: "json",
                success: function(estados){
                    $("#estados").append("<option value=''>Seleccione una opcion</option>");  
            $.each(estados,function(i,estado){
                    $("#estados").append("<option value=" + estado.idestado + ">"+ estado.nombre + "</option>");  
                });//each
                },//succes 
                error: function(){
                    alert("Error en la peticion ajax");
                }
            });//ajax
        }//funcion cargar estados
    
        $("#agregar").click(function(){
                //console.log("Boton click");
                var nombreEstado = $("#estado").val();
                console.log(nombreEstado);
                $.ajax({
                        url:"crud/estados.php",
                        type: "POST",
                        data: {
                            'ADD' : 'estado',
                            'nombre' : nombreEstado
                        }, //data
                        dataType: 'json',
                        success: function(data){
                            alert(data.estado);
                            $("#divAgregar").toggle();
                               $("#estados").empty();
                               cargarEstados(); 
                        },
                        error : function(data){
                            alert(data.estado);
                        }
                });//ajax
        });//agregar
        
        $("#eliminar").click(function(){
            var nombreEliminar = $("#estadoEliminar").val();
            console.log(nombreEliminar);
            $("#divEliminar").toggle();
            
            if(nombreEliminar === ""){
                alert("El nombre es requerido");
                return;
            }
            
            $.ajax({
                url: "crud/estados.php",
                type: "POST",
                dataType: "json",
                data: {
                    'DELETE': 'estado',
                    'nombre': nombreEliminar
                },
                success: function(data){
                    $("#estados").empty();
                    alert(data.estado);
                    cargarEstados();
                },
                error: function(data){
                    alert(data.estado);
                }
            });
        });
        
        $("#btAgregar").click(function(){
            $("#divAgregar").toggle();
        });//click de agregar
    
        $("#btEliminar").click(function(){
            $("#divEliminar").toggle();
        });//click eliminar
    });//documebt ready