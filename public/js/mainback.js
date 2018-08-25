include('/plugins/chartjs-old/Chart.min.js');
include('/js/raphael-min.js');
include('/plugins/morris/morris.min.js');

function include(url) {
    document.write('<script src="' + url + '" type="text/javascript"></script>');
}
var token = '';
$(function() {
    'use strict'
    $("#selnotifica").selectpicker();
    const meta = document.getElementsByTagName("meta");

    for(var i=0;i<meta.length;i++){
       if(meta[i].getAttribute("name")=='csrf-token'){
            token = meta[i].getAttribute("content");
       }
    }

    
try {
    

    var salesChartCanvas4 = $('#salesChart4').get(0).getContext('2d')
        // This will get the first returned node in the jQuery collection.
    var salesChart4 = new Chart(salesChartCanvas4)

    var salesChartData4 = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
                label: 'Electronics',
                fillColor: '#dee2e6',
                strokeColor: '#ced4da',
                pointColor: '#ced4da',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgb(220,220,220)',
                data: [65, 59, 80, 81, 56, 55, 40]
            },

        ]
    }

    var salesChartOptions4 = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%=datasets[i].label%></li><%}%></ul>',
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true
        }
        //Create the line chart
    salesChart4.Line(salesChartData4, salesChartOptions4)

   
} catch (error) {
    console.log("inicialice..");
}
    let userAction = document.querySelectorAll(".user-action");

    Array.from(userAction).forEach(link => {
        link.addEventListener('click',function(e){
            e.preventDefault();
            let id = this.dataset.id;
            let estado = this.dataset.estado;
            document.getElementById('iduser').value=id;
            document.getElementById('estado').value=estado;
            $("#estadoModal").modal('show');
            if(estado == 1){
                document.querySelector(".modal-title").innerHTML= `Usuario activo`;
                document.getElementById('estado').value='0';
            }else{
                document.querySelector(".modal-title").innerHTML=`Usuario no activo`;
                document.getElementById('estado').value='1';
            }
            window.location.reload();
        });
    });   
  
});

try {
    let conductorEstado = document.getElementById("btn-conductor-estado");
  

    conductorEstado.addEventListener('click',function(){
        
        let id = document.getElementById("iduser").value;
        let estado = document.getElementById("estado").value;
    
        let url = `/admin/conductores/sendestado/${id}`;
    
        let method = document.querySelector("input[name$='_method']").value;
        let token = document.querySelector("input[name$='_token']").value;
    
        var data = {'id': id ,'estado':estado,'_method':method,'_token':token};
      
        fetch(url,{
            method:'POST',
            body:JSON.stringify(data),
            headers:{
                'Content-Type':'application/json'
            }
        }).then(res => res.json())
            .catch(error => console.error('error: ', error))
            .then(response => console.log('Success: ',response));
    
            $("#estadoModal").modal('hide');
        window.location.reload();
    });    

  
} catch (error) {
    console.log(error);
}

try {
   //cliente delete
    let deleteuser = document.querySelectorAll(".client-delete");
    let url = "";

    Array.from(deleteuser).forEach(link => {
        link.addEventListener('click',function(e){
            e.preventDefault();
            console.log("click delete");
            let id = this.dataset.id;

            let data = ({"id":id,"_token":token, "_method":"delete"});
            let url = `/admin/clientes/${id}`;
            fetch(url,{
                method:'POST',
                body:JSON.stringify(data),
                headers:{
                    'Content-Type':'application/json'
                }
            }).then(res=>res.json());
            console.log(data);

            window.location.reload();
        });
    });
} catch (error) {
    console.log(error);
}

