<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Telefone</th>
      <th scope="col">Vaga</th>
      <th scope="col">Curriculo</th>
<?php


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

       
   

    

    

?>