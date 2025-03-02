@extends('admin.layout')

@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Редактировать категорию
				<small></small>
			</h1>
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Default box -->
			<div class="box">
				{{ Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) }}
				<div class="box-header with-border">
					<h3 class="box-title">Меняем категорию</h3>

					{{-- Отображение ошибок --}}
					@include('admin.errors')

				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Название</label>
							<input name="title" value="{{ $category->title }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
						</div>
				</div>
			</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button class="btn btn-default">Назад</button>
					<button class="btn btn-warning pull-right">Изменить</button>
				</div>
				<!-- /.box-footer-->
				{{ Form::close() }}
			</div>
			<!-- /.box -->

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
@endsection
