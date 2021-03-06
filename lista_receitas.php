<?php
require_once "includes/head.php";
require_once "php/conexao.php";

?>
<div class="flex flex-row items-stretch">
  <?php
  $sql   = "SELECT * FROM receitas";
  $stmt  = $conn->prepare($sql);
  $stmt->execute();
  $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($dados as $registro) {
  ?>
    <section class="w-96 p-4 border-orange-500 border-t-2 border-b-2">
      <h2 class="text-4xl text-center"><?php echo $registro['nome'] ?></h2>
      <img src="data:image/gif;base64, <?php echo base64_encode($registro['img_receita']) ?>" alt="<?php echo $registro['nome'] ?>">
      <p>
        <?php echo $registro['desc_receita'] ?>
      </p>
      <div class="flex flex-row justify-evenly">
        <form action="editar_receita.php" method="post">
          <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
          <input type="submit" value="editar" name="editar">
        </form>
        <form action="php/excluir_receita.php" method="post">
          <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
          <input type="submit" value="excluir" name="excluir">
        </form>
      </div>
    </section>
  <?php
  }
  ?>
</div>
<?php
require "includes/footer.php";
?>
</body>

</html>