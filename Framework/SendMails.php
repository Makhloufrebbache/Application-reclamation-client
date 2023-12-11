<?php

class SendMail{
	
	public function __construct(){
				}
				
/**********************************************************************
                         Envoi d'email
   *pour inclure plusieurs Senders: (sendr1, sender2, ..., senderN)
**********************************************************************/
public function send_email($message, $Sender, $dest, $objet){
	//Header 
   $mail_mime = "MIME-Version: 1.0\n";
   $mail_mime .= "Content-Type: multipart/mixed;\n";
   $mail_mime .= " boundary=\"----=_NextPart\"\n\n";
   //Message
   $texte = "------=_NextPart\n";
   $texte .= "Content-Type: text/html; charset=\"utf-8\"\n";
   $texte .= "Content-Transfer-Encoding: 8bit\n\n";
   $texte .= stripslashes($message); 
   $texte .= "\n\n";
$i = count($dest);
 for ($j=0; $j<$i; $j++){ 
   @mail($dest[$j], $objet, $texte.$attachement, "From: $Sender\n".$mail_mime);
    }
	}// end send email

}//end SendMail
