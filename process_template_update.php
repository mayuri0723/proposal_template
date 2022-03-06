<?php
     session_start();
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {

        /**
         * Gathereing all data from the update maenu
         */


        $subject=$_POST['subject'];
        $proposal_number=$_POST['proposal_number'];
        $revision_number=$_POST['revision_number'];
        $salutation_s=$_POST['salutation'];
        $curr =$_POST['curr'];
        $local=$_POST['local'];
        $travel_expense=$_POST["travels_expenses"];
        $stay_expenses=$_POST['stay_expenses'];
        $siso_expenses=$_POST["siso_expenses"];

        
        
        $tableAnew = array();
        if(isset($_POST['aPart'])){
            $tableAnew=$_POST['aPart'];
        }

        $tableAprevious =array();
        if(isset($_POST['aIdPrevious']))
        {
            $tableAprevious=$_POST['aIdPrevious'];
        }



        $tableBnew=array();
        if(isset($_POST['bPart']))
        {
            $tableBnew=$_POST['bPart'];
        }

        $tableBprevious=array();
        if(isset($_POST['bIdPrevious']))
        {
            
            $tableBprevious=$_POST['bIdPrevious'];
        }


        $fId= array();
        $workDescription=array();
        $unit=array();
        $rate=array();
        if(isset($_POST['workDescription']))
        {
            $workDescription=$_POST['workDescription'];
            $unit=$_POST['unit'];
            $rate=$_POST['rate'];
            $fId= $_POST['fId'];
        }
  
        $price_e=$_POST['price_e'];
        $price_f=$_POST['price_f'];
        $price_g=$_POST['price_g'];
        $price_h=$_POST['price_h'];
        $days=$_POST['days'];
        $area_of_p=$_POST['area_of_p'];
        $point_a=$_POST['point_a'];
        $point_b=$_POST['point_b'];
       
 


        require("db.php");
 
        $revision_number+=1;
        $query= "UPDATE  proposal  set `subject` = '".$subject."' , revision_number = ".$revision_number." , salutation = '".$salutation_s."', curr = '".$curr."' ,local ='".$local."', price_e= ".$price_e.", price_f = ".$price_f." , price_g = ".$price_g.", price_h = ".$price_h.", days= ".$days.", user_id = ".$_SESSION['user_id'].",  travel_expenses = ".$travel_expense.", siso_expenses= ".$siso_expenses.", stay_expenses =".$stay_expenses." , area_of_p=".$area_of_p.",point_a=".$point_a.",point_b=".$point_b."  WHERE proposal_number = ".$proposal_number."  ";
 
       
        echo $query;
        $stmt=$conn->prepare($query);
         
      
        if($stmt)
        {

            /**
             * 
             * Updating the master proposal table
             */
            $stmt->execute();

            echo mysqli_error($conn);




            /**
             * Getting all the ids from tablea which has a reference to this proposal id
             */
            $tableaId="SELECT a_id FROM tablea WHERE  proposal_id =". $proposal_number;
            $result=$conn->query($tableaId);
            $tableAdelete="";
            
            echo "<br>";


            /**
             * creating delete statement to Delete the tablea entries which user has deleted 
             */
            while($row=$result->fetch_assoc())
            {
                if(!in_array($row['a_id'], $tableAprevious))
                {
                    $tableAdelete.="DELETE FROM tablea WHERE a_id = ".$row["a_id"].";";
                }
            }





            /**
             * Getting all the ids from tablea which has a reference to this proposal id
             */
            $tablebId="SELECT b_id FROM tableb WHERE  proposal_id =". $proposal_number;
            $result=$conn->query($tablebId);
            
            /**
             * creating delete statement to Delete the tableb entries which user has deleted 
             */
            $tableBdelete="";
            while($row=$result->fetch_assoc())
            {
                if(!in_array($row['b_id'], $tableBprevious))
                {
                    $tableBdelete.="DELETE FROM tableb WHERE b_id = ".$row["b_id"].";";
                }
            }   

           
            
            echo $tableAdelete ." <br> ".$tableBdelete." <br> ";  

            /**
             *  Inserting new entries in both table a and tableb
             */
            $tableaEntryQuery="INSERT INTO tablea (`proposal_id`,`aPart`) VALUE(?,?)";
            $tablebEntryQuery="INSERT INTO tableb (`proposal_id`,`bPart`) VALUE(?,?)";
            $stmtTableaEntry=$conn->prepare($tableaEntryQuery);
            $stmtTablebEntry=$conn->prepare($tablebEntryQuery);
            $aPartText="";
            $bPartText="";
            $stmtTableaEntry->bind_param("is", $proposal_number,$aPartText);
            $stmtTablebEntry->bind_param("is", $proposal_number,$bPartText);

            print_r($tableAnew);
            echo "<br>";
            print_r($tableBnew);

            foreach($tableAnew as $key=>$value)
            {
                if($value=="-")
                    continue;
                $aPartText=$value;
                $stmtTableaEntry->execute();
            }
            foreach($tableBnew as $key=>$value)
            {
                $bPartText=$value;
                $stmtTablebEntry->execute();
            }



            /**
             * Finally deleting tablea and tableb entries
             */
            $fianlDelete=$tableAdelete."".$tableBdelete;
            $conn->multi_query($fianlDelete);


            /**
             * Repeating use of $conn object prevents running query here after so had to close tis conn object
             */
            $conn->close();
            require "db.php";








            $tablefId="SELECT id FROM fee_break_down WHERE  proposal_id =". $proposal_number;
            echo "<br>". $tablefId;
            $resultfId=$conn->query($tablefId);
            mysqli_error($conn);
            $tablefdelete="";
            $fIdInDb=array();
            if(mysqli_num_rows($resultfId)>0){
                while($row=$resultfId->fetch_assoc())
                {
                    $fIdInDb[]= $row['id'];
                }   
            }
            mysqli_error($conn);
            $tablefUpdate="";
            $tablefInsert="";
            $i=0;
            //print_r($fId);
    
                for($i=0;$i<count($fId); $i++)
                {
                
                    if(in_array($fId[$i] , $fIdInDb))
                    {
                        $tablefUpdate.="UPDATE fee_break_down set description_of_work  = '".$workDescription[$i]."', unit= '".$unit[$i]."', rate = ".$rate[$i]." where id = ".$fId[$i]." ;";

                    }
                    else
                    {
                        $tablefInsert.="INSERT INTO fee_break_down(`proposal_id`, `description_of_work`, `unit`, `rate` ) VALUES ( ".$proposal_number.", '".$workDescription[$i]."' , '".$unit[$i]."', ".$rate[$i]." ); ";
                    }
                }

                print_r($fIdInDb);
                for($i =0 ; $i< count($fIdInDb);$i++)
                {
                    if(!in_array($fIdInDb[$i], $fId))
                    {
                        $tablefdelete = "DELETE FROM fee_break_down where id = ".$fIdInDb[$i].";";
                    }
                }
            echo "<br>".$tablefUpdate."<br>". $tablefdelete."<br>".$tablefInsert;

            $transactions=$tablefdelete."".$tablefInsert."". $tablefUpdate;
            $conn->multi_query($transactions);
            echo  mysqli_error($conn);





         }
         else{
             echo mysqli_error($conn);
             echo"serious problem";
         }
        
     }
        // $stmt->close();
 header("location: view_proposal.php?id=".$proposal_number."&done=1");
         
?>