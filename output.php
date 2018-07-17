<?php
    require_once('./DB_Connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/AddTeachers.css">
    <title>Final Routine</title>
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
                        <li class="nav-item active">
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
                <h1>Class Routine</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-12">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Day</th>
                        <th scope="col">Semester</th>
                        <th scope="col">09:15 - 10:15</th>
                        <th scope="col">10:20 - 11:20</th>
                        <th scope="col">11:25 - 12:25</th>
                        <th scope="col">12:30 - 01:30</th>
                        <th scope="col">02:30 - 03:30</th>
                        <th scope="col">03:35 - 04:35</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $x=1; 
                            $query = "SELECT * FROM final";
                            $response = @mysqli_query($db,$query);
                        ?>
                        <?php while($row = mysqli_fetch_array($response)) { ?>
                            <tr>
                                <td> <?php echo $row['day'];?> </td>
                                <td> <?php echo $row['semester'];?> </td>
                                <td> <?php echo $row['p1'];?> </td>
                                <td> <?php echo $row['p2'];?> </td>
                                <td> <?php echo $row['p3'];?> </td>
                                <td> <?php echo $row['p4'];?> </td>
                                <td> <?php echo $row['p5'];?> </td>
                                <td> <?php echo $row['p6'];?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>