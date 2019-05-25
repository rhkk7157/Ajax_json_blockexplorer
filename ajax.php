<?php
require_once "php/lib/db.php";

     $dbcon= new DB;
     $dbcon->Open();

     $sql =  "SELECT last_insert_id() FROM nodeinfo";
     $res = $dbcon->Query($sql);
     $cnt = $dbcon->NumRows($res);

     $TotalNodes = $cnt;
     $dbcon->Close();

 ?>