let newservice = document.querySelector(".btn-add-servicio-new");
if(newservice){
    newservice.addEventListener('click',function(e){
        e.preventDefault();
        $("#nuevo-servicio").modal('show');
    });
};
let saveservice = document.querySelector(".btn-save-service");
if(saveservice){
    saveservice.addEventListener('click',function(e){
        token = document.getElementsByName('_token')[0].value;
        nombre = document.getElementById('nombre').value;
        comision = document.getElementById('comision').value;
        estado = document.getElementById('estado').value;

        let metodo = document.getElementById('metodo').value;
        let url='';
        if(metodo==='POST'){

            var formData = ({'_token':token,'_method':'POST','nombre':nombre,'comision':comision,'estado':estado});
            url= '/admin/tipos-servicio';
            
        }else{
            
            id = document.getElementById('userid').value;

            var formData = ({'_token':token,'_method':'PUT','nombre':nombre,'comision':comision,'estado':estado});
            url= `/admin/tipos-servicio/${id}`;
            
        }
        fetch(url,{
            method:'POST',
            body:JSON.stringify(formData),
            headers:{
                'Content-Type':'application/json'
            }
        })
        .then(res=>res.json())
        .catch(error => console.error('error: ', error))
        .then(response =>{ 
            if(response.rpta=='ok'){
                $("#nuevo-servicio").modal('hide');
                window.location.reload();
            }
        });

    });
};


let eservicio = document.querySelectorAll(".client-servicio-edit");
    Array.from(eservicio).forEach(link=>{
        link.addEventListener('click',function(e){
            e.preventDefault();
           let id =  this.dataset.id;
           
           let url = `/admin/tipos-servicio/${id}/edit`;
           fetch(url)
                .then(res=>res.json())
                .catch(error=> console.error('error',error))
                .then(response=>{
                    console.log(response);
                    //injection
                    document.querySelector('.modal-title').innerHTML = 'Editar Servicio';
                    document.getElementById('metodo').value = 'PUT';
                    document.getElementById('nombre').value = response.name;
                    document.getElementById('comision').value = response.comision;
                    if(response.status==2){
                        document.getElementById('estado').checked = true;
                    }
                    document.getElementById('userid').value = response.id;

                    $("#nuevo-servicio").modal('show');
                });

        });
    });

let delservice = document.querySelectorAll('.servicio-delete');

    Array.from(delservice).forEach(link =>{
        link.addEventListener('click',function(e){
            e.preventDefault();
            var id = this.dataset.id;
            var token = document.getElementsByName('_token')[0].value;
            let dataform = ({'id':id,'_method':'DELETE','_token':token});
            let url = `/admin/tipos-servicio/${id}`;

            fetch(url,{
                method:'POST',
                body:JSON.stringify(dataform),
                headers:{
                    'Content-Type':'Application/json'
                }
            })
            .then(res=>res.json())
            .catch(error=>console.error('error',error))
            .then(response=>{
                if(response.rpta==='ok'){
                    window.location.reload;
                }
            });

        });
    });


let car = document.querySelector('.btn-add-auto-new');
if(car){
    car.addEventListener('click',function(e){
        e.preventDefault();
        $("#nuevo-auto").modal('show');
    });
};


let carsave = document.querySelector('.btn-save-auto');
if(carsave){
    carsave.addEventListener('click',function(e){
        e.preventDefault();

        token = document.getElementsByName('_token')[0].value;
        nombre = document.getElementById('nombre').value;
        comision = document.getElementById('comision').value;
        estado = document.getElementById('estado').value;

        let metodo = document.getElementById('metodo').value;
        let url='';
        if(metodo==='POST'){

            var formData = ({'_token':token,'_method':'POST','nombre':nombre,'comision':comision,'estado':estado});
            url= '/admin/tipo-auto';
            
        }else{
            
            id = document.getElementById('userid').value;

            var formData = ({'_token':token,'_method':'PUT','nombre':nombre,'comision':comision,'estado':estado});
            url= `/admin/tipo-auto/${id}`;
            
        }
        fetch(url,{
            method:'POST',
            body:JSON.stringify(formData),
            headers:{
                'Content-Type':'application/json'
            }
        })
        .then(res=>res.json())
        .catch(error => console.error('error: ', error))
        .then(response =>{ 
            if(response.rpta=='ok'){
                $("#nuevo-auto").modal('hide');
                window.location.reload();
            }
        });
    });
}


