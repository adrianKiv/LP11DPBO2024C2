<?php


interface KontrakPresenter{
	public function prosesDataPasien();
	public function adddata($data);
	public function updatedata($data);
	public function deletedata($id);
	public function updateForm($id);

	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelephone($i);
	public function getSize();
}
