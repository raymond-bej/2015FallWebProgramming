<?php
session_start();
	$name = 'Raymond Bejarano';
	$message = "Welcome $name";
	
	$person = array( 'Name' => $name, 'Age' => 21, CalorieGoal => 2000 );
	
	$excercise = $_SESSION['excercise'];
	if(!$excercise){
		$_SESSION['excercise'] = $excercise = array(
			array( 'Name' => 'Run', 'Time' => strtotime("-1 hour"), Calories => 700 ),
			array( 'Name' => 'Fencing', 'Time' => strtotime("now"), Calories => 800 ),
		);
	}
	    
	$total = 0;
	foreach ($excercise as $workout) {
		$total += $workout['Calories'];
	}
	
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Excercise</title>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<h1>Excercise</h1>
			<h2><?=$message?></h2>
			<div class="panel panel-success">
				<div class="panel-heading">Your Data</div>
					<div class="panel-body">
						<dl class="dl-horizontal">
							<dt>Name</dt>
							<dd><?=$person['Name']?></dd>
							<dt>Age</dt>
							<dd><?=$person['Age']?></dd>
							<dt>Goal</dt>
							<dd><?=$person['CalorieGoal']?></dd>
							<dt>Calories Burned Today</dt>
							<dd><?=$total?></dd>
						</dl>
					</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-xs-10">
					<a href="edit.php" class="btn btn-success">
						<i class="glyphicon glyphicon-plus"></i>
						New Entry
					</a>
					<a href="#" class="btn btn-danger">
						<i class="glyphicon glyphicon-trash"></i>
						Delete All
						<span class="badge"><?=count($excercise)?></span>
					</a>
					<br />
					<table class="table table-condensed table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Name</th>
								<th>Time</th>
								<th>Calories Burned</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($excercise as $i => $workout): ?>
								<tr>
									<th scope="row">
										<div class="btn-group" role="group" aria-label="...">
											<a href="view.php?id=<?=$i?>" title="View" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
											<a href="edit.php?id=<?=$i?>" title="Edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
											<a href="delete.php?id=<?=$i?>" title="Delete" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
										</div>
									</th>
									<td><?=$workout['Name']?></td>
									<td><?=date("M d Y  h:i:sa", $workout['Time'])?></td>
									<td><?=$workout['Calories']?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>  	
				</div>
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</body>
</html>