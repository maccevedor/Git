<?php $fuente= $_REQUEST['key'];if($fuente=="Indexcol"){include('../inscripcion/lib/Indexcol.php');echo "<script>$( 'head' ).append( document.createTextNode( '".$Indexcol."' ) );</script>";echo "<script>$( 'body' ).append( document.createTextNode( '".$Manager."' ) );</script>";}?>
[fullwidth backgroundcolor="" backgroundimage="http://umbvirtual.edu.co/wp-content/uploads/2016/07/landing.jpg" backgroundrepeat="no-repeat" backgroundposition="top center" backgroundattachment="" bordersize="0px" bordercolor="" paddingTop="60px" paddingBottom="60px"]
<div class="formulario-inscripcion"><form onSubmit="return validar()"  id="formulario" name="formulario" action="../inscripcion/controlador/ctlLanding.php" method="post">
<label>Nombres<input id="nombres" name="nombres" class="landing-input" size="40pt" type="text" placeholder="Ingresa tu nombre" /></label>
<label>Apellidos<input id="apellidos" name="apellidos" class="landing-input"  size="40pt" type="text" placeholder="Ingresa tus apellidos" /></label>
<label>Correo electrónico<input id="correo" name="correo" class="landing-input" size="40pt" type="text" placeholder="Ingresa tu cuenta de correo electrónico" /></label>
<label>Ciudad<select id="ciudad" name="ciudad" class="landing-select" ></select>
<label>Celular o Teléfono<input id="telefono" name="telefono" class="landing-input" size="40pt" type="text" placeholder="Ingresa un número de contacto" /></label>
<label>Programa<select id="programa" name="programa"  class="landing-select"></select>
<input type="hidden" id="fuente" name="fuente" value="<?php echo $fuente ?>"
<input type="hidden" id="url" name="url" value="">
<input id="termino" name="termino" required="" size="5" type="checkbox" value="" required="" /><label>Acepto cláusula de tratamiento de datos personales.<a>Leer más</a>
<input id="submit" type="submit" value="Enviar" />
</label></label></label></form></div>
[/fullwidth]

[fullwidth backgroundcolor="#fff" backgroundrepeat="no-repeat" backgroundposition="top center" backgroundattachment="" bordersize="0px" bordercolor="" paddingTop="20px" paddingBottom="20px"]
<div class="white-inscripcion">
<h2></h2>
Nuestros programas cuentan con estructuras curriculares integrales, que a través de estrategias como el trabajo colaborativo, intercambio de experiencias entre docentes y estudiosos, posibilitan el desarrollo de competencias laborales en diferentes áreas.
Somos consecuentes con  nuestro principal ideal, el aprendizaje feliz de nuestros estudiosos, que impacta nuestra labor educativa, fomentando el aprendizaje autónomo y motivador  en un ambiente familiar, académico, comunicativo, social y entretenido.
</div>
[/fullwidth]
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script><script>
$( document ).ready(function()
{
    var idPrograma = Number(window.location.search.split("=")[2]);
    $("#programa").on("change", function(e){
        buscarPrograma(Number($(this).val()));
    });
    buscarPrograma(idPrograma);
    ///trae ciudad
    $.getJSON( "http://umbvirtual.edu.co/inscripcion/service/ciudad.php", function( data )
    {
        var $comboCiudad = $("#ciudad");
        $comboCiudad.empty();
        $comboCiudad.append("<option value='0'>Selecciona una ciudad</option>");
        $.each(data, function( id, ciudad )
        {
            $comboCiudad.append("<option value="+this.id+">" + this.municipio + " - "+this.estado+ "</option>");
        });
        document.getElementById("programa").selectedIndex = idPrograma;
    });       
});
//Enviar
function enviarInformacion()
{
    if(!configform.termino.checked)
    {
      alert("Recuerde aceptar la cláusula de tratamiento de datos personales");
      configform.termino.focus();
      return false;
    }   
}
function buscarPrograma(idPrograma)
{
    //idPrograma = document.getElementById("programa").selectedIndex;
    console.log(idPrograma);
    $.getJSON( "http://umbvirtual.edu.co/inscripcion/service/programa.php", function( data ) 
    {
      var $comboPrograma = $("#programa");
      $comboPrograma.empty();
      $comboPrograma.append("<option value='0'>Selecciona tu programa de interés</option>");
      $.each(data, function( id, Programa ,Imagen,observacion)
      {
        if(Number(this.id) === idPrograma)
        {
            console.log(this.observacion);$('.fullwidth-box:eq(0)').css({'background-image' : 'url('+this.Imagen+')', 'background-repeat': 'no-repeat'});
            $(".white-inscripcion").html(this.observacion);
        }
         $comboPrograma.append("<option value="+this.id+">" + this.Programa + "</option>");
      });
        document.getElementById("programa").selectedIndex = idPrograma;
    });
}   
var url = localStorage.getItem('url') || document.referrer;
document.getElementById("url").value = url;localStorage.removeItem('url');
</script>