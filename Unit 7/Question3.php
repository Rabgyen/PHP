<?php

/* =========================
   Abstract Parent Class
========================= */
abstract class Person {
    protected $name;
    protected $email;
    protected $phone;

    public function __construct($name, $email, $phone) {
        $this->name  = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    // Abstract method
    abstract public function getRole();
}

/* =========================
   Student Class
========================= */
class Student extends Person {
    private $studentId;
    private $course;
    private $semester;
    private $marks = [];

    public function __construct($name, $email, $phone, $studentId, $course, $semester) {
        parent::__construct($name, $email, $phone);
        $this->studentId = $studentId;
        $this->course    = $course;
        $this->semester  = $semester;
    }

    public function addMarks($subject, $mark) {
        $this->marks[$subject] = $mark;
    }

    public function calculateGPA() {
        if (count($this->marks) === 0) {
            return 0;
        }

        $total = array_sum($this->marks);
        $average = $total / count($this->marks);

        // Simple GPA logic (out of 4)
        return round(($average / 100) * 4, 2);
    }

    public function getRole() {
        return "Student";
    }

    // Getters for display
    public function getStudentData() {
        return [
            $this->studentId,
            $this->name,
            $this->course,
            $this->semester,
            $this->calculateGPA()
        ];
    }
}

/* =========================
   Teacher Class
========================= */
class Teacher extends Person {
    private $teacherId;
    private $department;
    private $subjects = [];

    public function __construct($name, $email, $phone, $teacherId, $department) {
        parent::__construct($name, $email, $phone);
        $this->teacherId  = $teacherId;
        $this->department = $department;
    }

    public function addSubject($subject) {
        $this->subjects[] = $subject;
    }

    public function getRole() {
        return "Teacher";
    }

    // Getters for display
    public function getTeacherData() {
        return [
            $this->teacherId,
            $this->name,
            $this->department,
            implode(", ", $this->subjects)
        ];
    }
}

/* =========================
   Data Storage
========================= */
$students = [];
$teachers = [];

/* =========================
   Add Students
========================= */
$student1 = new Student("Rabgyen Moktan", "rabgyen@email.com", "9800000000", "S001", "BCSIT", 4);
$student1->addMarks("Math", 85);
$student1->addMarks("OOP", 90);

$student2 = new Student("Sita Sharma", "sita@email.com", "9811111111", "S002", "BCA", 2);
$student2->addMarks("DBMS", 78);
$student2->addMarks("C Programming", 82);

$students[] = $student1;
$students[] = $student2;

/* =========================
   Add Teachers
========================= */
$teacher1 = new Teacher("Hari Prasad", "hari@email.com", "9822222222", "T001", "Computer Science");
$teacher1->addSubject("OOP");
$teacher1->addSubject("DBMS");

$teacher2 = new Teacher("Gita Rai", "gita@email.com", "9833333333", "T002", "IT");
$teacher2->addSubject("Web Development");

$teachers[] = $teacher1;
$teachers[] = $teacher2;

/* =========================
   Display Students
========================= */
echo "<h3>Students List</h3>";
echo "<table border='1' cellpadding='5'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>GPA</th>
        </tr>";

foreach ($students as $student) {
    [$id, $name, $course, $semester, $gpa] = $student->getStudentData();
    echo "<tr>
            <td>$id</td>
            <td>$name</td>
            <td>$course</td>
            <td>$semester</td>
            <td>$gpa</td>
          </tr>";
}
echo "</table>";

/* =========================
   Display Teachers
========================= */
echo "<h3>Teachers List</h3>";
echo "<table border='1' cellpadding='5'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Subjects</th>
        </tr>";

foreach ($teachers as $teacher) {
    [$id, $name, $department, $subjects] = $teacher->getTeacherData();
    echo "<tr>
            <td>$id</td>
            <td>$name</td>
            <td>$department</td>
            <td>$subjects</td>
          </tr>";
}
echo "</table>";

?>
