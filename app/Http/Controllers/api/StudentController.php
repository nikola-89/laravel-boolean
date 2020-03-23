<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ScraperController;
use Illuminate\Http\Request;

class StudentController extends Controller {
	private $students;

	public function __construct() {
	$scraperBoolean = new ScraperController;
	$this->students = $scraperBoolean->getDataStudents()[0];
	}

	public function all() {
		$students = $this->students;
		return response()->json($students);
	}

	public function getAge() {
		$students = $this->students;
		$studentsAge = [];
		foreach ($students as $student) {
			$thisName = $student['name'];
			$studentsAge[$thisName] = $student['age'];
		}
		return response()->json($studentsAge);
	}

	public function getForAge($age) {
		$students = $this->students;
		$studentsFiltered = [];
		foreach ($students as $student) {
			if ($student['age'] == $age) {
				$studentsFiltered[] = $student;
			}
		}
		return response()->json($studentsFiltered);
	}

	public function filter(Request $request)
	{
		$students = $this->students;
		$typeRequest = [
			'age',
			'name',
			'gender',
		];
		$data = $request->all();
		foreach ($data as $key => $value) {
			if (!in_array($key, $typeRequest)) {
				unset($data[$key]);
			}
		}
		foreach ($data as $key => $value) {
			if (array_key_first($data) == $key) {
				$studentsFiltered = $this->filterFor($key, $value, $students);
			}
			else {
				$studentsFiltered = $this->filterFor($key, $value, $studentsFiltered);
			}
		}
		return response()->json($studentsFiltered);
	}

	private function filterFor($type, $value, $array)
	{
		$filtered = [];
		foreach ($array as $element) {
			if ($element[$type] == $value) {
				$filtered[] = $element;
			}
		}
		return $filtered;
	}
}
