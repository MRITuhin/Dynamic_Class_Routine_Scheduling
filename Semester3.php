<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/AddTeachers.css">
    <title>Running Semester</title>
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
                            <a class="nav-link" href="./Courses.php">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./ClassRooms.php">Class Rooms</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container bodyOfContent">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 header">
                    <h1>Add Courses Semester 3</h1>
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
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td><button type="button" class="btn btn-danger">Remove</button></td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td><button type="button" class="btn btn-danger">Remove</button></td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td><button type="button" class="btn btn-danger">Remove</button></td>
                            </tr>
                        </tbody>
                        </table>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form>
                        <div class="form-group">
                            <label for="courseName">Course Name</label>
                            <input type="text" class="form-control" id="courseName" placeholder="Course Name">
                        </div>
                        <div class="form-group">
                            <label for="courseId">Course Id</label>
                            <input type="text" class="form-control" id="courseId" placeholder="Course Id">
                        </div>
                        <div class="form-group">
                            <label for="credit">Credit</label>
                            <input type="text" class="form-control" id="credit" placeholder="Credit">
                        </div>
                        <div class="form-group">
                            <label for="selectTeachers">Select Teachers</label>
                            <select multiple class="form-control" id="selectTeachers">
                                <option>Teacher 1</option>
                                <option>Teacher 2</option>
                                <option>Teacher 3</option>
                                <option>Teacher 4</option>
                                <option>Teacher 5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selectType">Select Type</label>
                            <select class="form-control" id="selectType">
                                <option>Class</option>
                                <option>Programming Lab</option>
                                <option>Electronics Lab</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>