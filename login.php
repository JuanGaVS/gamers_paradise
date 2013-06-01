<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    require_once './dal/ContestantDAL.php';
    require_once './entities/Contestant.php';
    
    $uid= $_POST['uid'];
    $first_name= $_POST['first_name']."";
    $middle_name= $_POST['middle_name']."";
    $last_name= $_POST['last_name']."";
    $gender= $_POST['gender']."";
    $locale= $_POST['locale']."";
    $birthday= $_POST['birthday']."";
	$age_range = $_POST['age_range']."";
    $date= date('d-m-y');
    
	$min = $age_range['min'];
	$max = 0;
	
	if($age_range['max']!=""){
		$max = $age_range['max'];
	}
	
        $cont = new Contestant();
       /* $cont->setContestant_id($uid);
        $cont->setFirst_name($first_name);
        $cont->setMiddle_name($middle_name);
        $cont->setLast_name($last_name);
        $cont->setGender($gender);
        $cont->setLocale($locale);
        $cont->setAge_range_min($min);
        $cont->setAge_ran_max($max);
        $cont->setBirthday($birthday);
        $cont->setDate_added($date);
        */
        $cDAL = new ContestantDAL();
        $result = $cDAL->contestantAdd($cont);
        
    //echo "id ".$uid." first name ".$first_name."  last name ".$last_name."  locale  ".$locale."  birthday  ".$birthday."  date  ".$date."  middle name  ".$middle_name."  gender  ".$gender."  age min  ".$min;
    echo $result;

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>