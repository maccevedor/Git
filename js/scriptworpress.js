$( document ).ready(function()
{
    var idPrograma = Number(window.location.search.split("=")[2]), fuenteURL = window.location.search.split("=")[1], validaFuente = fuenteURL.substr(0, fuenteURL.length - 3).toLowerCase();
	//console.log(fuenteURL.substr(0, fuenteURL.length - 3));
	$('#fuente').val(validaFuente);
	        $("#programa").on("change", function(e){
	        buscarPrograma(Number($(this).val()), false);
	        console.log("cambia combo");
	    });
		//Para indicar la fuente...
	if(validaFuente === "indexcol")
	{
		  //console.log("Indexcol");
		var Manager="<!-- Google Tag Manager --><noscript><iframe src='//www.googletagmanager.com/ns.html?id=GTM-TX8LGP' height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TX8LGP');</script><!-- End Google Tag Manager -->";
		$("head").append(Manager);
	}
	buscarPrograma(idPrograma, true);
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
        //document.getElementById("programa").selectedIndex = idPrograma;
    });
    //debugger;
    var url = localStorage.getItem('url') || document.referrer;
	//console.log(url);
	$("#url").val(url);
	localStorage.removeItem('url');       
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
function buscarPrograma(idPrograma, carga)
{
    //idPrograma = document.getElementById("programa").selectedIndex;
    console.log(idPrograma);
    $.getJSON( "http://umbvirtual.edu.co/inscripcion/service/programa.php", function( data ) 
    {
      if(carga)
      {
        var $comboPrograma = $("#programa"); 
        $comboPrograma.empty();
        $comboPrograma.append("<option value='0'>Selecciona tu programa de interés</option>");
     }
      $.each(data, function( id, Programa ,Imagen,observacion)
      {
        if(Number(this.id) === idPrograma)
        {
            //console.log(this.Imagen);
            $('.fullwidth-box:eq(0)').css({'background-image' : 'url('+this.Imagen+')', 'background-repeat': 'no-repeat'});
            $(".white-inscripcion").html(this.observacion);
        }
        if(carga)
        {
            $comboPrograma.append("<option value="+this.id+">" + this.Programa + "</option>");
        }
      });
        $("#programa").val(idPrograma);
    });
}
