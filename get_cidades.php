<?php
if (isset($_GET['estado'])) {
    $estadoId = $_GET['estado'];
    
$cidades = json_decode(file_get_contents("https://servicodados.ibge.gov.br/api/v1/localidades/estados/$estadoId/municipios"));
    
    foreach ($cidades as $cidade) {
        echo "<option value='{$cidade->id}'>{$cidade->nome}</option>";
    }
}
?>