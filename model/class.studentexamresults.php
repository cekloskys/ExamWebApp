<?php
class StudentExamResults {
    // declare private field
    private $mysqli;
    
    // declare constructor
    function __construct() {
        // connect to filmcollector MySQL database
        // assign connection to field
        $this->mysqli = new mysqli('localhost:3306', 'root', '', 'examdb');
    }
    
    // declare destructor
    function __destruct() {
        // close connection to filmcollector MySQL database
        $this->mysqli->close();
    }
    
    // declare getter 
    public function get_mysqli() {
        return $this->mysqli;
    }
    
    public function select_exam_results($examid) {
        
        // format select statement as a String
        $sql = "SELECT fname, lname, year, major, result " .
                "FROM student, studentexamresults, exam " .
                "WHERE student.studentid = studentexamresults.studentid " .
                "AND studentexamresults.examid = exam.examid " .
                "AND exam.examid = $examid";
        
        // execute select statement
        // assign return value to variable
        // allow only one query to be executed
        // at a time for security
        $retval = $this->mysqli->query($sql);        
        
        //return result of executing select statement
        return $retval;
    }
}
?>