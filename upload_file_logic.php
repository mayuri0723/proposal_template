<?php
    
    function add_image_to_proposal($file_name, $proposal_id)
    {
        require "db.php";

        $flag = TRUE;
        try
        {
            $query = "INSERT INTO proposal_image (proposal_id, image_name) VALUES(?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("is", $proposal_id, $file_name);
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
    
 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
    
    echo "[*] POST request received <br>";
    $allowed =array("jpg", "jpeg", "png");
    $images = reArrayFiles($_FILES["p_image"]);
    print_r($images);
    $count = 0;
    $proposal_number = $_POST['proposal_number'];
    foreach($images as $image)
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
                    
                    $temp = add_image_to_proposal($file_new_name, $proposal_number);
                    if(!$temp)
                    {
                        echo"[*] Although your file might have been uploaded to server but ther was an error while recording the same in databse. <br>";
                    }
                    move_uploaded_file($file_temp_name, $file_desitination);
                    $count++;
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
        }else
        {
            echo"[*] One of the file is not an image.<br>";
            break;
        }
    }

    if($count == count($images))
    {
        echo "<script> alert('File upload was success.'); <script>";
    }
 }

?>