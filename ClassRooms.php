<?php
    require_once('./DB_Connect.php');
    $query = "SELECT * FROM classroom";
    $response = @mysqli_query($db,$query);

    if (isset($_POST['submit']))
    {
      //  echo '<script>alert("line paise.")</script>';
        $room = $_POST['roomNumber'];
        $type = $_POST['type'];
        if(!is_numeric($room))
        {
            echo '<script>alert("Invalid Room Number.")</script>';
        }
        elseif(!ctype_upper($type[0]))
        {
            echo '<script>alert("Please select thr room type.")</script>';
        }
        else
        {
            $insert_room = "INSERT INTO `classroom` (`ID`, `roomnumber`, `type`) VALUES (NULL, '$room', '$type')";
            $sql_insert_room = $db->query($insert_room);
            if ($sql_insert_room == true) {
                header("Location: ClassRooms.php");
            }
        }
    }
    if (isset($_POST['delete']))
    {
        $id = $_POST['delete'];
        
         $delete_classroom ="DELETE FROM classroom where ID = '$id' " ;
        $sql_delete_classroom = $db->query($delete_classroom);
		if ($sql_delete_classroom == true) {
		 	header("Location: ClassRooms.php");
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
    <title>Class Rooms</title>
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
                        <li class="nav-item active">
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
                <div class="col-md-2"></div>
                <div class="col-md-8 header">
                    <h1>Add Class Rooms</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Room Number</th>
                            <th scope="col">Type</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x=1; ?>
                            <?php while($row = mysqli_fetch_array($response)) { ?>
                                <tr>
                                    <td> <?php echo $x++;?> </td>
                                    <td> <?php echo $row['roomnumber'];?> </td>
                                    <td> <?php echo $row['type'];?> </td>
                                    <td>
                                        <form action="Classrooms.php" method="post" enctype="multipart/form-data">
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
                    <form action="ClassRooms.php" method="post">
                        <div class="form-group">
                            <label for="roomNumber">Room Number</label>
                            <input type="text" class="form-control" id="roomNumber" placeholder="Room Number" name="roomNumber">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type">
                                <option vlaue="">select one</option>
                                <option value="Class">Class</option>
                                <option vlaue="Programming Lab">Programming Lab</option>
                                <option vlaue="Electronics Lab">Electronics Lab</option>
                            </select>
                        </div>
                        <button type="submit" name = "submit"  class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>