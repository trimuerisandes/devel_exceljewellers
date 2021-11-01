<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>UPLOAD CSV FILE FOR DATABASE</h1>
	<form method="POST" enctype="multipart/form-data" action="{{ url('/excel_insert') }}">
		@csrf

		<select name="type">
			<option value="eng">ENG</option>
			<option value="wed">WED</option>
			<option value="fine">FINE</option>
		</select>

		<input type="file" name="csv_file" required value="upload">
		<button type="Submit">Submit</button>
		
	</form>


	<h1>UPLOAD CSV FILE FOR DATABASE STULLER</h1>
	<form method="POST" enctype="multipart/form-data" action="{{ url('/excel_insert_stuller') }}">
		@csrf

		<select name="type">
			<option value="eng">ENG</option>
			<option value="wed">WED</option>
			<option value="fine">FINE</option>
		</select>

		<input type="file" name="csv_file" required value="upload">
		<button type="Submit">Submit</button>
		
	</form>


</body>
</html>