@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Изменить статью
			<small>отредактируй меня</small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		{{ Form::open([
			'route' => ['posts.update', $post->id],
			'files' => true,
			'method' => 'put'
			]) }}
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Обновляем статью</h3>

					@include('admin.errors')

				</div>
				<div class="box-body">
					<div class="col-md-6">

						{{-- НАЗВАНИЕ ПОСТА --}}
						<div class="form-group">
							<label for="exampleInputEmail1">Название</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $post->title }}" name="title">
						</div>
						
						{{-- КАРТИНКА ПОСТА --}}
						<div class="form-group">
							<img src="{{ $post->getImage() }}" alt="" class="img-responsive" width="200">
							<label for="exampleInputFile">Лицевая картинка</label>
							<input type="file" id="exampleInputFile" name="image">
							<p class="help-block">Какое-нибудь уведомление о форматах..</p>
						</div>

						{{-- КАТЕГОРИИ --}}
						<div class="form-group">
							<label>Категория</label>
							{{ Form::select('category_id', $categories, $post->getCategoryID(), 
							['class' => 'form-control select2']) }}
						</div>

						{{-- ТЕГИ --}}
						<div class="form-group">
							<label>Теги</label>
							{{ Form::select('tags[]', $tags, $selectedTags, 
							['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите теги']) }}
						</div>

						<!-- ДАТА -->
						<div class="form-group">
							<label>Дата:</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input name="date" type="text" class="form-control pull-right" id="datepicker" value="{{ $post->date }}">
							</div>
							<!-- /.input group -->
						</div>

						<!-- ЧЕКБОКС-РЕКОМЕНДОВАТЬ -->
						<div class="form-group">
							<label>
								{{ Form::checkbox('is_featured', '1', $post->is_featured,
								['class' => 'minimal']) }}
							</label>
							<label>
								Рекомендовать
							</label>
						</div>

						<!-- ЧЕКБОКС-ЧЕРНОВИК -->
						<div class="form-group">
							<label>
								{{ Form::checkbox('status', '1', $post->is_featured,
								['class' => 'minimal']) }}
							</label>
							<label>
								Черновик
							</label>
						</div>

					</div>

					{{-- ОПИСАНИЕ --}}
					<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputEmail1">Описание</label>
								<textarea name="description" id="" cols="20" rows="10" class="form-control" >{{ $post->description }}</textarea>
						</div>
					</div>

					{{-- КОНТЕНТ --}}
					<div class="col-md-12">
						<div class="form-group">
							<label for="exampleInputEmail1">Полный текст</label>
							<textarea name="content" id="" cols="30" rows="10" class="form-control">{{ $post->content }}</textarea>
						</div>
					</div>

				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button class="btn btn-default">Назад</button>
					<button class="btn btn-warning pull-right">Изменить</button>
				</div>
				<!-- /.box-footer-->
			</div>
			<!-- /.box -->
			{{ Form::close() }}
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	@endsection
