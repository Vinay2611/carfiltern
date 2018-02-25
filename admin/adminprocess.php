<?php
session_start();
//Include database
include '../db_config.php';
/*
 * Admin login function
 */
if(isset($_POST['ajax_adminlogin']))
{
    $username = $_POST['ajax_username'];
    $password = $_POST['ajax_password'];

    $query = $db->query("select * from admin where admin_email = '$username' OR admin_username = '$username'");
    $q = $query->num_rows;
    if($q>0)
    {
        $row = mysqli_fetch_array($query);

        if($row['status'] == 1)
        {
            if (verify_password($password, $row['password']))
            {
                $_SESSION['adminloggedin'] = $row['admin_id'];
                $_SESSION['adminname'] = $row['admin_name'];
                $_SESSION['adminusername'] = $row['admin_email'];
                echo json_encode(array(
                    "valid"=>1,
                    "message" => "Logged in successfully"
                ));
            }
            else
            {
                echo json_encode(array(
                    "valid"=>0,
                    "message" => "Incorrect credentials"
                ));
            }
        }
        else
        {
            echo json_encode(array(
                "valid"=>0,
                "message" => "Account not active contact administrator"
            ));
        }
    }
    else
    {
        echo json_encode(array(
            "valid"=>0,
            "message" => "Admin not register with us"
        ));
    }
}

/*
 * Change password
 */
if(isset($_POST['ajax_changepassword']))
{
    $adminid = $_SESSION['adminloggedin'];
    $current_password	= $_POST['ajax_current_password'] ;
    $new_password	= $_POST['ajax_new_password'];
    $confirm_password	= $_POST['ajax_confirm_password'];

    $new_password = encrypt_password($new_password);
    $data = mysqli_fetch_assoc(mysqli_query($db,"select * from admin where `admin_id` = '$adminid'"));
    if (verify_password($current_password, $data['password']))
    {
        $query =  mysqli_query($db,"UPDATE `admin` SET `password`= '$new_password' WHERE `admin_id` = '$adminid'");
        if($query)
        {
            ini_set("SMTP", "smtpout.secureserver.net");//confirm smtp
            $to = $data['admin_email'];
            $from = "";
            $subject = "Wellness Consultant :  Password Changed";
            $body="
                <b style='text-transform:capitalize;'>Dear ".$data['admin_name'].", </b>
                <br>
                <p> You have successfully changed your password</p>
                <br>
                <p>Sincerely</p>
            ";
            //send_mail( $to, $from, $subject, $body );
            send_phpmail( $data['admin_name'], $to ,"", "" , $subject, $body );
            echo json_encode(array(
                "valid"=>1,
                "message" => "Password updated successfully"
            ));
        }
        else
        {
            echo json_encode(array(
                "valid"=>0,
                "message" => "Password Cannot be Updated."
            ));
        }

    }
    else
    {
        echo json_encode(array(
            "valid"=>0,
            "message" => "Current password is incorrect"
        ));
    }
}


