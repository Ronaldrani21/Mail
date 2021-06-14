<?php

    $theme = mysqli_real_escape_string($mysqli,$_POST['gc_theme']);

    $a = $_SESSION['mail'];

    $mysqCid = "SELECT * from `theme` where C_id= '$a';";
    $result = mysqli_query($mysqli, $mysqCid);

    if (mysqli_num_rows($result) == 0)
    {
        $sql = "INSERT INTO theme (C_id, theme, Date) VALUES ('$a', '$theme', CURRENT_TIMESTAMP)";
        if(mysqli_query($mysqli, $sql))
        {
            mysqli_query($mysqli, $sql);
            $_SESSION['message'] = "
                    <div class='alert alert-success'>
                        <strong>Success!</strong> Wallpaper Inserted successfuly!
                    </div>
                    ";
        require '../pages/message.php';
        }
        else{
            $_SESSION['message'] = "
                    <div class='alert alert-warning'>
                        <strong>Warning!</strong> Wallpaper not Inserted!
                    </div>
                    ";
        require '../pages/message.php';
        }
    }
    else{

    $sql = "UPDATE `theme` SET `theme`= '$theme' ,`Date`= CURRENT_TIMESTAMP  WHERE `C_id` = '$a';";
    if(mysqli_query($mysqli, $sql))
    {
    	mysqli_query($mysqli, $sql);
    	$_SESSION['message'] = "
                <div class='alert alert-success'>
                    <strong>Warning!</strong> Wallpaper updated successfuly!
                </div>
                ";
    require '../pages/message.php';
    }
    else{
    	$_SESSION['message'] = "
                <div class='alert alert-warning'>
                    <strong>Warning!</strong> Wallpaper not updated successfuly!
                </div>
                ";
    require '../pages/message.php';
    }
}