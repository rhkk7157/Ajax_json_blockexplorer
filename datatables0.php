<?php
require_once "php/lib/db.php";

$row ="";

  $dbcon= new DB;
  $dbcon->Open();

  $sql =  "SELECT Hash,time,From_,To_,Amount,Action FROM transactioninfo limit 100";

  $res = $dbcon->Query($sql);
  $cnt = $dbcon->NumRows($res);


 while($row = $dbcon->FetchAssoc($res))
 {
    $rows[] = array(
       'Hash'         => $row['Hash'],
       'time'   => $row['time'],
       'From_'               => $row['From_'],
       'To_'         => $row['To_'],
       'Amount'         => $row['Amount'],
       'Action'         => $row['Action']
     );

 }

echo   $rows[0]['Hash'];

$dbcon->Close();
 ?>
