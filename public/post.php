<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$to = "mail@mdrashid.com";
$to = "Contact@prestigegroupconstruction.com";
$subject = "Fixflipflop - Contact";


$data = file_get_contents('php://input');
$user = json_decode($data, TRUE);



if($data && $user) {
  $name = $user['name'];
  $email = $user['email'];
  $phone = $user['phone'];
  $property = $user['property'];
  $rehab = $user['rehab'];
  $current = $user['current'];
  $post = $user['post'];
  $budget = $user['budget'];
  $status = $user['status'];
  
  $message = "
  <html>
  <head>
  <title>$subject</title>
  </head>
  <body>
  <p>This email submitted from Fixflipflop.com</p>
  <table style='text-align:left;'>
    <tr>
      <th>Name</th><th>:</th><td>$name</td>
    </tr>
    <tr>
      <th>Email</th><th>:</th><td>$email</td>
    </tr>
    <tr>
      <th>Phone Number</th><th>:</th><td>$phone</td>
    </tr>
    <tr>
      <th>Property Address</th><th>:</th><td>$property</td>
    </tr>
    <tr>
      <th>Rehab work needed</th><th>:</th><td>$rehab</td>
    </tr>
    <tr>
      <th>Estimate current value</th><th>:</th><td>$current</td>
    </tr>
    <tr>
      <th>Estimated post rehab value</th><th>:</th><td>$post</td>
    </tr>
    <tr>
      <th>Construction budget</th><th>:</th><td>$budget</td>
    </tr>
    <tr>
      <th>Deal status</th><th>:</th><td>$status</td>
    </tr>
  </table>
  </body>
  </html>
  ";

  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: Fixflipflop <admin@fixflipflop.com>' . "\r\n";


  if(mail($to,$subject,$message,$headers)){
    header('X-PHP-Response-Code: 200', true, 200);
  }else{
    header('X-PHP-Response-Code: 501', true, 501);
  }
} else {
  header('X-PHP-Response-Code: 501', true, 501);
}
