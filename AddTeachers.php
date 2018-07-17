<?php
    require_once('./DB_Connect.php');
    $query = "SELECT * FROM teacher";
    $response = @mysqli_query($db,$query);
    $p="p";
   // echo '<script>alert( "")</script>';
    if (isset($_POST['submit']))
    {
        $name = $_POST['teacherName'];
        $id = $_POST['teacherId'];
        if(ctype_upper($name[0])&&ctype_upper($id[0]))
        {
            $insert_teacher = "INSERT INTO teacher (`ID`, `teacherID`, `name`) VALUES (NULL, '$id', '$name')";
            $sql_insert_teacher = $db->query($insert_teacher);
            if ($sql_insert_teacher == true) {
                header("Location: AddTeachers.php");
            }
        }
        else
        {
            echo '<script>alert("Invalid Name or ID.")</script>';
        }
    }
    if (isset($_POST['delete']))
    {
        $id = $_POST['delete'];
        
         $delete_teacher ="DELETE FROM teacher where ID = '$id' " ;
        $sql_delete_teacher = $db->query($delete_teacher);
		if ($sql_delete_teacher == true) {
		 	header("Location: AddTeachers.php");
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
    <title>Input Teacher</title>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="./AddTeachers.php">Add Teacher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./RunningSemester.php">Running Semester</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./ClassRooms.php">Class Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Courses.php">Courses</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    <div class="container bodyOfContent">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 header">
                <h1>Input Teacher</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Teacher Name</th>
                        <th scope="col">Teacher Id</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x=1; ?>
                        <?php while($row = mysqli_fetch_array($response)) { ?>
                            <tr>
                                <td> <?php echo $x++;?> </td>
                                <td> <?php echo $row['name'];?> </td>
                                <td> <?php echo $row['teacherID'];?> </td>
                                <td>
                                    <form action="AddTeachers.php" method="post" enctype="multipart/form-data">
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="AddTeachers.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="teacherName">Teacher Name</label>
                        <input type="text" class="form-control" name = "teacherName" id="teacherName" placeholder="Teacher Name">
                    </div>
                    <div class="form-group">
                        <label for="teacherId">Teacher Id</label>
                        <input type="text" class="form-control" name = "teacherId" id="teacherId" placeholder="Teacher Id">
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