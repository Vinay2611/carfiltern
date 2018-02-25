<?php
include_once 'db_config.php';

if(isset($_POST['getcars']))
{
    $count = 0;
    $data = "<h4>No Car Found Based on your criteria</h4>";
    $sort_cond = "order by monthly_cost * 1 asc";
    $whereclause = array();
    if(isset($_POST['aj_category']) && !empty($_POST['aj_category']))
    {
        $whereclause[] = "category in ('".implode("','",$_POST['aj_category'])."')";
    }
    if(isset($_POST['aj_search']) && !empty($_POST['aj_search']))
    {
        $whereclause[] = "(brand LIKE '%".$_POST['aj_search']."%' or model LIKE '%".$_POST['aj_search']."%')";
    }
    if(isset($_POST['aj_gearbox']) && !empty($_POST['aj_gearbox']))
    {
        $whereclause[] = "gear = '".$_POST['aj_gearbox']."'";
    }
    if(isset($_POST['aj_feul']) && !empty($_POST['aj_feul']))
    {
        $whereclause[] = "fuel = '".$_POST['aj_feul']."'";
    }
    if(isset($_POST['aj_seats']) && !empty($_POST['aj_seats']))
    {
        $whereclause[] = "seats = '".$_POST['aj_seats']."'";
    }
    if(isset($_POST['aj_drivetrain']) && !empty($_POST['aj_drivetrain']))
    {
        $whereclause[] = "drive = '".$_POST['aj_drivetrain']."'";
    }
    if(isset($_POST['aj_years']) && !empty($_POST['aj_years']))
    {
        $whereclause[] = "year = '".$_POST['aj_years']."'";
    }
    if(isset($_POST['aj_sort']) && !empty($_POST['aj_sort']))
    {
        list($sort_method,$field) = explode(" ",$_POST['aj_sort']);
        $sort_cond = "order by ".$field." ".$sort_method;
    }
    $year       = $_POST['aj_years'];
    //$minmileage = $_POST['aj_minmileage'];
    //$maxmileage = $_POST['aj_maxmileage'];
    $mincost    = $_POST['aj_mincost'];
    $maxcost    = $_POST['aj_maxcost'];
    
    //total_mileage between $minmileage and $maxmileage and 
    $whereclause[] = "monthly_cost between $mincost and $maxcost";

    $sql = "select * from products where ".implode(" and ",$whereclause)." ".$sort_cond; 
    $q1 = mysqli_query($db,$sql);
    $count = mysqli_num_rows($q1);
    if($count>0)
    {
        $i=1;$n=2;
        ob_start();
        while($r1 = mysqli_fetch_assoc($q1))
        {
            include dirname(__FILE__).'/template.php';
        }
        if(($i-1)%$n != 0)
        {
            echo '</div></div>
            <div class = "clear"></div>';
        }
        $data = ob_get_clean();
    }
    echo json_encode(array(
            "count" => $count,
            "data" => $data
        ),JSON_UNESCAPED_UNICODE);
}

/*enquiry insert and mail sending*/
if(isset($_POST['type']) && $_POST['type']=='placedorder')
{
    $success=false;
    $msg="";

    $name		= mysqli_real_escape_string($db,$_POST["name"]);
    $phone		= mysqli_real_escape_string($db,$_POST["phone"]);
    $email		= mysqli_real_escape_string($db,$_POST["email"]);
    $message	= mysqli_real_escape_string($db,$_POST["message"]);
    $zipcode	= mysqli_real_escape_string($db,$_POST["zipcode"]);
    $cardetail	= mysqli_real_escape_string($db,$_POST["FormID"]);
    $brand	    = mysqli_real_escape_string($db,$_POST["brand"]);
    $model	    = mysqli_real_escape_string($db,$_POST["model"]);
    $date		= date('Y-m-d');

    $body = '<br> Name: '.$name.' <br> Email: '.$email.' <br> Message: '.$message.' <br> Phone: '.$phone.' <br> Car Brand: '.$brand.' <br> Car Model: '.$model.'<br>';


    $res = $db->query("INSERT INTO `order`( name,phone,email,message,zipcode,car_detail,date ) VALUES('$name','$phone','$email','$message','$zipcode','$cardetail','$date')");

    if($res)
    {
        $mail = send_phpmail('','','','','car testing subject',$body);
        $success=true;
        $msg="din begäran har behandlats";
    }
    else
    {
        $msg="Var god försök igen!";
    }
    echo json_encode(array('success'=>$success,'msg'=>$msg));
    /*if($res)
    {
        $success=true;
        $msg="din begäran har behandlats";
    }else{
        $msg="Var god försök igen!";
    }
    echo json_encode(array('success'=>$success,'msg'=>$msg));*/
}
/*enquiry end*/


