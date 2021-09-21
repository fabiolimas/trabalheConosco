<?php


    class Oportunidades{
        private $id;
        private $titulo;


        function listaVagas(){
            include 'Conexao.php';

            try {
                $stmt=$pdo->prepare("select op.id,op.titulo, l.loja, l.endereco from oportunidade as op join lojas as l on l.id = op.loja where op.status=0");
                
                $stmt->execute();
                
                
            } catch (PDOException $e) {
                echo "Erro: ".$e->getMessage();
            }

                if($stmt->rowCount()!=0){

                    foreach ($stmt as $dados) {
                        $id=$dados['id'];
                        $vaga=$dados['titulo'];
                        $loja=$dados['loja'];
                        $endereco=$dados['endereco'];
                        
                        echo "<p class='local'><i class='fas fa-map-marker-alt'></i> {$loja} - {$endereco}<br></p>";
                        echo "<h2>{$vaga}</h2>";
                        echo "<a href='candidatar.php?vaga={$id}'>Candidatar-se <i class='fas fa-arrow-right'></i></a>";
                        echo "<hr>";
                    }
                }else{
                    echo "Nenhuma vaga disponivel";
                }
                   
        }
        function listaVagas2(){
            include 'Conexao.php';

            try {
                $stmt=$pdo->prepare("select op.id, op.titulo, l.loja, l.endereco, op.status from oportunidade as op join lojas as l on l.id = op.loja");
                
                $stmt->execute();
                
                
            } catch (PDOException $e) {
                echo "Erro: ".$e->getMessage();
            }

                if($stmt->rowCount()!=0){

                    foreach ($stmt as $dados) {
                        $id=$dados['id'];
                        $vaga=$dados['titulo'];
                        $loja=$dados['loja'];
                        $endereco=$dados['endereco'];
                        $status=$dados['status'];

                        switch($status){
                            case 0:
                                $status="Ativa";
                                break;

                            case 1:
                                $status="Inativa";
                                break;
                        }

                        echo"<tr id='lista'>";
                        echo"<td id='loja'>".$loja."</td>";
                        echo"<td id='vaga'>".$vaga."</td>";
                        echo"<td>".$status."</td>";
                        echo"<td><a href='alteraStatus.php?id={$id}&status={$status}' class='btnExcluir'><span <i class='fas fa-redo-alt acoes' title='Alterar Status'></i></span></a></td>";
                        echo"</tr>";
                    }
                }else{
                    echo "Nenhuma vaga disponivel";
                }
                   
        }


        function novaOportunidade($titulo, $loja){
            include 'Conexao.php';
           
            $stmt=$pdo->prepare("insert into oportunidade(id, titulo, loja) values (NULL, :titulo, :loja)");
            $stmt->execute(
                array(
                    ':titulo'=>$titulo,
                    ':loja'=>$loja

                )
                );

                echo "<span id='msgOk'>Vaga Cadastrada com Sucesso</span>";
                echo "<script>submitVaga()</script>";


        }

        function listaLojas(){
            include 'Conexao.php';
            
            try {
                $stmt=$pdo->prepare("select * from lojas");
                $stmt->execute();
                
            } catch (PDOException $e) {
                echo "Erro: ".$e->getMessage();
            }

            if($stmt->rowCount()>0){
                   
                foreach ($stmt as $dados) {
                    
                    $id=$dados['id'];
                    $loja=$dados['loja'];

                    echo $loja."<br>";

                    echo "<option value='".$id."'>".$loja."</option>";
                
                
                }
            }else{
                echo "Nenhuma loja encontrada";
            }
             
        }

        function cadastraCandidato($nome, $email, $telefone, $curriculo, $vaga){

            include 'Conexao.php';
            $curriculo=$_FILES['curriculo'];
            $filename=$_FILES['curriculo']['name'];
            $_UP['pasta']='upload/'.$nome.'/';
            
            $checagem=$pdo->prepare("select * from candidatos where email='{$email}'");
                
                $checagem->execute();
                
            $result=$checagem->rowCount();

            if($result > 1){
                echo "<span id='msgOk'>Você ja possui cadastro em nossa base de dados.</span>";
                echo "<script>submit()</script>";
                exit();
            }else{

            


            $criar=mkdir($_UP['pasta']);
            

            
            
            
            if(move_uploaded_file($curriculo['tmp_name'],$_UP['pasta'].$filename)){
                echo "<span id='msgOk'>Seu curriculo foi salvo em nossa base de dados, obrigado</span>";
                echo "<script>submit()</script>";
            }else{
                echo "<span id='msgFail'>Erro ao tentar fazer o seu cadastro</span>";
                echo "<script>submit()</script>";
                exit();
            }
        
            
            try {
                $stmt=$pdo->prepare("INSERT INTO candidatos (id, nome, email, telefone, curriculo, vaga) 
                                            values (NULL, :nome, :email, :telefone, :curriculo, :vaga)");
                $stmt->execute(
                    array(
                        ':nome'=>$nome,
                        ':email'=>$email,
                        ':telefone'=>$telefone,
                        ':curriculo'=>$_UP['pasta'].$filename,
                        ':vaga'=>$vaga
                    )
                    );

                    
                   
            } catch (PDOException $e) {
                echo "erro: ".$e->getMessage();
            }
           
            
           
        }
    



        }

        function listaCandidatosB(){
            include 'Conexao.php';
            
            $vaga1=isset($_POST['palavra'])?$_POST['palavra']:'';
            $stmt=$pdo->prepare("Select c.nome, c.email, c.telefone, c.curriculo, o.titulo from candidatos as c join oportunidade as o on c.vaga=o.id where o.titulo like '%$vaga1%'");
            $stmt->execute();

            foreach ($stmt as $dados) {

                $nome=$dados['nome'];
                $email=$dados['email'];
                $telefone=$dados['telefone'];
                $curriculo=$dados['curriculo'];
                $vaga=$dados['titulo'];

                

                echo"<tr id='lista'>";
                echo"<td id='loja'>".$nome."</td>";
                echo"<td id='vaga'>".$email."</td>";
                echo"<td>".$telefone."</td>";
                echo"<td>".$vaga."</td>";
                
                echo"<td><a href='$curriculo' target='_blank' class='btnExcluir'><span <i class='fas fa-download acoes' title='Baixar Curriculo'></i></span></a></td>";
                echo"</tr>";
            }

                # code...
            }
        
            function listaCandidatos(){
                include 'Conexao.php';
    
                $stmt=$pdo->prepare("Select c.nome, c.email, c.telefone, c.curriculo, o.titulo from candidatos as c join oportunidade as o on c.vaga=o.id");
                $stmt->execute();
    
                foreach ($stmt as $dados) {
    
                    $nome=$dados['nome'];
                    $email=$dados['email'];
                    $telefone=$dados['telefone'];
                    $curriculo=$dados['curriculo'];
                    $vaga=$dados['titulo'];
    
                    
    
                    echo"<tr id='lista'>";
                    echo"<td id='loja'>".$nome."</td>";
                    echo"<td id='vaga'>".$email."</td>";
                    echo"<td>".$telefone."</td>";
                    echo"<td>".$vaga."</td>";
                    
                    echo"<td><a href='$curriculo' target='_blank' class='btnExcluir'><span <i class='fas fa-download acoes' title='Baixar Curriculo'></i></span></a></td>";
                    echo"</tr>";
                }
    
                    # code...
                }

        
    }
?>