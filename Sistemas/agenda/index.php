<html lang="en">
<head>
  <meta charset="utf-8">
  <title>datepicker demo</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
 
<div id="datepicker"></div>
 
<script>
$( "#datepicker" ).datepicker(
{

           
		   onSelect: function (dateText, inst) {
                var date = $(this).val();
                alert(date);
            }
}
);
var currentDate = new Date();
$("#mydate").datepicker("setDate",currentDate);
</script>
 
</body>
</html>