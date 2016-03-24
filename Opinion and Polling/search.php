<?php
    $key=$_GET['se'];
    $array = array();
    
    $con=mysqli_connect("localhost","root","") or die("couldnt connect");
    mysqli_select_db($con,"webdb") or die("coudnt find db");
    
    $query = "SELECT CONCAT(firstName, ' ', lastName) as 'full_name', email, picURL 
FROM user WHERE CONCAT(firstName, ' ', lastName) LIKE '%$key%'";
    
    $ans = mysqli_query($con, $query);

    $query2 = "SELECT * FROM questions WHERE question LIKE '%$key%'";
    $ans2 = mysqli_query($con, $query2);

    $query3 = "SELECT * FROM answers WHERE answer LIKE '%$key%'";
    $ans3 = mysqli_query($con, $query3);
    $temp = mysqli_fetch_array($ans3, MYSQLI_ASSOC);
    $ansID = $temp['answerID'];
    $query4 = "SELECT * FROM question_has_answer where answerID = '$ansID'";
    $tempAns = mysqli_query($con, $query4);
    $temp2 = mysqli_fetch_array($tempAns, MYSQLI_ASSOC);
    $qID = $temp2['questionID'];

    $query5 = "SELECT * FROM questions WHERE questionID = '$qID'";
    $ans4 = mysqli_query($con, $query5);
//    $temp3 = mysqli_fetch_array($tempQ, MYSQLI_ASSOC);
//    $ans4 = $temp3['question'];

    if((mysqli_num_rows($ans) + mysqli_num_rows($ans2) + mysqli_num_rows($ans)) < 6) {
        
        while($row = mysqli_fetch_array($ans, MYSQLI_ASSOC)) {
//            echo $row['full_name']."<br>";
            $array[] = 'profile.php?p=';
            $array[] = $row['email'];
            $array[] = $row['full_name'];
            $array[] = $row['picURL'];
        }
        while($row = mysqli_fetch_array($ans2, MYSQLI_ASSOC)) {
//            echo $row['question']."<br>";
            if(!in_array($row['question'], $array)) {
                $array[] = 'answers.php?q=';
                $array[] = $row['question'];
                $array[] = $row['question'];
                $array[] = "NO";
            }
        }
        while($row = mysqli_fetch_array($ans4, MYSQLI_ASSOC)) {
//            echo $row['question']."<br>";
            if(!in_array($row['question'], $array)) {
                $array[] = 'answers.php?q=';
                $array[] = $row['question'];
                $array[] = $row['question'];
                $array[] = "NO";
            }
        }
    }
    else {
        $i = 0;
        while($row = mysqli_fetch_array($ans, MYSQLI_ASSOC)) {
            $array[] = 'profile.php?p=';
            $array[] = $row['email'];
            $array[] = $row['full_name'];
            $array[] = $row['picURL'];
            $i += 1;
            if ($i > 2) {
                break;
            }
        }
        $i = 0;
        while($row = mysqli_fetch_array($ans2, MYSQLI_ASSOC)) {
//            echo $row['question']."<br>";
            if(!in_array($row['question'], $array)) {
                $array[] = 'answers.php?q=';
                $array[] = $row['question'];
                $array[] = $row['question'];
                $array[] = "NO";
                $i += 1;
                if ($i > 2) {
                    break;
                }
            }
        }
        $i = 0;
        while($row = mysqli_fetch_array($ans4, MYSQLI_ASSOC)) {
//            echo $row['question']."<br>";
            if(!in_array($row['question'], $array)) {
                $array[] = 'answers.php?q=';
                $array[] = $row['question'];
                $array[] = $row['question'];
                $array[] = "NO";
                $i += 1;
                if ($i > 2) {
                    break;
                }
            }
        }
    }

//    echo json_encode($array, JSON_UNESCAPED_SLASHES);
    echo json_encode($array);  //not to remove escape characters.
   
?>
