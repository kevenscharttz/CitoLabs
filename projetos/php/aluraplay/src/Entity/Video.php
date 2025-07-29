<?php 

namespace Alura\mvc\Entity;

class Video {
    /**
     * Construtor objeto vídeo
     *
     * @param string $url
     * @param string $titulo
     */
    public function __construct(
        private string $url, 
        private string $titulo
    )
    {
        $this->url = $url;
        $this->titulo = $titulo;
    }

    /**
     * Método get da URL;
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Método get de titulo
     *
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }


}

?>