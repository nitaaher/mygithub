<?php 

	Class myClass{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db = "mydatabase";
		private $conn;

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}

		public function insert(){
			
			if (isset($_POST['submit'])) {
				if (isset($_POST['name']) && isset($_POST['emailid']) && isset($_POST['mobile']) && isset($_POST['address'])) {
					if (!empty($_POST['name']) && !empty($_POST['emailid']) && !empty($_POST['mobile']) && !empty($_POST['address']) ) {
						
						$name = $_POST['name'];
                        $emailid = $_POST['emailid'];
                        $mobile = $_POST['mobile'];
						$address = $_POST['address'];
					
						$query = "INSERT INTO details(name,emailid,mobile,address) VALUES ('$name','$emailid','$mobile','$address')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('records added successfully');</script>";
							echo "<script>window.location.href = 'display.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}

					}else{

                     //include 'validation.php';
						//echo "<script>alert('empty');</script>";
						//echo "<script>window.location.href = 'index.php';</script>";
					}
				}
			}
		}

		public function display(){
			$data = null;

			$query = "SELECT * FROM details";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($id){
			$query = "DELETE FROM details where id = '$id'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		
	}

		public function display_single($id){

			$data = null;

			$query = "SELECT * FROM details WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				$row = $sql->fetch_assoc();
					$data = $row;
			
			}
			return $data;
		}

		public function edit($id){

			$data = null;

			$query = "SELECT * FROM details WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				$row = $sql->fetch_assoc();
					$data = $row;
				}
			
			return $data;
		}

		public function update($data){

			$query = "UPDATE details SET name='$data[name]', emailid='$data[emailid]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}
	}

 ?>