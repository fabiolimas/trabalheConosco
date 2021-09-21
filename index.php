<?php
    include 'cabecalho.php';
?>

	<div class="container interface">
<!--	<img src="image/trabalheconosco.png">-->
	
	
		<div class="row">
		<div class=" col-md-4 tema">Nossas <br>oportunidades</div>
        <div class=" col-md-8 apresentacao">Nossas vagas são para todas as pessoas e constantemente aprimoramos nosso processo para quebrar os vieses. Sinta-se livre para se candidatar e, caso precise de algum tipo de acessibilidade para iniciar um processo seletivo conosco, apenas informe na inscrição.</div>

        </div>
        <div class="row">
            <div class=" col-md-12 vagas">
                <hr>
                <?php
                    include 'model/Oportunidades.php';
                    $vagas=new Oportunidades();
                    $vagas->listaVagas();
                ?>
            </div>
        </div>
	

		
	





	

</div>


		
</body>
</html>