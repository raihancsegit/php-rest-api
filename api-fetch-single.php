<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include 'config.php';
$data = json_decode(file_get_contents("php://input"), true);

$student_data = $data['sid'];

$sql = "SELECT * FROM students Where id={$student_data}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result) > 0 ){
	$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($output);
}else{

 echo json_encode(array('message' => 'No Record Found.', 'status' => false));

}

?>
