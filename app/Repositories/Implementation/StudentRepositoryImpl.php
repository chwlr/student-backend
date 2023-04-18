<?php

namespace App\Repositories\Implementation;
use App\Models\Student;
use App\Repositories\StudentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentRepositoryImpl implements StudentRepository
{
	protected $student;

	public function __construct(Student $student)
	{
		$this->student = $student;
	}

	public function save($data)
	{
		$student = new $this->student;

		$student->uuid = Str::uuid();
		$student->full_name = $data['fullName'];
		$student->phone_number = $data['phoneNumber'];
		$student->city = $data['city'];

		$student->save();

		return $student->fresh();
	}

	public function getAll()
	{
		return $this->student->get();
	}

	public function update($data, $uuid)
	{
		$id = DB::table('students')->where('uuid', $uuid)->first(['id'])->id;
		
		$student = $this->student->find($id);
		$student->full_name = $data['fullName'];
		$student->phone_number = $data['phoneNumber'];
		$student->city = $data['city'];

		$student->update();

		return $student;
	}

	public function delete($uuid)
	{
		$id = DB::table('students')->where('uuid', $uuid)->first(['id'])->id;
		$student = $this->student->find($id);
		$student->delete();

		return $student;
	}
}
