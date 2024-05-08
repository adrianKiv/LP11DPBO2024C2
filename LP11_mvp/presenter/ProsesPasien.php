<?php

include("KontrakPresenter.php");

class ProsesPasien implements KontrakPresenter{
	private $tabelpasien;
	private $data = [];

	function __construct()
	{
		//konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array(); //instansi list untuk data Pasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}

	function prosesDataPasien(){
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				//ambil hasil query
				$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); //mengisi id
				$pasien->setNik($row['nik']); //mengisi nik
				$pasien->setNama($row['nama']); //mengisi nama
				$pasien->setTempat($row['tempat']); //mengisi tempat
				$pasien->setTl($row['tl']); //mengisi tl
				$pasien->setGender($row['gender']); //mengisi gender
				$pasien->setEmail($row['email']); //mengisi email
				$pasien->setTelephone($row['telp']); //mengisi telepon


				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		}
		catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	public function updateForm($id){
		$this->tabelpasien->open();

		$this->tabelpasien->getPasienById($id);
		$row = $this->tabelpasien->getResult();
		$this->data[] = $row;

		$this->tabelpasien->close();
	}

	public function adddata($data){
		try {
			$this->tabelpasien->open();
			$result = $this->tabelpasien->addPasien($data);
			$this->tabelpasien->close();
	
			if ($result > 0) {
				echo "<script>
				alert('Data berhasil ditambah!');
				document.location.href = 'index.php';
				</script>";
			} else {
				echo "<script>
				alert('Data gagal ditambah!');
				document.location.href = 'index.php';
				</script>";
			}
	
			return $result;
		} 
		catch (Exception $e) {
			echo "Error adding pasien: " . $e->getMessage();
		}
	}
	

	public function updatedata($data){
		try {
			$this->tabelpasien->open();
			$result = $this->tabelpasien->updatePasien($data);
			$this->tabelpasien->close();

			if ($result > 0) {
				echo "<script>
				alert('Data berhasil diperbarui!');
				document.location.href = 'index.php';
				</script>";
			} else {
				echo "<script>
				alert('Data gagal diperbarui!');
				document.location.href = 'index.php';
				</script>";
			}

			return $result;
		} 
		catch (Exception $e) {
			echo "Error update pasien: " . $e->getMessage();
		}
	}
	public function deletedata($id){
		try {
			$this->tabelpasien->open();
			$result = $this->tabelpasien->deletePasien($id);
			$this->tabelpasien->close();

			if ($result > 0) {
				echo "<script>
				alert('Data berhasil dihapus!');
				document.location.href = 'index.php';
				</script>";
			} else {
				echo "<script>
				alert('Data gagal dihapus!');
				document.location.href = 'index.php';
				</script>";
			}
			
			return $result;
		} 
		catch (Exception $e) {
			echo "Error delete pasien: " . $e->getMessage();
		}
	}


	function getId($i=0){
		//mengembalikan id Pasien dengan indeks ke i
		return $this->data[$i]['id'];
	}

	function getNik($i=0){
		//mengembalikan nik Pasien dengan indeks ke i
		return $this->data[$i]['nik'];
	}

	function getNama($i=0){
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['nama'];
	}

	function getTempat($i=0){
		//mengembalikan tempat Pasien dengan indeks ke i
		return $this->data[$i]['tempat'];
	}

	function getTl($i=0){
		//mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
		return $this->data[$i]['tl'];
	}

	function getGender($i=0){
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['gender'];
	}

	function getEmail($i=0){
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['email'];
	}

	function getTelephone($i=0){
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['telp'];
	}

	function getSize(){
		return sizeof($this->data);
	}
}
