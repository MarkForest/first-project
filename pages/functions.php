<?php
$users = 'pages/users.txt';
function err_log($text)
{
    echo "<h3><span style='color: red'>$text</span></h3>";
    return false;
}
function register ($name, $pass, $email)
{
    $name = trim(htmlspecialchars($name));
    $pass = trim(htmlspecialchars($pass));
    $email = trim(htmlspecialchars($email));

    if ($name == '' || $pass == '' || $email == '') {
        return err_log('Fill All Required fields');
    }

    global $users;
    $file = fopen($users, 'a+');
    while($line = fgets($file)) {
        $readname = substr($line, 0, strpos($line, ':'));
        if ($readname == $name) {
            return err_log('Such Login Name Is Already Used!');
        }
    }
    $pass = md5($pass);
    $line = "$name:$pass:$email\n";
    fputs($file, $line);
    fclose($file);
    return true;
}