@extends('layouts.app')
@section('title','Archivos')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">        		
	            	<div class="panel-heading row justify-content-center">Subir Archivos</div>
	                <div class="panel-body">
			          	<!--form method="post" id="frm" url="pdfUpload/" files="true" enctype="multipart/form-data"-->
			          	{!! Form::open(['route'=>'admin.pdf.upload', 'method'=>'POST', 'files' => true]) !!}
							<div class="form-group">
								{!! Form::select('tipo', 
								['consejo'=>'Consejo Universitario', 'asamblea'=>'Asamblea General'], 
								'consejo', 
								['class'=>'form-control', 'placeholder'=>'Seleccione el tipo','required']) !!}
							</div>
							<div class="form-group">
								{!! Form::file('archivo', $attributes = ['required', 'accept'=>'.pdf']) !!}
							</div>
							<div class="form-group">
								{!! Form::submit('Grabar', ['class'=>'btn btn-md btn-primary']) !!}
							</div>
						{!! Form::close() !!}			
					</div>
            	</div>
			</div>
		</div>
	</div>
@endsection

@section('view','files.blade.php')
