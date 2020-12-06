<!DOCTYPE html>
<html lang="en">
    <head>	
        <title>Film Collector</title>

        <!-- Override CSS file - add your own CSS rules -->
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <div class="header">
            <div class="container">
                <h1 class="header-heading">Exam Web App</h1>
            </div>
        </div>
        <div class="nav-bar">
            <div class="container">
                <ul class="nav">
                    <li><a href="index.php">Home</a></li>                   
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="main">                   
                    <div class="well">                        
                        <form name="studentExamResults" id="studentExamResults" method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">                           
                            <div class="form-group">
                                <label for="exam">Exam</label>
                                <select name="exam" id="exam" required="" class="form-control">
                                    <option></option>
                                    <?php
                                    // include exam controller file
                                    require_once './controller/exam.php';

                                    // call select exam names controller function                            
                                    select_exam_names();
                                    ?>
                                </select>                                                                
                            </div>  
                            <button type="submit" name="submit" id="submit" class="btn">Submit</button>                             
                        </form>   
                        <br />
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th> 
                                    <th>Last Name</th>
                                    <th>Year</th>
                                    <th>Major</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['exam'])) {
                                    // include movie controller file
                                    require_once './controller/studentexamresults.php';

                                    // get data input into form 
                                    // and store it in variables
                                    $examid = $_GET['exam'];

                                    // call select_exam_results controller function                            
                                    select_exam_results($examid);
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="aside">
                    <p>
                        The Exam Web Application allows its users
                        to view exam results.  
                    </p>
                    <p>                      
                        After the user selects an exam and pushes 
                        the submit button, the results are displayed 
                        in a table below the button.                       
                    </p> 
                    <p>                      
                        Each row in the table displays the first and
                        last names of a student, his year in college and major,
                        and his result on the selected exam.
                    </p>                   
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                Exam Web App
            </div>
        </div>       
    </body>
</html>