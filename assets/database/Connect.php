<?php 
	
	class SqlConnect
	{
		private $connection; 
//		 private $host_name='localhost';
//		 private $db_user='root';
//		 private $db_password='root';
//		 private $db_name='patool';
		private $host_name='166.62.8.49';
		private $db_user='patool';
		private $db_password='Whypass@123';
		private $db_name='patool';
		private $result;

		function __construct()
		{
			$this->connection = mysqli_connect($this->host_name,$this->db_user,$this->db_password,$this->db_name);
		}

		function fetch_query($query)
		{
			$this->result = mysqli_query($this->connection,$query);
		}

		function update_query($query)
		{
			if(mysqli_query($this->connection,$query))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function get_row()
		{
			$row = mysqli_fetch_array($this->result);
			return $row;
		}

		function close()
		{
			mysqli_close($this->connection);
		}
	}
?>