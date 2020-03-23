<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller {
	private $students;

	public function __construct() {
		$scraperBoolean = new ScraperController;
		$this->students = $scraperBoolean->getDataStudents()[0];
	}

	public function index() {
		return view('students.index', ['students' => $this->students]);
	}

	public function show($slug = null) {
		foreach ($this->students as $studente) {
			if($studente['slug'] == $slug) {
				return view('students.show', ['student' => $studente]);
			}
		}
		return abort('404');
	}

	public function getById($id) {
		if(!array_key_exists( $id , $this->students)) {
			return abort('404');
		}
		return view('students.show', ['student' => $this->students[$id]]);
	}
}