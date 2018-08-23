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
  })