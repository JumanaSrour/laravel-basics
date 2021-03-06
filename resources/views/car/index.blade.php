<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-12">

				<a href="{{ URL('mechanic') }}">Go to Mechanics</a>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>@lang('dashboard.car.image')</th>
							<th>@lang('dashboard.car.model')</th>
							<th>@lang('dashboard.car.mechanic')</th>
							<th>@lang('dashboard.car.price')</th>
							<th>@lang('dashboard.car.discount')</th>
							<th>@lang('dashboard.car.tax')</th>
							<th>Final Price</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($cars as $car)
							<tr>
								<td><img width="100px" src="{{ env('STORAGE_URL') . '/' . $car->image }}"></td>
								<td>{{ $car->model }}</td>
								<td>{{ $car->mechanic->NAME }}</td>
								<td>{{ $car->price }}</td>
								<td>{{ $car->discount_percent }}%</td>
								<td>{{ $car->tax_percent }}%</td>
								<td>{{ $car->final_price }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>