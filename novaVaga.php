<?php
	include 'cabecalho2.php';
	include 'model/Oportunidades.php';
	$vagas = new Oportunidades();
?>

	<div class="container interface">
<!--	<img src="image/trabalheconosco.png">-->
	
	
		<div class="row">
		<div class=" col-md-4 tema">Cadastrar vaga</div>
        <div class=" col-md-8 apresentacao">Nossas vagas são para todas as pessoas e constantemente aprimoramos nosso processo para quebrar os vieses. Sinta-se livre para se candidatar e, caso precise de algum tipo de acessibilidade para iniciar um processo seletivo conosco, apenas informe na inscrição.</div>

        </div>
        <div class="row">
            <div class=" col-md-12 vagas">
				<hr>
				
               <form action="" method="post">
	<fieldset><legend>  Cadastrar  </legend>
			   Função:<br> <input type="text" name="titulo" required><br><br>
			   Loja: <br><select name="loja" required>
				   <option value="">Selecione a loja</option>
			   
				   
				   <?php
				  
				  $vagas->listaLojas();  
				?>
			   </select>
			   <br><br>
					<input type="submit" value="Cadastrar Vaga" class="btn btn-primary">

			   </form>
</fieldset>
			   <?php
			   	$funcao=isset($_POST['titulo'])?$_POST['titulo']:'';
				   $loja=isset($_POST['loja'])?$_POST['loja']:'';

				   if($funcao =='' && $loja==''){

				   }else{
					$vagas->novaOportunidade($funcao,$loja);
				   }
			 		
			 ?>
            </div>
        </div>
	

		
	





	

</div>


		
</body>
</html>