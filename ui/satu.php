<head>
  <script src="jquery-1.7.1.min.js" type="text/javascript"></script>
  <script src="jquery.tools.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
           $("#1").hide();
           $("#2").hide();

           $("#button1").on("click",function(){
           	  $("#1").show();
           	  $("#2").hide();
           });

           $("#button2").on("click",function(){
           	  $("#2").show();
           	  $("#1").hide();
           });
      });
  </script>
</head>
<body>
	<input type="button" id="button1" value="Button 1"/>
	<input type="button" id="button2" value="Button 2"/>
    <div id="1">
    	AKU SATU
    </div>

    <div id="2">
    	SAYA DUA
    </div>
</body>