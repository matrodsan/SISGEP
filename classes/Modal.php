<?php

class Modal {
    protected string $id;
    protected string $titulo;
    protected string $mensagem;
    protected string $acao;
    protected string $botao;
    protected string $texto_botao;
    protected array $cores;

    public function __construct(string $id, string $titulo, string $mensagem, string $acao, string $texto_botao, array $cores = ["cabecalho" => "light", "botao" => "primary", "texto" => "black"]) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->mensagem = $mensagem;
        $this->acao = $acao;
        $this->texto_botao = $texto_botao;
        $this->cores = $cores;
    }

    public function renderModal() {
        echo "
        <div class='modal fade' id='modal" . $this->id . "' tabindex='-1' aria-labelledby='modalLabel" . $this->id . "' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                    <div class='modal-header bg-" . $this->cores["cabecalho"] . " text-" . $this->cores["texto"] . "'>
                        <h1 class='modal-title fs-5' id='modalLabel" . $this->id . "'>" . $this->titulo . "</h1>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        " . $this->mensagem . "
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <a href='" . $this->acao . "' class='btn btn-" . $this->cores["botao"] . "'>" . $this->texto_botao . "</a>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
}

?>
