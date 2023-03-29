<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calculo Sálario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body class="text-black p-5">
      <div class="text-center display-1 fs-2">Calcular Salário</div>
  <div class="container d-flex flex-column align-items-center justify-content-center p-5">
    <form class="col-3 mb-5" method="POST">
      <div class="row mb-5">
        <label for="salary" class="form-label text-center">Salário Bruto</label>
        <input type="number" class="form-control text-center" id="salary" name="salary"/>
      </div>
      <div class="row mb-5">
        <label for="dependentes" class="form-label text-center">Número de dependentes</label>
        <input type="number" class="form-control" id="dependentes" name="dependentes"/>
      </div>
      <div class="row mb-5">
        <label for="dias" class="form-label text-center">Dias trabalhados</label>
        <input type="number" class="form-control" id="dias" name="dias"/>
      </div>
      <div class="row gap-2 justify-content-center">
        <button type="submit" class="btn btn-success col-4">
          Calcular
        </button>
      </div>
    </form>
    <?php 
    include "function.php";
    if (isset($_POST['salary']) && isset($_POST['dependentes']) && isset($_POST['dias'])) {
      $salary = $_POST['salary'];
      $dependentes = $_POST['dependentes'];
      $dias = $_POST['dias'];
      $inss = calcularINSS($salary);
      $irrf = calcularIRRF($salary);
      $liquido = round($salary, 2) - calcularINSS($salary) - calcularIRRF($salary, $dependentes);
      $valorVT = calcularValeTransporte($dias);
      echo '
 
        Resultado:
          <p>
            <strong>Salário Bruto:</strong>
            R$ ' . number_format($salary, 2, ',', '.') . '
          </p>
          <p>
            <strong>INSS:</strong>
            R$ ' . number_format($inss, 2, ',', '.') . '
          </p>
          <p>
            <strong>IRRF:</strong>
            R$ ' . number_format($irrf, 2, ',', '.') . '
          </p>
          <p>
          <strong>Vale Transporte:</strong>
          R$ ' . number_format($valorVT, 2, ',', '.') . '
        </p>
          <p>
            <strong>Salário Líquido:</strong>
            R$ ' . number_format($liquido, 2, ',', '.') . '
          </p>
    ';
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
</body>
</html>