let ecar = document.querySelectorAll(".client-car-edit");
    Array.from(ecar).forEach(link=>{
        link.addEventListener('click',function(e){
            e.preventDefault();
           let id =  this.dataset.id;
           
           let url = `/admin/tipo-auto/${id}/edit`;
           fetch(url)
                .then(res=>res.json())
                .catch(error=> console.error('error',error))
                .then(response=>{
                    console.log(response);
                    //injection
                    document.querySelector('.modal-title').innerHTML = 'Editar Auto';
                    document.getElementById('metodo').value = 'PUT';
                    document.getElementById('nombre').value = response.name;
                    document.getElementById('comision').value = response.comision;
                    if(response.status==2){
                        document.getElementById('estado').checked = true;
                    }
                    document.getElementById('userid').value = response.id;

                    $("#nuevo-auto").modal('show');
                });

        });
    });

let cardelete = document.querySelectorAll('.client-car-delete');
if(cardelete){
    Array.from(cardelete).forEach(link =>{
        link.addEventListener('click',function(e){
            e.preventDefault();
            var id = this.dataset.id;
            var token = document.getElementsByName('_token')[0].value;
            let dataform = ({'id':id,'_method':'DELETE','_token':token});
            let url = `/admin/tipo-auto/${id}`;

            fetch(url,{
                method:'POST',
                body:JSON.stringify(dataform),
                headers:{
                    'Content-Type':'Application/json'
                }
            })
            .then(res=>res.json())
            .catch(error=>console.error('error',error))
            .then(response=>{
                if(response.rpta==='ok'){
                    window.location.reload();
                }
            });

        });
    });
}

//eventos pago
let btnpago = document.getElementById('btn-pagos');

if(btnpago){
    btnpago.addEventListener('click',function(e){
        e.preventDefault();
       
        $("#nuevo-pago").modal('show');
    });
}


let pagosave = document.querySelector('.btn-pago-auto');
if(pagosave){
    pagosave.addEventListener('click',function(e){
        e.preventDefault();

        token = document.getElementsByName('_token')[0].value;
        nombre = document.getElementById('nombre').value;
        

        let metodo = document.getElementById('metodo').value;
        let url='';
        if(metodo==='POST'){

            var formData = ({'_token':token,'_method':'POST','nombre':nombre});
            url= '/admin/tipos-de-pago';
            
        }else{
            
            id = document.getElementById('userid').value;

            var formData = ({'_token':token,'_method':'PUT','nombre':nombre});
            url= `/admin/tipos-de-pago/${id}`;
            
        }
        fetch(url,{
            method:'POST',
            body:JSON.stringify(formData),
            headers:{
                'Content-Type':'application/json'
            }
        })
        .then(res=>res.json())
        .catch(error => console.error('error: ', error))
        .then(response =>{ 
            if(response.rpta=='ok'){
                $("#nuevo-pago").modal('hide');
                window.location.reload();
            }
        });
    });
}




let epago = document.querySelectorAll(".client-pago-edit");
    Array.from(epago).forEach(link=>{
        link.addEventListener('click',function(e){
            e.preventDefault();
           let id =  this.dataset.id;
           
           let url = `/admin/tipos-de-pago/${id}/edit`;
           fetch(url)
                .then(res=>res.json())
                .catch(error=> console.error('error',error))
                .then(response=>{
                    
                    //injection
                    document.querySelector('.modal-title').innerHTML = 'Editar Pago';
                    document.getElementById('metodo').value = 'PUT';
                    document.getElementById('nombre').value = response.nombre;
                    
                    document.getElementById('userid').value = response.id;

                    $("#nuevo-pago").modal('show');
                });

        });
    });

    let pagodelete = document.querySelectorAll('.client-pago-delete');
    if(pagodelete){
        Array.from(pagodelete).forEach(link =>{
            link.addEventListener('click',function(e){
                e.preventDefault();
                var id = this.dataset.id;
                var token = document.getElementsByName('_token')[0].value;
                let dataform = ({'id':id,'_method':'DELETE','_token':token});
                let url = `/admin/tipos-de-pago/${id}`;
    
                fetch(url,{
                    method:'POST',
                    body:JSON.stringify(dataform),
                    headers:{
                        'Content-Type':'Application/json'
                    }
                })
                .then(res=>res.json())
                .catch(error=>console.error('error',error))
                .then(response=>{
                    
                    if(response.rpta==='ok'){
                        window.location.reload();
                    }
                });
    
            });
        });
    }

