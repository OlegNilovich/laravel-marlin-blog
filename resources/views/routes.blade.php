<html>
<head>
	<title>Маршруты</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body>
	<h1>Маршруты</h1>
	<table>
		<thead>
			<tr>
				<th>Method</th>
				<th>URI</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($routes as $route)
			<tr>
				<td>{{ $route['method'] }}</td>
				<td>{{ $route['uri'] }}</td>
				<td>{{ $route['name'] }}</td>
				<td>{{ $route['action'] }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
