<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    require_once './dal/ContestantDAL.php';
    require_once './entities/Contestant.php';

	
    $uid= $_POST['uid'];
    $first_name= $_POST['first_name']."";
    $last_name= $_POST['last_name']."";
    $gender= $_POST['gender']."";
    $locale= $_POST['locale']."";
    $birthday= $_POST['birthday']."";
    $date= date('d-m-y');
    
	
	
        $cont = new Contestant();
        $cont->setContestant_id($uid);
        $cont->setFirst_name($first_name);
        $cont->setLast_name($last_name);
        $cont->setGender($gender);
        $cont->setLocale($locale);
        $cont->setBirthday($birthday);
        $cont->setDate_added($date);
        
        $cDAL = new ContestantDAL();
        $result = $cDAL->contestantAdd($cont);
        
   
    echo $result;

}

?>