//Configuraciones
let cktodo = document.getElementById("todos");

if(cktodo){
    cktodo.addEventListener( 'change', function() {
        if(this.checked) {
            $(".atodos").hide();
        } else {
            $(".atodos").show();
        }
    });
}

//promocionesd
let btnpromo = document.querySelector('.btn-add-promocion');

if(btnpromo){
    btnpromo.addEventListener('click',function(e){
        e.preventDefault();
        $("#nuevo-promocion").modal('show');
    });
}



let promosave = document.querySelector('.btn-save-promocion');
if(promosave){
    promosave.addEventListener('click',function(e){
        e.preventDefault();

        token = document.getElementsByName('_token')[0].value;
        code = document.getElementById('code').value;
        desde = document.getElementById('desde').value;
        hasta = document.getElementById('hasta').value;
        montodescuento = document.getElementById('montodescuento').value;
        limite = document.getElementById('limite').value;
        promotipo = document.getElementById('promotipo').value;
        

        let metodo = document.getElementById('metodo').value;
        let url='';
        if(metodo==='POST'){

        var formData = ({'_token':token,'_method':'POST','code':code,'desde':desde,'hasta':hasta,'montodescuento':montodescuento,'limite':limite,'promotipo':promotipo});
            url= '/admin/promociones';
            
        }else{
            
            id = document.getElementById('userid').value;

            var formData = ({'_token':token,'_method':'PUT','code':code,'desde':desde,'hasta':hasta,'montodescuento':montodescuento,'limite':limite,'promotipo':promotipo});
            url= `/admin/promociones/${id}`;
            
        }
        fetch(url,{
            method:'POST',
            body:JSON.stringify(formData),
            headers:{
                'Content-Type':'application/json'
            }
        })
        .then(res=>res.json())
        .catch(error => console.error('error: ', error))
        .then(response =>{ 
            if(response.rpta=='ok'){
                $("#nuevo-promocion").modal('hide');
                window.location.reload();
            }
        });
    });
}


let epromo = document.querySelectorAll(".client-promo-edit");
    Array.from(epromo).forEach(link=>{
        link.addEventListener('click',function(e){
            e.preventDefault();
           let id =  this.dataset.id;
           
           let url = `/admin/promociones/${id}/edit`;
           fetch(url)
                .then(res=>res.json())
                .catch(error=> console.error('error',error))
                .then(response=>{
                    
                    //injection
                    document.querySelector('.modal-title').innerHTML = 'Editar Promoción';
                    document.getElementById('metodo').value = 'PUT';
                   
                    
                    document.getElementById('code').value = response.code;
                    document.getElementById('desde').value = response.desde;
                    document.getElementById('hasta').value = response.hasta;
                    document.getElementById('montodescuento').value = response.montodescuento;
                    document.getElementById('limite').value = response.limite;
                    document.getElementById('promotipo').value = response.promotion_type_id;
                    
                    document.getElementById('userid').value = response.id;

                    $("#nuevo-promocion").modal('show');
                });

        });
    });

    let promodelete = document.querySelectorAll('.client-delete-promo');
    if(promodelete){
        Array.from(promodelete).forEach(link =>{
            link.addEventListener('click',function(e){
                e.preventDefault();
                var id = this.dataset.id;
                var token = document.getElementsByName('_token')[0].value;
                let dataform = ({'id':id,'_method':'DELETE','_token':token});
                let url = `/admin/promociones/${id}`;
    
                fetch(url,{
                    method:'POST',
                    body:JSON.stringify(dataform),
                    headers:{
                        'Content-Type':'Application/json'
                    }
                })
                .then(res=>res.json())
                .catch(error=>console.error('error',error))
                .then(response=>{
                    
                    if(response.rpta==='ok'){
                        window.location.reload();
                    }
                });
    
            });
        });
    }
