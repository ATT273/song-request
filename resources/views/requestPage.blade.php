<!DOCTYPE html>
<html>
<head>
	<title>Request A Song</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="content">
	<div class="container">
		<div class="header">
			@if(session('thongbao'))
			   <div class="alert alert-success">
			   		{{session('thongbao')}}
			   </div>
			@endif
			@if(session('loi'))
			   <div class="alert alert-danger">
			   		{{session('loi')}}
			   </div>
			@endif
			<center><h3><b>REQUEST YOUR SONGS</b></h3></center>
		</div>
		<br>
		<form method="POST" action="queue_song">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="link"><b>Enter Youtube URL</b></label>
				<input class="form-control" type="text" name="link" id="link" required>
			</div>
			<button type="submit" class="form-control btn btn-default">Send Request</button>
		</form>

		<br>

		<div class="q_list" id="q_list">
			<h4> Queue List</h4>
			<table>
				<thead>
					<th>1</th>
					<th>2</th>
					<th>3</th>
					<th>4</th>
					<th>5</th>
				</thead>
				<tbody>
					@foreach($songs as $song)
						<tr>
							<td>{{$song->link}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
		setInterval(function(){
			$('#q_list').load('reload-list');
		},1000);
</script>
</body>
</html>