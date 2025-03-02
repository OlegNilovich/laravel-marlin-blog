@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Blank page
			<small>it all starts here</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Examples</a></li>
			<li class="active">Blank page</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Удаленные пользователи</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="form-group">
					<a href="{{ route('users.index') }}" class="btn btn-success">Назад</a>
				</div>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Имя</th>
							<th>E-mail</th>
							<th>Аватар</th>
							<th>Действия</th>
						</tr>
					</thead>
					<tbody>

						@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<img src="{{ $user->getAvatar() }}" alt="" class="img-responsive" width="55">
							</td>
							<td>
								{{-- Кнопка возврата пользователя --}}
								{{Form::open(['route'=>['users.restore', $user->id], 'method'=>'post'])}}
								<button onclick="return confirm('Восстановить пользователя?')" type="submit" class="delete">
									<i class="fa fa-user-plus"></i></button>
									{{Form::close()}}
									{{-- Кнопка возврата пользователя --}}
								</td>
							</tr>
							@endforeach

						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	@endsection
