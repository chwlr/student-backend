<?php

namespace App\Services;

interface StudentService
{
	public function saveStudentData($data);
	public function getAllStudentData();
	public function updateStudentData($data, $uuid);
	public function deleteStudentData($uuid);
}
