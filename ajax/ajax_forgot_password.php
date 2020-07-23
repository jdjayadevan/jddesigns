<?php
include '../global/globalVariables.php';


if(isset($_REQUEST["recovery_email"])){
        
    
                    
         
                                        
                                    
                //$mail_id=findSuperAdminEmail();//E-mail ID of Super Admin(s)
                $mail_id='ganesh14311@gmail.com';//E-mail ID of registering Employee
                $pSubject="Khadi Kraft-Password Recovery";
                $content='<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';
                $content.='<br>';
                $pBody = '<table width="100%" style="width:100%" border="0" cellpadding="0" cellspacing="0" align="center">

                                            <tbody><tr>
                                                <td style="padding:10px 0 30px 0;text-align:center;width:80%;margin:auto">
                                                <h1 style="color:#2d2d2a;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;text-align:center;font-size:20px;width:80%;margin:auto">Hi xcxc</h1><br>
                                                <p style="color:#4d4d49;text-align:center;width:80%;margin:auto;font-size:16px;line-height:24px">Did you fogot your password and requested to recover it?<a style="text-decoration:none"></a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="padding:10px 0 30px 0;text-align:center;width:80%;margin:auto">
                                                <p style="color:#4d4d49;text-align:center;width:80%;margin:auto;font-size:24px;line-height:24px">Your verification code is <br> message</p>
                                                </td>
                                            </tr>
                                                <tr>
                                                <td style="padding:10px 0 30px 0;text-align:center;width:80%;margin:auto">
                                                <span style="text-decoration:none;width:100%;display:inline-block"><span style="color:white;background:#174988;padding:15px 20px;font-weight:bold;font-size:14px;border-radius:3px">Thank you!</span></span>
                                                </td>
                                            </tr>
                                            </tbody></table>'; //body html
                $content.=$pBody;
                $content.='<br>';
                $headers = "From: rajkumar <ganesh14311gmail.com> \r\n";
                                    
                                    
                                    
                                    
                // sendMail($mail_id,$pSubject,$content,$headers);
                $send_email = sendMail($mail_id,$pSubject,$content,$headers);

                echo ($send_email) ? 'success' : 'error';
    }




if(isset($_POST["verification"])){
        
        $verification=$_POST["verification"];
        $email=$verification["email"];
        $verification_code=$verification["verification_code"];
        $sql="SELECT * FROM customer_register WHERE email='$email' AND forgot_password='$verification_code'";
        $result=  mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                
            $message="success"; 
            
            }
            else{
                
            $message='<label class=" control-label" style="color:red">Enter the valid OTP</label>'; 
                
            }
        echo $message;
        
    }


if(isset($_POST["password_details"])){
            
            mysqli_begin_transaction($conn);
        
                $password_details=$_POST["password_details"];
                
                $new_password=$password_details["new_password"];
                $email=$password_details["email"];
                $options = ['cost' => 11, 'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM) ];
                $new_password=password_hash($new_password, PASSWORD_BCRYPT, $options);
                $sql="UPDATE `customer_register` SET `password`='$new_password' WHERE `email`='$email'";
                // fwrite($myfile, $sql);
                $result=  mysqli_query($conn, $sql);
                $success1=$result;
        
                    if ($success1){
                        mysqli_commit($conn);
                        $message="success"; 
                    }else{
                        mysqli_rollback($conn);
                        $message="error";
                    }

                echo $message;
        
    }

    // // email verification //
    // if(isset($_REQUEST["code_verification"])){

    //     $data=$_REQUEST["code_verification"];
        
    //     $email=$data["email"];
    //     $verification_code=$data["verification_code"];

    //     $sql2="UPDATE `del_address` SET name='$name_edit',mobile='$mobile_no_edit',pincode='$pincode_edit',locality='$locality_edit',delivery_address='$address_s_edit',city='$city_edit', state='$state_edit',land_mark='$landmark_edit',alternate_mobile='$alternate_mobile_edit',address_type='$address_type_edit' where id_no='$add_id'";
    //     $result2=mysqli_query($conn,$sql2);
    //     echo $email;
    
    //     if($result2){
    //         echo "address_edited";
    //     }
            
            
        
        
    //     }
    
    ?>