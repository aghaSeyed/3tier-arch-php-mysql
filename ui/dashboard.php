<html>
<head>
<title>Web Project</title>
<style>
body{
background-color:white
;
}
table, th, td {
  border: 1px solid black;
  width : 50%;
  padding : 10px
}
.main{
	padding : 10px;
  margin-left: 22.5%;
  margin-top : 100px
}
.wrapper {
  display: grid;
  margin-top: 20px;
  gap: 10px;
  grid-auto-rows: minmax(10px, auto);
}
.one {
  grid-column: 1 / 3;
  grid-row: 1;
}
</style>
</head>
<body>
<h1> A Simple 3 Tiers Architecture Using PHP And MySQL And SQL Queueing System</h1>
<div class="main">
<table>
  <tr>
  <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Score</th>
  </tr>
  
  <?php
	session_start();
	$datas = $_SESSION["data"];
	foreach ($datas as $data){
		echo "<tr>";
    echo "<td>".$data["id"]."</td>";
	echo "<td>".$data["fname"]."</td>";
	echo "<td>".$data["lname"]."</td>";
	echo "<td>".$data["score"]."</td>";
	echo "</tr>";
	}
   ?>
  
  <tr>
    <td>  </td>
    <td> </td>
    <td></td>
	<td></td>
  </tr>
</table>

<form action="../logic/controller.php" method="get">
<button style="margin-top:10px;" id="select"> Select</button>
<button style="margin-top:10px;" id="insert"> Insert</button>
<button style="margin-top:10px;" id="delete"> Delete</button>
<button style="margin-top:10px;" id="update"> Update</button>
<div class="wrapper" id="one">
<div class="one">
<label for="fname">First Name</label>
<input name="fname" type="text">
<label for="lname">Last Name</label>
<input name="lname" type="text">
<label for="score">Score</label>
<input name="score" type="text">
</div>
</div>
<div class="wrapper" id="two">
<div class="one">
<label for="id">ID</label>
<input name="id" type="text">
<label for="ufname">First Name</label>
<input name="ufname" type="text">
<label for="ulname">Last Name</label>
<input name="ulname" type="text">
<label for="uscore">Score</label>
<input name="uscore" type="text">
</div>
</div>

<div class="wrapper" id="three">
<div class="one">
<label for="did">ID</label>
<input name="did" type="text">
</div>
</div>



<input name="action" type="hidden" type="text" id="action">
<button style="margin-top:10px;" id="submit" type="submit"> Submit</button>
</form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
$("#one").hide();
$("#two").hide();
$("#three").hide();
$("#insert").click(function(e){
	e.preventDefault();
	$("#one").fadeOut();
	$("#two").fadeOut();
	$("#three").hide();
	console.log("clicked");
	$("#one").fadeIn("3000");
	$("#action").val("insert");
});

$("#update").click(function(e){
	e.preventDefault();
	console.log("clicked");
	$("#one").fadeOut();
	$("#three").hide();
	$("#two").fadeIn("3000");
	$("#action").val("update");
});

$("#delete").click(function(e){
	e.preventDefault();
	console.log("clicked");
	$("#one").fadeOut();
	$("#two").fadeOut();
	$("#three").fadeIn("3000");
	$("#action").val("delete");
});
$("#select").click(function(e){
	e.preventDefault();
	$("#action").val("select");
});
</script>
</body>
</html>
<?php

?>