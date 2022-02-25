

<!DOCTYPE html>
<html lang="">

<head>
        <link href="assets/img/download.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <title>HACO Shipyard</title>
  <style> 

button{
border: none;
color: black;
padding: 2px 22px;
text-align: center;
border-radius: 8px;
font-size: 50px;
}

.button1{
  background-color: #f44336;;
}
.button2{
  background-color: #008CBA;
}

 
</style>
    </head>
        <script language="javascript">
            function Clickheretoprint()
            { 
              var disp_setting="toolbar=yes,menubar=yes"; 
              var content_vlue = document.getElementById("record_container").innerHTML; 
              
              var docprint=window.open("","",disp_setting); 
               docprint.document.open(); 
               docprint.document.write('<html><head><title>HACO Shipyard DATA</title>'); 
               docprint.document.write('</head><body onLoad="self.print()">');          
               docprint.document.write(content_vlue);          
               docprint.document.write('</body></html>'); 
               docprint.document.close(); 
               docprint.focus(); 
            }
        </script>
<body>
    