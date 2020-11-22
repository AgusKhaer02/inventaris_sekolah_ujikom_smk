<?php
class smtpEmail{
    function send($prm_nama,$prm_email,$prm_subjek,$prm_isi){
        include('../../../assets/plugins/phpmailer/class.phpmailer.php');
        include('../../../assets/plugins/phpmailer/class.smtp.php');
        $mail = new PHPMailer();
    
        $mail->Host     = "ssl://smtp.gmail.com";
        $mail->Mailer   = "smtp";
        $mail->SMTPAuth = true;
    
        $mail->Username = "inventarisbarangsmkn3bjr@gmail.com"; 
        $mail->Password = "inventorysmk123";
        $webmaster_email = "inventarisbarangsmkn3bjr@gmail.com";
        $email2 = $prm_email;//email tujuan
        $name = $prm_nama; //nama tujuan
    
        $mail->From = $webmaster_email;
        $mail->FromName = "InventarisBarang SMKN 3 BANJAR";
        $mail->AddAddress($prm_email,$prm_nama);//email dan nama tujuan
        $mail->AddReplyTo($webmaster_email,"InventarisBarang SMKN 3 BANJAR");
        $mail->WordWrap = 50; 

        $mail->IsHTML(true); 
        $mail->Subject = $prm_subjek;
        $mail->Body = $prm_isi; 
        $mail->AltBody = "---"; 
        if(!$mail->Send())
        {
        echo "Mailer Error: " . $mail->ErrorInfo;
        }  
        else{
            #empty
        }
    }

}
?>