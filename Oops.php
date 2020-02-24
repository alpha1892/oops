<?php

namespace Oops\school; 

abstract class School {

  /**
   * Name of the school.
   *
   * @var string
   */
  protected $name = NULL;

  /**
   * Teachers in the school.
   *
   * @var string
   */
  protected $teacher_name = NULL;

  /**
   * Classroom in the school.
   *
   * @var string
   */
  protected $classroom = NULL;

  /**
   * Student name.
   *
   * @var string
   */
  protected $student_name = NULL;

  /**
   * Department name.
   *
   * @var string
   */
  protected $department = NULL;
  protected $school_list = [
    'Modern School Sec-17',
    'DAV Sec-14',
    'MVN Sec-17',
    'St. Thomad Sec-8',
    'St. Johns Sec-7',
    'Divine Sec-9',
    'DPS Mathura Road Sec-19',
    'Grand Columbus Sec-16',
    'Shiv Nadar Sec-86',
    'Vidya Sanskar Sec-88',
    'Moden DPS Sec-84',
  ];


  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function setTeacherName($teacher_name) {
    $this->teacher_name = $teacher_name;
  }

  public function getTeacherName() {
    return $this->teacher_name;
  }

  public function setClassroom($classroom) {
    $this->classroom = $classroom;
  }

  public function getClassroom() {
    return $this->classroom;
  }

  public function setStudentName($student_name) {
    $this->student_name = $student_name;
  }

  public function getStudentName() {
    return $this->student_name;
  }

  public function setDepartment($department) {
    $this->department = $department;
  }

  public function getDepartment() {
    return $this->department;
  }
  public function schoolList() {
    $list = implode(', ', $this->school_list);

    return $list;
  }
  // Abstract method.
  abstract public function prepareData();
}

interface Classroom {
  public function studentList();
}

interface Hod {
  public function hodList();
}

class Student extends School implements Classroom {

  public function prepareData() {
    $this->setStudentName('Ankit');
    $this->setclassroom('Non-Medical');
    $output = $this->getStudentName();

    if (strtolower($this->getclassroom()) == "non-medical") {
      $subjects = "Physics, Chemistry, Mathematics, English";
    }
    if (strtolower($this->getclassroom()) == "medical") {
      $subjects = "Biology, Chemistry, Mathematics, English";
    }
    if (strtolower($this->getclassroom()) == "arts") {
      $subjects = "Arts, Physical Education, English";
    }
    if (strtolower($this->getclassroom()) == "commerce") {
      $subjects = "Business Studies, Accounts, Mathematics, English";
    }
    $output .= $this->whichSubject($subjects, $this->getStudentName());

    return $output;
  }

  public function studentList() {
    $list = "Ankit, Ankur, Ajay";

    return $list;
  }

  public function whichSubject($subjects, $name) {
    if (strpos($subjects, "Physics") !== FALSE) {
      $output = $name . " having physics subjects. ";
    }
    else {
      $output = $name . " having other subjects. ";
    }

    return $output;
  }
  
}

class Teachers extends School implements Hod {
  
  public function prepareData() {
    $this->setTeacherName('Mathews');
    $this->setDepartment('English');
    $is_hod = "isn't hod";
    if (strtolower($this->getDepartment()) == "physics") {
      $is_hod = "is hod";
    }
    $output = $this->getTeacherName() . " is in " . $this->getDepartment() . " and he " . $is_hod . "\n";
    return $this->getTeacherName();
  }

  public function hodList() {
    $list = "Gauri, Devender, Rajeev, Sanjay, Garima, Lal Chand";
    return $list;
  }
  
}

// Student Object.
$student_obj = new Student();
echo "Total list of schools in FBD: \n" . $student_obj->schoolList() ."\n";
echo $student_obj->prepareData() . "\n" . $student_obj->studentList() . "\n";
// Teacher Object.
$teacher_obj = new Teachers();
echo $teacher_obj->prepareData() . "\n" . $teacher_obj->hodList();
?>
