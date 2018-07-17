<?php
    require_once('./DB_Connect.php');
    $query = "SELECT * FROM courses";
    $response = @mysqli_query($db,$query);

    if (isset($_POST['submit']))
    {
        $name = $_POST['courseName'];
        $id = $_POST['courseId'];
        $credit = $_POST["credit"];
        $teacher1 = $_POST["selectTeacher1"];
        $teacher2 = $_POST["selectTeacher2"];
        $teacher3 = $_POST["selectTeacher3"];
        $semester = $_POST["selectSemester"];
        $type = $_POST["type"];
    //    echo '<script> '$name' </script>';
        if(!ctype_alpha($name[0])||!ctype_alpha($id[0]))
        {
            echo '<script>alert("Invalid Course name or ID.")</script>';
        }
        elseif(!ctype_digit($credit[0]))
        {
            echo '<script>alert("Invalid Course name or ID.")</script>';
        }
        elseif(!ctype_digit($credit[0]))
        {
            echo '<script>alert("Invalid Course name or ID.")</script>';
        }
        else
        {
            $insert_courses = "INSERT INTO courses (`ID`, `courseName`, `courseID`, `credit`, `teacher1ID`, `teacher2ID`, `teacher3ID`, `semester`, `type`) VALUES (NULL, '$name', '$id', '$credit', '$teacher1', '$teacher2', '$teacher3', '$semester', '$type')";
            $sql_insert_courses = $db->query($insert_courses);
            if ($sql_insert_courses == true) {
                header("Location: Courses.php");
            }
            else{
                echo '<script>alert("fail")</script>';
            }
        }
    }
    if (isset($_POST['delete']))
    {
        $id = $_POST['delete'];
        
         $delete_course ="DELETE FROM courses where ID = '$id' " ;
        $sql_delete_course = $db->query($delete_course);
		if ($sql_delete_course == true) {
		 	header("Location: Courses.php");
         }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/AddTeachers.css">
    <title>Courses</title>
</head>
<body>
        <div class="navbar">
            <nav class="navbar navbar-expand fixed-top navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Class Routine Generator</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./AddTeachers.php">Add Teacher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./RunningSemester.php">Running Semester</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./ClassRooms.php">Class Rooms</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="./Courses.php">Courses</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container bodyOfContent">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 header">
                    <h1>Add Courses</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Course Id</th>
                            <th scope="col">Credit</th>
                            <th scope="col">Teacher 1</th>
                            <th scope="col">Teacher 2</th>
                            <th scope="col">Teacher 3</th>
                            <th scope="col">Type</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x=1; ?>
                            <?php while($row = mysqli_fetch_array($response)) { ?>
                                <tr>
                                    <th scope="row"> <?php echo $x++;?> </th>
                                    <td> <?php echo $row['courseName'];?> </td>
                                    <td> <?php echo $row['courseID'];?> </td>
                                    <td> <?php echo $row['credit'];?> </td>
                                    <td> <?php echo $row['teacher1ID'];?> </td>
                                    <td> <?php echo $row['teacher2ID'];?> </td>
                                    <td> <?php echo $row['teacher3ID'];?> </td>
                                    <td> <?php echo $row['type'];?> </td>
                                    <td>
                                        <form action="Courses.php" method="post" enctype="multipart/form-data">
                                            <button name = "delete" type="submit" class="btn btn-danger" value = "<?php echo $row['ID'];?>">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="Courses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="courseName">Course Name</label>
                            <input type="text" class="form-control" name="courseName" id="courseName" placeholder="Course Name">
                        </div>
                        <div class="form-group">
                            <label for="courseId">Course Id</label>
                            <input type="text" class="form-control" name="courseId" id="courseId" placeholder="Course Id">
                        </div>
                        <div class="form-group">
                            <label for="credit">Credit</label>
                            <input type="text" class="form-control" name="credit" id="credit" placeholder="Credit">
                        </div>
                        <div class="form-group">
                            <label for="selectTeacher1">Select Teacher 1</label>
                            <select class="form-control" name="selectTeacher1" id="selectTeacher1">
                                <option value="">Select One</option>
                                <?php
                                    $query = "SELECT * FROM teacher";
                                    $response = @mysqli_query($db,$query);
                                ?>
                                <?php while($row = mysqli_fetch_array($response)) { ?>
                                    <option value = <?php echo $row['teacherID'] ?> > <?php echo $row['name'];?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selectTeacher2">Select Teacher 2</label>
                            <select class="form-control" name="selectTeacher2" id="selectTeacher2">
                                <option value="">Select One</option>
                                <?php
                                    $query = "SELECT * FROM teacher";
                                    $response = @mysqli_query($db,$query);
                                ?>
                                <?php while($row = mysqli_fetch_array($response)) { ?>
                                    <option value= <?php echo $row['teacherID'] ?> > <?php echo $row['name'];?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selectTeacher3">Select Teacher 3</label>
                            <select class="form-control" name="selectTeacher3" id="selectTeacher3">
                                <option value="">Select One</option>
                                <?php
                                    $query = "SELECT * FROM teacher";
                                    $response = @mysqli_query($db,$query);
                                ?>
                                <?php while($row = mysqli_fetch_array($response)) { ?>
                                    <option value= <?php echo $row['teacherID'] ?> > <?php echo $row['name'];?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selectSemester">Select Semester</label>
                            <select class="form-control" name="selectSemester" id="selectSemester">
                                <option value="">Select One</option>
                                <?php
                                    $query = "SELECT * FROM RuningSemester";
                                    $response = @mysqli_query($db,$query);
                                ?>
                                <?php while($row = mysqli_fetch_array($response)) { ?>
                                    <option value= <?php echo $row['semester'] ?> > Semester <?php echo $row['semester'];?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selectType">Select Course Type</label>
                            <select class="form-control" name="type" id="selectType">
                                <option value="">Select One</option>
                                <option value="Class">Class</option>
                                <option value="Programming Lab">Programming Lab</option>
                                <option value="Electronics Lab">Electronics Lab</option>
                            </select>
                        </div>
                        <button type="submit" name = "submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>