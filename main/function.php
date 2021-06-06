<?php
require_once "phpMailer/PHPMailerAutoload.php";
function clean($string){
    return htmlentities($string);
}
function redirect($location){
    return header("Location: {$location}");
}
function set_message($message){
    if(!empty($message)){
        $_SESSION['message']=$message;
    }
    else{
        $message="";
    }
}
function roundUp($num){

    if(is_float((float)$num)){
        $roundNum=round($num,2);
        return $roundNum;
    }
    else{
        $roundNum=round($num,2);
        return $roundNum;
    }

}
function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
function token_generator(){
    return $_SESSION['token']= md5(uniqid(rand(),true));
}
function validation_error_message($error_message){
    $error_message=<<<DELIMITER
<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Alert!</h4>
						$error_message
</div>
DELIMITER;
    return $error_message;

}
function user_login(){
    $error =[];
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email=clean($_POST['email']);
        $password=clean($_POST['password']);
        $remember=clean(isset($_POST['remember']));
        $token=$_POST['token'];
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            'secret' => "6Lfn-skUAAAAAOmqEMd-dkv-XgKRWju3P_H3MFAN",
            'response' => $token,
            // 'remoteip' => $_SERVER['REMOTE_ADDR']
        ];
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $res = json_decode($response, true);
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
    $res['success']=true;
}
        if($res['success'] == false) {
            
            $error[]="You are robot";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Invalid email format";
        }

        if($password==""){
            $error[] = "Type Password";
        }
        if(count($error)!=0){
            $errormessage="<pre>".implode(",\n",$error)."</pre>";
            echo validation_error_message($errormessage);
        }
        else{
            if(login_user($email,$password)){
                redirect("otp.php");
            }
            else{
                echo validation_error_message("Type correct and password");
            }
        }
    }

}

function login_user($email,$password){
    $sql= "SELECT id,name,password,email from user_info where email='".escape($email)."'";
    $result= query($sql);
    if(row_count($result)==1){
        $row=fetch_array($result);
        $db_password=$row['password'];
        $db_id=$row['id'];
        $db_name=$row['name'];
        if(md5($password)===$db_password){
            $_SESSION['id']=$db_id;
            $_SESSION['name']=$db_name;
            $_SESSION['email']=$email;
            if(!send_otp($email,$db_name)){
                return false;
            }
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}
function send_otp($email,$name){
    $token=rand(10000,99999);
    if(send_mail($email,$token,$name)){
        setcookie("otp",$token,time() +300);
        return true;
    }
    else{
        return false;
    }


}
function send_mail($email,$otp,$name){
    $mail = new PHPMailer;

    $mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'server163.web-hosting.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'otp@sadekfillingstation.com';                 // SMTP username
    $mail->Password = 'zj8151609';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('otp@sadekfillingstation.com', 'OTP Verification');
    $mail->addAddress($email);     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Confirm Your Identity';
    $mail->Body    ="
<html>
<head>
<title></title>
</head>
<body>                
<div style='width:800px;background:#fff;border-style:groove;'>
<div style='width:50%;text-align:left;'><a href=''> <img 
src=\"https://i.ibb.co/BVT7C9R/padma.png\" height=70 width=55'></a>
<h2 style='width:50%;height:40px; text-align:right;margin:0px;padding-
left:390px;color:#ff0000;'>SADEK KHAN FILLING STATION</h2>

</div>
<hr width='100%' size='2' color='#A4168E'>
<div style='width:50%;height:20px; text-align:right;margin-
top:-32px;padding-left:390px;'><a href='your url' style='color:#00BDD3;text-
decoration:none;'> 
<h2 style='width:50%;height:40px; text-align:right;margin:0px;padding-
left:390px;color:#B24909;'>OTP Confirmation</h2>
<h4 style='color:#ea6512;margin-top:-20px;'> Hello, " .$name."
</h4>
<p>We're excited to have you get started. First, you need to confirm your account. Just copy this otp and paste it. </p>
<h1><b>".$otp."</b></h1>
<hr/>
<hr width='100%' size='1' color='black' style='margin-top:10px;'>                                      
</div> 
<h4>Address : <h4/><p>6 Sadarghat - Gabtoli Rd, Dhaka</p>
</div>              
</body>
</html>";

    if(!$mail->send()) {
        set_message('Message could not be sent.');
        set_message('Mailer Error: ' . $mail->ErrorInfo);
        return false;
    } else {
        set_message($otp);
        return true;
    }
}
function after_otp(){
   // set_message("cookie ".isset($_COOKIE["otp"])."cookie value ".$_COOKIE["otp"]."post ".clean($_POST["otp"]));
    if($_SERVER['REQUEST_METHOD']=="POST") {
        if(submit_otp(clean($_POST["otp"]))) {
            redirect("index.php");
            setcookie("login","1",time() + (86400 * 30));
        }
        else {
            session_destroy();
            redirect("login.php");
        }

    }
}
function submit_otp($otp){
    if(isset($_COOKIE["otp"])){
            if($otp==$_COOKIE["otp"]){
                setcookie("otp", '', time()-1);
                return true;
            }
            else{
                return false;
            }
    }
}

function logged_in(){
    if(isset($_SESSION['id'])&&isset($_COOKIE["login"])){
        return true;
    }
    else{
        return false;
    }
}
?>