<?php

namespace App\Repositories;

interface StudentRepository
{
	public function save($data);
	public function getAll();
	public function update($data, $uuid);
	public function delete($uuid);
}
