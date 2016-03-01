<?php
  if (isset($_POST['message'])) {
    $email = $_POST['email'];
    $message = $_POST['message'];
    doLog("test");
    doLog($email);
    doLog($message);

    $to      = 'ryanmccarter721@gmail.com';
    $subject = 'Enquiry - ' . $email;
    $headers = 'From: ryanmccarter@hotmail.co.uk' . "\r\n" .
        'Reply-To: ryanmccarter@hotmail.co.uk' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
  }
  else{
    echo "ERROR";
    doLog('error');
  }

  function doLog($text)
  {
    // open log file
    $filename = "test.log";
    $fh = fopen($filename, "a") or die("Could not open log file.");
    fwrite($fh, date("d-m-Y, H:i")." - $text\n") or die("Could not write file!");
    fclose($fh);
  }
?>