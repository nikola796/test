<!doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../account/css/style.css">
        <link rel="stylesheet" href="../account/Manager/jquery-ui/css/ui-lightness/jquery-ui-1.10.1.custom.min.css">
        <script src="../account/Manager/jquery-ui/js/jquery-1.9.1.js"></script>
        <script src="../account/Manager/jquery-ui/js/jquery-ui-1.10.1.custom.min.js"></script>
        <script src="../account/js/jquery.dialogWrapper.2.1.js"></script>

        <script>
            $(document).ready(function() {

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
                $("#btn").click(function(){
                    showMessage("Unable to find username, Please try again.");
                });
});
               
            
        </script>
        <style>
           
        </style>
    </head>
    <body>
        <input type="button" id="btn" value="click">
       
    </body>
</html>

