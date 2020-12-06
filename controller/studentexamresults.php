<?php
// include class.actor.php model file
require_once __DIR__ . '/../model/class.studentexamresults.php';

// specify content type of data that will be
// sent to the actor Javascript file
header('Content-type: text/html');

function select_exam_results($examid) {
    
    // create a StudentExamResults object
    $ser = new StudentExamResults();
    
    // create a variable that will contain
    // the html table rows echod by the method
    $html = '';
    
    // create int counter variable
    $i = 1;
    
    // call select_actors method
    $retval = $ser->select_exam_results($examid);
    
    // if select statement fails, retval will be false
    if (!$retval){
        // return an error message in the form of an HTML paragraph
        echo '<p class="help-block">Could not execute select statement : ' .
                $ser->get_mysqli()->errno . '</p>';
    } else {
        // format the data contained in retval in
        // html table row elements
        while ($row = $retval->fetch_array(MYSQLI_ASSOC)){
            $html .= '<tr><th scope="row">' . $i . '</th>';
            $html .= '<td>';
            $html .= $row['fname'];
            $html .= '</td>';
            $html .= '<td>';
            $html .= $row['lname'];
            $html .= '</td>';
            $html .= '<td>';
            $html .= $row['year'];
            $html .= '</td>';
            $html .= '<td>';
            $html .= $row['major'];
            $html .= '</td>';
            $html .= '<td>';
            $html .= $row['result'];
            $html .= '</td>';
            $html .= '</tr>';
            $i++;
        }
        echo $html;
    }
}
?>