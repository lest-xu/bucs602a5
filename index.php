<?php
require_once('database.php');

// get all students from mysql
$queryAllStudents = 'SELECT * FROM `sk_students` ORDER BY `sk_students`.`studentID` ASC';

$statementStudents = $db->prepare($queryAllStudents);
$statementStudents->execute();
$students = $statementStudents->fetchAll();
$statementStudents->closeCursor();

?> 

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Course Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Course Manager</h1></header>
<main>
    <center><h1>Student List</h1></center>

    <aside>
        <!-- display a list of categories -->
        <h2>Courses</h2>
        <nav>
        <ul>
            
        </ul>
        </nav>          
    </aside>

    <section>
        <!-- display a table of Students -->
        
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>&nbsp;</th>
            </tr>
            <!-- loop through all the students  -->
            <?php foreach ($students as $key => $value): ?>
                <tr>
                    <td><?php echo $value['firstName'] ?></td>
                    <td><?php echo $value['lastName'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            
        </table>

        <p><a href="add_student_form.php">Add Student</a></p>

        <p><a href="course_list.php">List Courses</a></p>    

    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> BU CS 602 S2 Assignment 5 - Li Xu . All rights reserved.</p>
</footer>
</body>
</html>