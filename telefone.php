
            
<html>
<head>
    <title>Mascara Telefone</title>
    <script type="text/javascript">
        function ipet(telefone){ 
            if(telefone.value.length == 0)
                telefone.value = '(' + telefone.value; 

            if(telefone.value.length == 3)
                telefone.value = telefone.value + ') ';

            if(telefone.value.length == 10)
                telefone.value = telefone.value + '-'; 
  
}
    </script>
 
</head>
    <body>
 
        Telefone: <input type="text" name="telefone" id="telefone" size="20" maxlength="15" onkeypress="ipet(this)"> 
 
    </body>
</html>