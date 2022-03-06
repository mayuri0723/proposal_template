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

<body>
    <div class="container">
        <img class="png" src="img/1.png">
    </div>
    <div class="pg2">
        <!-- <img  class="png2" src="img/2.png"> -->
    </div>
    <?php 
    session_start();
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
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

       // $stmt=mysqli_prepare($conn, $query);
       
        $stmt=$conn->prepare($query);
        mysqli_error($conn);
        $stmt->bind_param("siisssddddiidddddd",$subject,$maxProposalId,$revision_number,$salutation_s,$curr, $local, $price_e,$price_f,$price_g,$price_h,$days, $_SESSION['user_id'], $siso_expenses, $travels_expenses, $stay_expenses,$area_of_p,$point_a,$point_b);
        if($stmt){
     
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
            foreach($tableA as $key=>$value){
                $aPartText=$value;
                $stmtTableaEntry->execute();
            }
            foreach($tableB as $key=>$value){
                $bPartText=$value;
                $stmtTablebEntry->execute();
            }
        }else{
            echo"serious problem";
        }
       
    }
       // $stmt->close();

        ?>
    <div class="m-container">
        <div style="width:722px;">
            <img class="png2" src="img/2.png">
        </div>
        <img src="" alt="">
        <div class="para">
            <h1>Proposal for Structural Engineering Design Services</h1>
            <h2><strong>Subject:</strong>
                <strong style="color: cornflowerblue;">
                    <?php echo $subject; ?>
                </strong>
            </h2>
            <span style="display:flex; width: 100%;justify-content: space-between;">
                <h2>Proposal No :2022-
                    <?php  echo $maxProposalId; ?>
                </h2>
                <h2>Revision :
                    <?php echo $revision_number; ?>
                </h2>
            </span>

            <p>
                Dear
                <?php echo $salutation_s;?>,<br>
                Further to your request and further to our recent correspondence, SteelSoft Consulting Services LLP
                (Formerly Samyak Consulting Services) proposes to provide you with structural engineering design
                services
                for the above noted project. <br>
                As part of this work, we will provide structural engineering design and specifications for this project
                as
                required to meet the requirement of the
                <?php echo $local; ?> Building Code for building permit submission.
            </p>
        </div>
        <ol class="onet" start="1">
            <li><strong>Scope of Work & Deliverables Includes:</strong>
                <div>
                    <table style="width:70%">
                        <tr class="t-heading">
                            <td>
                                <strong> 1A </strong>

                            </td>
                        </tr>
                        <?php

                        foreach($tableA as $key=>$value){
                            ?>
                        <tr>
                            <td>
                                <?php  echo $value; ?>
                            </td>
                        </tr>
                        <?php
                        }
                    ?>
                    </table>
                </div>
            </li>
            <br>
            <br>
            <br>
            <li>
                <div>
                  <?php
                    if(isset($_POST['bPart']))
                    {
                        ?>
                        <strong>Scope of Work & Deliverables Includes:</strong>
                              <table style="width:70%">
                                <tr class="t-heading">
                                    <td>
                                        <strong> 1B</strong>

                                    </td>
                                </tr>
                                <?php

                                foreach($tableB as $key=>$value){
                                ?>
                                <tr>
                                    <td>
                                        <?php  echo $value; ?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        <?php
                    }
                        
                  
                  ?>
                </div>
            </li>
            <br>
            <br>
            <br>
            <li>

                <strong> Fee Breakdown:</strong>
                <table style="width:90%;">

                    <tr class="t-heading">

                        <td>S.NO</td>
                        <td>Description of work</td>
                        <td>Unit</td>
                        <td>Rate
                            <?php echo $curr; ?>
                        </td>

                    </tr>
                    <?php
                        $multiInsertFeeBreakDown="";
                        $count=1;
                        $temp=1;
                        $i=0;
                        if(isset($_POST['workDescription']))
                        {
                            for($i=0;$i<count($price); $i++)
                            {                        
                                $multiInsertFeeBreakDown.="INSERT INTO fee_break_down (`proposal_id`, `description_of_work`, `unit`, `rate`) VALUES( ".$maxProposalId.", '".$workDescription[$i]."', '".$unit[$i]."', '".$price[$i]."' );";
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $count ; ?>
                                        </td>
                                        <td>
                                            <?php echo $workDescription[$i]; ?>
                                        </td>
                                        <td>
                                            <?php echo $unit[$i]; ?>
                                        </td>
                                        <td>
                                            <?php echo $price[$i]; ?>
                                        </td>
                                    </tr>
                                <?php
                                $count++;
    
                            }
                            
                            $conn->multi_query($multiInsertFeeBreakDown);
                        }
                    ?>

                    <tr>
                        <td><?php echo $count ; ?></td>
                        <td>Site inspection for structural observation   </td>
                        <td>Per Day</td>
                        <td><?php echo $siso_expenses; ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $count.".".$temp ; ?></td>
                        <td>Air Tickets and oter travel expenses  </td>
                        <td> </td>
                        <td><?php echo $travels_expenses; ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php  $temp+=1;  echo $count.".".$temp ; ?></td>
                        <td>Stay (Hotel Apartment) </td>
                        <td> </td>
                        <td><?php echo $stay_expenses; ?></td>
                    </tr>
                </table>
                <i>
                    (If you need us to prepare architectural drawings based on hand sketches or dimension, then an
                    additional fee of approximately 50% of the design fee noted above will be charged. This assumes that
                    you will provide us with hand sketched and overall dimensions for our use in the preparation of
                    these drawings.)
                </i>
                <p>Please note that this proposal includes structural design services only. No site reviews are included
                    in the fixed fee proposal since during construction of small projects, site reviews are normally
                    carried out by the client engineer who ensures that construction is carried out as per the approved
                    structural plans. If site visits are required as part of this design project, then these site visits
                    will be carried out on an as needed basis and each site visit will be invoiced separately from this
                    fixed fee design fee.</p>
            </li>
            <li>
                <strong> Optional Site Co-ordination & Construction Management:</strong>
                <p>
                    It is entirely possible that, once construction commences, the client/owner may require site
                    co-ordination with site engineer. If we are required to carry out such site co-ordination or
                    meetings during construction, our site co-ordinations charged on an hourly basis which is shown
                    below.
                </p>
                <p>
                    During design phase, maximum three revisions in drawing are allowed. If revision in
                    architectural/Client drawing exceeds three, then additional charges shall be applicable as per man
                    hours stated below. After completion of structural design package, if any changes occur in
                    architectural drawing, then revision in structural drawing shall be charged as per man hour stated
                    below.
                </p>
                <table>
                    <tr class="t-heading">
                        <td>S.NO</td>
                        <td>Description of Work</td>
                        <td>Unit</td>
                        <td>Rate(
                            <?php  echo $curr; ?>)
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Senior Structural/ Principal</td>
                        <td>Per hour</td>
                        <td>
                            <?php  echo $curr; ?>
                            <?php echo $price_e; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Structural Designer</td>
                        <td>Per hour</td>
                        <td>
                            <?php  echo $curr; ?>
                            <?php echo $price_f; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Intermediate Designer</td>
                        <td>Per hour</td>
                        <td>
                            <?php  echo $curr; ?>
                            <?php echo $price_g; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Detailer/Draftsperson</td>
                        <td>Per hour</td>
                        <td>
                            <?php  echo $curr; ?>
                            <?php echo $price_h; ?>
                        </td>
                    </tr>
                </table>
            </li>
            <br>
            <br>
            <li>
                <strong> Schedule:</strong>
                <p>
                    Our work schedule varies. Usually, we are able to carry out a design project within approximately 2
                    weeks of receiving your authorization to proceed. Please ask us to confirm a delivery date prior to
                    your acceptance of this proposal
                </p>
            </li>
            <br>

            <li>

                <strong> Cost proposed and Timelines</strong>
                <table>
                    <tr>
                        <!-- area of project -->
                        <td class="t-heading">Area of Project Work</td>
                        <td> <?php  echo $area_of_p; ?></td>
                    </tr>
                    <tr>
                        <td class="t-heading">
                            Proposed Time
                        </td>
                        <td>
                            <?php echo $days." "; ?> day(s)
                        </td>
                    </tr>
                    <tr>
                        <td class="t-heading">Proposed Cost (
                            <?php  echo $curr; ?>)
                        </td>
                        <td style="padding:0px">
                            <table style="width:100%">
                                <tr>
                                    <td class="t-heading">Scope of Work</td>
                                    <td class="t-heading">Amount</td>
                                </tr>
                                <tr>
                                    <!-- see pointA -->
                                    <td>As per Point 1A</td>
                                    <td> <?php echo $point_a;?></td>
                                </tr>
                                <tr>
                                    <!-- see pointB -->
                                    <td>As per Point 1B</td>
                                    <td> <?php  echo  $point_b;?></td>
                                </tr>
                                <tr>
                                    <td class="t-heading">Total</td>
                                    <td>-</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </li>
            <br>

            <br>
            <li>
                <strong> Payment Terms :</strong>
                <ul style="padding: 12px;">
                    <li> 50% retainer fee payment in order to commence work on your project.</li>
                    <li> 50% final payment upon delivery of your completed design drawings.</li>
                    <li> Taxes shall be extra.</li>
                </ul>

            </li>
            <li> <strong>Exclusions:</strong>
                <ol start="1" style="padding: 12px;">
                    <li>
                        Any kind of Interior design work.
                    </li>
                    <li>
                        Site development/External development design work
                    </li>
                </ol>
            </li>
        </ol>
        <img class="png3" src="img/3.png">

    </div>


</body>

</html>