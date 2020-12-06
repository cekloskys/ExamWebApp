<?php
class Exam {
    // declare private field
    private $mysqli;

    // declare constructor
    function __construct() {
        // connect to filmcollector MySQL database
        // assign connection to field
        $this->mysqli = new mysqli('us-cdbr-east-02.cleardb.com', 'b49bfc6fb3e3f4', '01cd6a08', 'heroku_fdc891a22960f34');
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
    
    public function select_exam_names() {
        
        // format select statement as a String
        $sql = "SELECT examid, name FROM exam";
        
        // execute select statement
        $retval = $this->mysqli->query($sql);        
        
        //return result of executing select statement
        return $retval;
    }
}
?>