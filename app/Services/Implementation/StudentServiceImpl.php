<?php

namespace App\Services\Implementation;
use App\Repositories\StudentRepository;
use App\Services\StudentService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Validator;

class StudentServiceImpl implements StudentService
{
	protected $studentRepository;

	public function __construct(StudentRepository $studentRepository)
	{
		$this->studentRepository = $studentRepository;
	}

	function saveStudentData($data)
	{
		$validator = Validator::make($data, [
			'fullName' => 'required|min:3',
			'phoneNumber' => 'required|numeric',
			'city' => 'required'
		]);

		if ($validator->fails()) {
			throw new InvalidArgumentException($validator->errors()->first());
		}

		$result = $this->studentRepository->save($data);

		return $result;
	}

	function getAllStudentData()
	{
		$result = $this->studentRepository->getAll();
		
		return $result;
	}

	public function updateStudentData($data, $uuid)
	{
		$validator = Validator::make($data, [
			'fullName' => 'required|min:3',
			'phoneNumber' => 'required|numeric',
			'city' => 'required'
		]);

		if ($validator->fails()) {
			throw new InvalidArgumentException($validator->errors()->first());
		}

		DB::beginTransaction();

		try {
			$student = $this->studentRepository->update($data, $uuid);
		} catch (Exception $e) {
			DB::rollBack();
			Log::info($e->getMessage());

			throw new InvalidArgumentException('Unable to update student data');
		}

		DB::commit();

		return $student;
	}

	public function deleteStudentData($uuid)
	{
		DB::beginTransaction();

		try {
			$student = $this->studentRepository->delete($uuid);
		} catch (Exception $e) {
			DB::rollBack();
			Log::info($e->getMessage());

			throw new InvalidArgumentException('Unable to delete student data');
		}

		DB::commit();

		return $student;
	}


}
