<?php
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    // Se estiver sendo acessado diretamente, emite um erro 403 (acesso proibido)
    header('HTTP/1.0 403 Forbidden');
    exit('Acesso proibido. Você tentou acessar: ' . $_SERVER['REQUEST_URI']);
}

if (isset($_SESSION['usuario'])) { ?>
    <div class="w-100 bg-dark-subtle text-center p-3 mt-5 fs-6">
        Todos direitos reservados a Mateus Rodrigues Santos
    </div>
<?php } ?>

</body>
</html>