<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$to = "Contact@prestigegroupconstruction.com";
$subject = "Fixflipflop - Contact";


$data = file_get_contents('php://input');
$user = json_decode($data, TRUE);



if($data && $user) {
  $name = $user['name'];
  $email = $user['email'];
  $phone = $user['phone'];
  $property = $user['property'];
  $reason = $user['reason'];
  
  $message = "
  <html>
  <head>
  <title>$subject</title>
  </head>
  <body>
  <p>This email submitted from Fixflipflop.com</p>
  <table style='text-align:left;'>
    <tr>
      <th>Name</th>
      <th>:</th>
      <td>$name</td>
    </tr>
    <tr>
      <th>Email</th>
      <th>:</th>
      <td>$email</td>
    </tr>
    <tr>
      <th>Phone Number</th>
      <th>:</th>
      <td>$phone</td>
    </tr>
    <tr>
      <th>Property Address</th>
      <th>:</th>
      <td>$property</td>
    </tr>
    <tr>
      <th>Reason For Selling</th>
      <th>:</th>
      <td>$reason</td>
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
