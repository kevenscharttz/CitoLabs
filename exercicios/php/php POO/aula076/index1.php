<?php

// COMO USAR NAMESPACES

/*
O conceito de Namespaces é muito importante na programação orientada a objetos.

Permitem resolver dois problemas:
- Organizar melhor as classes permitindo agrupá-las num 'espaço';
- Permitem que existam dentro do mesmo proketo classes com o mesmo nome. Mas em namespaces diferentes

Por exemplo, pode ter uma classe que definiu no seu código e juntar ao seu projeto outra classe criada por outro programador. Verifica que, afinal, ambas as classes têm o mesmo nome.
Não necessitando alterar o nome das classes. Basta que estejam em namespaces diferentes e tens o problema resolvido.

Usar namespaces dentro dos projetos de média e larga escala, é uma forma de manter o código mais bem organizado
*/

//A expressão NAMESPACE deve sempre ser a primeira declaração no topo do script
namespace classes_principais;

class Matematica {
    public function adicionar ($a, $b){
        return $a + $b;
    }

    public function subtrair ($a, $b){
        return $a - $b;
    }
}
?>