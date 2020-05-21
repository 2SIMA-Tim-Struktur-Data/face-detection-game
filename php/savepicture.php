<?php
    session_start();
	require('db_handler.php'); // Connect to database
 

    $userId = $_SESSION['username'];
	// Fetch photo only if product id is not empty
	if (!empty($userId)) {

		$resultScore = $_POST['gameScore'];
		$resultEmotion = $_POST['playerEmotion'];
		$rawData = $_POST['imgBase64'];
		echo "<img src='".$rawData."' />"; // Show photo
 
		list($type, $rawData) = explode(';', $rawData);
		list(, $rawData)      = explode(',', $rawData);
		$unencoded = base64_decode($rawData);
		
		$filename = $userId.'_'.date('dmYHi').'_'.rand(1111,9999).'.png'; // Set a filename
		file_put_contents("../img/snapshots/$filename", base64_decode($rawData)); // Save photo to folder
 
		// Update product database with the new filename
		$sql = "INSERT INTO `snapshots`(`USER_NO`,`IMAGE_PATH`,`SCORE`,`EMOTION`) VALUES ('$userId','$filename','$resultScore','$resultEmotion')";
        
        if ($conn->query($sql) === TRUE) {
            echo "data inserted";
        }
        else 
        {
            echo "failed";
        }
 
 
	} 
	
	// 
	else {
		die('Unable to upload...');
	}
 
?>