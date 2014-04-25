<?php
session_start();
//echo '<pre>'.print_r($_SERVER, true).'</pre>';
if(isset($_POST['name']) && isset($_POST['password'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    if($name == 'admin' && $password = 'admin'){
        $_SESSION['is_logged'] === true;
        header('Location: index.php');
    }
 else {
        
    }
}
include './includes/header.php';
?>
  
 
 <div id="log">  
<form method="post" action="" id="form"> 
    <div id="back">
<div id="head">
    
    <header><h2>Login</h2></header>
    </div>
    Име<br> <input type="text" name="name" required><br>
    Парола<br> <input type="password" name="password" required><br>
    <input type="submit" value="Влез">
</div>
</form>
     </div>
        
        <!-- place your copyright text here -->
       <?php
       include './includes/footer.php';
       ?>
        <script>
        $(document).ready(function(){
            
                function showMessage(msg){
			
			$.dW.createDialog("Easy Treasurer", msg, {
				buttons: {
					"Ok" : function(){
						 $.dW.destroyDialogs();
						}
					},
				modal: true

				});
			
		}
                $("#btn").on('click',function(e){
                // e.preventDefault();
                  showMessage("Unable to find username, Please try again.");
                  
                });
                $("#form").validate();
        });
        </script>

