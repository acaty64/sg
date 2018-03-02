@extends('layouts.app')
@section('title','Actas')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">        		
	            	<div class="panel-heading row justify-content-center">Búsqueda de Actas</div>
	                <div class="panel-body">
						<Actas-Component></Actas-Component>
					</div>
            	</div>
			</div>
		</div>
	</div>
@endsection

@section('view','actas.blade.php')
