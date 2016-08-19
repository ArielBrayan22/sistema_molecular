<!DOCTYPE html>
<html>
<head>
<body>
<a href="" id="re" onclick="cambiar();">aaa</a>
<div id="textDiv">
    
    <a href="" id="re2" onclick="cambiar();">aaa</a>

</div>

<script type="text/javascript">
    
    function cambiar(){
         var div = document.getElementById("textDiv");
         var a = document.getElementById("re2");
         a.textContent="cambio";

        
    }

</script>
</body>
</html>