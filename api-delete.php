<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');

header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include 'config.php';
$data = json_decode(file_get_contents("php://input"), true);

$student_data = $data['sid'];

$sql = "DELETE FROM students Where id={$student_data}";
//$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_query($conn, $sql) ){
	echo json_encode(array('message' => 'Record Deleted.', 'status' => false));
}else{

 echo json_encode(array('message' => 'Record Not Deleted .', 'status' => false));

}

?>
