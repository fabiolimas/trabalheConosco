<?php
	include 'cabecalho2.php';
	include 'model/Oportunidades.php';
	$vagas = new Oportunidades();
?>

	<div class="container interface">
<!--	<img src="image/trabalheconosco.png">-->
	
	
		<div class="row">
		<div class=" col-md-4 tema">Vagas Cadastradas</div>
        <div class=" col-md-8 apresentacao">Nossas vagas são para todas as pessoas e constantemente aprimoramos nosso processo para quebrar os vieses. Sinta-se livre para se candidatar e, caso precise de algum tipo de acessibilidade para iniciar um processo seletivo conosco, apenas informe na inscrição.</div>

        </div>
        <div class="row">
            <div class=" col-md-12 vagas">
				<hr>

        <a href="novaVaga.php" class="btn btn-primary">Nova Vaga</a><br><br>
				<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Loja</th>
      <th scope="col">Vaga</th>
      <th scope="col">Satus</th>
      <th scope="col">Ativa/Desativa</th>
      <?php
	  
	 		$vagas->listaVagas2();
	 ?>
      
           
            </div>
        </div>
	
	
		
	





	

</div>


</body>
</html>