/*insert update products*/
if(isset($_POST['type']) && $_POST['type']=="insertproduct")
{
    $success=false;
    $uploadOk = 1;
    $msg="";
    $stm_col="";
    $stm_val="";
    $stm_update="";
    $record_id=$_POST['FormID'];
    unset($_POST['FormID']);
    unset($_POST['type']);

    foreach ($_POST as $key=>$val){
        $stm_col.="`".$key."`,";
        $stm_val.="'".$val."',";
        $stm_update.="".$key."='$val',";
    }
    $stm_col=substr($stm_col, 0, -1);
    $stm_val=substr($stm_val, 0, -1);
    $stm_update=substr($stm_update, 0, -1);

    $date=date('Y-m-d');

    $fileList = array();
    $product_image = '';
    $update_str = '';
    /*single file select*/
    if(isset($_FILES['product_image']) && $_FILES['product_image']['name'] != ""){
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if ($_FILES["product_image"]["size"] > 5242880) {
            $msg=  "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        $extallowed = array("jpg","jpeg","png");
        if (!in_array($imageFileType,$extallowed)){
            $msg = "Sorry,For image only jpg & png extension files are allowed";
            $status = false;
            $uploadOk = 0;
        }

        $product_image=uniqid().".".$imageFileType;
        $filepath=$target_dir.$product_image;
        if ($uploadOk != 0) {

            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $filepath)) {
                $update_str=",product_image='$product_image'";
            } else {
                $uploadOk = 0;
                $msg = "Sorry, your file was not uploaded.";
            }

        }
    }
    if ($uploadOk == 0)
    {
        $success=false;
    }
    else
    {
        if(isset($record_id) && !empty($record_id))
        {
            $sql = "update `products` set $stm_update $update_str where id=$record_id";
            $query = mysqli_query($db, $sql);
            if($query)
            {
                $success=true;
                $msg="Record Updated Sucessfully";
            }
            else
            {
                $success=FALSE;
                $msg="Some Problem Occur, while Updating.";
            }
        }
        else
        {
            $sql1 = "INSERT INTO `products`($stm_col,product_image,status,createdon) VALUES ($stm_val,'$product_image',0,'$date')";
            $query2 = mysqli_query($db, $sql1);

            if($query2)
            {
                $success=true;
                $msg="Car Added Sucessfully";
            }
            else
            {
                $success=FALSE;
                $msg="Car cannot be added";
            }
        }
    }
    echo json_encode(array(
        'success'=>$success,
        'msg'=>$msg
    ));
}


//Product Delete
if(isset($_POST["deleteproduct"]))
{
    $record = $_POST['id'];
    $delrecord = mysqli_query($db,"DELETE FROM products WHERE id = '$record'");
    if($delrecord)
    {
        echo json_encode(array(
            "valid"=>true,
            "message" => "Record Deleted successfully"
        ));
    }
    else
    {
        echo json_encode(array(
            "valid"=>false,
            "message" => "Some Problem Occur, While Deleting."
        ));
    }

}

if(isset($_POST['setfeature']))
{
    $success = false;
    $message = "";
    $id = $_POST['id'];
    $val = $_POST['stat'];
    if($val == 0)
    {
        $q1 = mysqli_query($db,"SELECT id FROM `products` WHERE `feature` = 1");
        if(mysqli_num_rows($q1)<4)
        {
            $query = mysqli_query($db,"UPDATE `products` SET `feature`= '1' WHERE `id` = '$id'");
            if($query)
            {
                $success = true;
                $message = "Set as Popular Car";
            }
            else
            {
                $message = "Problem Occuer While setting it as popular car";
            }
        }
        else
        {
            $message = "Maximum 4 Car can be set as popular";
        }
    }
    else
    {
        $query = mysqli_query($db,"UPDATE `products` SET `feature`= '0' WHERE `id` = '$id'");
        if($query)
        {
            $success = true;
            $message = "Removed From Popular Car";
        }
        else
        {
            $message = "Problem Occuer While unsetting from popular car";
        }
    }
    echo json_encode(array(
        "valid"=>$success,
        "message" => $message
    ));
}

if(isset($_POST['setrecommended']))
{
    $success = false;
    $message = "";
    $id = $_POST['id'];
    $val = $_POST['stat'];
    if($val == 0)
    {
        $q1 = mysqli_query($db,"SELECT id FROM `products` WHERE `status` = 1");
        if(mysqli_num_rows($q1)<4)
        {
            $query = mysqli_query($db,"UPDATE `products` SET `status`= '1' WHERE `id` = '$id'");
            if($query)
            {
                $success = true;
                $message = "Set as Recommended Car";
            }
            else
            {
                $message = "Problem Occuer While Recommendation";
            }
        }
        else
        {
            $message = "Maximum 4 Car can be set as Recommended Car";
        }
    }
    else
    {
        $query = mysqli_query($db,"UPDATE `products` SET `status`= '0' WHERE `id` = '$id'");
        if($query)
        {
            $success = true;
            $message = "Removed from Recommended Car";
        }
        else
        {
            $message = "Problem Occuer While removing Recommendation";
        }
    }
    echo json_encode(array(
        "valid"=>$success,
        "message" => $message
    ));
}

