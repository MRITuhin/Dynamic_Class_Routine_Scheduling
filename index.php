<?php
    require_once('./DB_Connect.php');
    if (isset($_POST['submit']))
    {
        $query = "SELECT * FROM final";
        $response = @mysqli_query($db,$query);
        $delete_final = "DELETE FROM final";
        $sql_delete_final = $db->query($delete_final);
		// if ($sql_delete_final == true) {
        //     echo '<script>alert( "ok")</script>';
		//  	header("Location: index.php");
        // }
        // else echo '<script>alert( "Error")</script>';

        $query = "SELECT * FROM courses";
        $response = @mysqli_query($db,$query);
        $c_id = array();
        $c_name = array();
        $credit = array();
        $t1 = array();
        $t2 = array();
        $t3 = array();
        $type = array();
        $sem = array();
        $fl_cr = array();
        $sz1 = 0;   $i=1;
        while($row = mysqli_fetch_array($response)) {
            $c_id[$i] = $row["courseID"];
            $c_name[$i] = $row["courseName"];
            $cr = $c_name[$i];
            $credit[$i] = $row["credit"];
            $t1[$i] = $row["teacher1ID"];
            $t2[$i] = $row["teacher2ID"];
            $t3[$i] = $row["teacher3ID"];
            $sem[$i] = $row["semester"];
            $type[$i] = $row["type"];
            $i++;   $sz1++;
            for($j=1;$j<=8;$j++){
                $fl_cr[$cr][$j] = 0;
            }
        }

        $query = "SELECT * FROM teacher";
        $response = @mysqli_query($db,$query);
        $fl_t = array();
        $sz2 = 0;
        while($row = mysqli_fetch_array($response)) {
            $te = $row["teacherID"];
            for($i=1;$i<=8;$i++)
            for($j=1;$j<=8;$j++){
                $fl_t[$te][$i][$j] = 0;
            }
            $sz2++;
        }

        $query = "SELECT * FROM RuningSemester";
        $response = @mysqli_query($db,$query);
        $fl_s = array();
        $mp_s = array();
        $ar_s = array();
        $sz3 = 0;
        while($row = mysqli_fetch_array($response)) {
            $se = $row["semester"];
            for($i=1;$i<=8;$i++)
            for($j=1;$j<=8;$j++){
                $fl_s[$se][$i][$j] = 0;
            }
            $mp_s[$se] = $sz3;
            $ar_s[$sz3] = $se;
            $sz3++;
        }

        $query = "SELECT * FROM classroom";
        $response = @mysqli_query($db,$query);
        $fl_c = array();
        $cl = array();
        $pl = array();
        $el = array();
        $scl = 0;
        $spl = 0;
        $sel = 0;
        $sz4 = 0;
        while($row = mysqli_fetch_array($response)) {
            $clr = $row["roomnumber"];
            for($i=1;$i<=8;$i++)
            for($j=1;$j<=8;$j++){
                $fl_c[$clr][$i][$j] = 0;
            }
            if($row["type"]=="Electronics Lab")
            {
                $sel++;
                $el[$sel] = $clr;
            }
            elseif($row["type"]=="Programming Lab")
            {
                $spl++;
                $pl[$spl] = $clr;
            }
            else
            {
                $scl++;
                $cl[$scl] = $clr;
            }
            $sz4++;
        }

        $ans = array();

        for($i=1 ; $i<=$sz3*5 ; $i++)
        for($j=1 ; $j<=11 ; $j++)    $ans[$i][$j] = ".";

        for($l=1;$l<=$sz1;$l++)
        {
            $cn = $c_name[$l];
            $t11=$t1[$l];
            $t22=$t2[$l];
            $t33=$t3[$l];
            $ss = $sem[$l];
            $cc=$credit[$l];
            while($cc--)
            {
                if($type[$l]=="Electronics Lab")
                {
                   // echo '<script>alert( "Ok")</script>';
                    for($k=1 ; $k <= $sel; $k++)
                    {
                        $kk = $el[$k];
                        for($j=5; $j>=1 ;$j--)
                        {
                            for($ij=0; $ij<=9 ;$ij+=2)
                            {
                                $i = ($ij%5) + 1;
                                if($j == 4) continue;
                                if($fl_cr[$cn][$i]==0)
                                if($fl_c[$kk][$i][$j]==0 && $fl_c[$kk][$i][$j+1]==0)
                                if($fl_t[$t11][$i][$j]==0 && $fl_t[$t11][$i][$j+1]==0)
                                if($fl_t[$t22][$i][$j]==0 && $fl_t[$t22][$i][$j+1]==0)
                                if($fl_t[$t33][$i][$j]==0 && $fl_t[$t33][$i][$j+1]==0)
                                if($fl_s[$ss][$i][$j]==0 && $fl_s[$ss][$i][$j+1]==0)
                                {
                                    // echo '<script>alert( "Ok")</script>';
                                    $fl_cr[$cn][$i]=1;
                                    $fl_c[$kk][$i][$j]=1;    $fl_c[$kk][$i][$j+1]=1;
                                    $fl_t[$t11][$i][$j]=1;   $fl_t[$t11][$i][$j+1]=1;
                                    if($t22!=NULL)    $fl_t[$t22][$i][$j]=1;   $fl_t[$t22][$i][$j+1]=1;
                                    if($t33!=NULL)    $fl_t[$t33][$i][$j]=1;   $fl_t[$t33][$i][$j+1]=1;
                                    $fl_s[$ss][$i][$j]=1;    $fl_s[$ss][$i][$j+1]=1;

                                    $ii = ($i-1)*$sz3;  $ii++;
                                    $ii+=$mp_s[$ss];
                                    $tm1 = $c_id[$l];
                                    $tm2 = $kk;
                                    $tm3 = $t11.",".$t22.",".$t33;

                                    $ans[$ii][$j+2] = $tm1." (".$tm3.") R-".$tm2;
                                    $ans[$ii][$j+3] = $tm1." (".$tm3.") R-".$tm2;
                                    goto ok1;
                                }
                            }
                        }
                    }
                    ok1:;
                }
                elseif($type[$l]=="Programming Lab")
                {
                //    echo '<script>alert( "Ok")</script>';
                    for($k=1 ; $k <= $spl; $k++)
                    {
                        $kk = $pl[$k];
                        for($j=5; $j>=1 ;$j--)
                        {
                            for($ij=0; $ij<=9 ;$ij+=2)
                            {
                                $i = ($ij%5) + 1;
                                if($j == 4) continue;
                                if($fl_cr[$cn][$i]==0)
                                if($fl_c[$kk][$i][$j]==0 && $fl_c[$kk][$i][$j+1]==0)
                                if($fl_t[$t11][$i][$j]==0 && $fl_t[$t11][$i][$j+1]==0)
                                if($fl_t[$t22][$i][$j]==0 && $fl_t[$t22][$i][$j+1]==0)
                                if($fl_t[$t33][$i][$j]==0 && $fl_t[$t33][$i][$j+1]==0)
                                if($fl_s[$ss][$i][$j]==0 && $fl_s[$ss][$i][$j+1]==0)
                                {
                                  //  echo '<script>alert( "Ok")</script>';
                                    $fl_cr[$cn][$i]=1;
                                    $fl_c[$kk][$i][$j]=1;    $fl_c[$kk][$i][$j+1]=1;
                                    $fl_t[$t11][$i][$j]=1;   $fl_t[$t11][$i][$j+1]=1;
                                    if($t22!=NULL)    $fl_t[$t22][$i][$j]=1;   $fl_t[$t22][$i][$j+1]=1;
                                    if($t33!=NULL)    $fl_t[$t33][$i][$j]=1;   $fl_t[$t33][$i][$j+1]=1;
                                    $fl_s[$ss][$i][$j]=1;    $fl_s[$ss][$i][$j+1]=1;

                                    $ii = ($i-1)*$sz3;  $ii++;
                                    $ii+=$mp_s[$ss];
                                    $tm1 = $c_id[$l];
                                    $tm2 = $kk;
                                    $tm3 = $t11.",".$t22.",".$t33;

                                    $ans[$ii][$j+2] = $tm1." (".$tm3.") R-".$tm2;
                                    $ans[$ii][$j+3] = $tm1." (".$tm3.") R-".$tm2;
                                    goto ok2;
                                }
                            }
                        }
                    }
                    ok2:;
                }
                elseif($type[$l]=="Class")
                {
                    for($k=1 ; $k <= $scl; $k++)
                    {
                        $kk = $cl[$k];
                        
                        for($j=1; $j<=6 ;$j++)
                        {
                            for($ij=0; $ij<=9 ;$ij+=2)
                            {
                                $i = ($ij%5) + 1;
                                if($fl_cr[$cn][$i]==0)
                                if($fl_c[$kk][$i][$j]==0)
                                if($fl_t[$t11][$i][$j]==0)
                                if($fl_s[$ss][$i][$j]==0)
                                {
                                    $fl_cr[$cn][$i]=1;
                                    $fl_c[$kk][$i][$j]=1;
                                    $fl_t[$t11][$i][$j]=1;
                            //        if($t22!=NULL)    $fl_t[$t22][$i][$j]=1;
                            //        if($t33!=NULL)    $fl_t[$t33][$i][$j]=1;
                                    $fl_s[$ss][$i][$j]=1;

                                    $ii = ($i-1)*$sz3;  $ii++;
                                    $ii+=$mp_s[$ss];
                                    $tm1 = $c_id[$l];
                                    $tm2 = $kk;
                                    $tm3 = $t11;

                                    $ans[$ii][$j+2] = $tm1." (".$tm3.") R-".$tm2;
                                    // $ans[$ii][$j+3] = $tm1." (".$tm3.") R-".$tm2;
                                    goto ok3;
                                }
                            }
                        }
                    }
                    ok3:;
                }
            }
        }

        $di = $sz3;   $st = 1;
        $ans[$st][1] = "Sunday";    $st+=$di;
        $ans[$st][1] = "Monday";    $st+=$di;
        $ans[$st][1] = "Tuesday";    $st+=$di;
        $ans[$st][1] = "Wednesday";    $st+=$di;
        $ans[$st][1] = "Thursday";    $st+=$di;

        $j = 0;
        for($i=1 ; $i<=$sz3*5 ; $i++)
        {
            $ans[$i][2] = $ar_s[($j%$sz3)];
            $j++;
        }
        $p=0;
        for($i=1 ; $i<=$sz3*5 ; $i++)
        {
            $v1=$ans[$i][1];    $v2=$ans[$i][2];    $v3=$ans[$i][3];    $v4=$ans[$i][4];    $v5=$ans[$i][5];    $v6=$ans[$i][6];   
            $v7=$ans[$i][7];    $v8=$ans[$i][8];    $v9= $ans[$i][9];
            //   if($v8=$ans[$i][$j]!="")    $p++;
            $query = "SELECT * FROM final";
            $response = @mysqli_query($db,$query);
            $insert_final = "INSERT INTO final (`ID`, `day`, `semester` , `p1` , `p2` , `p3` , `p4` , `p5` , `p6` , `p7`) 
                        VALUES (NULL, '$v1', '$v2', '$v3', '$v4', '$v5', '$v6', '$v7', '$v8' , '$v9')";
            $sql_insert_final = $db->query($insert_final);
            // if ($sql_insert_final == true) {
            //     header("Location: index.php");
            // }
            // else    echo '<script>alert("Error")</script>';
        }
        //if($p)  echo '<script>alert("Ok")</script>';
        echo '<script>alert( "Done")</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <title>Home</title>
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
    <div class="container">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-2">
                    <form action="/ClassRoutine/AddTeachers.php" method="post">
                        <button class="btn">Teachers</button>
                    </form>
                </div>
                <div class="col-md-3">
                     <form action="/ClassRoutine/RunningSemester.php" method="post">
                        <button class="btn">Semesters</button>
                    </form>
                </div>
                <div class="col-md-3">
                     <form action="/ClassRoutine/ClassRooms.php" method="post">
                        <button class="btn">Class Rooms</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="/ClassRoutine/Courses.php" method="post">
                        <button class="btn">Course</button>
                    </form>
                </div>
                <div class="col-md-10">
                    <form action="/ClassRoutine/index.php" method="post">
                        <button class="btn btn-primary" type="submit" name = "submit">Calculate Routine</button>
                    </form>
                </div>
                <div class="col-md-10">
                    <form action="/ClassRoutine/output.php" method="post">
                        <button class="btn btn-primary">Show Routine</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>