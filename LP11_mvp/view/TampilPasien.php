<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $view;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil(){
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$id = $this->prosespasien->getId($i); // get the id

			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelephone($i) . "</td>
			<td>"
			 . "<a class='btn btn-outline-warning' href='update.php?update=" . $id . "'>edit</a> 
				<a class='btn btn-outline-danger' href='delete.php?delete=" . $id . "'>hapus</a>" . "
			</td>
			</tr>";
		}
		// Membaca template skin.html
		$this->view = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->view->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->view->write();
	}

	public function add(){
		$dataForm = '
        <form action="add.php" method="post" role="form" id="form-add">
 
          <br><br><div class="card">
          
          <div class="card-header bg-dark">
          <h1 class="text-white text-center">  ADD DATA </h1>
          </div><br>

          <input type="hidden" name="id_member" class="form-control"> <br>

          <label> NIK: </label>
          <input type="text" name="nik" class="form-control" required> <br>

          <label> NAMA: </label>
          <input type="text" name="nama" class="form-control" required> <br>

          <label> TEMPAT: </label>
          <input type="text" name="tempat" class="form-control" required> <br>

		  <label> TANGGAL LAHIR: </label>
          <input type="date" name="tl" class="form-control" required> <br>
		  
          <label> GENDER: </label>
		  <select class="form-control" name="gender" required> <br>
		  	<option value="" selected disabled hidden>Pilih</option>
			<option value="Laki-laki">Laki-laki</option>
			<option value="Perempuan">Perempuan</option>
		  </select>

		  <label> EMAIL: </label>
          <input type="text" name="email" class="form-control" required> <br>

		  <label> NO TELPON: </label>
          <input type="text" name="telp" class="form-control" required> <br>

          <button class="btn btn-outline-success" type="submit" name="tambah" form="form-add"> Submit </button><br>
          <a class="btn btn-outline-danger" type="submit" name="cancel" href="index.php"> Cancel </a><br>

          </div>
        </form>
        ';

		// Membaca template skin.html
		$this->view = new Template("templates/skinform.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->view->replace("FORM", $dataForm);

		// Menampilkan ke layar
		$this->view->write();
	}

	public function update($id){
		$this->prosespasien->updateForm($id);

		$dataForm = '
        <form action="update.php" method="post" role="form" id="form-add">
 
          <br><br><div class="card">
          
          <div class="card-header bg-dark">
          <h1 class="text-white text-center">  UPDATE DATA </h1>
          </div><br>

          <input type="hidden" name="id" class="form-control" value="'. $this->prosespasien->getId() .'"> <br>

          <label> NIK: </label>
          <input type="text" name="nik" class="form-control" value="'. $this->prosespasien->getNik() .'"> <br>

          <label> NAMA: </label>
          <input type="text" name="nama" class="form-control" value="'. $this->prosespasien->getNama() .'"> <br>

          <label> TEMPAT: </label>
          <input type="text" name="tempat" class="form-control" value="'. $this->prosespasien->getTempat() .'"> <br>

		  <label> TANGGAL LAHIR: </label>
          <input type="date" name="tl" class="form-control" value="'. $this->prosespasien->getTl() .'"> <br>
		  
          <label> GENDER: </label>
		  <select class="form-control" aria-label="Category" id="gender" name="gender" required>
			<option value="" selected disabled hidden>Pilih</option>
			<option value="Laki-laki" '. ($this->prosespasien->getGender() == "Laki-laki" ? 'selected' : '') .'>Laki-laki</option>
			<option value="Perempuan" '. ($this->prosespasien->getGender() == "Perempuan" ? 'selected' : '') .'>Perempuan</option>
	  	  </select> <br>

		  <label> EMAIL: </label>
          <input type="text" name="email" class="form-control" value="'. $this->prosespasien->getEmail() .'"> <br>

		  <label> NO TELPON: </label>
          <input type="text" name="telp" class="form-control" value="'. $this->prosespasien->getTelephone() .'"> <br>

          <button class="btn btn-outline-success" type="submit" name="update" form="form-add"> Update </button><br>
          <a class="btn btn-outline-danger" type="submit" name="cancel" href="index.php"> Cancel </a><br>

          </div>
        </form>
        ';

		// Membaca template skin.html
		$this->view = new Template("templates/skinform.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->view->replace("FORM", $dataForm);

		// Menampilkan ke layar
		$this->view->write();
	}

	// Metode untuk menambah data pasien
	function addData($data){
		$this->prosespasien->adddata($data);
	}

	// Metode untuk memperbarui data pasien
	function updateData($data){
		$this->prosespasien->updatedata($data);
	}

	// Metode untuk menghapus data pasien
	function deleteData($id){
		$this->prosespasien->deletedata($id);
	}
}