//panico-map

let epanico = document.querySelectorAll(".panico-map");
    Array.from(epanico).forEach(link=>{
        link.addEventListener('click',function(e){
            e.preventDefault();
           let id =  this.dataset.id;
           
           let url = `/admin/servicio-panico/clientes/${id}/edit`;
           fetch(url)
                .then(res=>res.json())
                .catch(error=> console.error('error',error))
                .then(response=>{
                    
                    //injection a mapa
                    console.log(response);
                    $("#cliente-panico").modal('show');
                    var myLatLng = {lat: parseFloat(response.latitud), lng: parseFloat(response.longitud)};
      
                    var map = new google.maps.Map(document.getElementById('mapalerta'), {
                      zoom: 12,
                      center: myLatLng
                    });
            
                    var marker = new google.maps.Marker({
                      position: myLatLng,
                      map: map,
                      title: 'Ubicación'
                    });
                    let datos = '';
                    let estado ='';
                    if(response.estado==1){
                        estado = 'pendiente';
                    }else{
                        estado = 'atendido';
                    }
                    
                    datos = datos+`<li>Cliente: ${response.nombre}</li>`;
                    datos = datos+`<li>Nombre Referencia: No existe</li>`;
                    datos = datos+`<li>Telefono referencia: ${response.telefono}</li>`;
                    datos = datos+`<li>estado: ${estado}</li>`;
                   
                    $('.datos').html(datos);
                    
                });

        });
    });

let atencion = document.querySelectorAll('.panico-atencion');
Array.from(atencion).forEach(link=>{
    link.addEventListener('click',function(e){
        e.preventDefault();
        let id = this.dataset.id;
        var token = document.getElementsByName('_token')[0].value;
        let url = `/admin/servicio-panico/clientes/${id}`;

        var formData = ({'_token':token,'_method':'PUT','estado':2});
        fetch(url,{
            method:'POST',
            body:JSON.stringify(formData),
            headers:{
                'Content-Type':'application/json'
            }
        })
        .then(res=>res.json())
        .catch(error => console.error('error: ', error))
        .then(response =>{ 
            if(response.rpta=='ok'){
                $("#nuevo-promocion").modal('hide');
                window.location.reload();
            }
        });
    });
});

//color

btncolor = document.querySelector('.btn-add-color');

if(btncolor){
    btncolor.addEventListener('click',function(e){
        e.preventDefault();
        $("#nuevo-color").modal('show');
    });
}

//color-update


let colorsave = document.querySelector('.btn-save-color');
if(colorsave){
    colorsave.addEventListener('click',function(e){
        e.preventDefault();

        token = document.getElementsByName('_token')[0].value;
        nombre = document.getElementById('nombre').value;
        estado = document.getElementById('estado').value;
       
        

        let metodo = document.getElementById('metodo').value;
        let url='';

        if(metodo==='POST'){

            var formData = ({'_token':token,'_method':'POST','name':nombre,'state':estado});
            url= '/admin/color';
            
        }else{
            
            id = document.getElementById('userid').value;

            var formData = ({'_token':token,'_method':'PUT','name':nombre,'state':estado});
            url= `/admin/color/${id}`;
            
        }
        fetch(url,{
            method:'POST',
            body:JSON.stringify(formData),
            headers:{
                'Content-Type':'application/json'
            }
        })
        .then(res=>res.json())
        .catch(error => console.error('error: ', error))
        .then(response =>{ 
            if(response.rpta=='ok'){
                $("#nuevo-color").modal('hide');
                window.location.reload();
            }
        });
    });
}



//color edit