if(isset($_POST['type']) && $_POST['type']=="uploadexcel")
{
    $success = true;
    if (!empty($_FILES['file']['name'])) 
    {
        $createdon = date('Y-m-d');
        $content = $_FILES['file']['name'];
        $path = 'uploads/' . $_FILES['file']['name'];
        $allowed =  array('csv');
        $ext = pathinfo($content, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed) ) 
        {
            if(move_uploaded_file($_FILES['file']['tmp_name'], $path))
            {
                
                $handle = fopen($path, "r");
                $i = 0;
                while(($allDataInSheet = fgetcsv($handle, 1000, ",")) !== false)
                {
                    if($i!=0)
                    {
                        $brand = mysqli_real_escape_string($db,trim($allDataInSheet[0]));
                        $model = mysqli_real_escape_string($db,trim($allDataInSheet[1]));
                        $description = mysqli_real_escape_string($db,trim($allDataInSheet[2]));
                        $product_image = mysqli_real_escape_string($db,trim($allDataInSheet[3]));
                        $category = mysqli_real_escape_string($db,trim($allDataInSheet[4]));
                        $monthly_cost = mysqli_real_escape_string($db,trim($allDataInSheet[5]));
                        $gear = mysqli_real_escape_string($db,trim($allDataInSheet[6]));
                        $seats = mysqli_real_escape_string($db,trim($allDataInSheet[7]));
                        $fuel = mysqli_real_escape_string($db,trim($allDataInSheet[8]));
                        $co = mysqli_real_escape_string($db,trim($allDataInSheet[9]));
                        $fuel_consumtion = mysqli_real_escape_string($db,trim($allDataInSheet[10]));
                        $size_cargo = mysqli_real_escape_string($db,trim($allDataInSheet[11]));
                        $horse_power = mysqli_real_escape_string($db,trim($allDataInSheet[12]));
                        $drive = mysqli_real_escape_string($db,trim($allDataInSheet[13]));
                        $year = mysqli_real_escape_string($db,trim($allDataInSheet[14]));
                        $total_mileage = mysqli_real_escape_string($db,trim($allDataInSheet[15]));
                        $service_include = mysqli_real_escape_string($db,trim($allDataInSheet[16]));
                        $insurance_include = mysqli_real_escape_string($db,trim($allDataInSheet[17]));
                        $wintertype_include = mysqli_real_escape_string($db,trim($allDataInSheet[18]));                    

                        $sql = "INSERT INTO `products`(`brand`, `model`, `description`, `product_image`, `category`, `monthly_cost`, `gear`, `seats`, `fuel`, `co`, `fuel_consumtion`, `size_cargo`, `horse_power`, `drive`, `year`, `total_mileage`, `service_include`, `insurance_include`, `wintertype_include`, `status`, `createdon`) VALUES ('$brand', '$model', '$description', '$product_image', '$category', '$monthly_cost', '$gear', '$seats', '$fuel', '$co', '$fuel_consumtion', '$size_cargo', '$horse_power', '$drive', '$year', '$total_mileage', '$service_include', '$insurance_include', '$wintertype_include', '0', '$createdon')";
                        $q1 = mysqli_query($db,$sql);
                        //echo "<br>";
                        if($sql)
                        {
                            $c[] = 1;
                        }
                        else
                        {
                            $c[] = 0;
                        }
                    }
                    $i++;
                }
                if(in_array(0,$c))
                {
                    $success = true;
                    $msg = 'Some entry is not successful';
                }
                else
                {
                    $success = true;
                    $msg = 'All Record has been successfully inserted';
                }               
            }
            else
            {
                $msg = 'File Cannot be uploaded';
            }
        } 
        else 
        {
            $msg = 'It is not an excel file!';
        }
    }
    else 
    {
        $msg = 'Not File is selected';
    }
    echo json_encode(array(
        'success'=>$success,
        'msg'=>$msg
    ));
}