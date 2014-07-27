<?php 
if(isset($_POST['email'])) {
    $email_to = "huyle333@bu.edu";
    $subject_subject = "huyle.me message"; 
    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
    if(!isset($_POST['contact-name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['contact-sub']) ||
        !isset($_POST['contact-msg'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
 
     
 
    $contact_name = $_POST['contact-name']; // required
    $email_from = $_POST['email']; // required
    $contact_sub = $_POST['contact-sub']; // not required
    $contact_msg = $_POST['contact-msg']; // required
 
     
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp, $email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp, $contact_name)) {
    $error_message .= 'The Full Name you entered does not appear to be valid.<br />';
  }
  if(strlen($contact_msg) < 2) {
    $error_message .= 'The Message you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Full Name: ".clean_string($contact_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Subject: ".clean_string($contact_sub)."\n";
    $email_message .= "Message: ".clean_string($contact_msg)."\n";
 
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>

Thank you for contacting me. I will be in touch with you very soon. Sincerely, Huy Le
 

<?php
 
}
 
?>