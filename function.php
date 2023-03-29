<?php
function calcularINSS($salary = 0){
  $calculo = 0;
  if ($salary <= 1302) {
    $calculo = $salary * 0.075;
  }
  if ($salary > 1302 && $salary <= 2571.29) {
    $calculo = (1302 * 0.075) + ($salary - 1302) * 0.09;
  }
  if ($salary > 2571.29 && $salary <= 3856.94) {
    $calculo = (1302 * 0.075) + ((2571.29 - 1302) * 0.09) + ($salary - 2571.29) * 0.12;
  }
  if ($salary > 3856.94 && $salary <= 7507.49) {
    $calculo = (1302 * 0.075) + ((2571.29 - 1302) * 0.09) + ((3856.94 - 2571.29) * 0.12) + ($salary - 3856.94) * 0.14;
  }
  if ($salary > 7507.49) {
    $calculo = 877.24;
  }
  return $calculo;
}

function calcularIRRF($salary = 0, $dependente = 0) {
  $ir = 0;
  $inss = calcularINSS($salary);
  $base = $salary - $inss - ($dependente * 189.59);
  switch (true) {
    case $base <= 1903.98:
      $ir = 0;
      break;
    case $base > 1903.98 and $base <= 2826.65:
      $ir = ($base * 0.075) - 142.8;
      break;
    case $base > 2826.65 and $base <= 3751.05:
      $ir = ($base * 0.15) - 354.8;
      break;
    case $base > 3751.05 and $base <= 4664.68:
      $ir = ($base * 0.225) - 636.13;
      break;
    case $base > 4664.68:
      $ir = ($base * 0.275) - 869.36;
      break;
  }
  return $ir;
}

function calcularValeTransporte($dias) {
    $valor_diario_vt = 25;
    $valorVT = $valor_diario_vt * $dias;
        return $valorVT;
}
?>