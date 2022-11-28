<?php
    include_once('conexao.php');
    include_once('protect.php');

    $categoria = $_GET['categoria'];
    $query_produto = "  SELECT *
                        FROM produto_servico
                        WHERE cod_servico = :cod_servico";
    $produto = $conn->prepare($query_produto);
    $data = ['cod_servico' => $categoria];
    $produto->bindParam(':cod_servico', $categoria, PDO::PARAM_STR);
    $produto->execute($data);

    foreach($produto as $produto){
        ?>
        <div>
            <option id="produto" value="<?php echo $produto['cod_produto']?>">
                <?=$produto['nome_produto']?> 
            </option>
        </div>
        <?php             
    }
?>

    