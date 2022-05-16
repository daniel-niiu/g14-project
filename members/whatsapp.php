<?php   
if($_POST['message'] != ""){ 
	header("Location: https://wa.me/?text=".$_POST['message']);
}
// Include database configuration file 
//https://wa.me/08231231412?text=Halo%20name%20maya%20nadine
/*
require_once '../db/dbconnection.php'; 
$query = 'SELECT member_tel FROM member';
if ($result = $conn->query($query)) {
$text = "Hello all";
    while ($row = $result->fetch_assoc()) {
        $phone_number = $row['member_tel']; 
		$curl = curl_init();

		curl_setopt_array($curl, [
		  CURLOPT_URL => "https://api.wali.chat/v1/messages",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\"phone\":\"$phone_number\",\"message\":\"$text\"}",
		  CURLOPT_HTTPHEADER => [
		    "Content-Type: application/json",
		    "Token: "
		  ],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
    }
    $result->free();
}
*/
?>