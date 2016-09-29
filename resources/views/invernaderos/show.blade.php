@extends('layouts.app')

@section('htmlheader_title')
	Invernaderos
@endsection

@section('head_scripts')
<script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
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

						{!!$map['html']!!}
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
							  		<li role="presentation"><a href="#{{$invernadero->variables->get($i)->nombre}}"  data-toggle="tab">{{$invernadero->variables->get($i)->nombre}}</a></li>
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
												<canvas id="{{  strtolower($invernadero->variables->get($i)->nombre)}}" ></canvas>
												</div>
								 			</div>
								 			
								 		</div>
								 	</div>
								@else
								 	 <div class="tab-pane fade" id="{{$invernadero->variables->get($i)->nombre}}">
								 	 	<div class="row">
								 	 		<div class="col-md-8">
								 	 			<div class="chart">
								 	 			<canvas id="{{  strtolower($invernadero->variables->get($i)->nombre)}}" ></canvas>
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
var lecturas = {!! $invernadero->ultimasLecturas() !!} ;
var variables = {!!json_encode($invernadero->variables,JSON_FORCE_OBJECT) !!} ;

for(i=0;i<Object.keys(variables).length;i++){    
    
	var chartData = new Array();
	var chartLabels = new Array();
	var index=0;
	for(j=Object.keys(lecturas[i].data).length-1;j>=0;j--){
		chartData[index]=lecturas[i].data[j].valor;
		var hora = new Date(lecturas[i].data[j].created_at);
		chartLabels[index]=lecturas[i].data[j].created_at;
		index++;
	}

    var ctx = document.getElementById(variables[i].nombre.toLowerCase());
	var myChart = new Chart(ctx, {
	    type: 'line',
	    data: {
	    	labels:chartLabels,
	    	datasets: [
	        {
	            label: variables[i].nombre,
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
	            pointBorderWidth: 2,
	            pointHoverRadius: 5,
	            pointHoverBackgroundColor: "rgba(75,192,192,1)",
	            pointHoverBorderColor: "rgba(220,220,220,1)",
	            pointHoverBorderWidth: 2,
	            pointRadius: 5,
	            pointHitRadius: 10,
	            data: chartData,
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
}

</script>
@endsection
