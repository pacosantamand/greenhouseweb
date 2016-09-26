@extends('layouts.app')

@section('htmlheader_title')
	Invernaderos
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-default">
					<div class="box-header with-border">
	                    <h3 class="box-title">Información</h3>
	                </div>
	                <div class="box-body">
						<p><strong>Nombre: </strong>{{ $invernadero->nombre }}</p>
						<p><strong>Responsable: </strong> {{ $invernadero->encargado->name}}</p>
						<p><strong>Descripción: </strong> {{ $invernadero->descripcion}}</p>
						<p> aqui va el mapa </p>

						<p>{{$invernadero->variables}}</p>	
 					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-default">
					<div class="box-header with-border">
	                    <h3 class="box-title">Ultimas tareas</h3>
	                </div>
	                <div class="box-body">
						<ul class="products-list product-list-in-box">
							@foreach($invernadero->tareas as $tarea)
							<li class="item">
								<div class="product-img">
									<img src="{{asset('/img/default-50x50.gif')}}"></img>
								</div>
								<div class="product-info">
									<a href ="#" class="product-title">{{$tarea->nombre}}
									@if($tarea->realizada == 1)
									<span class="label label-success pull-right"><i class="fa fa-check"></i> Realizada</span>
									@else
									<span class="label label-danger pull-right"><i class="fa fa-warning"></i> No realizada</span>
									@endif</a>
									<span class="product-description">{{$tarea->colaborador->name}}</span>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="box-footer">
						<a href="#" class="btn btn-sm btn-default btn-flat pull-left">Ver todas</a>
						<a href="#" class="btn btn-sm btn-primary btn-flat pull-right">Asignar tarea</a>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-default">
					<div class="box-header">
	                    <h3 class="box-title">Ultimas lecturas</h3>
	                    <div class="box-tools pull-right">
      						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    					</div><!-- /.box-tools -->
	                </div>
	                <div class="box-body">
	                	<ul class="nav nav-tabs">
	                		@for($i=0;$i<count($invernadero->variables);$i++)
	                			@if($i==0)
							  		<li role="presentation" class="active"><a href="#{{$invernadero->variables->get($i)->nombre}}"  data-toggle="tab">{{$invernadero->variables->get($i)->nombre}}</a></li>
							  	@else
							  		<li role="presentation"><a href="#humedad"  data-toggle="tab">Humedad</a></li>
							  	@endif
							@endfor
						</ul>
						<div id="myPillContent" class="tab-content">
						 	@for($i=0;$i<count($invernadero->variables);$i++)
						 		@if($i==0)
								 	<div class="tab-pane fade active in" id="{{$invernadero->variables->get($i)->nombre}}">
								 		<div class="row">
								 			<div class="col-md-8">
								 				<div class="chart">
												<canvas id="myChart" style="height:200px"></canvas>
												</div>
								 			</div>
								 			<div class="col-md-4">
								 				<div class="info-box bg-red">
		  											<span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
													<div class="info-box-content">
													    <span class="info-box-text">Máxima</span>
													    <span class="info-box-number">45 °C</span>
												  </div><!-- /.info-box-content -->
												</div><!-- /.info-box -->
												<div class="info-box bg-green">
		  											<span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
													<div class="info-box-content">
													    <span class="info-box-text">Promedio</span>
													    <span class="info-box-number">37 °C</span>
												  </div><!-- /.info-box-content -->
												</div><!-- /.info-box -->
												<div class="info-box bg-blue">
		  											<span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
													<div class="info-box-content">
													    <span class="info-box-text">Mínima</span>
													    <span class="info-box-number">28 °C</span>
												  </div><!-- /.info-box-content -->
												</div><!-- /.info-box -->
								 			</div>
								 		</div>
								 	</div>
								@else
								 	 <div class="tab-pane fade" id="{{$invernadero->variables->get($i)->nombre}}">
								 	 	<div class="row">
								 	 		<div class="col-md-8">
								 	 			<div class="chart">
								 	 			<canvas id="myChart2" style="height:200px"></canvas>
								 	 			</div>
								 			</div>
								 			<div class="col-md-4">
								 				<div class="info-box bg-red">
		  											<span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
													<div class="info-box-content">
													    <span class="info-box-text">Máxima</span>
													    <span class="info-box-number">80%</span>
												  </div><!-- /.info-box-content -->
												</div><!-- /.info-box -->
												<div class="info-box bg-green">
		  											<span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
													<div class="info-box-content">
													    <span class="info-box-text">Promedio</span>
													    <span class="info-box-number">72%</span>
												  </div><!-- /.info-box-content -->
												</div><!-- /.info-box -->
												<div class="info-box bg-aqua">
		  											<span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
													<div class="info-box-content">
													    <span class="info-box-text">Mínima</span>
													    <span class="info-box-number">60%</span>
												  	</div><!-- /.info-box-content -->
												</div><!-- /.info-box -->
								 			</div>
								 	 	</div>
								 	</div>
								@endif
							@endfor
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('other_scripts')

<script src="{{ asset('/js/Chart.js') }}" type="text/javascript"></script>


<script>
var variables = {!!json_encode($invernadero->variables,JSON_FORCE_OBJECT) !!} ;

var ctx = document.getElementById("myChart");

var tamano = variables.length;

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
    	labels: ["January", "February", "March", "April", "May", "June", "July"],
    	datasets: [
        {
            label: variables[0].nombre,
            fill: true,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [35, 29, 40, 41, 46, 35, 30],
            spanGaps: false,
        } ]
	},
    options: {
        scales: {
            xAxes: [{
                // type: 'linear',
                position: 'bottom'
            }]
        }
    }
});

// var humedad = document.getElementById("myChart2");
// var myLineChart = new Chart(humedad, {
//     type: 'line',
//     data: {
//     	labels: ["January", "February", "March", "April", "May", "June", "July"],
//     	datasets: [
//         {
//             label: "Humedad",
//             fill: true,
//             lineTension: 0.1,
//             backgroundColor: "rgba(75,192,192,0.4)",
//             borderColor: "rgba(75,192,192,1)",
//             borderCapStyle: 'butt',
//             borderDash: [],
//             borderDashOffset: 0.0,
//             borderJoinStyle: 'miter',
//             pointBorderColor: "rgba(75,192,192,1)",
//             pointBackgroundColor: "#fff",
//             pointBorderWidth: 1,
//             pointHoverRadius: 5,
//             pointHoverBackgroundColor: "rgba(75,192,192,1)",
//             pointHoverBorderColor: "rgba(220,220,220,1)",
//             pointHoverBorderWidth: 2,
//             pointRadius: 1,
//             pointHitRadius: 10,
//             data: [65, 59, 80, 81, 56, 55, 40],
//             spanGaps: false,
//         }
//     	]
// 	},
//     options: {
//         scales: {
//             xAxes: [{
//                 // type: 'linear',
//                 position: 'bottom'
//             }]
//         }
//     }
// });
</script>
@endsection
