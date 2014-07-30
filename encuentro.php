<?php
include("view/header.php");
?>
<body>
      
      <div class="form-signin">        
          <form action="webservice.php" method="post">
              <h1>Encuentro Nacional de Estudios UMBVirtual</h1><br>
    <div class="col-md-4">
        Digita tu identificación para inscribirte:
        <div class="comment-input">
            <input type="text" name="identificacion" placeholder="Digita tu Cedula sin puntos ni espacios"/><br>
    </div>
    </div>    
        <div class="col-md-5">
            <input type="submit" value="Inscribete" class="button red"/><br>
        </div>
			
</form>
    </div>      
          
          
      <div class="container"  align="center">
        <img src="img/estudiosos.png" alt="Inscríbete" />
      </div>
    

<?php
include("view/footer.php");
?>