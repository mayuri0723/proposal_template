<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Display</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/display.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>


	<style>
		.col a {
			text-decoration: None;
			color: black;
		}
	</style>
</head>

<body>
    <div class="container" style="page-break-after:always;">
        <img class="png" src="img/1.png" >
    </div>
    <div class="pg2">
        <!-- <img  class="png2" src="img/2.png"> -->
    </div>
<?php

      if ($_SERVER["REQUEST_METHOD"]=="GET"){
        require("db.php");
        $proposal_number = $_GET["id"];
       


        $query= "SELECT * FROM proposal where proposal_number= ".$proposal_number;

       // $stmt=mysqli_prepare($conn, $query);
       
        $result=$conn->query($query);
        mysqli_error($conn);
        $row= $result->fetch_assoc();
        if($row){
     
           
            echo mysqli_error($conn);
            $subject=$row['subject'];
            $proposal_number=$row['proposal_number'];
            $revision_number=$row['revision_number'];
            $salutation_s=$row['salutation'];
            $curr =$row['curr'];
            $local=$row['local'];
            $stay_expenses=$row["stay_expenses"];
            $travel_expenses=$row["travel_expenses"];
            $siso_expenses=$row["siso_expenses"];
            $price_e=$row['price_e'];
            $price_f=$row['price_f'];
            $price_g=$row['price_g'];
            $price_h=$row['price_h'];
            $days=$row['days'];
            $area_of_p=$row['area_of_p'];
            $point_a=$row['point_a'];
            $point_b=$row['point_b'];

            $total =  $point_a +  $point_b;

        }else{
            echo"serious problem";
        }
       
    }
       // $stmt->close();

        ?>
       
    <div class="m-container" style="font-size: 13pt;">
        <div style="width:722px;">
            <img class="png2" src="img/2.png">
        </div>
        <img src="" alt="">
        <div class="para">
            <h1>Proposal for Structural Engineering Design Services</h1>
            <h2><strong style="font-family:">Subject:</strong>
                <strong style="color: cornflowerblue;">
                    <?php echo $subject; ?>
                </strong>
            </h2>
            <span style="display:flex; width: 100%;justify-content: space-between;">
                <h2>Proposal No :2022-
                    <?php  echo $proposal_number; ?>
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
        <ol class="onet" start="1" style="page-break-after:always;">
            <li><strong>Scope of Work & Deliverables Includes:</strong>
                <div>
                    <table style="width:70%; page-break-after:auto;">
                        <tr class="t-heading">
                            <td>
                                <strong> 1A </strong>

                            </td>
                        </tr>
                        <?php
                        $tableaQuery = "SELECT * FROM tablea where proposal_id = ".$proposal_number;
                        $result=$conn->query($tableaQuery);
                        while($row =  $result->fetch_assoc()){
                            ?>
                        <tr>
                            <td>
                                <?php  echo $row['aPart']; ?>
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
            <?php
            $tablebQuery="SELECT * FROM tableb where proposal_id = ".$proposal_number;
                $result=$conn->query($tablebQuery);
                if(mysqli_num_rows($result) >0)
                {
                    
            
            ?>
                <li>
                    <div>
                 
                        <strong>Scope of Work & Deliverables Includes:</strong>
                              <table style="width:70%;">
                                <tr class="t-heading">
                                    <td>
                                        <strong> 1B</strong>

                                    </td>
                                </tr>
                                <?php

                                while($row= $result->fetch_assoc()){
                                ?>
                                <tr>
                                    <td>
                                        <?php  echo $row["bPart"]; ?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                   
                    </div>
                </li>
            <?php
                }
                              
            ?>
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
                        $feeBreakdownQuery="SELECT * FROM fee_break_down WHERE proposal_id = ".$proposal_number;
                        $result= $conn->query($feeBreakdownQuery);

                        if($result)
                        {
                            while($row = $result->fetch_assoc())
                            {                        
                               
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $count ; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['description_of_work'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['unit']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['rate']; ?>
                                        </td>
                                    </tr>
                                <?php
                                $count++;
    
                            }
                            
                           
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
                        <td><?php echo $travel_expenses; ?></td>
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
                        <!-- Area of Project -->
                        <td class="t-heading">Area of Project Work</td>
                        <td> <?php echo $area_of_p; ?></td>
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
                        <td style="padding:0px;">
                            <table style="width:100%;">
                                <tr>
                                    <td class="t-heading">Scope of Work</td>
                                    <td class="t-heading">Amount</td>
                                </tr>
                                <tr><!-- see pointA -->
                                    <td>As per Point 1A</td>
                                    <td><?php echo $point_a; ?></td>
                                </tr>
                                <tr>
                                    <!-- see pointB -->
                                    <td>As per Point 1B</td>
                                    <td><?php echo $point_b; ?></td>
                                </tr>
                                <tr>
                                    <td class="t-heading">Total</td>
                                    <td><?php echo $total;?></td>
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
            <li style="page-break-after:always;"> <strong>Exclusions:</strong>
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
      
        <img class="png3" src="img/footer.png" style="margin-top:20px;">
        <img class="png3" src="img/map.png" style="height:300px;">

        <a href="upload_image.php" target="_blank">Add image</a>
        <div class="images">
          

        </div>
    <body>
</html>