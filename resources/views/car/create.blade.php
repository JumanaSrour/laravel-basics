<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($errors->all() as $message)
                <div class="alert alert-danger">{{$message}}</div>
                @endforeach
				@if (session()->has('add_status'))
				@if (session('add_status'))
				<div class="alert alert-success">Successfully added</div>
				@else
				<div class="alert alert-danger">Failed</div>
				@endif
			@endif
            </div>
        </div>
    </div>
	

	<div class="container">
		<div class="row">
			<div class="col-12">
				<form method="POST" enctype="multipart/form-data" action="{{ URL('car/store') }}" id="save-car-form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
						<label>Model</label>
						<input type="text" name="model" class="form-control">
					</div>

					<div class="form-group">
						<label>Mechanic</label>
						<select name="mechanic_id" class="form-control">
							<option value="-1"></option>

							@foreach ($mechanics as $mechanic)
								<option value="{{ $mechanic->id }}">{{ $mechanic->NAME }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Car Image</label>
						<input type="file" name="image" class="form-control">
					</div>

					<button type="button" class="btn btn-primary" id="save-btn">Save</button>
				</form>
			</div>
		</div>
	</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">
	$('#save-btn').click(function (e) {
		e.preventDefault();
		
		var submitConfirm = confirm("Are you sure to submit?");
		if (submitConfirm) {
			$('#save-car-form').submit();
		}
	});
</script>
</html>