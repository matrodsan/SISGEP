<?php 

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    // Se estiver sendo acessado diretamente, emite um erro 403 (acesso proibido)
    header('HTTP/1.0 403 Forbidden');
    exit('Acesso proibido. Você tentou acessar: ' . $_SERVER['REQUEST_URI']);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./static/styles/style.css">

    <link rel="shortcut icon" href="./static/img/icon.png" type="image/png">
    
    <title><?php echo isset($titulo) ? $titulo : "SISGEP"; ?></title>
</head>

<body>