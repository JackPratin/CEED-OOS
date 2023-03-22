<?php 
    function upload($name){
        require("config.php");
        //define a maxim size for the uploaded images in Kb
        define ("MAX_SIZE","1000");

        //This function reads the extension of the file. It is used to determine if the
        // file  is an image by checking the extension.
        function getExtension($str) {
            $i = strrpos($str,".");
            if (!$i) { return ""; }
            $l = strlen($str) - $i;
            $ext = substr($str,$i+1,$l);
            return $ext;
        }

        $errors = 0;
        $message = "";
        $image_name = '';

        //getting the id and adding 1

        // $query = "SELECT item_id FROM custom_cakes ORDER BY item_id DESC Limit 1";
        // $res = mysqli_query($con,$query);
        // if( $row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
        //     $id = $row['item_id']+1;
        // }
        // else{
        //     $id = 0;
        // }

        if($_FILES['image'] != NULL){
            //reads the name of the file the user submitted for uploading
            $image=$_FILES['image']['name'];

            //if it is not empty
            if ($image){
                //get the original name of the file from the clients machine
                $filename = stripslashes($_FILES['image']['name']);
                //$filename = stripslashes($pic);
                //get the extension of the file in a lower case format
                $extension = getExtension($filename);
                $extension = strtolower($extension);

                //if it is not a known extension, we will suppose it is an error and 
                // will not  upload the file,  
                //otherwise we will do more tests
                if (($extension != "jpg") && ($extension != "jpeg") && ($extension !="png") && ($extension != "gif")){
                    //print error message
                    $message = 'Unknown extension!';
                    $errors=1;
                }
                else{
                    //get the size of the image in bytes
                    //$_FILES['image']['tmp_name'] is the temporary filename of the file
                    //in which the uploaded file was stored on the server
                    $size=filesize($_FILES['image']['tmp_name']);
                    //$size=filesize($pic);

                    //compare the size with the maxim size we defined and print error if bigger
                    if($size > MAX_SIZE*2048){
                        $message = 'You have exceeded the size limit!';
                        $errors=1;
                    }

                    //we will give an unique name, for example the time in unix time format
                    $image_name=$name.'.'.$extension;

                    //the new name will be containing the full path where will be stored (images
                    //folder)
                    $newname="../css/item images/".$image_name;
                    $name = "css/item images/".$image_name;

                    //we verify if the image has been uploaded, and print error instead
                    $copied = copy($_FILES['image']['tmp_name'], $newname);
                    //$copied = copy($pic, $newname);
                    if(!$copied){
                        $message = 'Upload unsuccessful!';
                        $errors=1;
                        return false;
                    }
                }
                return $name;
            }

            //If no errors registred, print the success message
            if(!$errors){
                if($image_name == null)
                echo "hakdog";
                return false;
                    // $image_name = 'no image';

                // save($image_name);
            }
            else{
                return false;
                // echo"<script>alert('$message.')</script>";
                // echo '<script>window.history.go(-1)</script>';
            }
        }
        else{
            return false;
            // save("No image");
        }
    }
?>