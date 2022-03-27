<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/" integrity="sha384-
BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
 function add_image_to_proposal($file_name, $proposal_id, $title)
 {
     require "db.php";

     $flag = TRUE;
     try
     {
         $query = "INSERT INTO images (proposal_id, file_name, title) VALUES(?,?,?)";
         $stmt = $conn->prepare($query);
         $stmt->bind_param("iss", $proposal_id, $file_name, $title);
         $stmt->execute();
         $conn->close();
     }   
     catch(Exception $e)
     {
         $flag=FALSE;
         print_r($e);
     }
     return $flag;
 }  

 function reArrayFiles(&$file_post) {
     print_r($file_post);
     $file_ary = array();
     $file_count = count($file_post['name']);
     $file_keys = array_keys($file_post);

     for ($i=0; $i<$file_count; $i++) {
         foreach ($file_keys as $key) {
             $file_ary[$i][$key] = $file_post[$key][$i];
         }
     }

     return $file_ary;
 }
?>
<body>

    <?php 
    session_start();
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $subject=$_POST['subject'];
        $maxProposalId=$_POST['proposal_number'];
        $revision_number=$_POST['revision_number'];
        $salutation_s=$_POST['salutation'];
        $curr =$_POST['curr'];
        $local=$_POST['local'];
        $tableA=$_POST['aPart'];
        $tableB=array();
        if(isset($_POST['bPart']))
        {
            $tableB=$_POST['bPart'];
        }
        if(isset($_POST['workDescription']))
        {
            $workDescription=$_POST['workDescription'];
            $unit=$_POST['unit'];
            $price=$_POST['price'];
        }
        
        
        
        $stay_expenses=$_POST["stay_expenses"];
        $travels_expenses=$_POST["travels_expenses"];
        $siso_expenses=$_POST["siso_expenses"];
        $price_e=$_POST['price_e'];
        $price_f=$_POST['price_f'];
        $price_g=$_POST['price_g'];
        $price_h=$_POST['price_h'];
        $days=$_POST['days'];
        $area_of_p=$_POST['area_of_p'];
        $point_a=$_POST['point_a'];
        $point_b=$_POST['point_b'];

           
        require("db.php");


        $query= "INSERT INTO proposal (`subject`,`proposal_number` , `revision_number` , `salutation` , `curr`,`local`,`price_e`,`price_f`,`price_g`,`price_h`, `days`, `user_id`, `siso_expenses`, `travel_expenses`, `stay_expenses`,`area_of_p`,`point_a`,`point_b`) VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

  
        $stmt=$conn->prepare($query);
        mysqli_error($conn);
        $stmt->bind_param("siisssddddiidddddd",$subject,$maxProposalId,$revision_number,$salutation_s,$curr, $local, $price_e,$price_f,$price_g,$price_h,$days, $_SESSION['user_id'], $siso_expenses, $travels_expenses, $stay_expenses,$area_of_p,$point_a,$point_b);
        if($stmt)
        {
/**
 * Handling main proposal insert
*/     
            $stmt->execute();
            echo mysqli_error($conn);
            $tableaEntryQuery="INSERT INTO tablea (`proposal_id`, `aPart`) VALUE(?,?)";
            $tablebEntryQuery="INSERT INTO tableb (`proposal_id`,`bPart`) VALUE(?,?)";
            $stmtTableaEntry=$conn->prepare($tableaEntryQuery);
            $stmtTablebEntry=$conn->prepare($tablebEntryQuery);
            $aPartText="";
            $bPartText="";
            $stmtTableaEntry->bind_param("is", $maxProposalId,$aPartText);
            $stmtTablebEntry->bind_param("is", $maxProposalId,$bPartText);
/**
 * Handling PartA and PartB
*/  
            foreach($tableA as $key=>$value){
                $aPartText=$value;
                $stmtTableaEntry->execute();
            }
            foreach($tableB as $key=>$value){
                $bPartText=$value;
                $stmtTablebEntry->execute();
            }
        }
        else
        {
            echo"serious problem";
        }
       
 /**
* Handling fee break down
*/    

        $multiInsertFeeBreakDown="";
        $count=1;
        $temp=1;
        $i=0;
        if(isset($_POST['workDescription']))
        {
            for($i=0;$i<count($price); $i++)
            {                        
                $multiInsertFeeBreakDown.="INSERT INTO fee_break_down (`proposal_id`, `description_of_work`, `unit`, `rate`) VALUES( ".$maxProposalId.", '".$workDescription[$i]."', '".$unit[$i]."', '".$price[$i]."' );";
                $count++;
            }
            
            $conn->multi_query($multiInsertFeeBreakDown);
        }
/**
* Handling images
*/    
        $files = array();
        $title = array();
        if(isset($_FILES['file']))
        {
            $files= reArrayFiles($_FILES['file']);
            $title = $_POST['title'];
        }

        $k=0;
        $allowed =array("jpg", "jpeg", "png");
        foreach($files as $image)
        {
            
            $file_name = $image['name'];
            $file_temp_name = $image['tmp_name'];
            $dile_size = $image['size'];
            $file_error= $image['error'];
            $file_size = $image['size'];
    
            
            $file_ext = explode('.', $file_name);
            $file_actual_ext = strtolower(end($file_ext));
            
            if(in_array($file_actual_ext, $allowed))
            {
                if($file_error == 0)
                {
                    if($file_size < 2000000)
                    {
                        $file_new_name = uniqid('', true).'.'.$file_actual_ext;
                        $file_desitination ="uploads/".$file_new_name;
                        
                        echo "Preparing to insert file name in database";
                        $temp = add_image_to_proposal($file_new_name, $maxProposalId, $title[$k]);
                        if(!$temp)
                        {
                            echo"[*] Although your file might have been uploaded to server but ther was an error while recording the same in databse. <br>";
                        }
                        move_uploaded_file($file_temp_name, $file_desitination);
                                
                    }
                    else
                    {
                        echo"[*] File size cannot be more than 20 mb.<br>";
                    }
                }
                else
                {
                    echo "[*] There is an error while verifying file. <br>";
                    break;
                }

            }
            else
            {
                echo"[*] One of the file is not an image.<br>";
                break;
            }
            $k++;
        }
           
    }
    header('Location: view_proposal.php?id='.$maxProposalId);
    ?>
     
</body>

</html>