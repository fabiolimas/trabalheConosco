<?php
	include 'cabecalho2.php';
	include 'model/Oportunidades.php';
	$vagas = new Oportunidades();
?>

	<div class="container interface">
<!--	<img src="image/trabalheconosco.png">-->
	
	
		<div class="row">
		<div class=" col-md-4 tema">Candidatos</div>
        <div class=" col-md-8 apresentacao">Nossas vagas são para todas as pessoas e constantemente aprimoramos nosso processo para quebrar os vieses. Sinta-se livre para se candidatar e, caso precise de algum tipo de acessibilidade para iniciar um processo seletivo conosco, apenas informe na inscrição.</div>

        </div>
        <div class="row">
            <div class=" col-md-12 vagas">
				<hr>

        <form action="#" method="post">


            <fieldset><legend>Busca</legend>

             Vaga: <input type="text" name="vaga" id="vaga">
          
          </fieldset>
        </form>

        
			
    
  
      <div class="resultado">
      <?php
  include('model/Busca.php');
    	#$vagas->listaCandidatosB();
  ?>

  </div>
           
            </div>
        </div>
	
	
		
	





	

</div>


</body>
</html>