<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <script src="https://kit.fontawesome.com/143173e95a.js" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
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
    <form class="m-container" method="POST" action="template.php" enctype="multipart/form-data">
        <div style="width:722px;">
            <img class="png2" src="img/2.png">
        </div>
        <img src="" alt="">
        <div class="para">
            <h1>Proposal for Structural Engineering Design Services</h1>
            <h2>
                <strong>Subject:</strong>
                <strong style="color: cornflowerblue;">
                    <input type="text" name="subject" id="" placeholder="Type the subject">
                </strong>
            </h2>
            <span style="display:flex; width: 100%;justify-content: space-between;">
                <?php
            require "db.php";
             $maxProposalId=0;
             $queryMaxProposalId="SELECT max(proposal_number) as proposal_number FROM proposal";
             $result=$conn->query($queryMaxProposalId);
             foreach($result as $row){
                 $maxProposalId=$row['proposal_number'];
             }
             $maxProposalId= $maxProposalId+1;
            ?>
                <h2>Proposal No :2022-
                    <?php  echo $maxProposalId ; ?> <input type="hidden" name="proposal_number"
                        value="<?php echo $maxProposalId; ?>">
                </h2>
                <h2>Revision : 1 <input type="hidden" name="revision_number" value="1"></h2>
            </span>
            <div>
                Dear <input type="text" name="salutation" id="" placeholder="Type the salutation">,<br>
                Further to your request and further to our recent correspondence, SteelSoft Consulting Services LLP
                (Formerly Samyak Consulting Services) proposes to provide you with structural engineering design
                services
                for the above noted project. <br>
                As part of this work, we will provide structural engineering design and specifications for this project
                as
                required to meet the requirement of the
                <div id="selectMenu1" class="selectMenu" multiple="false">
                    <div class="display" id="display"></div>
                    <select name="" id="select"
                        onchange="selection('select', 'customEntry', 'local', 'display', 'input', 'selectMenu1')">
                        <option value="-">select</option>
                        <option value="a"> option a</option>
                        <option value="d"> option D</option>
                        <option value="add">Custom Entry</option>
                    </select>
                    <div class="input-section-1" id="input" style="display: none;">
                        <input type="text" name="" id="customEntry" class="inp" placeholder="custom entry">
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
                        <div class="selection" id="displaya"></div>
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
                        <div class="selection" id="displayb"></div>
                        <select name="" id="selectb"
                            onchange="selection('selectb', 'customEntryb', 'bPart[]', 'displayb', 'inputb', 'selectMenu3')">
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
                        var count = 999;
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

                        function cancel(inpSection, selectId) {
                            document.getElementById(inpSection).style.display = "none";
                            document.getElementById(selectId).style.display = "";
                        }
                        '', 'select', 'customEntry', 'local', 'display', 'input'
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
                    <option value="Rs">Rs</option>
                    <option value="U.S.D">U.S.D.</option>
                </select>


                <label for="" onclick="createNewEntry()" style="border-radius:5px; padding:5px; border:1px solid lightgrey; display:block; width:160px; text-align:center; margin: 5px 0px;" >Add new entry</label>
                <table id="feeBreakDownTable">
                    <tr class="t-heading">

                        <td>S.NO</td>
                        <td>Description of work</td>
                        <td>Unit</td>
                        <td class="crr">Rate (Rs)</td>

                    </tr>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            Site inspection for structural observation   
                        </td>
                        <td>Per Day  </td>
                        <td><input type="number" min='0' steps='0.1' name='siso_expenses'></td>
                    </tr>
                    <tr>
                        <td>1.1</td>
                        <td>Air Tickets and oter travel expenses </td>
                        <td> </td>
                        <td><input type="number" min='0' steps='0.1' name='travels_expenses'></td>
                    </tr>
                    <tr>
                        <td>1.2</td>
                        <td>Stay (Hotel Apartment)  </td>
                        <td></td>
                        <td><input type="number" min='0' steps='0.1' name='stay_expenses'></td>
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
                            let countFeeBreakdown = 1;

                            let trInnerHtml = "<td>" +
                                countFeeBreakdown +
                                "</td>" +
                                "<td> <input type='text' name='workDescription[]' > </td>" +
                                "<td> <input type='text' name='unit[]' > </td>" +
                                "<td> <input type='number' steps='0.1' name='price[]' > </td>" +
                                "<label onclick='removeRow(\"" + cnt + "x21\")'> remove </label>";

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
                        <td class="crr">Rate(Rs)</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Senior Structural/ Principal</td>
                        <td>Per hour</td>
                        <td> <input type="number" step="0.1" name="price_e" id=""> </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Structural Designer</td>
                        <td>Per hour</td>
                        <td> <input type="number" step="0.1" name="price_f" id=""> </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Intermediate Designer</td>
                        <td>Per hour</td>
                        <td> <input type="number" step="0.1" name="price_g" id=""> </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Detailer/Draftsperson</td>
                        <td>Per hour</td>
                        <td> <input type="number" step="0.1" name="price_h" id=""> </td>
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
                        <!-- area of project -->
                        <td class="t-heading">Area of Project Work</td>
                        <td><input type="number" step="0.1" name='area_of_p'></td>Sq.ft
                    </tr>
                    <tr>
                        <td class="t-heading">
                            Proposed Time
                        </td>
                        <td>
                            <input type="number" step="0.1" name="days" id=""> day(s)
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
                                    <!-- see pointA -->
                                    <td>As per Point 1A</td>
                                    <td><input type="number" min='0' steps='0.1' name='point_a'></td>
                                </tr>
                                <tr>
                                    <!-- see PointB -->
                                    <td>As per Point 1B</td>
                                    <td><input type="number" min='0' steps='0.1' name='point_b'></td>
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

         
        <img class="png3" src="img/3.png">
        <input type="submit" value="submit">
    


</body>

</html>