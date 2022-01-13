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
    <style>
        .tag{
            display:block;
            border: 1px solid lightgrey;
            border-radius: 2px;
            margin:0px 5px;
            height:fit-content;
            padding:0px 5px;
        }
        .tag label:hover{
            text-decoration: red;
            cursor: not-allowed;
      
        }
        .display{
            display:inline-flex;
        }
        .simple-btn{
            border: 1px solid grey;
            border-radius: 2px;
            padding:0px;
            cursor: pointer;
            box-shadow: 0px 0px 1px 0px grey inset;
        }
        .inp{
            padding:2px;
        }
        select{
            margin: auto;
            padding:0px;
        }
        .input-section-1{
            margin:auto;
            display:inline-block;
        }
        .selectMenu{
            display:inline-flex;flex-wrap: wrap;
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
    <form class="m-container" method="POST" action="template.php">
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
                <h2>Proposal No :2022- <input type="number" name="proposal_number" id="" ></h2>
                <h2>Revision : <input type="number" name="revision_number" id=""></h2>
            </span>
            <div>
                Dear  <input type="text" name="salutation" id="" placeholder="Type the salutation">,<br>
                Further to your request and further to our recent correspondence, SteelSoft Consulting Services LLP
                (Formerly Samyak Consulting Services) proposes to provide you with structural engineering design
                services
                for the above noted project. <br>
                As part of this work, we will provide structural engineering design and specifications for this project
                as
                required to meet the requirement of the 
                <div id="selectMenu1" class="selectMenu" multiple="false">
                    <div class="display" id="display" ></div>
                    <select name="" id="select" onchange="selection('select', 'customEntry', 'local', 'display', 'input', 'selectMenu1')">
                        <option value="-">select</option>
                        <option value="a"> option a</option>
                        <option value="d"> option D</option>
                        <option value="add">Custom Entry</option>
                    </select>
                    <div class="input-section-1" id="input" style="display: none;">
                        <input type="text" name="" id="customEntry" class="inp" placeholder="custom entry" >
                        <label for="" onclick="add('', 'select',  'customEntry', 'local', 'display',  'input', 'selectMenu1')" class="simple-btn">add</label>
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
                        <div class="selection" id="displaya" ></div>
                        <select name="aPart[]" id="selecta" onchange="selection('selecta', 'customEntrya', 'aPart[]', 'displaya', 'inputa', 'selectMenu2')">
                            <option value="-">select</option>
                            <option value="a"> option a</option>
                            <option value="d"> option D</option>
                            <option value="add">Custom Entry</option>
                        </select>
                        <div class="input-section-1" id="inputa" style="display: none;">
                            <input type="text" name="" id="customEntrya" class="inp" placeholder="custom entry" >
                            <label for="" onclick="add('', 'selecta',  'customEntrya', 'aPart[]', 'displaya',  'inputa', 'selectMenu2')" class="simple-btn">add</label>
                            <label for="" onclick="cancel('inputa', 'selecta')" class="simple-btn">cancel</label>
                        </div>
                    </div>

                    <label for="" class="lentry">1B</label>
                    <div id="selectMenu3" multiple="true">
                        <div class="selection" id="displayb" ></div>
                        <select name="" id="selectb" onchange="selection('selectb', 'customEntryb', 'bPart[]', 'displayb', 'inputb', 'selectMenu3')">
                            <option value="-">select</option>
                            <option value="a"> option a</option>
                            <option value="d"> option D</option>
                            <option value="add">Custom Entry</option>
                        </select>
                        <div class="input-section-1" id="inputb" style="display: none;">
                            <input type="text" name="" id="customEntryb" class="inp" placeholder="custom entry" >
                            <label for="" onclick="add('', 'selectb',  'customEntryb', 'bPart[]', 'displayb',  'inputb', 'selectMenu3')" class="simple-btn">add</label>
                            <label for="" onclick="cancel('inputb', 'selectb')" class="simple-btn">cancel</label>
                        </div>
                    </div>
                   
                   <!-- js code -->
                    <script>
                        var count=999;
                        function selection(selectId, inputBox, nm, displayId, inpSection, selectMenu){
                            var val=document.getElementById(selectId).value;
                            if(val=="add"){
                                document.getElementById(inpSection).style.display="inline-block";
                                document.getElementById(selectId).style.display="none";
                            }else{
                                console.log("okay");
                                add(val,  selectId, inputBox,  nm, displayId, inpSection,selectMenu);
                            }
                            document.getElementById(selectId).options[0].selected=true;

                        }

                        function cancel(inpSection, selectId){
                            document.getElementById(inpSection).style.display="none";
                            document.getElementById(selectId).style.display="";
                        }
                                      '', 'select',  'customEntry', 'local', 'display',  'input'
                        function add(value,  selectId, inputBox,  nm, displayId, inpSection,selectMenu){
                            var display=document.getElementById(displayId);
                            var val="";
                            if (value==''){
                                val=document.getElementById(inputBox).value;
                            }else{
                                val=value;
                            }
                            var span=document.createElement("span");
                            span.setAttribute("id", count);
                            span.setAttribute("onclick", "remove("+count+", '"+selectId+"', '"+inpSection+"', '"+selectMenu+"')");
                            span.setAttribute("class", "tag")
                            count++;
                        
                            var inputHidden=document.createElement("input");
                            inputHidden.setAttribute("type", "hidden");
                            inputHidden.setAttribute("name", nm);
                            inputHidden.setAttribute("value", val);

                            span.append(inputHidden);
                            
                            var label=document.createElement("label");
                            label.textContent=val;

                            span.append(label);
                            display.append(span);
                            console.log(span);
                            if(document.getElementById(selectMenu).getAttribute("multiple")=='false'){
                                document.getElementById(selectId).style.display="none";
                                document.getElementById(inpSection).style.display="none";
                            }

                    }

                    function remove(id, selectId, inpSection, selectMenu){
                            document.getElementById(id).remove();
                            if(document.getElementById(selectMenu).getAttribute("multiple")=='false'){
                                document.getElementById(selectId).style.display="";
                                document.getElementById(inpSection).style.display="none";
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
                
                <table>

                    <tr class="t-heading">

                        <td>S.NO</td>
                        <td>Description of work</td>
                        <td>Unit</td>
                        <td class="crr">Rate (Rs)</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td> Structural Engineering Design Services (New)</td>
                        <td>Sq. Ft</td>
                        <td><input type="number"  step="0.1" name="price_a" id=""></td>
                    </tr>
                    <tr>
                        <td> 2</td>
                        <td> Foundation Design and detailing additionally for different Soil Bearing Capacity</td>
                        <td>Sq. Ft</td>
                        <td> <input type="number"  step="0.1" name="price_b" id=""> </td>
                    </tr>
                    <tr>
                        <td> 3</td>
                        <td> HR Connection Design, Fabrication Drawings and Checking</td>
                        <td>Per ton</td>
                        <td> <input type="number"  step="0.1" name="price_c" id=""> </td>
                    </tr>
                    <tr>
                        <td> 4</td>
                        <td> Site Inspection for Structural Observations</td>
                        <td>Per day</td>
                        <td> <input type="number"  step="0.1" name="price_d" id=""> </td>
                    </tr>
                    <tr>
                        <td> 4.1</td>
                        <td> Air Ticket & Other Travel Expenses</td>
                        <td></td>
                        <td>As per Actual</td>
                    </tr>
                    <tr>
                        <td> 4.2</td>
                        <td> Stay (Hotel/Apartment)</td>
                        <td></td>
                        <td>As per Actual</td>
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
                        <td class="crr" >Rate(Rs)</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Senior Structural/ Principal</td>
                        <td>Per hour</td>
                        <td> <input type="number"  step="0.1" name="price_e" id=""> </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Structural Designer</td>
                        <td>Per hour</td>
                        <td> <input type="number"  step="0.1" name="price_f" id=""> </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Intermediate Designer</td>
                        <td>Per hour</td>
                        <td> <input type="number"  step="0.1" name="price_g" id=""> </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Detailer/Draftsperson</td>
                        <td>Per hour</td>
                        <td> <input type="number"  step="0.1" name="price_h" id=""> </td>
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
                        <td>Various building (Area shall be calculated once received final dwg)</td>
                    </tr>
                    <tr>
                        <td class="t-heading">
                            Proposed Time
                        </td>
                        <td>
                            <input type="number"  step="0.1" name="days" id=""> days
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
                                    <td>See point 2</td>
                                </tr>
                                <tr>
                                    <td>As per Point 1B</td>
                                    <td>See point 2</td>
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
            function setCurrency(){
                let crr=document.getElementById("crr").value;
                var curr=document.querySelectorAll(".crr");
                for(let i=0;i<curr.length;i++){
                    curr[i].textContent="Rate("+crr+")";
                }
            }
        </script>
        <img class="png3" src="img/3.png">
        <!-- <img src="./foot_image.PNG" alt=""> -->
        <!-- <section>
            <h1>
                For more information,<br>
                get in touch with our team.
            </h1>
        </section>
        <section>
            <div class="part-1">
                <h1>SteelSoft Consulting Services LLP</h1>
                <h2>Block 3, Vihaan <br>
                    Pimple Nilakh, Pune-411007
                </h2>
                <h2>
                    <a href="">+918530191192</a><br>
                    <a href="">info@steelsoft-global.in</a><br>
                    <a href="">www.steelsoft-global.in</a><br>
                </h2>
            </div>
            <div class="part-2">
                <img src="" alt="">
                <h1>Steel Soft</h1>
                <hr>
                Design Engineering Innovation
            </div>
        </section>
        <section>
            <h2>Our Structural Design Presence Globally</h2>
            <img src="./map.PNG" alt="">
        </section> -->
        <input type="submit" value="submit">
    </form>


</body>
</html>
