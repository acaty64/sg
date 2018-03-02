@extends('layouts.app')
@section('title','Descripción de Opciones')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
            	<div class="panel panel-default">        		
	            	<div class="panel-heading">Título</div>
	                <div class="panel-body">
						<p>Text</p>
						<p>Text</p>
						<p>Text</p>
						<p>Text</p>
					</div>
            	</div>
            	<div class="panel panel-default">
            		<div class="container">
            			<div class="row">
            				<div class="col-md-1">
			            		<span>Seleccione el tipo:</span>
			            	</div>
			            	<div class="col-md-4">
	            				<select class="form-control ">
						          <option>wopcion</option>
						          <option>wopcion</option>
						          <option>wopcion</option>
						        </select>            					
            				</div>
            			</div>
            		</div>
					<br>
		            <span>Texto de búsqueda:</span> 
		            <div class="container">
            			<div class="row">
            				<div class="col-md-4">
		            			<input class="form-control">
		            		</div>
		            		<button type="">Accionar</button>
		            	</div>
		            </div>
            	</div>
			</div>
		</div>
	</div>
@endsection

@section('view','help.blade.php')
