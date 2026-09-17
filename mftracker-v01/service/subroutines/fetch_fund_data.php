<?php

include '../db_connect.php';

$sql1 = "SELECT * FROM users WHERE username != 'administrator' ORDER BY username";
$result1 = $conn->query($sql1);

while ($row1 = $result1->fetch_assoc())
{
  $username_user = $row1['username'];
  $tablename_user = $row1['tablename'];

  $purchase_total_value = 0;
  $current_total_value = 0;
  $filename_total = "../cache/totalvalue/$username_user.fundtotal.csv";
  file_put_contents($filename_total, '');

  // Get unique fund names
  $sql = "SELECT DISTINCT Fund_Name FROM `" . $tablename_user . "` ORDER BY Fund_Name";
  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {

    	$fund = $row['Fund_Name'];

    	// Query for each unique fund
    	$sql2 = "SELECT * FROM `" . $tablename_user . "` WHERE Fund_Name='$fund' ORDER BY Date";
    	$result2 = $conn->query($sql2);

    	$currentDate = date('d-m-Y');
    	$current_initial_value = 0;
    	$purchase_initial_value = 0;
    	$units_initial_value = 0;
    	$gainloss_initial_value = 0;
    	$currentnav_initial_value = 0;

    	while ($row2 = $result2->fetch_assoc()) {

        $current_initial_value = $current_initial_value + $row2['Current_Value'];
        $purchase_initial_value = $purchase_initial_value + $row2['Purchase_Value'];
        $units_initial_value = $units_initial_value + $row2['Units'];
        $gainloss_initial_value = $gainloss_initial_value + $row2['Gain_Loss'];
        $currentnav_initial_value = $row2['Current_NAV'];
        $fundname = $row2['Fund_Name'];
        $isincode = $row2['ISIN_Code'];
        $current_total_value = $current_total_value + $row2['Current_Value'];
        $purchase_total_value = $purchase_total_value + $row2['Purchase_Value'];

    	}

        // parse unique fund data and save in file
        // $today = date("Y-m-d");
        // $fileDate = date("Y-m-d", filemtime($filename));
        // if ($fileDate != $today) {
	$fundnameunique = str_replace([',', '"'], '', $fundname);
        $fileunique = fopen($filename_total, 'a');
        $dataunique = array($isincode, $fundnameunique, $purchase_initial_value, $current_initial_value, $gainloss_initial_value);
        fputcsv($fileunique, $dataunique);
        fclose($fileunique);
        // }
        // parse unique fund data and save in file end
  }

}

?>
