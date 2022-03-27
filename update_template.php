<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <!-- <script src="https://kit.fontawesome.com/143173e95a.js" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/print_special.css">
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->

    <style>
       
        .tag {
            display: block;
            border: 1px solid lightgrey;
            border-radius: 2px;
            margin: 10px 5px;
            height: fit-content;
            padding: 0px 5px;
            width: fit-content;
        }

        .tag label:hover {
            text-decoration: red;
            cursor: not-allowed;

        }

        .display {
            display: inline-flex;
        }
        .display .tag{
            margin:0;
        }

        .simple-btn {
            border: 1px solid grey;
            border-radius: 2px;
            padding: 0px;
            cursor: pointer;
            box-shadow: 0px 0px 1px 0px grey inset;
        }

        .inp {
            padding: 2px;
        }

        select {
            margin: auto;
            padding: 0px;
        }
        .images{
            display: flex;
            flex-direction: column;
        }
        .p-image{
            display: flex;
        }
        .input-section-1 {
            margin: auto;
            display: inline-block;
        }

        .selectMenu {
            display: inline-flex;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="png" src="img/1.png">
    </div>
    <div class="pg2">
        <!-- <img  class="png2" src="img/2.png"> -->
    </div>
    <?php 
        if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['id']))
        {
    ?>
        <form class="m-container" method="POST" action="process_template_update.php" enctype="multipart/form-data">
            <div style="width:722px;">
                <img class="png2" src="img/2.png">
            </div>
            <?php
                require "db.php";
                session_start();
                         

                    require("db.php");
                    $proposal_number= $_GET['id'];
                    

                    $query= "SELECT `subject`, `revision_number` , `salutation` , `curr`,`local`,`price_e`,`price_f`,`price_g`,`price_h`,`area_of_p`,`days`, `user_id`, `travel_expenses` , `stay_expenses`, `siso_expenses` ,`point_a`,`point_b`   FROM proposal WHERE proposal_number = ?";

                   
                
                    $stmt=$conn->prepare($query);
                    echo mysqli_error($conn);
                    $stmt->bind_param("i",$proposal_number);
                    if($stmt){
                        // echo "OKAY STATEMENT CREATED";

                        $stmt->execute();
                     
                        $result=$stmt->get_result();
                        $row = $result->fetch_assoc();
                        $subject=$row['subject'];
                        $revision_number=$row['revision_number'];
                        $salutation_s=$row['salutation'];
                        $curr =$row['curr'];
                        $local=$row['local'];
                        $travels_expenses=$row["travel_expenses"];
                        $stay_expenses=$row["stay_expenses"];
                        $siso_expenses=$row["siso_expenses"];
                        $price_e=$row['price_e'];
                        $price_f=$row['price_f'];
                        $price_g=$row['price_g'];
                        $price_h=$row['price_h'];
                        $days=$row['days'];
                        $area_of_p=$row['area_of_p'];
                        $point_a=$row['point_a'];
                        $point_b=$row['point_b'];
                    }else{
                        echo"serious problem";
                    }
                
                
                ?>
            <img src="" alt="">
            <div class="para">
                <h1>Proposal for Structural Engineering Design Services</h1>
                <h2>
                    <strong>Subject:</strong>
                    <strong style="color: cornflowerblue;">
                        <input type="text" name="subject" id="" placeholder="Type the subject" value="<?php  echo $subject; ?>">
                    </strong>
                </h2>
                <span style="display:flex; width: 100%;justify-content: space-between;">
                   
                    <h2>Proposal No :2022-
                        <?php  echo $proposal_number ; ?> <input type="hidden" name="proposal_number"
                            value="<?php echo $proposal_number; ?>">
                    </h2>
                    <h2>Revision :<?php  echo $revision_number; ?> <input type="hidden" name="revision_number" value="<?php  echo $revision_number; ?>"></h2>
                </span>
                <div>
                    Dear <input type="text" name="salutation" id="" placeholder="Type the salutation" value="<?php echo $salutation_s; ?>">,<br>
                    Further to your request and further to our recent correspondence, SteelSoft Consulting Services LLP
                    (Formerly Samyak Consulting Services) proposes to provide you with structural engineering design
                    services
                    for the above noted project. <br>
                    As part of this work, we will provide structural engineering design and specifications for this project
                    as
                    required to meet the requirement of the
                    <div id="selectMenu1" class="selectMenu" multiple="false">
                        <div class="display" id="display">
                           
                        </div>
                        <select name="" id="select"
                            onchange="selection('select', 'customEntry', 'local', 'display', 'input', 'selectMenu1')">
                            <option value="-">select</option>
                            <option value="add">Custom Entry</option>
                        </select>
                        <div class="input-section-1" id="input" style="display: none;">
                            <input type="text" name="" id="customEntry" class="inp" placeholder="custom entry" value='<?php echo $salutation_s;?>'>
                            <label for=""
                                onclick="add('', 'select',  'customEntry', 'local', 'display',  'input', 'selectMenu1')"
                                class="simple-btn">add</label>
                            <label for="" onclick="cancel('input', 'select')" class="simple-btn">cancel</label>
                        </div>
                    </div>Building code for building permit submission.
                </div>
            </div>
            <ol class="onet" start="1">
                <li><strong>Scope of Work & Deliverables Includes:</strong>
                    <div class="table1">


                        <label for="" class="lentry">1A </label>

                        <div id="selectMenu2" multiple="true">
                            <div class="selection" id="displaya">
                                <?php
                                    $sql="SELECT a_id, aPart  from tablea WHERE proposal_id = ?";

                                    $stmt= $conn->prepare($sql);
                                    if($stmt)
                                    {
                                        $stmt->bind_param("i", $proposal_number);
                                        $stmt->execute();
                                        $max_aid=0;
                                        $result= $stmt->get_result();
                                        while($row = $result->fetch_assoc())
                                        {

                                            ?>
                                               
                                                <span id="a<?php echo $row['a_id']; ?>" onclick="remove('a<?php echo $row['a_id']; ?>', 'selecta', 'inputa', 'selectMenu2')" class="tag">
                                                    <label><?php echo $row['aPart']; ?></label>
                                                    <input type="hidden" name="aIdPrevious[]" value="<?php echo $row["a_id"]; ?>">
                                                </span>
                                            <?php
                                        }
                                    }
                                    $stmt->close();
                                
                                ?>

                            </div>
                            <select name="aPart[]" id="selecta"
                                onchange="selection('selecta', 'customEntrya', 'aPart[]', 'displaya', 'inputa', 'selectMenu2')">
                                <option value="-">select</option>
                                <?php
                                $tableAquery="SELECT distinct aPart from tablea";
                                $result= $conn->query($tableAquery);
                                while($row = $result->fetch_assoc()){
                                    ?>
                                <option value="<?php echo $row['aPart']; ?>">
                                    <?php echo $row['aPart']; ?>
                                </option>
                                <?php
                                }
                                
                                ?>
                                <option value="add">Custom Entry</option>
                            </select>
                            <div class="input-section-1" id="inputa" style="display: none;">
                                <input type="text" name="" id="customEntrya" class="inp" placeholder="custom entry">
                                <label for=""
                                    onclick="add('', 'selecta',  'customEntrya', 'aPart[]', 'displaya',  'inputa', 'selectMenu2')"
                                    class="simple-btn">add</label>
                                <label for="" onclick="cancel('inputa', 'selecta')" class="simple-btn">cancel</label>
                            </div>
                        </div>



                        <label for="" class="lentry">1B</label>                 
                        
                        <div id="selectMenu3" multiple="true">
                            <div class="selection" id="displayb">

                                <?php
                                      $sql="SELECT b_id, bPart  from tableb WHERE proposal_id = ?";

                                      $stmt= $conn->prepare($sql);
                                      if($stmt)
                                      {
                                          $stmt->bind_param("i", $proposal_number);
                                          $stmt->execute();
                                          $max_aid=0;
                                          $result= $stmt->get_result();
                                          while($row = $result->fetch_assoc())
                                          {
  
                                              ?>
                                                    
                                                    <span id="b<?php echo $row['b_id']; ?>" onclick="remove('b<?php echo $row['b_id']; ?>', 'selectb', 'inputb', 'selectMenu3')" class="tag">
                                                        <input type="hidden" name="bIdPrevious[]" value="<?php echo $row["b_id"]; ?>">
                                                        <label><?php echo $row['bPart']; ?></label>
                                                    </span>
                                              <?php
                                          }
                                      }
                                      $stmt->close();

                                ?>
                            
                            </div>
                            <select name="" id="selectb"
                                onchange="selection('selectb', 'customEntryb', 'bPart[]', 'displayb', 'inputb', 'selectMenu3')">
                                <option value="-">select</option>
                                <?php
                                $tableAquery="SELECT distinct bPart from tableb";
                                $result= $conn->query($tableAquery);
                                while($row = $result->fetch_assoc()){
                                    ?>
                                <option value="<?php echo $row['bPart']; ?>">
                                    <?php echo $row['bPart']; ?>
                                </option>
                                <?php
                                }
                                
                                ?>
                                <option value="add">Custom Entry</option>
                            </select>
                            <div class="input-section-1" id="inputb" style="display: none;">
                                <input type="text" name="" id="customEntryb" class="inp" placeholder="custom entry">
                                <label for=""
                                    onclick="add('', 'selectb',  'customEntryb', 'bPart[]', 'displayb',  'inputb', 'selectMenu3')"
                                    class="simple-btn">add</label>
                                <label for="" onclick="cancel('inputb', 'selectb')" class="simple-btn">cancel</label>
                            </div>
                        </div>

                        <!-- js code -->
                        <script>
                            var count = 9999;
                            function selection(selectId, inputBox, nm, displayId, inpSection, selectMenu) {
                                var val = document.getElementById(selectId).value;
                                if (val == "add") {
                                    document.getElementById(inpSection).style.display = "inline-block";
                                    document.getElementById(selectId).style.display = "none";
                                } else {
                                    console.log("okay");
                                    add(val, selectId, inputBox, nm, displayId, inpSection, selectMenu);
                                }
                                document.getElementById(selectId).options[0].selected = true;

                            }

                            function cancel(inpSection, selectId) 
                            {
                                document.getElementById(inpSection).style.display = "none";
                                document.getElementById(selectId).style.display = "";
                            }
                            
                            function add(value, selectId, inputBox, nm, displayId, inpSection, selectMenu) {
                                var display = document.getElementById(displayId);
                                var val = "";
                                if (value == '') {
                                    val = document.getElementById(inputBox).value;
                                } else {
                                    val = value;
                                }
                                var span = document.createElement("span");
                                span.setAttribute("id", count);
                                span.setAttribute("onclick", "remove(" + count + ", '" + selectId + "', '" + inpSection + "', '" + selectMenu + "')");
                                span.setAttribute("class", "tag")
                                count++;

                                var inputHidden = document.createElement("input");
                                inputHidden.setAttribute("type", "hidden");
                                inputHidden.setAttribute("name", nm);
                                inputHidden.setAttribute("value", val);
                                
                               

                                span.append(inputHidden);

                                var label = document.createElement("label");
                                label.textContent = val;

                                span.append(label);
                                display.append(span);
                                console.log(span);
                                if (document.getElementById(selectMenu).getAttribute("multiple") == 'false') {
                                    document.getElementById(selectId).style.display = "none";
                                    document.getElementById(inpSection).style.display = "none";
                                }

                            }

                            function remove(id, selectId, inpSection, selectMenu) {
                                document.getElementById(id).remove();
                                if (document.getElementById(selectMenu).getAttribute("multiple") == 'false') {
                                    document.getElementById(selectId).style.display = "";
                                    document.getElementById(inpSection).style.display = "none";
                                }
                            }

                            <?php  echo "add('', 'select',  'customEntry', 'local', 'display',  'input', 'selectMenu1')"; ?>
                        </script>
                    </div>
                </li>
                <br>
                <br>
                <br>
                <li>

                    <strong> Fee Breakdown:</strong>
                    <select name="curr" id="crr" onchange="setCurrency()">
                        <option value="-">Select currency</option>
                        <option <?php if($curr == "Rs") echo "selected" ?> value="Rs">Rs</option>
                        <option <?php if($curr == "Rs") echo "selected" ?> value="U.S.D">U.S.D.</option>
                    </select>


                    <label for="" onclick="createNewEntry()" style="border-radius:5px; padding:5px; border:1px solid lightgrey; display:block; width:160px; text-align:center; margin: 5px 0px;" >Add new entry</label>
                    <table id="feeBreakDownTable">
                        <tr class="t-heading">

                            <td>S.NO</td>
                            <td>Description of work</td>
                            <td>Unit</td>
                            <td class="crr"><?php echo $curr; ?></td>

                        </tr>
                        <?php
                            $count=1;
                            $sql="SELECT description_of_work, unit , rate , id FROM fee_break_down WHERE proposal_id =  ".$proposal_number;
                            $result=$conn->query($sql);
                            while($row = $result->fetch_assoc())
                            {
                                
                                    ?>
                                        <tr id= "f<?php  echo $row["id"]; ?>">
                                        
                                            <td> <?php echo $count; ?> </td>
                                            <td><input type="hidden" name="fId[]" value="<?php echo $row["id"]; ?>" >
                                             <input type="text" name="workDescription[]" value="<?php  echo $row["description_of_work"]; ?>" id=""></td>
                                            <td> <input type="text" name="unit[]" value="<?php  echo $row["unit"]; ?>" id=""> </td>
                                            <td><input type="number" name="rate[]" value="<?php  echo $row["rate"]; ?>" steps="0.1" id=""></td>
                                            <td><label for="" onclick ="removeRow('f<?php  echo $row['id']; ?>')"> remove</label></td>
                                        </tr>
                                    <?php
                                
                                $count++;
                            }
                            $temp= 1;
                        ?>
                        <tr>
                            <td>
                                <?php echo $count; ?>
                            </td>
                            <td>
                                Site inspection for structural observation   
                            </td>
                            <td>Per Day  </td>
                            <td><input type="number" min='0' steps='0.1' name='siso_expenses'  value="<?php echo $siso_expenses; ?>" ></td>
                        </tr>
                        <tr>
                            <td><?php   echo $count."".$temp;?></td>
                            <td>Air Tickets and oter travel expenses    </td>
                            <td> </td>
                            <td><input type="number" min='0' steps='0.1' name='travels_expenses'  value="<?php echo $travels_expenses; ?>" ></td>
                        </tr>
                        <tr>
                            <td><?php $temp+=1; echo $count."".$temp+1;?></td>
                            <td>Stay (Hotel Apartment)  </td>
                            <td></td>
                            <td><input type="number" min='0' steps='0.1' name='stay_expenses' value="<?php echo $stay_expenses; ?>" ></td>
                        </tr>
                    </table>
                    <div>
                        <script>

                            var feeBreakDownTable = document.getElementById("feeBreakDownTable");
                            var cnt = 1;
                            function setSrNo() {
                                let d = 0.1;
                                let countFeeBreakdown = 1;
                                for (let i = 1; i < feeBreakDownTable.rows.length; i++) {

                                    if (i < feeBreakDownTable.rows.length - 2) {

                                        feeBreakDownTable.rows[i].cells[0].innerHTML = countFeeBreakdown;
                                        ++countFeeBreakdown;
                                    } else {
                                        let m = countFeeBreakdown + d;
                                        d += 0.1;
                                        feeBreakDownTable.rows[i].cells[0].innerHTML = m;
                                    }
                                }
                            }
                            function createNewEntry() {
                                let countFeeBreakdown = 999999;

                                let trInnerHtml = "<td> " +
                                    countFeeBreakdown +
                                    "</td>" +
                                    "<td><input type='hidden' value='0' name='fId[]'>  <input type='text' name='workDescription[]' > </td>" +
                                    "<td> <input type='text' name='unit[]' > </td>" +
                                    "<td> <input type='number' steps='0.1' name='rate[]' > </td>" +
                                    "<td><label onclick='removeRow(\"" + cnt + "x21\")'> remove </label></td>";

                                let row = feeBreakDownTable.insertRow(1);
                                row.innerHTML = trInnerHtml;
                                row.id = cnt + "x21";
                                cnt++;
                                setSrNo();
                            }
                            function removeRow(id) {
                                let element = document.getElementById(id);
                                element.parentNode.removeChild(element);
                                setSrNo();
                            }
                        </script>
                    </div>
                   
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
                            <td class="crr">
                            Rate (<?php echo $curr; ?>)
                                <input type="hidden" name="curr" value="<?php echo $curr; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Senior Structural/ Principal</td>
                            <td>Per hour</td>
                            <td> <input type="number" step="0.1" name="price_e" id="" value="<?php echo $price_e; ?>"> </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Structural Designer</td>
                            <td>Per hour</td>
                            <td> <input type="number" step="0.1" name="price_f" id="" value="<?php echo $price_f; ?>"> </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Intermediate Designer</td>
                            <td>Per hour</td>
                            <td> <input type="number" step="0.1" name="price_g" id="" value="<?php echo $price_g; ?>"> </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Detailer/Draftsperson</td>
                            <td>Per hour</td>
                            <td> <input type="number" step="0.1" name="price_h" id="" value="<?php echo $price_h; ?>"> </td>
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
                <br>
                <br>
                <li>

                    <strong> Cost proposed and Timelines</strong>
                    <table>
                        <tr>
                            <td class="t-heading">Area of Project Work</td>
                            <td><input type="number" step="0.1" name="area_of_p" id="" value="<?php echo $area_of_p; ?>"></td>
                        </tr>
                        <tr>
                            <td class="t-heading">
                                Proposed Time
                            </td>
                            <td>
                                <input type="number" step="0.1" name="days" id="" value="<?php echo $days; ?>"> day(s)
                            </td>
                        </tr>
                        <tr>
                            <td class="t-heading">Proposed Cost (Rs)</td>
                            <td style="padding:0px">
                                <table style="width:100%">
                                    <tr>
                                        <td class="t-heading">Scope of Work</td>
                                        <td class="t-heading">Amount</td>
                                    </tr>
                                    <tr>
                                        <td>As per Point 1A</td>
                                        <td><input type="number" step="0.1" name="point_a" id="" value="<?php echo $point_a; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>As per Point 1B</td>
                                        <td><input type="number" step="0.1" name="point_b" id="" value="<?php echo $point_b; ?>"></td>
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
            <script>
                function setCurrency() {
                    let crr = document.getElementById("crr").value;
                    var curr = document.querySelectorAll(".crr");
                    for (let i = 0; i < curr.length; i++) {
                        curr[i].textContent = "Rate(" + crr + ")";
                    }
                }
            </script>
             <div class="images" id = "proposal_images">
                <label onclick="addImage()" for="">add image</label>

                <?php 
                require("db.php");
                $query ="SELECT id, proposal_id, title,file_name FROM images WHERE proposal_id = ?";

                $stmt = $conn->prepare($query);
              
                $stmt->bind_param("i", $proposal_number);

                $stmt->execute();
                $result = $stmt->get_result();

                echo mysqli_error($conn);
                while($row = $result->fetch_assoc())
                {
                    ?>
                        <span id="img<?php echo $row['id']; ?>">

                            <img class='display-img' src="uploads/<?php echo $row['file_name']?>" alt="no image">
                            <label for=""><?php echo $row['title']; ?></label>
                            <input type="hidden" name="file_name[]" value="uploads/<?php echo $row['file_name'];?>">
                            <input type="hidden" name="prev_image_id[]" value="<?php echo $row['id'];?>">
                            <label for="" onclick = "removeImage('img<?php echo $row['id'] ;?>')" >remove</label>
                        </span>
                    <?php
                }
            ?>


            </div>
            <script>
                var imgCount = 10000;
                function addImage()
                {
                    let imgCode = "img";
                    imgCount++;
                    let imgId= imgCode+imgCount;
                    let span = document.createElement("span");
                    span.id = imgId;
                    span.setAttribute("class", "p-image");

                    let img = document.createElement("input");
                    img.type="file";
                    img.name = "file[]";

                    let imgFile = document.createElement('img');
                    imgFile.setAttribute('class','display-img');
                    
                    let titleInput= document.createElement('input');
                    titleInput.setAttribute('type', 'text');
                    titleInput.setAttribute('name', 'title[]');

                    img.onchange = evt => {
                        const [file] = img.files
                        if (file) {
                            imgFile.src = URL.createObjectURL(file)
                        }
                    }

                    span.append(imgFile);
                    span.append(img);
                    span.append(titleInput);

                    let label = document.createElement("label");
                    label.setAttribute("onclick", "removeImage('"+imgId+"')");
                    label.textContent ="remove";

                    span.appendChild(label);


                    let labelCount = document.createElement("label");
                    labelCount.textContent =imgCount;
                    span.appendChild(labelCount);

                    let p_images = document.getElementById("proposal_images");
                    p_images.append(span);

                }

                function removeImage(id){
                    document.getElementById("proposal_images").removeChild(document.getElementById(id));
                }
            </script>
             <img class="png3" src="img/footer.png" style="margin-top:20px;">
            
            <input type="submit" value="submit">
        </form>
    <?php
        }
    ?>

</body>

</html>