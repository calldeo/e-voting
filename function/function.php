<?php

require_once('dbconfig.php');

class ADMIN{
	private $conn;

	public function __construct(){
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

	public function runQuery($sql){
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	// tanggal vote
	public function tglVote($data)
	{
		try
		{
			$stmt=$this->conn->prepare("UPDATE setting_waktu SET 
				waktu 		=:waktu
				WHERE id_setting=:id_setting");
			$stmt->execute($data);
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	// Menampilkan Data User Pada Table
	public function dataViewUsers($query){
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		$no = 0;
        if($stmt->rowCount()>0){
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    	        <tr>
                    <td><?php print($row['id_user']); ?></td>
                    <td><?php print($row['nama']); ?></td>
                    <td><?php print($row['username']); ?></td>
                    <td><?php print($row['password']); ?></td>
					<td>
						<?php  
						if ($row['akses'] == 1) {
							echo "Admin";
						} else if ($row['akses'] == 2) {
							echo "Pemilih";
						}
						?>
					</td>
                    <td>
                        <a href="edit.php?id_user=<?php print($row['id_user']); ?>" class="btn btn-primary btn-xs" role="button" aria-pressed="true"><i class="fa fa-pencil-square-o"> <span>Edit</span></i>
                        </a>
                        <a href="hapus.php?id_user=<?php print($row['id_user']); ?>" class="btn btn-danger btn-xs" role="button" aria-pressed="true"><i class="fa fa-trash-o"> <span>Delete</span></i>
                        </a>
                    </td>

                </tr>
    	<?php
            }
        }else{
        ?>  <tr>  <td>Nothing here...</td> </tr>
        <?php
      }
	}

	public function dataViewPolling($query){
		$stmt = $this->conn->prepare($query);
		$stmt->execute();


        if($stmt->rowCount()>0){
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    	        <tr>
                    <td><?php print($row['nama']); ?></td>
                    <td><?php print($row['id_calon']); ?></td>
										<td><?php print($row['tanggal']); ?></td>
                    <!-- <td>
                    	<?php  
                    	if ($_SESSION['tgl_vote'] != date('Y-m-d')) {
                    		// code...
                    	
                    	?>
                        <a href="hapus.php?id_user=<?php print($row['id_user']); ?>" class="btn btn-danger btn-xs" role="button" aria-pressed="true"><i class="fa fa-trash-o"> <span>Delete</span></i>

                        </a>
                        <?php } ?>

                    </td> -->

                </tr>
    	<?php
            }
        }else{
        ?>  <tr>  <td>Nothing here...</td> </tr>
        <?php
      }
	}

public function DeleteVoted($id){
	$stmt = $this->conn->prepare("DELETE FROM hasil_voting WHERE id_user = :id_user");
	$stmt->bindparam(":id_user", $id);
	$stmt->execute();
	return true;
}

	// DATA USERS
	public function TambahtUser($nama,$username,$password, $akses){
		try{
			$stmt = $this->conn->prepare("INSERT INTO users(nama,username,password, akses) VALUES(:nama, :username, :password, :akses)");
			$stmt->bindparam(":nama",$nama);
			$stmt->bindparam(":username",$username);
			$stmt->bindparam(":password",$password);
			$stmt->bindparam(":akses", $akses);
			$stmt->execute();
			return true;
	}catch(PDOException $e){
			echo $e->getMessage();
			return false;
	}
}

public function getUser($id){
		$stmt = $this->conn->prepare("SELECT * FROM users WHERE id_user=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

public function updateUser($id, $nama,$username,$password, $akses){
	try{
		$stmt=$this->conn->prepare("UPDATE users SET
			nama = :nama,
			username = :username,
			password = :password,
			akses = :akses
			WHERE id_user = :id_user");
			$stmt->bindparam(":id_user",$id);
			$stmt->bindparam(":nama",$nama);
			$stmt->bindparam(":username",$username);
			$stmt->bindparam(":password",$password);
			$stmt->bindparam(":akses", $akses);
			$stmt->execute();

		return true;
	}catch(PDOException $e){
		echo $e->getMessage();
		return false;
	}
}

public function DeleteUser($id){
	$stmt = $this->conn->prepare("DELETE FROM users WHERE id_user = :id_user");
	$stmt->bindparam(":id_user", $id);
	$stmt->execute();
	return true;
}


// ========================================================= =============================================== //
	public function deleteAllUser(){
		$stmt = $this->conn->prepare("DELETE FROM users WHERE akses=2");
		$stmt->execute();
		return true;
	}

	public function deleteAllCount(){
		$stmt = $this->conn->prepare("TRUNCATE TABLE hasil_voting");
		$stmt->execute();
		return true;
	}



// Calon
	public function TambahtCalon($nama,$visi_visi, $gambar, $jmlvote){
		try{
			$stmt = $this->conn->prepare("INSERT INTO calon_osis(nama_calon,visimisi, gambar, jumlah_vote) VALUES(:nama, :visimisi, :gambar, :vote)");
			$stmt->bindparam(":nama",$nama);
			$stmt->bindparam(":visimisi",$visi_visi);
			$stmt->bindparam(":gambar",$gambar);
			$stmt->bindparam(":vote", $jmlvote);
			$stmt->execute();
			return true;
	}catch(PDOException $e){
			echo $e->getMessage();
			return false;
	}
	}

	public function GetCalon($id){
			$stmt = $this->conn->prepare("SELECT * FROM calon_osis WHERE id_calon=:id");
			$stmt->execute(array(":id"=>$id));
			$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
			return $editRow;
		}

		public function UpdateCalon($id_calon, $nama_calon, $visimisi, $file){
			try{
				$stmt=$this->conn->prepare("UPDATE calon_osis SET
					nama_calon = :nama_calon,
					visimisi = :visimisi,
					gambar = :gambar
					WHERE id_calon = :id_calon");
					$stmt->bindparam(":id_calon",$id_calon);
					$stmt->bindparam(":nama_calon",$nama_calon);
					$stmt->bindparam(":visimisi",$visimisi);
					$stmt->bindparam(":gambar",$file);
					$stmt->execute();

				return true;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function DeleteCalon($id){
			$stmt = $this->conn->prepare("DELETE FROM calon_osis WHERE id_calon=:id");
			$stmt->bindparam(":id", $id);
			$stmt->execute();
			return true;
		}

		//



// Vote
public function TambahVote($id_user,$id_calon){
	try
	{
		$stmt = $this->conn->prepare("INSERT INTO hasil_voting(id_user, id_calon) VALUES(:id_user, :id_calon)");
		$stmt->bindparam(":id_user",$id_user);
		$stmt->bindparam(":id_calon",$id_calon);
		$stmt->execute();
		return true;
	}
	catch(PDOException $e)
	{
			echo $e->getMessage();
			return false;
	}
}

// Login
	public function doLoginAdmin($username,$password){
		try{
			$stmt = $this->conn->prepare("SELECT * FROM users WHERE username=:username");
			$stmt->execute(array(':username'=>$username));
			$adminRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1){
				if(md5($password) == $adminRow['password'] || $password == $adminRow['password']){
					$_SESSION['admin_session'] = $adminRow['id_user'];
					return true;
				}else{
					return false;
				}
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function is_loggedinAdmin(){
		if(isset($_SESSION['admin_session'])){
			return true;
		}
	}

	public function redirect($url){
		header("Location: $url");
	}

	public function doLogoutAdmin(){
		session_destroy();
		unset($_SESSION['admin_session']);
		return true;
	}
}
?>
