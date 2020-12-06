<?php
// include class.rating model file
require_once __DIR__ . '\..\model\class.exam.php';

// specify the content type of the data that will be
// transmitted back and forth between this file,
// the class.rating model file, and the create movie
// web page
header('Content-type: text/html');

function select_exam_names(){
    // create an Exam object
    $exam = new Exam();   
    
    // create String that will be echoed 
    // by function
    $html = '';
    
    // call select movie rating method on object
    $retval = $exam->select_exam_names();
    // return value will be false if select fails   
    if (!$retval){
        // format error message in an
        // html paragraph element
        echo '<p class="help-block">Could not execute select statement : ' . $exam->get_mysqli()->errno . '</p>';
    } else {
        // format return value of method in
        // html option elements       
        while ($row = $retval->fetch_array(MYSQLI_ASSOC)){
            $html .= '<option value="' . $row['examid'] 
                    . '">' . $row['name'] . '</option>';
        }
        echo $html;
    }
}
?>