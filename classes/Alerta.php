<?php
class Alerta {
    protected $titulo;
    protected $texto;
    protected $tipo;
    protected $icone;

    public function __construct(string $texto, string $titulo = "Alerta", string $tipo = "success", string $icone = "<i class='bi bi-check-circle-fill'></i>") {
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->tipo = $tipo;
        $this->icone = $icone;
    }

    public function geraAlert() {
        $alerta = "
            <div class='alert alert-" . $this->tipo . " alert-dismissible fade show' role='alert'>" .
                $this->icone . " <strong>" . $this->titulo . "</strong> " . $this->texto .
                "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>" .
            "</div>";
        return $alerta;
    }
}
