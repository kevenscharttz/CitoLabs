<?php 
/*
Então qual é a importância dos Acess Modifiers numa classe?

Cenário I: 
Imagine que queres que a definição do $nome não possa ser direta. Queres que exista uma espécie de validação antes que os objetos criados a partir da classe possam aceitar o nome que queres definir.
*/

class Homem {

    //propriedade privada. O seu acesso não é possível sem ser dentro da classe
    private $nome;

    //Este método vai receber um parâmetro $nome e vai avaliar se o nome
    //pode ser definido de acordo com as regras. Neste caso, o nome não
    //pode ser nenhum daqueles que exista no array
    function set_nome($n){
        $nomes_proibidos = [
            'joao', 'carlos', 'miguel', 'joaquim'
        ];

    // verifica se $n pertence aos nomes proibidos
        if (in_array($n, $nomes_proibidos)) {
        return;
        }

        // se não pertence, define $nome com o valor de $n
        $this-> nome= $n;
    }

    //para ir buscar o valor do nome...
    function get_nome () {
        return $this->nome;
    }
}

$a = new Homem();

$a -> set_nome('Keven');
echo 'O nome é: ' . $a -> get_nome(); //vazio
echo '<br>';

$b = new Homem();

$b -> set_nome('Gabriel');
echo 'O nome é: ' . $b -> get_nome(); //vazio
echo '<br>'


/*
Os accss modifiers permitem-nos controlar de forma muito clara que 
informação e métodos estão disponíveis fora da classe. Esta filosofia é de extrema importância: uma classe só deve ter público aquilo que
é absolutamente necessário.

Veremos mais sobre os access modifiers quando falármos de hereditariedade
*/
?>