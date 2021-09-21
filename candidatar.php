<?php
    include 'cabecalho.php';
    include 'model/Oportunidades.php';
    $vagas=new Oportunidades();
    $vaga=$_GET['vaga'];
?>

	<div class="container interface">
<!--	<img src="image/trabalheconosco.png">-->
	
	
		<div class="row">
		<div class=" col-md-4 tema">Envie seus dados</div>
        <div class=" col-md-8 apresentacao">Nossas vagas são para todas as pessoas e constantemente aprimoramos nosso processo para quebrar os vieses. Sinta-se livre para se candidatar e, caso precise de algum tipo de acessibilidade para iniciar um processo seletivo conosco, apenas informe na inscrição.</div>

        </div>
        <div class="row">
            <div class=" col-md-12 vagas">
                <hr>
                <form action="#" method="post" enctype="multipart/form-data">
                <input type="hidden" name="vaga" value="<?php echo $vaga; ?>">
                <div class="row">
                <div class="titulos col-md-3">Curriculo *: </div>
                    <a href="#" class="col-md-8 anexar"><svg class=" icon icon-paperclip" width="16px" height="16px" viewBox="0 0 16 16">
                        <path d="M5 5V9C5 10.7 6.3 12 8 12C9.7 12 11 10.7 11 9V4.5C11 2 9 0 6.5 0C4 0 2 2 2 4.5V10C2 13.3 4.7 16 8 16C11.3 16 14 13.3 14 10V4H12V10C12 12.2 10.2 14 8 14C5.8 14 4 12.2 4 10V4.5C4 3.1 5.1 2 6.5 2C7.9 2 9 3.1 9 4.5V9C9 9.6 8.6 10 8 10C7.4 10 7 9.6 7 9V5H5Z"></path></svg><label for="anexar" class="default-label">Anexe seu Curriculo (Word ou PDF)</span>
                        <input class="application-file-input invisible-resume-upload" data-qa="input-resume" id="anexar" name="curriculo" tabindex="-1" type="file" accept="application/pdf, .docx, .doc" required ></a>
                </div><br>
                    <div class="row">
                    <div class="titulos col-md-3">Nome Completo: </div>
                    <input type="text" name="nome" class="col-md-8" required><br>
                    </div>   <br>
                    <div class="row">
                    <div class="titulos col-md-3"> E-mail:</div>
                    <input type="email" name="email" id="" class="col-md-8"required><br>
                    </div><br>
                    <div class="row">
                    <div class="titulos col-md-3">Telefone:</div>
                    <input type="text" name="telefone" id="" class="col-md-8" required><br><br>
                    </div><br>
                    <input type="submit" value="Enviar" class="btn btn-primary" onclick="checaAnexo()">
                </form>

                <?php
                $nome=isset($_POST['nome'])?$_POST['nome']:'';
                $curriculo=isset($_POST['curriculo'])?$_POST['curriculo']:'';
                $vaga=isset($_POST['vaga'])?$_POST['vaga']:'';
                $email=isset($_POST['email'])?$_POST['email']:'';
                $telefone=isset($_POST['telefone'])?$_POST['telefone']:'';

                if($nome == '' && $curriculo =='' && $vaga=='' && $email=='' && $telefone==''){
                        
                }else{
                    $vagas->cadastraCandidato($nome, $email,$telefone,$curriculo,$vaga);
                }

                               
                ?>


                </form>
            </div>
        </div>
	

		
	





	

</div>


		
</body>
</html>