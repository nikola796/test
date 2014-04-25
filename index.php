<?php
if($_SESSION['is_logged'] !== true){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo '<pre>'.print_r($_POST, true).'</pre>';
        ?>
    </body>
</html>
