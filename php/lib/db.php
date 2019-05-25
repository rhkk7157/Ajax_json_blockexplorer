<?php
/*++
Copyright (C) mofas , 2018
Module Name:
Abstract:
Author: Edward(양종만)
Note:    -
Last Modify : 2018 – by Edward
Revision History : v0.1
--*/
class DB
{
	
	var $host	="192.168.0.53";	
	var $user	="root";
	var $pwd	="root";	
	var $dbname	="test_db";
	var $port   = 3306;
	
	var $conn="";
	var $DEBUG="";

	function HttpUrl()
	{
		$httpurl="https://mofas.io/";//.$_SERVER['SERVER_NAME'];
		return $httpurl;
	}
	
	function Open()
	{
		$this->conn=mysqli_connect($this->host, $this->user, $this->pwd, $this->dbname);
		if(!$this->conn){
			dir("error db connection !<br> Error Code : ".mysqli_errno($this->conn)." Error Message : ".mysqli_error($this->conn));
		}
		//if(!mysql_select_db($this->dbname, $this->conn)){
		//	dir("error db select !<br> Error Code : ".mysql_erron()." Error Message : ".mysql_error($this->conn));
		//}
		return $this->conn;
	}

	//DB 연결 종료
	function Close()
	{
		@mysqli_close($this->conn);
	}
	
	//debug mode ON.
	function SetDebug($usr_ip)
	{
		$this->DEBUG = true;
		$this->DEBUG_IP = $usr_ip;
	}
	
	//debug log print.
	function QueryLog($sec, $sql) {
		if($this->DEBUG && ($_SERVER['REMOTE_ADDR'] == $this->DEBUG_IP)) {
			$print_msg  = $sql;
			$print_msg .= " (".($sec['end'] - $sec['start'])." sec)";
			echo $print_msg."<br><br><br>";
		}
		return;
	}
	
	
	function microtime_float()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}


	/**
	$commend : 질의 수행시 해당 질위에 위치 정보를 색인하는 문장데이터.. 기본값은 null 입니다
	*/
	function Query($sql,$commend='')
	{
		//query 실행 시작시간.
		list($S_usec, $S_sec) = explode(" ", microtime());
		$sec['start'] = $S_sec + $S_usec;
		
		//mysql_query('set names utf8', $this->conn);
		mysqli_query($this->conn, 'set names utf8');
		$res = mysqli_query($this->conn, $sql);
		if(!$res){
			echo "<font color=red>";
			if($commend!=""){
				echo "참고 : ".$commend."<br>";
			}
			
			//echo "Errot 메세지 : ".$thid->Db_error()." [code : ".$this->Db_errno()."]<br>";
			echo "Error : ".$sql;
			echo "</font>";
			$this->Free($res);
			$this->Close();
			exit;
		}

		//query 실행 종료시간.
		list($E_usec, $E_sec) = explode(" ", microtime());
		$sec['end'] = $E_sec + $E_usec;

		//echo $sec['end']."<br>";
		$this->QueryLog($sec, $sql);
		return $res;
	}



	function InsertId()
	{
		return mysqli_insert_id($this->conn);
	}

	function FetchObject($res)
	{
		return mysqli_fetch_object($res);
	}

	function FetchAssoc($res)
	{
		return mysqli_fetch_assoc($res);
	}

	//row count retrun.
	function NumRows($res)
	{
		return mysqli_num_rows($res);
	}

	//error message return.
	function Error()
	{
		$ret = mysqli_error($this->conn);
		return $ret;
	}

	//error No return.
	function ErrorNo()
	{
		$ret = mysqli_errno($this->conn);
		return $ret;
	}
	
	//DB reset
	function Free($res)
	{
		@mysqli_free_result($res);
	}
	
	function GetUUID($localip2long, $remoteip2long) 
	{
		return sprintf( '%04x%04x-%s-%s',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			$localip2long,
			$remoteip2long );
	}
}

?>