let ecolor = document.querySelectorAll(".client-color-edit");
    Array.from(ecolor).forEach(link=>{
        link.addEventListener('click',function(e){
            e.preventDefault();
           let id =  this.dataset.id;
           
           let url = `/admin/color/${id}/edit`;
           fetch(url)
                .then(res=>res.json())
                .catch(error=> console.error('error',error))
                .then(response=>{
                    
                    //injection
                    document.querySelector('.modal-title').innerHTML = 'Editar Color';
                    document.getElementById('metodo').value = 'PUT';
                   
                    
                    document.getElementById('nombre').value = response.name;
                    
                    if(response.state==2){
                    document.getElementById('estado').checked = true;
                    }
                    
                    document.getElementById('userid').value = response.id;

                    $("#nuevo-color").modal('show');
                });

        });
    });

    //color-delete
    let colordelete = document.querySelectorAll('.client-color-delete');
    if(colordelete){
        Array.from(colordelete).forEach(link =>{
            link.addEventListener('click',function(e){
                e.preventDefault();
                var id = this.dataset.id;
                var token = document.getElementsByName('_token')[0].value;
                let dataform = ({'id':id,'_method':'DELETE','_token':token});
                let url = `/admin/color/${id}`;
    
                fetch(url,{
                    method:'POST',
                    body:JSON.stringify(dataform),
                    headers:{
                        'Content-Type':'Application/json'
                    }
                })
                .then(res=>res.json())
                .catch(error=>console.error('error',error))
                .then(response=>{
                    
                    if(response.rpta==='ok'){
                        window.location.reload();
                    }
                });
    
            });
        });
    }
//marca
let btnmarca = document.querySelector(".btn-add-marca");
if(btnmarca){
    btnmarca.addEventListener('click',function(e){
        e.preventDefault();
        $("#nuevo-marca").modal('show');
    });
}
//marca-nuevo
let marcasave = document.querySelector('.btn-save-marca');
if(marcasave){
    marcasave.addEventListener('click',function(e){
        e.preventDefault();

        token = document.getElementsByName('_token')[0].value;
        code = document.getElementById('codigo').value;
        name = document.getElementById('nombre').value;
        state = document.getElementById('state').value;
       
        

        let metodo = document.getElementById('metodo').value;
        let url='';

        if(metodo==='POST'){

            var formData = ({'_token':token,'_method':'POST','code':code,'name':name,'state':state});
            url= '/admin/marca';
            
        }else{
            
            id = document.getElementById('userid').value;

            var formData = ({'_token':token,'_method':'PUT','code':code,'name':name,'state':state});
            url= `/admin/marca/${id}`;
            
        }
        fetch(url,{
            method:'POST',
            body:JSON.stringify(formData),
            headers:{
                'Content-Type':'application/json'
            }
        })
        .then(res=>res.json())
        .catch(error => console.error('error: ', error))
        .then(response =>{ 
            if(response.rpta=='ok'){
                $("#nuevo-marca").modal('hide');
                window.location.reload();
            }
        });
    });
}
//marca-edit

let emarca = document.querySelectorAll(".client-marca-edit");
    Array.from(emarca).forEach(link=>{
        link.addEventListener('click',function(e){
            e.preventDefault();
           let id =  this.dataset.id;
           
           let url = `/admin/marca/${id}/edit`;
           fetch(url)
                .then(res=>res.json())
                .catch(error=> console.error('error',error))
                .then(response=>{
                    
                    //injection
                    document.querySelector('.modal-title').innerHTML = 'Editar Marca';
                    document.getElementById('metodo').value = 'PUT';
                   
                    document.getElementById('codigo').value = response.code;
                    document.getElementById('nombre').value = response.name;
                    
                    if(response.state==2){
                    document.getElementById('state').checked = true;
                    }
                    
                    document.getElementById('userid').value = response.id;

                    $("#nuevo-marca").modal('show');
                });

        });
    });
//marca-delete
    let marcadelete = document.querySelectorAll('.client-delete-marca');
    if(marcadelete){
        Array.from(marcadelete).forEach(link =>{
            link.addEventListener('click',function(e){
                e.preventDefault();
                var id = this.dataset.id;

                var token = document.getElementsByName('_token')[0].value;
                let dataform = ({'id':id,'_method':'DELETE','_token':token});
                let url = `/admin/marca/${id}`;
    
                fetch(url,{
                    method:'POST',
                    body:JSON.stringify(dataform),
                    headers:{
                        'Content-Type':'Application/json'
                    }
                })
                .then(res=>res.json())
                .catch(error=>console.error('error',error))
                .then(response=>{
                    
                    if(response.rpta==='ok'){
                        window.location.reload();
                    }
                });
    
            });
        });
    }




