<?php 
    class Humanos {
        private $masc = [];
        private $fem = [];
        private $desc = [];


    public function definir($s, $n){
        if (strtolower($s) == 'm') {
            $this -> masc[] = $n;
        } else if (strtolower($s) == 'f'){
            $this -> fem[] = $n;
        } else {
            $this -> desc[] = $n;
        }
    }

    public function get_masculino(){
        return $this->masc;
    }

    public function get_feminino(){
        return $this->fem;
    }

    public function get_desconhecido(){
        return $this->desc;
    }
}
?>