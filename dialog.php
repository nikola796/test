<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>dialog demo</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<body>
<button id="opener">open the dialog</button>
<div id="dialog" title="Dialog Title">I'm a dialog</div>
<script>
$( "#dialog" ).dialog({ autoOpen: false });
$( "#opener" ).click(function() {
$( "#dialog" ).dialog( "open" );
});
</script>
</body>
</html>