//modelo
let btnmodelo = document.querySelector(".btn-add-modelo");
if(btnmodelo){
    btnmodelo.addEventListener('click',function(e){
        e.preventDefault();
        $("#nuevo-modelo").modal('show');
    });
}
//modelo-nuevo
let modelosave = document.querySelector('.btn-save-modelo');
if(modelosave){
    modelosave.addEventListener('click',function(e){
        e.preventDefault();

        token = document.getElementsByName('_token')[0].value;

        brand_id = document.getElementById('brand_id').value;
        code = document.getElementById('codigo').value;
        name = document.getElementById('nombre').value;
        state = document.getElementById('state').value;
       
        

        let metodo = document.getElementById('metodo').value;
        let url='';

        if(metodo==='POST'){

            var formData = ({'_token':token,'_method':'POST','brand_id':brand_id,'code':code,'name':name,'state':state});
            url= '/admin/modelo';
            
        }else{
            
            id = document.getElementById('userid').value;

            var formData = ({'_token':token,'_method':'PUT','brand_id':brand_id,'code':code,'name':name,'state':state});
            url= `/admin/modelo/${id}`;
            
        }
        fetch(url,{
            method:'POST',
            body:JSON.stringify(formData),
            headers:{
                'Content-Type':'application/json'
            }
        })
        .then(res=>res.json())
        .catch(error => console.error('error: ', error))
        .then(response =>{ 
            if(response.rpta=='ok'){
                $("#nuevo-marca").modal('hide');
                window.location.reload();
            }
        });
    });
}
//modelo-edit

let emodelo = document.querySelectorAll(".client-modelo-edit");
    Array.from(emodelo).forEach(link=>{
        link.addEventListener('click',function(e){
            e.preventDefault();
           let id =  this.dataset.id;
           
           let url = `/admin/modelo/${id}/edit`;
           fetch(url)
                .then(res=>res.json())
                .catch(error=> console.error('error',error))
                .then(response=>{
                    
                    //injection
                    document.querySelector('.modal-title').innerHTML = 'Editar Modelo';
                    document.getElementById('metodo').value = 'PUT';
                    document.getElementById('brand_id').value = response.brand_id;
                    document.getElementById('codigo').value = response.code;
                    document.getElementById('nombre').value = response.name;
                    
                    if(response.state==2){
                    document.getElementById('state').checked = true;
                    }
                    
                    document.getElementById('userid').value = response.id;

                    $("#nuevo-modelo").modal('show');
                });

        });
    });
//modelo-delete
    let modelodelete = document.querySelectorAll('.client-delete-modelo');
    if(modelodelete){
        Array.from(modelodelete).forEach(link =>{
            link.addEventListener('click',function(e){
                e.preventDefault();
                var id = this.dataset.id;

                var token = document.getElementsByName('_token')[0].value;
                let dataform = ({'id':id,'_method':'DELETE','_token':token});
                let url = `/admin/modelo/${id}`;
    
                fetch(url,{
                    method:'POST',
                    body:JSON.stringify(dataform),
                    headers:{
                        'Content-Type':'Application/json'
                    }
                })
                .then(res=>res.json())
                .catch(error=>console.error('error',error))
                .then(response=>{
                    
                    if(response.rpta==='ok'){
                        window.location.reload();
                    }
                });
    
            });
        });
    }

$(function () {
   
    $('#tb-conductor').DataTable();
    $("#tb-cliente").DataTable();
    $("#tb-tiposervicio").DataTable();
    $("#tb-tipoauto").DataTable();
    $("#tb-tipopago").DataTable();
    $("#tb-promocion").DataTable();
    $("#tb-contacto").DataTable();
    $("#tb-panicocliente").DataTable();
    $("#tb-panicotaxi").DataTable();
    $("#tb-color").DataTable();
    $("#tb-marca").DataTable();
    $("#tb-modelo").DataTable();
  });