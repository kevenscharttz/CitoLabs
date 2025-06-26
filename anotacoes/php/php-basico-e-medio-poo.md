
## Comentários em PHP

Existem várias formas de se colocar comentários em PHP, e é sobre isso que vou falar, mas antes, o que são comentários? São linhas de texto que são ignoradas pelo navegador, ou seja, são uteis para incluir informações no código de como algo funciona, o que falta ser feito em determinada sessão, avisos importantes, etc. Uma curiosidade é que diferentemente do HTML o PHP não mostra os comentários, o que pode ser muito útil para projetos com fatos sensíveis. Nesse tipo de comentário usamos os símbolos '#' ou '//': 

### Single-line comment

Essas se tratam de linhas de comentários que só funciona na linha colocada, ou seja, tudo nessa linha em que o marcador de comentários estiver será um comentário, fora dela, será interpretado como alguma outra coisa:

```php
<?php
	// Single-line comment
	# Single-line comment
?>
```

### Multi-line comment

Essas se tratam de caixas de comentário, onde o conteúdo do comentário fica dentro dos símbolos chave, dando possibilidade de incluir muitas linhas de comentários. Seus símbolos podem alternar entre '*/', '#', '//': 

```php
/*
Multi-line commment
*/
```

### Comentários personalizados

Entendendo bem a questão de comentários, podemos fazer a certo nível uma personalização deles, como nos exemplos abaixo: 

```php
//--------------------------------------
// Comentário personalizado
//--------------------------------------

#---------------------------------------
# Comentário personalizado
#---------------------------------------

/*--------------------------------------
Comentário personalizado
--------------------------------------*/
```

## Definição de variáveis em PHP

Para a criação de uma variável, nó primeiramente iniciamos com o simbolo de dólar($), já que é ele que define uma variável, seguindo de um simbolo de atribuição(=) e por fim o valor dessa variável.

Variáveis não podemo começar com números, apesar de ser permitido usar um caractere especial, por recomendação comece sempre por letras. Porém no meio do nome, desde que não seja o começo, podemos incluir números. Outro detalhe muito importante é que não se pode ter espaços entre as variáveis, ou seja, tudo tem que estar junto, seja usando CamelCase ou snake_Case, tanto faz. Além disso tudo, no PHP, as variáveis são CaseSensitive.

```php
<?php 
    //Variáveis
    $valor = 100;
    $nome = "Keven";
    $_idade = 21;
    $nome_de_variavel = "Carlos";
    $valor_01 = 1000;

    //$01teste = 100;
    //$nome de variavel = "Carlos";

?>
```

## Como mostrar o conteúdo de uma variável?

É mais fácil que tirar doce de bebê, basta usarmos a palavrinha chave que aprendemos anteriormente, o **echo**, seguido da variável que queremos visualizar o conteúdo:

```php
<?php
	//Variáveis
	$valor = 100;
	$nome = "Keven";
	
	echo "$nome";
	echo $valor;
?>
```


## Atribuir valores para variáveis

Podemos definir vários tipos de dados para uma variável, mas num geral a forma com que isso é feito é igual, nós definimos o valor na variável usando o sinal de atribuição, o famoso **igual ( = )**, com um sinal de ponto e vírgula no final. 

Apesar disso parecer simples, precisamos entender algumas regrinhas especificas para alguns tipos de variáveis, uma delas sendo a de texto, ao atribuir um texto à uma variável, precisamos usar os sinais de " ", caso não seja usado gerará um erro. 

Quando queremos passar o valor de uma variável já existente para outra, podemos indicar que essa nova variável será igual a outra, porém não podemos nos esquecer do simbolo de cifrão. Fora que essas mesmas variáveis podem ser usadas em operações matemáticas.

```php
<?php 
    // --------------- Texto ---------------------
    $nome = "Keven";
    $nome2 = "Willians";
    //$nome3 = Felipe;

    echo "$nome $nome2\n";

    $nome2 = "Marcos\n";

    echo $nome2;

    //------------------ Números ------------------
    $valor = 100;
    $valor2 = 200;

    echo "O valor 1 é $valor e o valor 2 é $valor2\n";

    $valor3 = $valor;

    echo $valor3;

    $valor5 = $valor4 = 800;

    echo "\nValor 5: $valor5 e o Valor 4: $valor4";

    $valor6 = $valor+$valor2+$valor3+$valor4+$valor5;
    echo "\n\n O valor 6 é igual a soma de todos: $valor6";
?>
```

## Diferença entre aspas simples e duplas

A diferença entre essas duas é bem simples, quando utilizamos aspas duplas, o primeiro detalhe que vem a tona é que não podemos usar aspas duplas dentro da string, além disso, ao utilizá-lá ela permite interpretação do que houver dentro dela, por exemplo, caso eu queira mostrar dentro de um texto um valor de uma variável, caso seja usado aspas duplas a variável será interpretada, e seu valor aparecerá no lugar dá variável:

```php
<?php 
    $nome = "Keven";
    $nome2 = "Willians";

    echo "$nome $nome2";

	// saida: Keven Willians
?>
```

Já com as aspas simples, a regra de uso de mantem a mesma, quando usada, não poderá se utilizar de aspas simples no texto, a principal diferença vem agora, ela não realiza interpretação alguma, o que for colocado dentro dela será mostrado, exatamente o que foi colocado: 

```php
<?php 
    $nome = "Keven";
    $nome2 = "Willians";

    echo '$nome $nome2';

	//saida: $nome $nome2
?>
```

Vale ressaltar que essa regra só se aplica ao PHP, por exemplo, ao criarmos um trecho HTML pelo PHP usando aspas simples para conseguirmos incluir aspas duplas em uma classe dessa tag, ela funcionara, pois o PHP apenas não irá interpretar o texto, mas classes e parâmetros irão funcionar normalmente pois não dependem dele: 

```php
<?php
	echo "<p>Paragrafo feito por php</p>";
	echo '<p class="cor-de-texto">Paragrado feito por php com uma classe';
?>
```

## Uso de PHP e criação de conteúdo HTML

Aproveitando o gancho acima, onde foi comentado sobre criação de conteúdo HTML, podemos usar variáveis PHP dentro de trechos HTML já existentes ou cria-lós do 0, dá seguinte maneira: 

```php
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Usando variáveis PHP</title>
	    <style>
	    .cor-de-texto {
	        color: red;
	    }
	    </style>
	</head>
	
	<body>
	    <?php 
	        $nome = "Keven";
	    ?>
	    <h1>Usando variáveis PHP em HTML</h1>
	
	    <p>Podemos incluir variáveis PHP de duas formas diferentes dentro de um texto já existente em HTML</p>
	    <br><br>
	    <p>Meu nome é <?php echo $nome?></p>
	    <p>Meu nome é <?= $nome?></p>
	
	    <h2>Criando HTML por PHP</h2>
	    <?php 
	        echo "<p>Paragrafo feito por php</p>";
	        echo '<p class="cor-de-texto">Paragrado feito por php com uma classe';
	    ?>
	</body>
</html>
```

## Transformar o conteúdo de uma variável em variável

Podemos transformar o conteúdo de uma variável em uma variável, sim, eu sei que parece confuso mas com o exemplo abaixo talvez isso fique mais claro:

```php
<?php
	//Crio uma variável chamada nome
	$nome = "Keven";
	//Com base no conteúdo de nome, no caso Keven, é criado uma variável chamada Keven com o valor Willians
	$$nome = "Willians";

	echo $Keven; 
	// saida = Willians;
?>
```

## Variáveis contantes

Podemos dizer que existem dois tipos de variáveis, a que podem ser alteradas, e as que não podem, e é justamente sobre as que não podem ser alteradas que iremos falar. Constantes são espaços na memória fixos, como mostrado em exemplos anteriores, podemos trocar o valor de uma variável a qualquer momento, mas o mesmo não se aplica para constantes. Diferente das variáveis, constantes não precisam ser acompanhadas do cifrão, por convenção, são definidas com letras **MAIÚSCULAS**. Elas podem ser feitas de duas formas diferentes, vamos começar pela **define**:

### Define ('nome', 'valor')

Usando o Define, que se trata de uma função, passamos dentro de seus parenteses o nome da constante e o valor que queremos definir a ela:

```php
<?php
    //--------------------------- DEFININDO CONSTANTES -------------------------
    define ("TAXA","0.1");
    define ("APRESENTAR_DADOS",false);

    echo TAXA." ";

    $salario = 1500;
    $salarioBonus = $salario + ($salario * TAXA);
    echo $salarioBonus;

    //TAXA = 100;
?>
```

## Const

Também podemos definir uma constante com a expressão **const**, essa forma não é tão utilizada:

```PHP
<?php
	const NOME = "Keven";
	//NOME = "Carlos";

	echo NOME;
?>
```

## Data Types

As variáveis e constantes podem ter inúmeros tipos de dados, desde de tipos númericos, lógicos, textuais e etc... E são separados por duas categorias, os escalares e não escalares:

## Escalares

Os tipos escalares são o que mais vamos ver, e são divididos em alguns: **bool-booleano, int, float e string**:

#### Bool - Booleano

Aceita valores verdadeiros ou falsos (true | false), fale ressaltar que caso impresso, true é mostrado como 1, e false como vazio

```php
    //bool / booleano - aceita valores verdadeiros ou falsos ( true || false )
    $apresentarDados = true;
```

#### Int - inteiros

São valores numéricos sem casas decimais, sejam eles positivos ou negativos:

```php
    //int / integer - aceita valores númericos sem casas decimais
    $valor = 0;
    $valor2 = 1233434234;
    $valor3 = -324412345;
```

#### Float

Valores que possuem casas decimais, sejam eles positivos ou negativos:

```php
    //float - aceita valores flutuantes (números com casas decimais)
    $float = 1.5;
    $float2 = 0.4342523;
    $float3 = 23143412.34245;
    $float4 = -3234234.34244;
```

#### String

Valores alfanúmericos, que vão de letras, palavras, frases, textos.. até números, um número pode ser uma string:

```php
    //string - aceita valores alfanúmericos (letras, palavras, números, simbolos)
    $nome = "joão";
    $apelido = "Zeca";
    $letraEscolhida = "a";
    $fraseDoDia = "AAAAAAAAAAAA1234...FFVADFJG";
```

### Gettype()

Essa é uma função que nos permite obter o tipo da variável escolhida:

```php
    echo gettype($apresentarDados).'<br>';
    echo gettype($valor).'<br>';
    echo gettype($float).'<br>';
    echo gettype($nome).'<br>';
```

### Var_dump()

Essa função tem o objetivo de apresentar as informações da variável

```php
    var_dump($apresentarDados);
    echo "<br>";
    var_dump($valor);
    echo "<br>";
    var_dump($nome);
    echo "<br>";
```

## Booleanos

São variáveis com dois valores possíveis : verdadeiro ou falso. Os valores são Case Sensitive. São usadas em maior parte em estruturas de controle de repetição, ciclos e instruções condicionais.

Podemos convertes valores em booleanos, tradicionalmente, o valor zero (0) é equivalente a false, e todos os outros valores a true.

```php
<?php 
    //Boolean

    //Variáveis com dois valores possíveis: true ou false
    $apresentarNome = true;
    $apresentarIdade = false;

    //Os valores são case sensitive, ou seja, não importa se você escreve true ou True, o valor será o mesmo.
    $mostrar = TRUE;
    $numero = 10;
    //Usada majoritariamente para condições, como ciclos, loops e condicionais

    //podemos ainda determinar se uma variável é booleana ou não
    var_dump( is_bool($apresentarNome));
    var_dump( is_bool($numero));
?>
```

## Inteiros 

São números inteiros, ou seja, não possuem casas decimais, positivos ou negativos.  Um ponto importante é o fato de, dependendo do sistema, o valor máximo e minimo é diferente, no caso se é 32 bits ou 63 bits, esses limites podem ser vistos usando as constantes **PHP_INT_MAX** e **PHP_INT_MIN**:

```PHP
<?php 
    // Inteiros - int

    // São números inteiros, ou seja, não possuem casas decimais, positivos ou negativos.

    $valor1 = 10;
    $valor2 = 20;
    $valor3 = 20000000;
    $valor4 = -11245; 
    
    //EM sistemas de 32 bits, o valor máximo é 2147483647 e o mínimo -2147483648, em sistemas de 64 bits, o valor máximo é 9223372036854775807 e o mínimo -9223372036854775808.

    //Esses limites podem ser vistos usnado as constantes PHP_INT_MAX e PHP_INT_MIN.

    echo PHP_INT_MAX . '<br>';
    echo PHP_INT_MIN . '<br>';
?>
```

Os valor podem ser definidos como hexadecimais, octais ou binários também. Caso o valor de uma variável ultrapasse o limite do sistema, ele será convertido para um float: 

```php
<?php 
    //Os valores podem ser definidos como hexadecimais, octais ou binários também

    $valor = 0x1A; // hexadecimal
    echo $valor."<br>";
    $valor2 = 012; // octal
    echo $valor2."<br>";
    $valor3 = 0b101010;  // binário
    echo $valor3."<br>";

    // Caso o valor seja maior que o limite do sistema, ele será convertido para float
    $valor4 = PHP_INT_MAX + 1;
    echo $valor4."<br>";
    var_dump($valor4);
?>
``` 

Podemos transformar variáveis fazendo cast para números inteiros: 

```php
<?php 
    // Podemos transformar variáveis fazendo um cast para inteiros

    $numero = "100";
    $teste = "25teste";
    $teste2 = "teste";
    $teste3 = false;
    $teste4 = true;

    $numero= (int) $numero;
    echo "<br>";
    echo (int) $teste;
    echo "<br>";
    echo (int) $teste2;
    echo "<br>";
    echo (int) $teste3;
    echo "<br>";
    echo (int) $teste4;
    echo "<br>";

    var_dump(is_int($numero));
?>
```

## Flutuantes

Float são números flutuantes, ou seja, números com casas decimais, postivos ou negativos. Assim como o int, o float também tem seus limites, que também dependem do tipo de sistemas. E claro, tmbém é possível fazer casting para esses valores. A principal diferença é que quando o valor émuito grande para ser representado, ele é mostrado como infinito: 

```php
<?php 
    //null

    //É um tipo  especial de dado, representa uma variável sem valor ou um valor nulo.

    $valor = null;
    echo $valor . '<br>';
    var_dump($valor);
    echo '<br>';
    var_dump("teste");

    
?>
```

```php
<?php 
    //Assim como int, floar também tem limites, que dependem do sistema, 32bits ou 64 bits.

    echo PHP_FLOAT_MAX . '<br>';
    echo PHP_FLOAT_MIN . '<br>';

    // Quando o valor é muito grande para ser representado, ele é representado como infinito
    $valor = PHP_FLOAT_MAX * PHP_FLOAT_MAX;
    echo $valor . '<br>';
    var_dump($valor);
    echo '<br>';
    // Converter para float usando o casting

    $numero = "35.23";
    echo (float) $numero ."<br>";
    $numero2 = "35.23teste";
    echo (float) $numero2 ."<br>";
    $numero3 = "teste";
    echo (float) $numero3 ."<br>";
    $numero4 = false;
    echo (float) $numero4 ."<br>";
    $numero5 = true;
    echo (float) $numero5 ."<br>";
?>
```

## Nulo

 Nulo é um tipo especial de dado, representa uma variável sem valor ou com valor vazio/nulo:
 
 ```php
 <?php 
    //null

    //É um tipo  especial de dado, representa uma variável sem valor ou um valor nulo.

    $valor = null;
    echo $valor . '<br>';
    var_dump($valor);
    echo '<br>';
    var_dump("teste");

    $valor = 10;
    echo $valor . '<br>';
    // apaga a variável
    unset($valor);
    //echo "$valor <br>";
?>
 ```

### Empty

Empty é um parâmetro que tem a mesma função do is_null, que é como perguntar se a variável está vazia:

```php
<?php 
    $valor = null;

    if (is_null($valor)) {
        echo "A variável é nula";
    } else {
        echo "A variável não é nula";
    }
    echo "<br>";

    //empty é a mesma coisa que dizer se está vazia
    if (empty($valor)) {
        echo "A variável está vazia";
    } else {
        echo "A variável não está vazia";
    }

?>
```

## Strings

Uma string é um conjunto de caracteres, que podem ser letras, números , símbolos e espaços em branco. As strings são delimitadas por aspas simples ou aspas duplas. As aspas simples são mais rápidas , pois não interpretam variáveis dentro da string. As aspas duplas interpretam variáveis dentro da string, ou seja, se você colocar uma variável dentro de aspas duplas, o PHP vai interpretar o valor da variável.

Também podemos juntar duas strings distintas em apenas uma, esse processo se chama **concatenação**.

E para obtermos uma letras especifica da string, basta usarmos o mesmo principio das posições de arrays: 

```php
<?php 
    //Strings 
    //-------------------------------------------------
    //Uma string é um conjunto de caracteres, que podem ser letras, números, símbolos e espaços em branco.
    //As strings são delimitadas por aspas simples (' ') ou aspas duplas (" ").
    //As aspas simples são mais rápidas, pois não interpretam variáveis dentro da string.
    //As aspas duplas interpretam variáveis dentro da string, ou seja, se você colocar uma variável dentro de aspas duplas, o PHP vai interpretar o valor da variável.

    $nome = "Pedro";
    $apelido = 'Silva';

    $apresentacao = "Meu nome é $nome, mas pode me chamar de $apelido";
    echo $apresentacao . '<br>';

    //Concatenação de strings
    //------------------------------------------------

    $nomeCompleto = $nome . " " . $apelido;
    echo $nomeCompleto . '<br>';

    //Como obter a primeira letra do nome?
    //------------------------------------------------
    echo $nome[0] . '<br>';

    //Obter a terceira letra
    echo $nome[2] . '<br>';

    //Para obter a letra da direita para a esquerda, basta usar o índice negativo.
?>
```

### Heredoc e Nowdoc

Esses dois tratam-se de maneiras diferentes de definir strings, apesar de não ser usuais:

```php
<?php 
    //strings
    //-------------------------------------------------
    //Outras duas formas de definir strings, apesar de não usuais são: 

    //heredoc

    $texto = <<<TEXT
    Olá, meu nome é Keven.
    Estou aprendendo PHP.
    Estou gostando muito.
    TEXT;

    echo $texto . '<br>'; // as linhas vão aparecer sem quebras

    echo nl2br($texto) . '<br>'; // as linhas vão aparecer com quebras

    //Nowdoc

    $texto2 = <<<'TEXT2'
    Olá, meu nome é Keven.
    Estou aprendendo PHP.
    Estou gostando muito.
    TEXT2;
    echo $texto2 . '<br>'; // as linhas vão aparecer sem quebras

    echo nl2br($texto2) . '<br>';
?>
```

## Funções para strings

Um aspecto importante das strings no PHP é que elas possuem um vasto conjunto de funções para efetuar operações:

```php
<?php 
    //Funções para strings
    //-------------------------------------------------

    //Um aspecto importante nas strings: o PHP possui um vasto conjunto de funções para efetuar operações com strings.
    
    $frase = "Olá, meu nome é Keven. Estou aprendendo PHP. Estou gostando muito.";

    //Apresentar o número de caracteres da string
    echo strlen($frase) . '<br>';

    //Transformar todas as letras em maiúsculas
    echo strtoupper($frase) . '<br>';

    //Apresentar apenas parte da frase
    echo substr($frase, 0, 10) . '<br>';

    //Verificar se uma string existe dentro de outra
    echo str_contains($frase, "nome");
    
?>
```

## Arrays

Array é uma variável que funciona como uma coleção de dados, ou seja, uma variável que pode armazenar varios valores. Os arrays são delimitados por colchetes [ ], ou pela função array():

```php
<?php 
    //Array
    //-------------------------------------------------
    //É uma variável que funciona como um coleção de dados, ou seja, uma variável que pode armazenar vários valores.
    //Os arrays são delimitados por colchetes [ ] ou pela função array().

    $nome = "Keven";
    $nome2 = "Pedro";
    $nome3 = "Marcelo";

    $nomes = array($nome, $nome2, $nome3);
    //ou
    $nomes = [$nome, $nome2, $nome3];

    echo $nomes[0] . '<br>';
    echo $nomes[1] .'<br>';

    //Nos casos acima, os indices são colocados automaticamente, começando do 0.
    //Caso você queira colocar os indices manualmente, basta fazer assim:

    $nomes = [
        10 => $nome,
        20=> $nome2,
        30=> $nome3
    ];

    echo $nomes[10] . '<br>';
    echo $nomes[40] . '<br>';

    // Para verificar o aviso, podemos verificar se o item existe
    var_dump(isset($nomes[200]));
?>
```

### Adicionando e removendo 

Como podemos adicionar e remover elementos de um array? Podemos adicionar elementos a um array usando o índice ou usando a função array_push() para adicionar elementos no final do array:

```php
<?php 
    // Como podemos adicionar e remover elementos de um array?
    // Podemos adicionar elementos a um array usando o índice
    // ou usando a função array_push() para adicionar elementos no final do array.

    $nomes = ["Keven", "Pedro", "Marcelo"];

    // Adicionar (push)
    $nomes[] = "João";

    //ou

    array_push($nomes, "Maria");
    array_push($nomes, "José");

    echo "<pre>";
    print_r ($nomes);
    echo "</pre>";

    // Remover (unset)

    unset($nomes[4]);
    echo "<pre>";
    print_r ($nomes);
    echo "</pre>";
?>
```

## Arrays multidimensionais

Esse tipo de array, em resumo, é um array que contém outros arrays dentro. Podemos também obter valores específicos desses arrays:

```php
<?php 
    //Arrays multidimensionais
    //são arrays que contem outros arrays

    $lojas = [
        'porto' => [
            'telefone'=> '12345',
            'email'=> 'porto@gmail.com',
        ],
        'lisboa'=> [
            'telefone'=> '23456',
            'email'=> 'lisboa@gmail.com',
        ],
        'Coimbra'=> [
            'telefone'=> '34567',
            'email'=> 'coimbra@gmail.com',
        ]
        ];

        echo "<pre>";
        print_r($lojas);
        echo "</pre>";

        //Apresentar um valor especifico

        echo $lojas ['lisboa']['email'];
?>
```

Mas não somente arrays de texto são possíveis, numéricos também: 

```php
<?php
        //nos arrays com indices númericos, também podemos ter multidimensão

        $notas = [
            [10, 20, 30],
            [100, 200, 300],
            [1000, 2000, 3000]
        ];

        echo "<pre>";
        print_r($notas);
        echo "</pre>";

        echo $notas [2][0];
?>
```

## Funções Associadas a Arrays

Existem dezenas de funções para serem usadas em arrays, para os mais diversos usos. Arrays são um tipo de dado muito importante para o PHP.

### Is_array

Para sabermos se uma variável é um array usamos o **is_array**:

```php
$nomes = ["Keven", "Marcos", "Paula", "Laura"];

//Para sabermos se uma variável é um array
$resultado = (is_array($nomes));
```

### Count

Para sabermos quantos elementos um array tem:

```php
$nomes = ["Keven", "Marcos", "Paula", "Laura"];

//Para sabermos quantos elementos tem um array
$resultado = (count($nomes));
echo $resultado
```

### Array_push

Para adicionar valores no final do array, nós usamos o **array_push**:
```php
array_push($nomes, "Pedro", "Manuella");
```

### Array_unshift

Diferente do array_push, para adicionarmos valores no começo do array nós usamos o **array_unshift**:

```php
array_unshift($nomes, "Skibidi", "Toilet");
```

### Array_pop

Podemos remover elementos de um array, e para remover um que está no final nós usamos o **array_pop**

```php
array_pop($nomes);
```

### Array_shift

Para removermos um elemento, assim como o pop, mas agora do começo de um array nós usamos o **array_shift**:

```php
array_shift($nomes);
```

### Unset

Para removermos um elementos especifico, nós fazemos uso de seu índice, com a função **unset**:

```php
unset($nomes[4])
```

### key_exists

Para fazer uma verificação se determinada chave existe em um array: 

```php
var_dump(key_exists('idade', $cliente));
```

### Implode

Podemos também transformar um array em uma string única string, isso graças a função **implode**:

```php
//array para string, dividindo-os
$resultado = implode(", ", $cliente);
var_dump($resultado);
```

### Array_slice

É possível também separar um array em dois, issos graças ao **array_slice**:

```php
//criar um novo array a partir de uma porção de outro array
$nomes = ["Keven", "Pelé", "Rodrigo Faro", "Cezar"];
$nomes_parte = array_slice($nomes, 2);
```

## Operadores

Existem muitos tipos de operadores em PHP, um operador é algo que recebe um ou mais valores (expressões) e que devolve outro valor: 

```php
<?php 
    //OPERADORES

    //Um operador é algo que recebe um ou mais valores (expressões) e que devolve outro valor

    //OPERADORES MATEMATICOS

    $x = 10;
    $y = 5;
    echo "<pre>";
    var_dump($x + $y); //soma
    var_dump($x - $y); //subtração
    var_dump($x * $y); //multiplicação
    var_dump($x / $y); //divisão
    var_dump($x % $y); //resto da divisão
    var_dump($x ** $y); //potenciação

    var_dump(-10);
    var_dump("10");
    var_dump(+"10"); //sinal de mais na frente do número faz com que ao invés de string, o PHP interprete como número

    //var_dump(10 / 0); //divisão por zero, é um erro.
    
    echo "</pre>";
?>
```

## OPERADORES DE ATRIBUIÇÃO

Os operadores de atribuição são aqueles que definem o valor para uma variável:

```php
<?php 
    // OPERADORES DE ATRIBUIÇÃO

    $x = 10;
    $a = $b = $c = 5;

    $x = 10;
    $x = $x * 2;
    echo $x;
    echo "<br>";

    $x = 10;
    $x += 5;
    echo $x;
    echo "<br>";

    $x = 10;
    $x -= 5;
    echo $x;
    echo "<br>";

    $x = 10;
    $x *= 5;
    echo $x;
    echo "<br>";
    
    $x = 10;
    $x /= 5;
    echo $x;
    echo "<br>";

    $x = 10;
    $x %= 5;
    echo $x;
    echo "<br>";

    $x = 10;
    $x **= 5;
    echo $x;
    echo "<br>";
?>
```

## OPERADORES DE STRINGS

São operadores específicos para efetuar operações com strings. Estamos falando especificamente de operadores de concatenação:
```php
<?php 
    // OPERADORES DE STRINGS

    // São operadores específicos para efetuar operações com strings. Estamos falando especificamente de operadores de concatenação

    $nome = "Keven";
    $nome = $nome . " Willians";
    $apresentacao = "Bom dia, ".$nome;

    // É possível também simplificar uma parte do códigoacima da seguinte forma

    $nome = "Keven";
    $nome .= " Willians";

    // Portanto...
    $cliente = "Marcos Ribeiro";
    $telefone = "99999999";
    $email = "marcos.ribeiro@gmail.com";

    $completo = $cliente . " - " . $telefone . " - " . $email;
    echo $completo;
?>
```

### OPERADORES DE COMPARAÇÃO

Operadores de comparação são um tipo de operador que permite comparar valores de expressões ou variáveis. O resultado dessas comparações são, tipicamente, valores boleanos. Uma comparação pode ser verdadeira (true) ou falsa (false):

```php
<?php 
    // OPERADORES DE COMPARAÇÃO

    // Operadores de comparação são um tipo de operador que permite comparar valores de expressões ou variáveis. O resultado dessas comparações são, tipicamente, valores boleanos. Uma comparação pode ser verdadeira (true) ou falsa (false)

    //-----------------------------
    // Verificar se valores são iguais
    var_dump(10 == 10); // true
    var_dump(10 == 20); // false
    var_dump('String' == 'string'); // false
    var_dump("joao ribeiro" == "joao "."ribeiro"); // true

    // Algo que pode acabar quebrando noss cabeça é o exemplo abaixo
    var_dump(10 == "10"); // true
    
    // Isso acontece porque o PHP tenta converter o valor da string para um número inteiro, e como 10 é igual a 10, o resultado é true
    // Para evitar isso, podemos usar o operador ===, que verifica se os valores são iguais e se os tipos são iguais

    var_dump(10 === "10"); // false

    var_dump(1 == true); // true
    var_dump(1 === true); // false

    //-----------------------------

    // Verificar se valores são diferentes
    var_dump(10 != 20); // true
    var_dump(10 != 10); // false
    var_dump(10 != "10"); // false

    var_dump(10 !== "10"); // true

    var_dump(20 <> 30); // true - é igual ao !=

    //-----------------------------

    var_dump(10 > 20); // false
    var_dump(10 < 20); // true
    var_dump(10 >= 20); // false
    var_dump(10 <= 20); // true
?>
```

### Spaceship Operator (Operador nave espacial)

Esse tipo de operador é muito interessante, pois caso o valor da esquerda seja maior que o da direita, é retornado 1, caso o valor da esquerda seja igual ao da direita,  será retornado o valor 0 e se o valor da direita for maior que o da esquerda, o valor retornado será -1.

```php
//------------------------------
// SpaceShip Operator
// O operador spaceship é um operador de comparação que retorna -1, 0 ou 1, dependendo se o valor à esquerda é menor, igual ou maior que o valor à direita. Esse operador é útil para simplificar comparações em ordenações e outras operações.

var_dump(10 <=> 20); // -1
var_dump(20 <=> 10); // 1
var_dump(10 <=> 10); // 0
```

## Operador Ternário

Esse tipo de operação é muito similar ao if/else:

```php
//------------------------------
// Operador Ternário

$valor = "joao";
echo $valor == "joao" ? "O valor é igual a joao" : "O valor não é igual a joao";
```

## Operador de coalescência nula

Esse tipo de operador serve para gerar uma resposta, caso a variável, condição, expressão seja nula:

```php
// Null Coalescing Operator
$valor = null;
$a = $valor ?? "Valor padrão"; // $a = "Valor padrão"

$valor = 10;
$a = $valor ?? "Valor padrão"; // $a = 10
```

## Operadores de incremento & decremento

Esses tipos de operadores, usados em variáveis/expressões numéricas, servem exatamente para incrementar ou decrementar o valor em uma unidade:

```php
<?php 
    // OPERADORES DE INCREMENTO E DECREMENTO

    // Permite incrementar ou decrementar um valor em uma unidade, pode ser usado como pré-incremento ou pós-incremento.

    $x = 10;
    $y = 20;
    // Pré-incremento e pré-decremento
    echo ++$x; // 11
    echo --$y; // 19

    // Pós-incremento e pós-decremento
    echo $x++; // 11
    echo $y--; // 19
    // O valor de $x e $y agora é 12 e 18, respectivamente

    //Como funcionam os resultados

    x = 100;

    echo $x; // 100
    echo '<br>';
    echo $x++; // vai mostrar o valor 100 e depois incrementar 1
    echo '<br>';
    echo $x--; // vai mostrar o valor 101 e depois decrementar 1
    echo '<br>';

    echo ++$x; // vai incrementar 1 e depois mostrar o valor 101
    echo '<br>';
    echo --$x; // vai decrementar 1 e depois mostrar o valor 100
?>  
```

## Instruções Condicionais - IF / ELSE

Uma instrução condicional permite agrupar um conjunto de declarações e controlar a execução do fluxo da aplicação. A estrutura condicional **IF** é uma das mais usadas neste contexto. Sua sintaxe é feita usando a palavra chave **IF**, seguido da condição, e por fim o bloco de código, que só será efetuado caso a condição seja verdadeira.

Basicamente, caso a condição seja verdadeira, o bloco de codigo será executado, caso contrário, um outro bloco de código que será executado. Podemos também ter várias alternativas:

```php
<?php 
    //INSTRUÇÃO CONDICIONAL

    // A instrução condicional é uma estrutura de controle que permite executar um bloco de código com base em uma condição específica.
    // Ela é amplamente utilizada em programação para tomar decisões e controlar o fluxo de execução do programa.

    $valor = 10;
    if ($valor === 10) {
        echo "OK!";
    }
    echo "<br>";
    // Caso a condição falhar (é falsa), o código do bloco não vai ser executado.
    // Podemos usar o else para criar uma alternativa

    $valor > 10;
    if ($valor === 10) {
        echo "O valor é maior que 10";
    } else {
        echo "O valor é menor ou igual a 10";
    }
    echo "<br>";
    // Podemos usar o else if para criar várias alternativas

    if ($valor > 100){
        echo "O valor é maior que 100";
    } elseif ($valor > 50) {
        echo "O valor é maior que 50";
    } elseif ($valor > 10) {
        echo "O valor é maior que 10";
    } else {
        echo "O valor é menor ou igual a 10";
    }
    
?>
```

## Como usá-lo no HTML?

É muito simples, usamos o if normalmente, com as únicas diferenças sendo o uso de um **endif** ao final da condição e ao invés de abrir chaves {}, usar dois pontos:

```php
<?php 
    $valor = 10;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php if ($valor == 10) : ?>
            <p>O valor é igual a 10</p>
        <?php else : ?>
            <p>O valor não é igual a 10</p>
        <?php endif; ?>
        <br>
        <!-- Com o elseif -->

        <?php if ($valor > 100) : ?>
            <p>O valor é maior que 100</p>
        <?php elseif ($valor > 50) : ?>
            <p>O valor é maior que 50</p>
        <?php elseif ($valor > 10) : ?>
            <p>O valor é maior que 10</p>
        <?php else : ?>
            <p>O valor é menor ou igual a 10</p>
        <?php endif; ?>
        
    </body>
</html>
```

## Conceitos aprendidos durante os exercicios - aula 25

### Array_reverse()

Com essa função, é possível inverter a ordem de elementos de um array:

```php
$produtos = ['arroz', 'batata', 'laranja'];
$produtos = array_reverse($produtos);
```

### Sort ()

Com essa função, o array fica ordenado do menor para o maior, ou em ordem alfabética. Ele não mantem as chaves  salvas no valor: 

```php
$produtos = ['arroz', 'batata', 'laranja', 'maçã', 'pêra', 'uva', 'banana', 'abacaxi', 'manga', 'kiwi', 'cabelinho de milho', 'cenoura', 'beterraba', 'batata doce', 'mandioca', 'abóbora', 'berinjela', 'pimentão', 'pepino', 'tomate', 'repolho', 'brócolis', 'couves', 'espinafre', 'alface', 'rúcula'];

sort($produtos);
```


## Expressão Condicional Switch

**Switch** é uma estrutura muito semelhante ao IF, o parâmetro é o valor a  ser avaliado. Cada 'case' verifica se o valor é igual e executa o código a seguir aos: **break** e **default**
respectivamente um ignora o resto do código e o outro é semelhante ao else, sendo executado quando nenhuma das comparações é verdadeira.

```php
<?php 
    //EXPRESSÃO CONDICIONAL SWITCH

    /* 
        É uma estrutura m## Funções Associadas a Arrays
    ​￼switch ($estado_encomenda) {
        ​￼case 'em processamento':
            # código
            break;
        case 'anulada':
        ​￼case 'cancelada':
            #código
            break;
        
        ​￼case 'enviada':
            #código
            break;
        ​￼default:
            # código
            break;
        }
    //-------------------------------------

    ​￼$resultado = match ($estado_encomenda) {
        'em processamento' => 'A encomenda está sendo processada',
        'anulada', 'cancelada' => 'A encomenda foi anulada ou cancelada',
        'enviada' => 'A encomenda foi enviada',
        default => 'Estado da encomenda desconhecido'
    };

    echo $resultado;
```

​￼## Operador Ternário

Mais acima já foi falado sobre esse tipo de operador, mas como estamos no assunto de condicionais, vale apena falar sobre. Em resumo o operador ternário é uma forma reduzida de escrever um if/else, basicamente ele é uma forma simplificada da escrita de condicionais:

```php
​￼<?php 
    // OPERADOR TERNÁRIO

    // O operador ternário é uma forma reduzida de escrever um if/else, basicamente
    // ele é uma forma de simplificar a escrita de condicionais, mas não é tão legível
    // e não é tão utilizado assim, mas é bom saber que existe

    $idade = 15;
    echo "Eu sou " . ($idade >= 18 ? "Maior de idade" : "Menor de idade");

    echo "<br>";

    $erro = true;
    echo 'Resultado: ' . ($erro ? "Aconteceu um erro" : "Sucesso");
?>
```
## Funções Associadas a Arrays

```php
    ​￼switch ($estado_encomenda) {
        ​￼case 'em processamento':
            # código
            break;
        case 'anulada':
        ​￼case 'cancelada':
            #código
            break;
        
        ​￼case 'enviada':
            #código
            break;
        ​￼default:
            # código
            break;
        }
    //-------------------------------------

    ​￼$resultado = match ($estado_encomenda) {
        'em processamento' => 'A encomenda está sendo processada',
        'anulada', 'cancelada' => 'A encomenda foi anulada ou cancelada',
        'enviada' => 'A encomenda foi enviada',
        default => 'Estado da encomenda desconhecido'
    };

    echo $resultado;
```

​## Operador Ternario

Mais acima já foi falado sobre esse tipo de operador, mas como estamos no assunto de condicionais, vale apena falar sobre. Em resumo o operador ternário é uma forma reduzida de escrever um if/else, basicamente ele é uma forma simplificada da escrita de condicionais:

```php
​￼<?php 
    // OPERADOR TERNÁRIO

    // O operador ternário é uma forma reduzida de escrever um if/else, basicamente
    // ele é uma forma de simplificar a escrita de condicionais, mas não é tão legível
    // e não é tão utilizado assim, mas é bom saber que existe

    $idade = 15;
    echo "Eu sou " . ($idade >= 18 ? "Maior de idade" : "Menor de idade");

    echo "<br>";

    $erro = true;
    echo 'Resultado: ' . ($erro ? "Aconteceu um erro" : "Sucesso");
?>
```

​￼## Ciclos 

Os ciclos permitem a repetição de blocos de código até que uma determinada condição interrompa a sua execução. São estruturas muito presentes em qualquer script de PHP

​### While

Enquanto a condição for verdadeira, o código é repetido. Devemos ter cuidado com ciclos infinitos, que ocorrem quando a condição não sofre alteração:

```php
​￼<?php 
    // CICLOS 

    ​￼/* 
        Os ciclos permitem a repetição de blocos de código até que uma determinada condição interrompa a sua execução. São estruturas muito presentes em qualquer script de PHP
    */

    // ------------------------------
    // WHILE

    // Enquanto a condição for verdadeiro, o código é repetido

    $valor = 1;
    ​￼while ($valor <= 10) {
        echo "O valor é: $valor <br>";
        $valor++;
    }

    // Devemos ter cuidado com ciclos infinitoszo não alterar a variável de controle, o ciclo nunca vai parar.

​￼## Ciclos 

Os ciclos permitem a repetição de blocos de código até que uma determinada condição interrompa a sua execução. São estruturas muito presentes em qualquer script de PHP

​￼### While

Enquanto a condição for verdadeira, o código é repetido. Devemos ter cuidado com ciclos infinitos, que ocorrem quando a condição não sofre alteração:

```php
​￼<?php 
    // CICLOS 

    ​￼/* 
        Os ciclos permitem a repetição de blocos de código até que uma determinada condição interrompa a sua execução. São estruturas muito presentes em qualquer script de PHP
    */

    // ------------------------------
    // WHILE

    // Enquanto a condição for verdadeiro, o código é repetido

    $valor = 1;
    ​￼while ($valor <= 10) {
        echo "O valor é: $valor <br>";
        $valor++;
    }

    // Devemos ter cuidado com ciclos infinitoszo não alterar a variável de controle, o ciclo nunca vai parar.
uito semelhante ao IF...ELSEIF...ELSE
        o parâmetro é o valor a ser avaliado
        Cada 'case' verifica se o valor é igual e executa o código a seguir aos: 

        break - ignora o resto do código

        default é semelhante ao else - executado se nenhuma das comparações resultar em verdadeiro.
    */

    $estado_encomenda = 'em processamento';

    switch ($estado_encomenda) {
        case 'em processamento':
            # código
            break;

        case 'anulada':
            #código
            break;
        
        case 'enviada':
            #código
            break;

        default:
            # code...
            break;
    }

?>
```

## Agrupamento de valores - Switch

Podemos agrupar vários valores em análise para execução do mesmo bloco de código

```php
<?php 
    // Podemos agrupar vários valores em análise para execução do memso bloco de código.

    $estado_encomenda = 'em processamento';

    switch ($estado_encomenda) {
        case 'em processamento':
        case 'em análise':
            # Código
            break;
        
        case 'anulada':
        case 'cancelada':
        case 'inválida':
            # Código
            break;

        case 'enviada':
            # Código
            break;

        default:
            # Código
            break;
    }
?>
```

## Simplificação do Switch / Case

Podemos fazer um Switch case sem necessariamente usarmos um default

```PHP
<?php 
    // EXPRESSÃO CONDICIONAL SWITCH

    $sexo = 'masculino';

    switch ($sexo) {
        case 'masculino':
            #code
            break;

        case 'feminino':
            #code
            break;
    }
?>
```

Além disso, nós também podemos fazer condicionais com outros tipos de variáveis no Switch case:

```php
<?php 
    $socio = false;

    switch ($socio) {
        case true:
            echo "Sócio";
            break;
        
        case false:
            echo "Não sócio";
            break;
    }
?>
```

## Expressão Match

É uma nova estrutura condicional que apareceu no PHP 8. Retorna um determinado valor de acordo com a análise efetuada

```php
<?php 
    // EXPRESSÃO MATCH

    /* 
        É uma estrutura muito semelhante ao SWITCH
        O parâmetro é o valor a ser avaliado
        Cada 'case' verifica se o valor é igual e executa o código a seguir aos: 

        break - ignora o resto do código

        default é semelhante ao else - executado se nenhuma das comparações resultar em verdadeiro.
    */

    $estado_encomenda = 'em processamento';

    //-------------------------------------

    switch ($estado_encomenda) {
        case 'em processamento':
            # código
            break;
        case 'anulada':
        case 'cancelada':
            #código
            break;
        
        case 'enviada':
            #código
            break;
        default:
            # código
            break;
        }
    //-------------------------------------

    $resultado = match ($estado_encomenda) {
        'em processamento' => 'A encomenda está sendo processada',
        'anulada', 'cancelada' => 'A encomenda foi anulada ou cancelada',
        'enviada' => 'A encomenda foi enviada',
        default => 'Estado da encomenda desconhecido'
    };

    echo $resultado;
```

## Operador Ternário

Mais acima já foi falado sobre esse tipo de operador, mas como estamos no assunto de condicionais, vale apena falar sobre. Em resumo o operador ternário é uma forma reduzida de escrever um if/else, basicamente ele é uma forma simplificada da escrita de condicionais:

```php
<?php 
    // OPERADOR TERNÁRIO

    // O operador ternário é uma forma reduzida de escrever um if/else, basicamente
    // ele é uma forma de simplificar a escrita de condicionais, mas não é tão legível
    // e não é tão utilizado assim, mas é bom saber que existe

    $idade = 15;
    echo "Eu sou " . ($idade >= 18 ? "Maior de idade" : "Menor de idade");

    echo "<br>";

    $erro = true;
    echo 'Resultado: ' . ($erro ? "Aconteceu um erro" : "Sucesso");
?>
```

## Ciclos 

Os ciclos permitem a repetição de blocos de código até que uma determinada condição interrompa a sua execução. São estruturas muito presentes em qualquer script de PHP

### While

Enquanto a condição for verdadeira, o código é repetido. Devemos ter cuidado com ciclos infinitos, que ocorrem quando a condição não sofre alteração:

```php
<?php 
    // CICLOS 

    /* 
        Os ciclos permitem a repetição de blocos de código até que uma determinada condição interrompa a sua execução. São estruturas muito presentes em qualquer script de PHP
    */

    // ------------------------------
    // WHILE

    // Enquanto a condição for verdadeiro, o código é repetido

    $valor = 1;
    while ($valor <= 10) {
        echo "O valor é: $valor <br>";
        $valor++;
    }

    // Devemos ter cuidado com ciclos infinitoszo não alterar a variável de controle, o ciclo nunca vai parar.

    //outro exemplo

    echo "<hr>";
    $valor = 1;
    while ($valor <= 10) {
        echo "3 x $valor = " . $valor * 3 . "<br>";
        $valor++;
    }
?>
```


### FOR

É uma das estruturas de ciclo mais usadas. Permite executar blocos de código enquanto uma condição dor verdadeira. Ao contrário do ciclo WHILE e o DO WHILE, o ciclo FOR já inclui lógica para atualizar o valor da condição:

```php
for ($indice = 1; $indice <= 10; $indice++) {
	echo "Índice: $indice <br>";
}

echo "<hr>";
```

Também podemos incluir dentro do FOR uma impressão de um valor, como por exemplo o valor do índice, porém separado por uma virgula, e não ponto e vírgula:

```PHP
for ($i = 1; $i <= 10; print $i, $i++) {}
echo "<br>";
echo "<hr>";
```

Além disso, podemos usar o ciclo para fazer iterações pelos dados de um array:

```php
    $nomes = ["Lucas", "João", "Maria", "José", "Ana"];
    for ($i = 0; $i < count($nomes); $i++) {
        echo "Nome: $nomes[$i] <br>";
    }
```

Da mesma forma, também podemos iterar cada caractere de uma string: 

```php
    $mensagem = "Skibiri TOilet";
    for ($i = 0; $i < strlen($mensagem); $i++) {
        echo "Letra: $mensagem[$i] <br>";
    }
```

Porém, existe um problema nisso também, nem tudo é perfeito, imaginando um array gigantesco que precisa ser iterado, mas se sabermos seu real tamanho, nos vem a cabeça usar o count dentro do for, mas isso seria um tremendo desperdício, pois toda vez ele iria passar por esse array inteiro apenas para a lógica, não sendo tão eficiente. Para resolver isso, poderíamos colocar essa lógica dentro de uma variável e passar a variável como parâmetro, ao invés da função: 

```php
    $valores = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    // em vez de 
    echo "<hr>";
    for ($i = 0; $i < count($valores); $i++) {
        echo "Valor: $valores[$i] <br>";
    }
    echo "<hr>";
    //Podemos escrever: 

    for ($i = 0, $totalValores = count($valores); $i < $totalValores; $i++){
        echo "Valor: $valores[$i] <br>";
    }
```

Por fim, podemos incluir, assim como os outros citados anteriormente, dentro do HTML: 

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card {
            border: 1px black solid;
            border-radius: 10px;
            padding: 10px;
            margin: 5px;
            background-color: rgb(200, 200, 200);
        }
    </style>
</head>
<body>
    <?php for ($i = 0; $i <= 10; $i++): ?>
        <div class="card">
            <h3>Título <?= $i?></h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum, tempore corporis deserunt ab optio fugiat sint magnam quod similique voluptatibus rerum neque aut tempora earum unde modi, ea tenetur ad?</p>
        </div>
    <?php endfor; ?>
</body>
</html>
```

## FOREACH

O FOREACH é a melhor opção para iterações em arrays ou objetos, além de sua sintaxe simples:

```php
    $nomes = ['Keven', 'Lucas', 'João', 'Maria', 'José', 'Ana', 'Pedro', 'Thiago', 'Gustavo', 'Rafael', 'Felipe', 'Bruno', 'Ricardo', 'André', 'Fernando', 'Carlos', 'Eduardo', 'Roberto', 'Alexandre', 'Vinícius'];

    foreach ($nomes as $nome) {
        echo $nome . "<br>";
    }
```

Basicamente é passado o array que eu quero iterar, junto com a variável criada para receber o valor de cada iteração, isso dentro de um bloco de repetição. Mas além disso, também é possível imprimir não só o valor, mas a chave também:

```php
    $posicoes = [
        'administrador' => 'Keven',
        'programador' => 'Lucas',
        'analista' => 'João',
        'gerente' => 'Maria',
        'diretor' => 'José',
        'coordenador' => 'Ana',
        'supervisor' => 'Pedro',
        'auxiliar' => 'Thiago',
        'estagiario' => 'Gustavo',
    ];

    // Neste caso está sendo passado tanto a chave quanto seu valor
    foreach ($posicoes as $posicao=>$nome) {
        echo "O $posicao é o: $nome"."<br>";
    }
```

E no final da execução, a variável e a chave permanecem disponíveis para o uso. E seu uso no HTML não se difere muito dos demais que vimos até o momento: 

```php
<?php 
        $nomes = ['Keven', 'Lucas', 'João', 'Maria', 'José', 'Ana', 'Pedro', 'Thiago', 'Gustavo' ];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
       <?php foreach($nomes as $nome):?>
        <h2><?=$nome; ?></h2>
        <?php endforeach;?>
    </body>
</html>
```

## BREAK E CONTINUE

Os loops (ciclos) são usados para executar o mesmo código múltiplas vezes. Em determinadas situações, podemos querer que o ciclo não execute todas as suas iterações, ou queremos que seja simplesmente interrompido. É nestes cenários que entram o break e o continue

### BREAK

O break permite com que um execução de um ciclo seja interrompida:

```php
    $paragem = 5;
    for ($i = 0; $i <= 10; $i++){
        echo $i."<br>";
        if ($i == $paragem){
            break;
        }
    }
    echo "<hr>";

    $nomes = ['Keven', 'Margarida', 'Franscisca', 'Pedro', 'Marcos', 'Chaves', 'Quico'];

    $nomeEscolhido = 'Chaves';

    foreach ($nomes as $nome){
        echo $nome."<br>";
        if ($nome == $nomeEscolhido) break;
    }
```

### CONTINUE

O continue permite com que, na execução de um ciclo, ao encontrar a condição que o ative faz passar direto para a iteração seguinte:

```php
<?php 
    // CONTINUE

    // Permite passar de imediato para a iteração seguinte

        $nomes = ['Keven', 'Margarida', 'Franscisca', 'Pedro', 'Marcos', 'Chaves', 'Quico'];

    $nomeEscolhido = 'Pedro';

    foreach ($nomes as $nome){
        if ($nome == $nomeEscolhido) continue;
                echo $nome."<br>";
    }
?>
```

Além disso tudo, vale lembrar que tanto o break ou o continue tambem funcionam no cilcos WHILE e DO WHILE.

## CRIAÇÃO DE FUNÇÕES

As funções são blocos de código reutilizáveis que apenas são executados quando são "chamados" pelo nosso código. O PHP contém um vasto conjunto de funções já disponíveis. Nós podemos criar as nossas próprias:

```php
<?php 

    // FUNÇÕES

    /* 
    Neste módulo vamo fazer uma introdução aos principais conceitos relacionados com funções em PHP.

    As funções são blocos de código reutilizáveis que apenas são executados quando são "chamados" pelo nosso código. O PHP contém um vasto conjunto de funções já disponíveis. Nós podemos criar as nossas próprias

    function nome_da_função(parâmetros) {
        # Código    
    }

    Uma função pode ter no seu interior qualquer tipo de código de PHP, inclusive outras funções.
    */

    // Definindo uma função

    function apresentar (){
        echo "Estou dentro de uma função de PHP";
    }

    echo "Estou fora de uma função";
    echo "<br>";
    // Chamando a função
    apresentar();
?>
```

Além disso, podemos chamar funções antes mesmo de cria-las, ou usarás em ciclos de repetição. Os nomes das funções devem começar com letra minuscula ou maiúscula, seguindo de letras algarismos e underscores. Os nomes da função são case insensitive, ou seja, apresentar() é igual a APRESENTAR(), mas não podem existir duas funções com o mesmo nome dentro do namespace.

```php
<?php 
    apresentar();
    executar();

    function apresentar (){
        echo "função apresentar<br>";
    }

    function executar (){
        echo "função executar<br>";
    }
    //--------------------------------

    for ($i = 0; $i < 10; $i++){
        funcao_teste();
    }
    function funcao_teste () {
        echo "Executando teste<br>";
    }

    /*
    Os nomes das funções devem começar com letra mínuscula ou maiúscula, seguindo de letras, algarismos e underscores.

    Nos nomes das funções são case insensitive

    apresentar() é igual a APRESENTAR()

    Não podem existir duas funções com o mesmo nome dentro do namespace

    (será falado sobre em outro módulo)
    */
?>
```

## PARÂMETROS DE FUNÇÕES

Podemos passar valores (argumentos) para o interior de uma função se essa função aceitar parâmetros. Parâmetros são variáveis indicadas dentro do parênteses da função e que vão estar disponíveis para serem usadas dentro da função. Argumentos são os valores que passamos para o interior dessa função. Vejamos um exemplo simples.

```PHP
<?php 
    // PARÂMETROS DE UMA FUNÇÃO

    /*
    Podemos passar valores (argumentos) para o interior de uma função se essa função aceitar parâmetros.

    Parâmetros são variáveis indicadas dentro do parêntisis da função e que vão estar disponiveis para serem usadasdentro da função.

    Argumentos são os valores que passamos para o interior dessa função. Vejamos um exemplo simples.
    */

    function adicionar ($a, $b) {
        return $a + $b;
    }

    echo adicionar(100, 50);

    /* 
    Adicionar - nome da função
    $a e $b são parâmetros da função. Os parâmetros são separados por vírgulas. Ao chamar a função, o vlor 100 e o valor 50 são designados por argumentos. O 100 irá ser atribuído ao parâmetro $a e o 50 ao parâmetro $b da função
    */
?>
```

Podemos definir parâmetros opcionais dentro de uma função. São parâmetros que já têm um valor padrão atribuído. Se passarmos um argumento para esse parâmetro, o valor passado será usado. IMPORTANTE: Os parâmetros opcionasi devem sempre ser definidosdepois do parâmetros não opcionais.

```php
<?php 
    // PARÂMETROS DE UMA FUNÇÃO

    /* 
    Podemos definir parâmetros opcionais dentro de uma função. São parâmetros que já têm um valor padrão atribuído. Se passarmos um argumento para esse parâmetro, o valor passado será usado.
    */

    function multiplicacao($a, $b = 5) {
        return $a * $b;
    }

    echo multiplicacao(100);
    echo "<hr>";
    echo multiplicacao(100, 3);

    // IMPORTANTE: Os parâmetros opcionasi devem sempre ser definidosdepois do parâmetros não opcionais.
?>
```

O PHP 8 veio introduzir a possibilidade de alterar a ordem dos argumentos quando chamamos uma função. É um conceito designado por named arguments. Se quisermos misturar conceitos, os valores não nomeados devem vir sempre primeiro.

```PHP
<?php 
    // PARÂMETROS DE UMA FUNÇÃO

    /*
    O PHP 8 veio introduzie a possibilidade de alterar a ordem dos argumentos quando chamamos uma função.

    É um conceito designado por named arguments
    */

    function apresentar($a, $b, $c = 100) {
        return "$a | $b | $c";
    }

    echo apresentar(10, 20) . "<br>";
    echo apresentar(10, 20, 30) . "<br>";
    echo apresentar(a: 1, b: 2, c: 3) . "<br>";

    //Se quisermos misturar conceitos, os valores não nomeados devem vir sempre primeiro.

    echo apresentar(10, c: 1, b: 1000);
?>
```

O PHP vai sempre tentar determinar o data type dos parâmetros e do return. Podemos reforçar o tipo de valores que vão ser retornados da seguinte forma. Existe um mecanismo no PHP designado por **strict types.** Se esse mecanismo não estiver ativo, o PHP vai tentar sempre fazer a conversão implícita dos valores.

Podemos forçar os Strict Types:

```php
<?php 
    // COMO FORÇAR OS STRICT TYPES?

    declare(strict_types = 1);

    function multiplicar($a, $b): int {
        return $a * $b;
    }

    echo multiplicar(10, 2);
?>
```

## Escopo de variáveis

O escopo de uma variável indica a fronteira dentro da qual uma variável pode ser acedida. Existem um escopo global e um escopo local. De um modo geral, as variáveis no PHP têm apenas um escopo: global ou local. Voltaremos a falar sobre escopo de variáveis no módulo relacionado com OOP. Esta variável vai estar disponível para ser usada dentro instruções condicionais e ciclos neste script e noutro scripts que possam ser importados para o interior deste script. (include e require).

```php
<?php 
    // ESCOPO DE VARIÁVEIS

    /*
    O escopo de uma variável indica a fronteira dentro da qual uma variável pode ser acedida.
    Existem um escopo global e um escopo local.
    De um modo geral, as variáveis no PHP têm apenas um escopo: global ou local. Voltaremos a falar sobre escopo de variáveis no módulo relacionado com OOP.
    */

    $nome = 'joao'; //É uma variável de escopo global

    /* 
    Esta variável vai estar disponivel para ser usada dentro instruções condicionais e ciclos neste script e noutro scripts que possam ser importados para o interior deste script. (include e require).
    */

    if(true) {
        echo $nome . "<br>";
    }

    for ($i=1; $i<=2; $i++){
        echo $nome . "<br>";
    }
?>
```

No entanto, a variável não estará acessível dentro de uma função. Todas as variáveis dentro de uma função tem escopo local. Apenas existem dentro da função. Elas são criadas dentro da função e destruídas assim que a função termina sua execução:

```php
<?php 
    //No entanto, a variável nao estará acessível dentro de uma função

    $nome = 'joao';

    function executar () {
        echo $nome;
    }

    executar();

    /* 
    Todas as variáveis dentro de uma função tem escopo local. Apenas existem dentro da função. Elas são criadas dentro da função e destruídas assim que a função termina sua execução.
    */

    function adicionar() {
        $numero = 100;
    }

    echo $numero;
?>
```

É possível aceder dentro de uma função a variável global. Fazemos da seguinte forma:

```php
<?php 
    /*
    É possível aceder dentro de uma função a variável global. Fazemos da seguinte forma:
    */

    $nome = 'joao';
    echo $nome."<br>";
    function dados() {
        global $nome;
        $nome = 'Keven';
    }

    dados();
    echo $nome;
?>
```

## INCLUDE E REQUIRE

Tradicionalmente uma aplicação PHP pode conter dezenas de scripts que, combinados entre si permitem executar as operações desejadas. Até agora vimos scripts isolados. Podemos separar o código entre vparios scripts e, no momento da execução, "importar" o código para o interior da nossa aplicação.

Existem 4 formas de executar essa tarefa:

* include;
* include_once;
* require;
* require_once.

### Include

O include mostra um aviso se o script não existe e permite continuar a execução do programa.

```php
<?php 
    //INCLUDE E REQUIRE

    /*
    Tradicionalmente uma aplicação PHP pode conter dezenas de scripts que, combinados entre si permitem executar as operações desejadas.
    Até agora vimos scripts isolados.

    Podemos separar o código entre vparios scripts e, no momento da execução, "importar" o código para o interior da nossa aplicação.

    Existem 4 formas de executar essa tarefa:
        include
        include_once
        require
        require_once
    */
    //-----------------------------------------
    //INCLUDE

    include 'script.php';
    include 'outro.php'; // Não existe, aparecerá um aviso
    echo "<hr>";
    include 'script.php';

    /*
    Principal diferença entre o include e o require:
    include - Mostra aviso de o script não existe e permite continuar a execução.
    require - Mostra um erro se o script não existe e interrompe a execução.
    */        
?>
```

### Require

Já o Require mostra um erro se o script não existe e interrompe a execução do programa completamente.

```php
<?php 
    //--------------------------
    //REQUIRE

    require 'script.php';
    require 'outro.php'; // Não existe, aparecerá um aviso
    require 'script.php';

?>
```

### Include_once & Require_once

Include_once e require_once efetuam a inclusão do script apenas um vez. Se o script foi anteriormente carregado, já não vai ser mais carregado:

```php
<?php 
    /*
    Include_once e require_once efetuam a inclusão do script apenas um vez. Se o script fpo anteriormente carregado, já não vai ser mais carregado
    */

    include_once 'script.php';
    include_once 'script.php';

    require_once 'script.php';
    require_once 'script.php';
?>
```

Podemos criar um script que contém funções , importar esse script e chamar essas funções:

```php
<?php 
    /* 
    Podemos criar um script que contém funções , importar esse script e chamar essas funções
    */


    echo adicionar(10, 10);
    echo "<hr>";
    echo subtrair(10, 10);
    echo "<hr>";
    echo multiplicar(10, 10);
    echo "<hr>";
    echo dividir(10, 10);

    require_once('functions.php');
?>
```

IMPORTANTE: No caso dos desse tipo de função, esse tipo de chamada, a requisição da unção deve ser feita antes da chamada dos métodos.

Imagine o cenário onde tens um conjunto de dados consideravel e querer definir isso dentro de um script á parte. Também é possivel seguindo o seguinte exemplo:

```php
<?php 
    /* Imagine o cenário onde tens um conjunto de dados consideravel e querer definir isso dentro de um script á parte. Também é possivel seguindo o seguinte exemplo: */

    $nomes = require_once('dados.php');

    echo "<pre>";
    print_r($nomes);
    echo "</pre>"
?>
```

## SESSION

As sessões são um dos mecanismos que o PHP oferece para manter informação entre diferentes requests. Sempre que navegamos numa página WEB criada em PHP, e sempre que um nome pedido é feito ao servidor (por exemplo para ver uma nova página), toda informação sobre variáveis é perdida.

Existem várias formas de persistencia de informação. Se queremos guardar informação entre request, podemos usar cookies que veremos mais á frente neste módulo, guardar e ler dados de uma base de dadso, passando variáveis atrávez de .POST ou GET(veremos em breve com funciona).

Com as sessões, podemos guardar dados temporariamente no servidor e, no request seguinte essses dados vão continuar disponíveis.

### session_start();

Serve para definir que os dados dessa sessão deverão ser gravados

```php
<?php 
    // Todos os scripts devem ter o início de sessão, antes de qualquer output do PHP

    session_start();

    //O valor de $nome e $apelido vai ser definido tendo em atenção a existência ou não das variáveis na super global $_SESSION

    $name = !empty($_SESSION['name']) ? $_SESSION['name'] : '-';
    
    $nickname = !empty($_SESSION['nickname']) ? $_SESSION['nickname'] : '-';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once 'nav.php'?>
    
    <hr>
    <h2>Exercício com sessões de PHP</h2>

    <h3>Valor da variável 'nome'</h3>
    <h1><?= $name?></h1>

    <h3>Valor da variável 'nome'</h3>
    <h1><?= $nickname?></h1>

</body>
</html>
```

### SESSION_ UNSET() E SESSION_DESTROY()

Essa duas sessões até são semelhantes, mas tem uma ligeira diferença. Enquanto a unset remove todas as variáveis da sessão. Já o destroy destrói toda a sessão.

```php
<?php 
    session_start();

    session_unset();

    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once ("nav.php")?>
    <hr>
    <h2>A sessão foi destruída</h2>
</body>
</html>
```

## Configurando cookies da sessão

Podemos definir o nome e a duração de um cookie atráves do **session_name(" ")** e o **session_set_cookie_parms( )** respectivamente, e para que outro cookie não seja criado no lugar dele, devemos replicaló em todos os **session_start** necessários

Podemos criar cookies usando o **setcookie**:

```php
<?php 
    //criar o cookie
    $nome = 'meu_cookie';
    $valor = 'conteudo_do_meu_cookie';
    $expiracao = 3600;

    setcookie($nome, $valor, time()+$expiracao);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once('nav.php')?>
</body>
</html>
```

Para remover um cookie, é mais uma questão de criatividade:

```php
<?php 
    //remover cookie
    $nome = 'meu_cookie';
    setcookie($nome, '', time() - 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once('nav.php')?>
</body>
</html>
```

Podemos também usar o header para ir para a mesma página, clicando em outro link:

```php
<?php
	setcookie('theme', 'dark', time()+3600);
	header('Location: index.php');
?>
```


## MANIPULAÇÃO DO FILESYSTEM COM PHP

Quando falamos de file system e PHP, estamos fundamentalmente falando da manipulação do sistema de pasta e ficheiros do servidor web. O PHP tem um conjunto vasto de funções e mecanismos para manipulação de pasta e ficheiros no servidor: criar e remover pastas e ficheiros, efetuar leitura e escrita de conteúdo em ficheiro, obter informações detalhadas sobre ficheiros, etc.

### CONSTANTE _._DIR_._ E FUNÇÃO SCANDIR

o DIR serve para indicar em que pasta do servidor está sendo executado o script. Já o scandir lista arquivos e diretórios dentro do caminho especificado

```php
<?php 
echo '</pre>';

//listagem de ficheiros
echo __DIR__. '<br>';
$files = scandir(__DIR__); //constante mágica __DIR__
print_r($files);
echo '</pre>';
?>
```

### IS_FILE E IS_DIR

A função **IS_FILE** identifica se item é um ficheiro, já o **IS_DIR** identifica se é uma pasta

```php
foreach($files as $item) {
	echo is_file($item) ? 'Ficheiro' : 'Pasta'; //is_dir () identifica se é pasta
	echo '<br>';
}
```

### CRIAÇÃO E EXCLUSÃO DE PASTAS

podemos criar pastas, usamos o **mkdir**(__DIR__ . '/pasta_teste'). Se a pasta existir, vai aparecer um viso. Devemos sempre assegurar se a pasta ou ficheiro existe. Para isso podemos usar a função file_exists(). Funciona para ficheiros e pastas.

```php
<?php 
    if (!file_exists(__DIR__ . '/pasta_testes')){
        mkdir (__DIR__ . '/pasta_teste');
    }   
?>
```

Podemos remover pastas, usando o **rmdir**(__DIR__ . '/pasta_teste'). IMPORTANTE: A pasta só pode ser removida se estiver vazia.

```php
<?php 
    //Para remover uma pasta
    //rmdir(__DIR__ . '/pasta_teste');

    //Mais uma vez, vai aparecer um aviso se a pasta não existe.

    if (file_exists(__DIR__ . '/pasta_teste')){
        rmdir(__DIR__ . '/pasta_teste');
    }

    //IMPORTANTE: A pasta só pode ser removida se estiver vazia
    rmdir (__DIR__ . '/data'); 
?>
```

## INFORMAÇÕES SOBRE FICHEIROS & GUARDAR DADOS COM FILE_PUT_CONTENTS

Vamos ver como podemos obter informações sobre ficheiros:

* tamanho do ficheiro;
* extensão;
* nome do ficheiro.

Vamos ver como criar e guardar dados num ficheiro. Vamos fazer um exercício prático muito simples.

## OBTER TAMANHO DO ARQUIVO EM BYTES

Uma forma muito simples de obter o tamanho de um arquivo em bytes é usando o filesize ( ). Uma função, onde passamos por parametro o arquivo que queremos ver:

```php
    // Uma forma muito simples de obter o tamanho de um ficheiro em bytes
    $dados = filesize('registros.txt');
    echo $dados." bytes.";

    echo '<hr>';
```

### OBTER INFORMAÇÕES SOBRE O ARQUIVO

Para obtermos várias informações sobre um determinado arquivo, podemos usar o **pathinfo(' registros.txt ')**, onde nos é retornado o dirname, basename, extension e filename

```php
    // E para obter várias informações sobre um determinado arquivo.
    $info = pathinfo('registros.txt');
    print_r($info);
```

## COLOCANDO INFORMAÇÃO

Podemos incluir dados em um ficheiro com a função **file_put_contents( )**, passando como parâmetros o arquivo que desejo incluir os dados, e o dado propriamente dito. Caso o arquivo não existe, ele é criado e depois é adicionado o conteúdo, e se já existir conteúdo nesse ficheiro, ele é substituido.

É possível não ter o conteúdo excluído, caso seja usado a constante **FILE_APPEND**

```PHP
<?php 
echo '<pre>';

/*
Uma das formas mais diretas de criar e escrever informação num ficheiro é recorrendo à função file_put_contents()
*/

// Se o ficheiro não existe, é criado.
// O conteúdo vai ser esmagado.

file_put_contents('file1.txt', 'texto do ficheiro');

//Se pretendemos adicionar informação ao mesmo ficheiro, usamos o terceiro argumento.

//file_put_contents('file2.txt', time() . PHP_EOL, FILE_APPEND);
echo 'terminando';
?>
```

detalhe extra, para chegar ao fim de uma linha, usamos a constante **PHP_EOL**.

## nl2br

É uma função para que permite quebrar o texto em linhas.

## FILE_GET_CONTENT

Existem várias formas de leitura de dados a partir de um ficheiro de texto. No video anterior vimos a função file_put_contents() para guardar dados. Vejamos a função file_get_contents().

```PHP
<?php 
/*
Existem várias formas de leitura de dados a partir de um ficheiro de texto. No video anterior vimos a função file_put_contents() para guardar dados. Vejamos a função file_get_contents()
*/

$dados = file_get_contents('dados.txt');
echo nl2br($dados);

echo '<hr>';
```

Também podemos faze a leitura de um arquivo a partir de um determinado ponto, ou determinada quantidade, com o **offset:**  que define a partir de que ponto será lido o arquivo e o **length**, que define até qual valor será lido:

```php
// podemos let apenas uma parte do ficheiro
$dados = file_get_contents('dados.txt', offset: 6, length: 40);
echo nl2br ($dados);
```

Também existem outras formas de realizar a leitura dos dados, usando as funções: **fopen**, para abrir o arquivo que vamos fazer a leitura e dizer o que será feito, através de um parâmetro de um caractere(r = leitura, w - escrita e a - append), no caso leitura, **feof** que serve para indicar se chegamos ao final do ficheiro, **fgets** para obter uma linha do ficheiro e o **fclose**, para fechar a abertura inicial que fizemos desse arquivo:

```php
<?php 

/*
Em muitas circunstâncias será necessário um modo difernte de leitura dos dados. Ler uma linha de cada vez, por exemplo.
*/

$file = fopen("dados.txt", 'r');
while (!feof($file)){
    echo fgets($file) . '<br>';
}
fclose($file);

echo '<hr>'; //ou

$file = fopen("dados.txt", 'r');
while (($linha = fgets($file)) !== false){
    echo $linha . '<br>';
}
fclose($file);
?>
```

Podemos usar o **fopen** para além de leitura, escrita também, usando juntamente o **fputs()** ou **fwrite** que servem para colocar o texto no ficheiro:

```php
<?php 
    //Podemos usar o fopen / fclose para ler ou escrever

    //escrever num ficheiro
    $file = fopen("novoArquivo.txt", 'w');
    for ($i = 1; $i <= 1000; $i++){
        fputs($file, "3 x $i = " . (3 * $i) . PHP_EOL);
        //fwrite() é um alias de fputs
    }
    fclose($file);
?>
```

## Ler & Escrever ficheiros CSV

CSV significa Comma Separated Values (valores separados por vírgula). É um ficheiro com uma estrutura particular que permite ser usado entre aplicações para transporte de dados. Excel, LibreOffice, Google Sheets, ...

```php
<?php 
/*
CSV significa Comma Separated Values (valores separados por vírgula). É um ficheiro com uma estrutura particular que permite ser usado entre aplicações para transporte de dados. Excel, LibreOffice, Google Sheets, ...
*/

// Criar um ficheiro CSV
$file = fopen('dados.csv', 'w');

// Header das colunas
$header = ['Coluna A', 'Coluna B', 'Coluna C'];
fputcsv($file, $header);

// Linhas
for ($i = 1; $i <= 100; $i++){
    $linha = [rand(100, 999), rand(100, 999), rand(100, 999)];
    fputcsv($file, $linha);
}

fclose($file);
?>
```

### FPUTCSV ( )

Contém um conjunto de parâmetros que definem como os valores dentro do ficheiro serão separados.

### RAND ( )

É uma função que gera números aleátorios, passando os parâmetros de de geração do número, a partir de e até tal número.

## LEITURA DE CSV

A leitura de um ficheiro CSV é possível graças a função fgetcsv, fora seu uso, tudo se parece com a impressão de ficheiros comuns:

```php
<?php 
/*
A leitura é feita usando a função fgetcsv
*/

echo '<pre>';

$file = fopen('dados.csv', 'r');
while (!feof($file)){
    $linha = fgetcsv($file);
    print_r($linha);
}

fclose($file);
?>
```

## COPIAR, MOVER RENOMEAR & DELETAR

Quando falamos em cópia, queremos dizer em duplicação, levar um arquivo até outro lugar, mas sem que ele sai de seu ponto original, podemos fazer isso com a função **copy ()**:

```php
<?php 
// COPIAR, MOVER, RENOMEAR E ELIMINAR FICHEIROS

// Para copiar um ficheiro
copy(__DIR__ . '/origem/file1.nfo', __DIR__ . '/destino/file1.nfo');

// Na cópia, alterar o nome do ficheiro de destino
copy(__DIR__ . '/origem/file1.nfo', __DIR__ . '/destino/new_file.nfo');

// IMPORTANTE: Se o ficheiro de destino existir, vai ser esmagado
?>
```

Podemos alterar o nome do arquivo copiado para o outro local também, mas é importante lembrar que se o ficheiro de destino existir, vai ser esmagado.


### MOVER

Para mover um arquivo, ou seja, troca-lo de pastas, sem que uma cópia exista, usamos a função **rename ( )**

```php
<?php 
// MOVER

// Para mover um ficheiro (a cópia duplica), usamos a função rename
//rename(__DIR__ . '/file_to_move.nfo', __DIR__ . "/destino/file_to_move.nfo");

// Esta função também serve para renomear o ficheiro, desde que seja mantido o caminho
rename(__DIR__ . '/file_to_move.nfo', __DIR__ . "/destino/luva_de_processo.nfo");
?>
```

### DELETAR

Para deletar um arquivo, usamos a função **unlink ( )**:

```php
<?php 
// DELETAR

// Para eliminar um ficheiro, usamo a função unlink

unlink('file_to_delete.nfo');
?>
```


## CONSTANTES MÁGICAS

Existem nove constantes mágicas no PHP. São designadas por constantes mágicas, porque o seu valor é definido dependendo do local onde estão a ser usadas. Por exemplo, o valor de __LINE__ depende da linha de código dentro do script onde a constante mágica está a ser usada. São constantes case-insensitive, e permitem solucionar vários desafios. Vamos ver como funcionam.

### __  LINE  __

Indica a linha atual do código onde a constante se encontra. Caso seja usada por um script, traz a linha atual do script.


### __ FILE __

Indica o caminho completo do arquivo, independente de envolverem symbolic links. Se for usada dentro de um include ou require, será indicado o nome do script que está a ser incluído

```php
<?php 
// CONSTANTES MÁGICAS

/*
Existem nove constantes mágicas no PHP. São designadas por constantes mágicas, porque o seu valor é definido dependendo do local onde estão a ser usadas. Por exemplo, o valor de __LINE__ depende da linha de código dentro do script onde a constante mágica está a ser usada. São constantes case-insensitive, e permitem solucionar vários desafios. Vamos ver como funcionam.
*/

// -----------------------------------------------
// __LINE__
// Indica a linha atual do códgio onde a constante se encontra
echo "Número da linha em index1.php: ".__LINE__."<hr>";

require_once('script1.php');

// ---------------------------------------------
//__FILE__
// O caminho completo do ficheiro, independentemente de envolverem symbolic links. Se for usada dentro de um include ou require, será indicado o nome do script que está a ser incluído.

echo '(index_1): ' . __FILE__ . '<hr>';

require('script2.php');
include('script2.php')
?>
```

## __ DIR __

A pasta à qual pertence o script atual. Se usada dentro de um include, será devolvida a pasta do ficheiro que está a ser incluído. Tem o mesmo output que dirname(__FILE__). Não tem barra no final do valor, a não ser que estejamos na raiz.

### __ FUNCTION __

Nome da função onde o código está sendo executado.

```PHP
<?php 
    // CONSTANTES MÁGICAS
    // -----------------------------------------
    // __ DIR __

    /*
    A pasta à qual pertence o script atual.
    Se usada dentro de um include, será devolvida a pasta do ficheiro que está a ser incluído.
    Tem o mesmo output que dirname(__FILE__).
    Não tem barra no final do valor, a não ser que estejamos na raiz.
    */

    echo '(index2.php): ' . __DIR__ . '<br>';

    include 'outros/script3.php';
    echo '<hr>';
    //------------------------------------------
    // __ FUNCTION __

    /*
    Nome da função onde o código está sendo executado
    */

    adicionar(10, 20);

    function adicionar ($a, $b) {
        echo $a + $b;
        echo '<br>';
        echo __FUNCTION__;
    }
?>
```

## SUPER GLOBAIS

São variáveis em forma de arrays que estão semre disponíveis durante a execução do código e às quais podemos aceder e manipular em qualquer escopo da aplicação. Vejamos o exemplo de uma variável que pode ser usada dentro de uma função. Neste caso, todas as variáveis que têm um escopo global podem ser acedidas através da super global $GLOBALS: 

```PHP
<?php 
// SUPER GLOBAIS

/*
    São variáveis em forma de arrays que estão semre disponíveis durante a execução do código e às quais podemos aceder e manipular em qualquer escopo da aplicação
*/

/*
    Vejamos o exemplo de uma variável que pode ser usada dentro de uma função. Neste caso, todas as variáveis que têm um escopo global podem ser acedidas através da super global $GLOBALS
*/

$nome = "joao";

apresentar();

echo $nome . '<br>';
echo $apelido;

function apresentar(){
    global $nome;
    echo $nome . '<br>';

    //ou

    echo $GLOBALS['nome'] . '<br>';

    //Podemos alterar o valor da variável global.
    echo $GLOBALS['nome'] = "Carlos";
    echo $GLOBALS['apelido'] = 'Ribeiro';

    //IMPORTANTE: Existem algumas alterações que não podemos fazer, como por exemplo:
    // $GLOBALS = [];
    
}
?>
```

### $_SERVER

Informações sobre o servidor e ambiente de execução:

```PHP
<?php 
// $_SERVER

/* Informações sobre o servidoreambiente de execução */

// Nome do script atualmente em execução.
echo $_SERVER['PHP_SELF'] . '<br>';

// Endereço IP do servidor
echo $_SERVER['SERVER_ADDR'] . '<br>';

// Nome do servidor
echo $_SERVER['SERVER_ADDR'] . '<br>';

// Informações sobre o sistema do servifdor
echo $_SERVER['SERVER_SOFTWARE'] . '<br>';

// Informações sobre o protocolo usado
echo $_SERVER['SERVER_PROTOCOL'] . '<br>';

// Pasta raiz da aplicação
echo $_SERVER['DOCUMENT_ROOT'] . '<br>';

// Existem várias outras informações que podemos recolher com está superGlobal
?>
```

### $ _ SESSION

Acesso para leitura e manipulação das variáveis da sessão:

```PHP
<?php 
// $_SESSION
// Acesso para leitura e manipulação das variáveis da sessão

session_start();

$_SESSION['name'] = 'Keven';
$_SESSION['perfil'] = 'admin';
$_SESSION['autorizado'] = true;

echo "<pre>";
print_r($_SESSION);
?>
```

## $ _ COOKIE

Todos os cookies relacionados com a aplicação e respectivos valores:

```php
<?php 
// $_COOKIE
/*
    Todos os cookies relacionados com a aplicação e respectivos valores
*/

echo '<pre>';
print_r($_COOKIE);

echo '<br>';
echo ($_COOKIE['PHPSESSID']);
?>
```

## Função ISSET ()

Serve para verificações, retornando true caso o valor seja diferente de null.

## SUPER GLOBAL $_ GET

Com muita frequência vês na barra de endereções do navegador algo parecido com:

https://www.lojaonline.com/index.php?id=1&prd=25

O endereço web que vês acima tem uma url:

https://www.lojaonline.com/index.php

Seguida de um sinal de interrogação que da início à query string, que é o conjunto de parâmetros que vamos poder captar dentro do nosso script. Cada parâmetro está definido por um nome e um vlaor. Nocaso da URL acima, temos um id=1. Logo depois aparece um & que permite separar parâmetros de uma query string. Como conseguimos chegar a estes parâmetros. Logo depois aparece um & que permite separar parâmetros de uma query string. Como conseguimos chegar a ester parâmetros. Vamos ver a super global $_GET. É Um array onde são automaticamente colocados os parâmetros de uma queRy string.

```PHP
<?php 
    //SUPER GLOBAL $_GET

    /* 
    Com muita frequência vês na barra de endereções do navegador algo parecido com: 
    https://www.lojaonline.com/index.php?id=1&prd=25

    O endereço web que vês acima tem uma url:
    https://www.lojaonline.com/index.php

    Seguida de um sinal de interrogação que da início à query string, que é o conjunto de parâmetros que vamos poder captar dentro do nosso script.

    Cada parâmetro está definido por um nome e um vlaor. Nocaso da URL acima, temos um id=1

    Logo depois aparece um & que permite separar parâmetros de uma query string.
    Como conseguimos chegar a estes parâmetros.

    Logo depois aparece um & que permite separar parâmetros de uma query string. Como conseguimos chegar a ester parâmetros.

    Vamos ver a super global $_GET. É Um array onde são automaticamente colocados os parâmetros de uma quey string.
    */

    // vamos usar o endereço:
    // https://localhost/aula_061/index_1.php

    // Podemos verificar se existe algum parâmetro na query string

    if (!empty($_GET)){
        echo "Existem parâmetros na query string";
    } else {
        echo "Não existem parâmetros na quey string";
    }
?>
```

Podemos capturar um determinado valor da query string, recorremos à chave do array associativo da super global $_ GET. Mas devemos ter cuidado, se a variável não existir, vai surgir um erro, então devemos sempre verificar se existe e depois captar esse parâmetro

```php
<?php 
    //A SUPER GLOBAL $_GET

    //Vamos usar o endereço: 
    //http://127.0.0.1/cursosphpudemy/aula051/index2.php?id=100

    //Para capturar um determinado valor da query string, recorremos à chave do array
    //associativo da super global $_GET

    echo $_GET['id'];

    // Mas cuidado, se a variável não existir, vai surgir um erro

    echo $_GET['teste'];

    // Devemos sempre verificar se existe e depois captar esse parâmetro
    $valor = null;
    if (isset($_GET['teste'])){
        $valor = $_GET['teste'];
    }
    echo '<br>';
    echo "Valor: $valor";
?>
```

Vejamos a informação disponível nas ferramentas do programador:

* Network > Name
* Headers > Método GET e Payload

Esta é uma das formas que podes usar para passar informações entre páginas. Cuidando, nunca passes informalçoes que possam ser sensíveis ao funcionamento da tua aplicação.
Outra nota: Existem determinado caractere que entram em conflito com uma query string. Por exemplo o &, o espaço, o < e >. Veremos noutra ocasião como ultrapassar esses desafios.

## FUNÇÃO TRIM ()

Essa função tem o propósito de remover do inicio e do final de uma string, todo espaço que possa existir.

## TRATAMENTO DE FORMULÁRIOS - INTRODUÇÃO

Uma das áreas onde o PHP tem uma utilização muito grande é no tratamento das submissão de formulários. Quando tens um formulário escrito em HTML e prete que os dados sejam tratados do lado do servidor para, eventualmente, serem guardados numa base de dados, é quie que o PHP entra no sistema. Neste vídeo vamos fazer uma introdução ao tratamento de formulários com PHP e a super global $_POST Vamos analisar o seguinte formulário de login

```PHP
<?php 
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        die ('Acesso inválido');
    }

    $username = isset($_POST['nome']) ? $_POST['nome'] : null;
    $password = isset($_POST['senha']) ? $_POST['senha'] : null;

    $user = [
        "nome" => 'joao',
        "senha" => 'aaa'
    ];

    if ($username == $user['nome'] || $password == $user['senha']) {
        echo "<h1>Login OK</h1>";
    } else {
        echo "<h1>Login inválido</h1>";
    }

    echo '<a href="./index1.php">Voltar</a>';

    // Existem aspectos desse script que não são boas práticas.
?>
```

Nesse código, o REQUEST_METHOD está sendo usado para verificar o método é do tipo POST, e o die é um alias de exit ( );

## LOGIN_VERIFY ( )

Serve para comparar se a senha digitada está de acordo com um código hash de criptografia gerado.

## VALIDAÇÃO DE FORMULÁRIOS - PARTE I

Existem vários níveis de validação. Vamos considerar 3 níveis.

1. Ao nível do HTML5, usando atributosno formulário
2. Através de JavaScript, antes da submissão do formulário
3. Validação dos dados submetidos do lado do servidor.

Uma boa prática é ter os 3 níveis de validação. Mas uma vez que os dois primeiros acontecem do lado do cliente, é fundamental nunca esquecer o terceiro nível: A validação do lado do servidor

```php
<?php 

    //Verificação para saber se houve um request do tipo POST
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        die("Erro: Acesso inválido");
    }

    // -----------------------------------------
    /*
    REGRAS DE VALIDAÇÃO:

    - Todos os campos são de preenchimento obrigatório, exceto o textarea;
    - O primeiro campo de texto tem que ter entre 5 a 30 caracteres;
    - O campo da senha, tem que ter exatamente 12 caracteres.
    - Dos 3 checkboxes, pelo menos uma tem que estar selecionada;
    - Nos radiobuttons tem que existir uma opção selecionada;
    - No caso do textarea, não é obrigatório, mas se tiver texto tem que ter, no mínimo, 30 caracteres.    
    */

    $erros = [];

    //text
    if (empty($_POST['text_texto'])){
        $erros[] = 'ERRO: O campo obrigatório de texto está vazio';
    } else if (strlen($_POST['text_texto']) < 1 || strlen($_POST['text_texto']) > 30){
        $erros[] = 'ERRO: O campo obrigatório de texto tem que ter entre 5 e 30 caracteres';
    }

    //password
    if (empty($_POST['text_password'])){
        $erros[] = 'ERRO: O campo obrigatório de senha está vazio'; 
    } else if (strlen($_POST['text_password']) !== 12){
        $erros[] = 'ERRO: O campo obrigatório de senha deve conter exatamente 12 caracteres';
    }

    //select
    if (empty($_POST['select'])) {
        $erros[] = 'ERRO: O campo de país é obrigátorio, selecione um deles';
    }

    //checkboxes
    $checks = ['check_1', 'check_2', 'check_3'];
    $nullChecks = true;
    foreach ($checks as $check){
        if (!empty($_POST[$check])){
            $nullChecks = false;
            break;
        } else {
        }
    }

    if ($nullChecks){
        $erros[] = 'ERRO: Ao menos um das opções de multipla escolha deve estar selecionada';
    }

    //radio
    if (empty($_POST['radio'])){
        $erros[] = "ERRO: É obrigatório a seleção de uma das opções de escolha única.";
    }

    //text_area
    if (!empty($_POST['text_area'])){
        if(strlen($_POST['text_area']) < 30){
            $erros[] = 'ERRO: A área de texto deve conter pelo menos 30 caracteres (seu preenchimento não é obrigatório).';
        }
    }
    // -------------------------------------------------------
    // - | - Impressão das informações - | -
    if (!empty($erros)){
        echo '<h1>Erros encontrados</h1>';
        echo '<ol>';
            foreach ($erros as $erro){
                echo '<li>' . $erro . '</li>';
            }
        echo '</ol>';
    }  else {
        echo '<pre>';
        print_r($_POST);
    }
?>
```

A validação do formulário funcionou corretamente, porém ainda há algo para pensar. E se quisermos apresentar os erros no formulário, manter os valores que estavam escritos e só apresentar os dados no caos de já não existir nenhum erro?

IMPORTANTE: Este exercício é mais simples de executar quando usamos um framework que já contém mecanismos programados para facilitar o desenvolvimento destas operações.

Vamos simplificar com um formulário de login.

```php
<?php

session_start();

/*
REGRAS DE VALIDAÇÃO:
- Todos os campos são de preenchimento obrigatório
- o primeiro campo username tem que ter entre 5 e 30 caracteres
- o campo da password, tem que ter exatamente 12 caracteres

Neste caso vamos querer guardar mais informações nas validações:
    1. O nome do campo analisado
    2. O valor que ele tem
    3. A eventual mensagem de erro

Os dois primeiros valores são fundamentais para apresentar os
valores anteriormente submetidos. Neste caso vamos apenas
usar o do username

Quando existir um erro, o primeiro valor e o terceiro
vão ser fundamentais para apresentar o erro no local correto
*/

// -----------------------------------------
// no caso de alguém tentar entrar no script de forma direta
// vamos redirecionar diretamente para o formulário de login

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: form.php');
    return;
}

// -----------------------------------------
// agora vamos analisar os erros e preparar o regresso ao
// formulário, se for o caso. Vamos precisar de dados.
$inputs = [];

// -----------------------------------------
// username
$inputs['text_username'] = [
    'value' => '',
    'erro' => ''
];

if(empty($_POST['text_username'])){
    $inputs['text_username']['erro'] = 'O campo é de preenchimento obrigatório.';
} else {
    $inputs['text_username']['value'] = $_POST['text_username'];
    if (strlen($_POST['text_username']) < 5 || strlen($_POST['text_username']) > 30) {
        $inputs['text_username']['erro'] = 'O Username tem que ter entre 5 e 30 caracteres.';
    }
}

// -----------------------------------------
// password
$inputs['text_password'] = [
    'value' => '',
    'erro' => ''
];

if(empty($_POST['text_password'])){
    $inputs['text_password']['erro'] = 'O campo é de preenchimento obrigatório.';
} else {
    if (strlen($_POST['text_password']) != 12) {
        $inputs['text_password']['erro'] = 'A Password deve ter 12 caracteres.';
    }
}

// -----------------------------------------
// vamos verificar se existem erros.
// em caso afirmativo, vamos colocar a informação dos inputs na sessão 
// e redirecionar para o formulário, para apresentar os erros e valores.

if(!empty($inputs['text_username']['erro'] || !empty($inputs['text_password']['erro']))){
    $_SESSION['inputs'] = $inputs;
    header('Location: form.php');
    return;
}

// no caso de não haver erros, vamos apresentar os valores
echo '<p>Username: <strong>' . $_POST['text_username'] . '</strong></p>';
echo '<p>Password: <strong>' . $_POST['text_password'] . '</strong></p>';
```

## A SIMPLES E COMPLEXA VALIDAÇÃO DE DADOS

Como vimos nos vídeos anteriores, a validação de formulários é de extrema importância para impedir problemas no fluxo do nosso código. No entanto, a validação de formulários não é o único processo em que é necessário validar dados. Por exemplo, podemos estar carregando uma informação a partir de um arquivo de dados, ou de uma base de dados, e podemos ter a necessidade de analisar, por exemplo, se um e-mail é válido, ou se uma determinada string é um valor numérico.

A validação de um determinado dado pode ser mais simples, usando as funções existentes no PHP para essa validação, ou com necessidade de recorrermos as expressões regulares. Vejamos apenas alguns exemplos a titulo de curiosidade:

```PHP
// Validar se um valor é uma string
$valor = 12;
$texto = "blá blá blá, blé blé blé";
var_dump(is_string($valor)); echo "<br>";
var_dump(is_string($texto)); echo '<hr>' ;

// Validar se é um valor númerico;
$valor1 = 1;
$valor2 = 1.5;
$valor3 = "69";
$valor4 = 'quarenta e dois';
$valor5 = true;

var_dump(is_numeric($valor1)); echo "<br>";
var_dump(is_numeric($valor2)); echo "<br>";
var_dump(is_numeric($valor3)); echo "<br>";
var_dump(is_numeric($valor5)); echo "<br>";
var_dump(is_numeric($valor4)); echo "<hr>";


//Validar se é um valor booleano
/*$var1 = true;
$var2 = "true";
$var3 = 1;
$var4 = 0;

var_dump(is_bool($var1)); echo "<br>";
var_dump(is_bool($var2)); echo "<br>";
var_dump(is_bool($var3)); echo "<br>";
var_dump(is_bool($var4)); echo "<hr>";*/

//Validar se uma variável está vazia

$var1;
$var2 = "";
$var3 = " ";
$var4 = 0;
$var5 = null;
$var6 = [];

var_dump(empty($var1)); echo "<br>";
var_dump(empty($var2)); echo "<br>";
var_dump(empty($var3)); echo "<br>";
var_dump(empty($var4)); echo "<br>";
var_dump(empty($var5)); echo "<br>";
var_dump(empty($var6)); echo "<hr>";
```

Além dessa forma mais simples de validação, como já explicado anteriormente, também podemos usar métodos e conceitos mais avançados do PHP para isso, como uma validação de caracteres, que é necessário se utilizar uma estrutura condicional: 

### Validação de número de caracteres

```php
// Validação se tem número de caracteres válidos (3 a 20)
$nome = "Keven Willians";

if (strlen($nome) < 3 || strlen($nome) > 20) {
    echo "A quantidade de caracteres está incorreta";
} else {
    echo "Variável nome com quantidade de caracteres válida.";
}
echo "<br>";
```

Porém, como poderíamos validar um e-mail? uma URL? Já nos vem a cabeça a dificuldade que seria fazer isso, porém no PHP já existe uma função que pode nos auxiliar muito bem com isso, o  **FILTER_VAR( )**

### FILTER_VAR( )

O FILTER_ VAR é uma função do PHP, que contém um conjunto de constantes que indicam qual é o sistema de validação que será usado para validar esse valor,. FILTER_VAR retorna o valor, caso seja válido, ou false, se o valor não estiver de acordo com a validação pretendida. Algumas dessas constantes são: 
- FILTER_VALIDATE_INT;
- FILTER_VALIDATE_BOOLEAN;
- FILTER_VALIDATE_FLOAT;
- FILTER_VALIDATE_IP;
- FILTER_VALIDATE_EMAIL;
- FILTER_VALIDATE_URL;
- FILTER_VALIDATE_REGEXP.

## Validação de e-mail

```php
// Validar de um email é válido;
$email = 'Kevenwillians@gmail.com';

if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "O email está com formato correto";
} else {
    echo "O email não está em um formato correto";
}
```

### Validação de uma URL

```php
// Validar uma URL

$url = "https://www.google.com/";

if (filter_var($url, FILTER_VALIDATE_URL)){

echo "A URL está em um formato válido";

} else {

echo "A URL está em um formato incorreto para o uso";

}
```

Outra coisa que vem a mente é, como realizar a validação de um número de telefone? Bom, você pode fazer isso de muitas formas, porém a mais correta seria com expressões regulares, apesar de não ser um assunto que será estudado nesse módulo:

De forma simples, como podemos fazer isso? O jeito mais fácil a primeira vista é usando a função **PREG_MATCH( )**:

### PREG_MATCH ( )

A função **preg_match ( )** serve para fazer a verificação se o valor passado está de acordo com a expressão regular, se estiver, é retornado o número 1, se não é retornado o número 0, e caso ocorra algum erro, é retornado false.
### Validação de telefone

```php
// Validar se um telefone começa com 9 e tem 9 digitos
var_dump(preg_match("/^9{1}\d{8}$/", "966213456"));
// 1 = expressão regular confirma o valor analisado
// 0 = expressão regular não confirma o valor analisado
// false = aconteceu um erro
```


## FUNÇÕES RELACIONADAS COM ERROS

O PHP contém um conjunto de funções e mecanismos para lidar com erros. As funções relacionadas com erros permitem-nos definir regras para a apresentação ou ocultação de erros. Podemos também usá-las para fazer um registro de logs

O registro de logs não é mais do que um histórico de eventos que vão acontecendo na nossa aplicação. Se esse registro guardar erros que vão sendo detetados ao longo da execução, isso permite que possamos resolver esses erros, sabendo onde e quando ocorrem. Existem funções de log que permitem o envio de mensagens para outras máquinas, emails, ou registro de logs do sistema.

Existem funções que permitem definir o nível e tipo de erros que serão apresentados. Esse tipo de funções são particularmente importantes na fase de desenvolvimento de uma aplicação, uma vez que nos dão informações detalhadas sobre os erros do nosso código.

## ERROR_REPORTING

É uma função nativa do PHP que permite definir o nível de erros que podemos apresentar, e avisos também, o parâmetro pode ser um valor inteiro ou a respectiva constante:

```PHP
error_reporting(E_WARNING);

/* 
    1   E_ERROR
    2   E_WARNING
    4   E_PARSE
    8   E_NOTICE
    16  E_CORE_ERROR
    32  E_CORE_WARNING
    64  E_COMPILE_ERROR
    128 E_COMPILE_WARNING
    256 E_USER_ERROR
    512 E_USER_WARNING
    1024 E_USER_NOTICE
    2048 E_STRICT
    4096 E_RECOVERABLE_ERROR
    8192 E_DEPRECATED
    16384 E_USER_DEPRECATED
    32767 E_ALL
*/
```

Podemos ainda refinar o parâmetro da função passando mais do que uma constante. Por exemplo:

```php
// Desliga todas as mensagens de erro.
    //error_reporting(0);

    // Apenas erros de runtime
    //error_reporting(E_ERROR | E_PARSE | E_WARNING);

    // Todos os erros
    error_reporting(E_ALL);

    //O mesmo que a função anterior
    ini_set("error_reporting", E_ALL);

    //Reporta todos os erros, exceto E_NOTICE
    error_reporting(E_ALL & ~E_NOTICE);

    //Se estamos em ambiente de desenvolvimento da aplicação e queremos que todos os erros sejam mostrados, podemos usar o seguinte código:

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    //todos os errors e avisos serão apresentados sempre, que o teu código apresentar um problema
?>
```

## TRATAMENTO DE ERROS

No vídeo anterior vimos como ativar e controlar a forma como o PHP apresenta (ou não) os erros dos nossos scripts. No entanto, o desafio está em executar o nosso código de forma a que, sempre que um potencial erro ocorra, a nossa aplicação seja capaz de o capturar e seguir um caminho alternativo É sobre isso que iremos falar neste vídeo. Vamos começar por tratamento de exceções. É um mecanismo que serve para alterar o fluxo normal da execução do código, se ocorrer um erro especificado (excepcional). Está condição é chamada de exceção

```PHP
<?php 
// TRATAMENTO DE ERROS

/*
No vídeo anterior vimos como ativar e controlar a forma como o PHP apresenta (ou não) os erros dos nossos scripts. No entanto, o desafio está em executar o nosso código de forma a que, sempre que um potencial erro ocorra, a nossa aplicação seja capaz de o capturar e seguir um caminho alternativo

É sobre isso que iremos falar neste vídeo

Vamos começar por tratamento de exceções.
É um mecanismo que serve para alterar o fluxo normal da execução do código, se ocorrer um erro especificado (excepcional).
Está condição é chamada de exceção
*/

function adicionar($a, $b){
    if (!is_numeric($a) || !is_numeric($b)){
        throw new Exception("Pelo menos um dos valores não é númerico");
    }
    return $a + $b;
}

// echo adicionar('joao', 1000);

// Agora usando a estrutura do try catch para impedir o fim da execução
try {
    echo adicionar('joao', 1000);
} catch (Exception $erro) {
    echo $erro->getMessage();
}

echo "<br>Fim do script.";
?>
```


# PHP8 ORIENTADO A OBJETOS

## Como escrever uma classe e instanciar um objeto?

Vimos que uma classe é um modelo para a criação de objetos. Os objetos, são instâncias de uma classe. Já vamos perceber tudo isso de forma simples.

```php
<?php 
    // COMO ESCREVER UMA CLASSE E INSTANCIAR UM OBJETO?

/*
VImos que uma classe é um modelo para a criação de objetos. Os objetos, são instâncias de uma classe. Já vamos perceber tudo isso de forma simples.
*/

class Fruta {
    // Código da classe aqui dentro
}

// Objeto instanciado
$laranja = new Fruta();
?>
```

Também podemos incluir propriedades nessas classes, para que possam ser usada nos objetos. O simbolo chave para isso é a flecha **->** e depois a propriedade desejada:

```php
<?php 

// Agora vamos fazer uma pequena implementação

class Fruta {
    // propriedades
    public $nome;
}

//Criando dois objetos do tipo Fruta
$laranja = new Fruta();
$ananas = new Fruta();

//Definindo os valores de cada objeto
$laranja -> nome = "Laranja";
$ananas -> nome = "Ananás";

//Como apresentar as propriedades de um objeto?
echo $laranja -> nome;
echo '<br>';
echo $ananas -> nome;

//Cada objeto criado a partir da mesma classe, contém as suas propriedades
//de forma completamente independente

?>
```

Além das propriedades, também existem os **MÉTODOS**, que são as funções da classe. Outra coisa interessante quando falamos de métodos é o uso da palavra **THIS**, que é usada quando refere-se ao objeto atual e só está disponível dentro dos métodos (funções da classe):

```php
<?php 
/*
As classes potem ter PROPRIEDADES e MÉTODOS

PROPRIEDADES são variáveis da classe
MÉTODOS são funções da classe

A palavra-chave $this refere-se ao objeto atual
e só está disponível dentro dos métodos (funções da classe)
*/

class Fruta {
    public $nome;
    public $cor;
    public $peso;

    // Criação de um método
    public function apresentar_fruto(){
        return "O nome da fruta é {$this->nome}, sua cor é {$this->cor} e pesa {$this->peso}";
    }
}

$banana = new Fruta();
$banana -> nome = 'Banana';
$banana -> cor = 'Amarelo';
$banana -> peso = '20g';

$maca = new Fruta();
$maca -> nome = 'Maca';
$maca -> cor = 'Vermelho';
$maca -> peso = '30g';

$melancia = new Fruta();
$melancia -> nome = 'Melancia';
$melancia -> cor = 'Verde';
$melancia -> peso = '300g';

echo $banana -> apresentar_fruto();
echo '<br>';
echo $maca -> apresentar_fruto();
echo '<br>';
echo $melancia -> apresentar_fruto();

?>
```

## Acess Modifiers

Já vimos que as classes podem ter PROPRIEDADES (variáveis de classe) e MÉTODOS (funções da classe).

As PROPRIEDADES e os MÉTODOS podem ter níveis de acesso distintos que permitem controlar a que nível podemos ter acesso a eles ou não.

**PUBLIC** - a propriedade ou método pode ser acedida a partir de qualquer lado. É o access modifier padrão.

**PROTECTED** - a propriedade ou método pode ser acedida dentro da classe e dentro de classes derivadas dela (veremos mais à frente o que são classes derivadas).

**PRIVATE** - a propriedade ou método só pode ser acedido DENTRO da classe.

```php
class Homem {
    public $nome;
    protected $apelido;
    private $corCabelo;
}
// Vamos fazer a instanciação de Homem = criar um objeto a partir da classe
$keven = new Homem();


// Agora, se tentármos o acesso a cada uma das propriedades: 
$keven -> nome = "Keven";       // OK
$keven -> apelido = "KEVENEK";  // ERRO
$keven -> corCabelo = "preto";  // ERRO
?>
```

O mesmo vale para os métodos

```php
<?php 
// ACESS MODIFIERS

// Vejamos o que aocntece com os métodos

class Mulher {
    public $nome;
    public $apelido;
    public $corCabelo;

    public function metodo_01 () {
        echo 'Método I';
    }

    protected function metodo_02 () {
        echo 'Método II';
    }

    private function metodo_03 () {
        echo 'Método III';
    }
}

$femea = new Mulher();

echo $femea -> metodo_01(); // OK
echo $femea -> metodo_02(); // ERRO
echo $femea -> metodo_03(); // ERRO
?>
```

## CONSTRUTOR

O construtor é um conceito da programação orientada a objetos que está relacionado com a existência de um método especial dentro da classe que vai ser executada automaticamente sempre que um novo objeto é criado a partir dessa classe. Quando vamos fazer a instanciação da classe num objeto, essa instanciação vai obrigar a que tenhamos que definir os argumentos que o método especial __construct no está a pedir

```PHP
<?php 
    // CONSTRUTOR

    /*
    O construtor é um conceito da programação orientada a objetos que está relacionado com a existência de um método especial dentro da classe que vai ser executada automaticamente sempre que um novo objeto é criado a partir dessa classe.
    */

    class Mulher {
        private $nome;
        private $apelido;

        function __construct($nome, $apelido)
        {
            $this->nome = $nome;
            $this->apelido = $apelido;
        }

        function get_nome () {
            return $this->nome;
        }

        function get_apelido () {
            return $this->apelido;
        }

        function get_nome_completo () {
            return $this->nome.' '.$this->apelido;
        }
    }
    /*
    Quando vamos fazer a instanciação da classe num objeto,
    essa instanciação vai obrigar a que tenhamos que definir
    os argumentos que o método especial __construct no está a pedir
    */
    $m = new Mulher('Jessica', 'Pereira');
    echo $m->get_nome();
    echo '<br>';
    echo $m->get_apelido();
    echo '<br>';
    echo $m->get_nome_completo();
?>
```

## DESTRUCTOR

Tal como acontece com o construct, existe um método especial que só vai ser executado quand um objeto é destruido ou o script termina a sua execução

```PHP
<?php 
// DESTRUCTOR

/*
Tal como acontece com o __construct, existe um método especial que só vai ser executado quand um objeto é destruido ou o script termina a sua execução
*/

class Cliente {
    
    private $nome;
    function __construct($n) {
        $this->nome = $n;
        echo 'Foi criado um novo objeto com o nome: ' . $this->nome . '<br>';
    }

    function __destruct()
    {
        echo 'O objeto foi destruído. Tinha o seguinte nome ' . $this->nome . '<br>';
    }
}
?>
```

## HEREDITARIEDADE

Um dos aspectos mais importantes da Programação Orientada a Objetos é a possibilidade de estruturarmos o nosso código no sentido de permitir que classes possam herdar propriedades e métodos de outras classes. Desta forma, podemos ter o código mais limpo e bem estruturado, sem repetições desnecessárias de código.

```PHP
class Veiculo {
    public $tipo;

    public function ligar () {
        // ...
    }

    public function desligar () {
        // ...
    }

// A classe veículo vai agora ser usada para criar duas classes
}

class Automovel extends Veiculo {
    //Além das propriedades e métodos da classe veículo,
    //vai ainda ter as propriedades específicas desta classe.
    public $portas;
    public $marca;
    public $ano;
}

class Aviao extends Veiculo {
    // Além das propriedades e métodos da classe veículo,
    //vai ainda ter as propriedades específicas desta classe.
    public $altitude_maxima;
    public $autonomia;
    public $construtora;
    public $ano_de_fabricacao;
}

$automovel = new Automovel();
$automovel->tipo = 'Veiculo terrestre';
$automovel->marca = 'Ferrari';
$automovel->portas = 2;
$automovel->ano = 2020;

$aviao = new Aviao();
$aviao->tipo = 'Veiculo aéreo';
$aviao->construtora = 'Boeing';
$aviao -> autonomia = '6000';
$aviao -> ano_de_fabricacao = 2022;
$aviao -> altitude_maxima = 33000;

$automovel->ligar();
$aviao->desligar()
?>
```

Não só cada objeto tem as propriedades da classe base, como também tem as funcionalidades que cada classe implementa, veja no exemplo abaixo:

```php
<?php 
    // Vejamos os conceitos num exemplo mais prático

    class Animal_de_estimação {
        protected $nome;
        protected $raca;
        protected $especie;

        function __construct($nome, $raca, $especie) {
            $this->nome = $nome;
            $this->raca = $raca;
            $this->especie = $especie;
        }

       
    }

    class Cao extends Animal_de_estimação {
        public function Latir ($vezes) {
            echo "O {$this->nome} latiu $vezes vezes<br>";
        }
    }

    class Felino extends Animal_de_estimação {
        public function Miar ($vezes) {
            echo "O {$this->nome} miou $vezes vezes";
        }
    }

    $cachorro = new Cao('Toby', 'Shitszu', 'canina');
    $gato = new Felino('Sr.Bola de Neve', 'Persa', 'Laranja');

    //Não só cada objeto tem as propriedades da classe base, como também tem as funcionalidades que cada classe implementa
    //Portanto:

    $cachorro->Latir(17);
    $gato->Miar(3);
```

Observa que, na classe Animal_de_estimação, as propriedades foram definidas com o Access Modifier PROTECTED. Já tinha referido que no caso do PROTECTED, a propriedade ou método pode ser acedida dentro da classe e dentro de classes derivadas dela. E por fim, saiba que também podemos fazer arrays de objetos de uma maneira muito simples:

```php
<?php 
    class Cliente {

        protected $nome;
        protected $email;
    

        public function __construct($nome, $email)
        {
            $this->nome = $nome;
            $this->email = $email;
        }

        protected function apresentar () {
            echo "O email do cliente {$this->nome} é {$this->email}";
        }
    }

    $clientes = [
        new Cliente ('Keven', 'keven@gmail.com'),
        new Cliente ('Marcos', 'marcos@gmail.com'),
        new Cliente ('Pedro', 'pedro@gmail.com')
    ];

    echo '<pre>';
    print_r($clientes);
    echo '</pre>';
?>
```

## SOBREPOSIÇÃO DE MÉTODOS HERDADOS

O conceito de 'sobreposição' é uma tradução simples de um outro conceito mais conhecido como 'override'. Na prática significa que podemos ter uma classe 'Mãe' onde um determinado método é definido e podemos alterar o seu código dentro de uma classe 'filha'.

```php
<?php 
    // SOBREPOSIÇÃO DE MÉTODOS HERDADOS

    /*
    O conceito de 'sobreposição' é uma tradução simples de um outro conceito mais conhecido como 'override'.
    Na prática significa que podemos ter uma classe 'Mãe' nde um deteminado método é definido e podemos alterar o seu código dentro de uma classe 'filha'.
    */

    class Pessoa {
        public $nome;

        public function __construct($nome)
        {
            $this->nome = $nome;
        }
        
        public function apresentar() {
            echo "O nome é {$this->nome}, e esste é o método mãe";
        }
    }

    class Anao extends Pessoa {
        
        // Sobrescrevendo o método da classe mãe
        public function apresentar()
        {
            echo "O nome é {$this->nome}, e este é o método filho";
        }
    }

    // Instanciando os dois objetos
    $mae = new Pessoa('Creuza');
    $filho = new Anao('Pedrinho Curador');


    // Apresentando o método normal e o sobreescrito
    $mae->apresentar();
    echo '<br><br>';
    $filho->apresentar();
    
?>
```

## IMPEDIR HERANÇA DE CLASSE OU MÉTODO

Imagine que irá criar um bloco de código uqe vai ser usado por outro programador. Vai querer que a estrutura da sua classe contenha mecanismos que impessam determinado tipo de açoes. Por exemplo, pode querer que uma determinada classe nçao possa ser herdada por outro. Ou simplemente, um determinado método dessa classe não deverá poder ser sobreposto (override) por outro dentro da classe 'filha':

```php
final class Classe_unica {

    // basta utilizar a palavra chave 'final' no começo, assim, essa classe não poderá ser herdada

}

class Nova extends Classe_unica {

    // Será gerado um fatal error, já que a classe Classe_unica não pode ser herdada

}
?>
```

O mesmo pode ser feito com os métodos apenas: 

```php
<?php 
    // A mesma regra vale para os métodos

    class Pessoa {
        public function falar() {
            echo "1";
        }

        final public function cochichar() {
            echo "2";
        }
    }

    class Novo extends Pessoa {
        public function falar()
        {
            echo '4';
        }

        /*
        public function cochichar(){
            echo '4';

            //fatal error: cannot override final method
        }
        */
    }
?>
```

## CLASSES ABSTRATAS

Um outro conceito muito importante na Programação Orientada a Objetos é o conceito de classes abstratas. Uma classe abstrata, com métodos abstratos, implica que a classe tenha métodos que estão declarados, mas cuja funcionalidade vai ter que ser implementada nas classes derivadas: 

``` php
<?php 
// Classes abstratas

/*
    Um outro conceito muito importante na Programação Orientada a Objetos é o conceito de classes abstratas.

    Uma clase abstrata, com métodos abstratos, implica que a classe tenha métodos que estão declarados, mas cuja funcionalidade vai ter que ser implementada nas classes derivadas

    Vejamos um exemplo:

    
*/

abstract class Pessoa 
{
    abstract public function identificar();
    abstract public function falar();
    abstract public function saltar();
}

// Como pode ver. os métodos estão declarados, mas não têm implementação. As classes derivadas vão ter que definir essa implementação

class Cliente1 extends Pessoa {
    // Isso irá gerar um fatal error, pois, nas classes derivadas, ou seja, que herdam de uma classe abstrata, é obrigatório todos os métodos estarem declarados

    // Class Cliente1 contains 3 abstract methods and must therefore be declared abstract or implement the remaining methods


}

class Cliente2 extends Pessoa {
    
    public function identificar(){

    }
    public function falar(){

    }
    public function saltar(){

    }
}

// Neste caso a classe Cliente2 contém todas as implementações, então funcionará de boa
// A class Pessoa obriga a implementar devido ao uso da expressão ABSTRACT
?>
```

Ao herdar de uma classe abstrata, o método da classe filha deve ser definido com o mesmo nome, e um aceess modifier com restrição igual ou menor. Por exemplo, se o método abstrato for definido como protected, o método da classe filha deve ser definido como protected ou public. Não pode ser privado. Além disso, o tipo e o número de argumentos exigidos devem ser os mesmos. No entanto, as classes filhas podem ter argumentos opcionais.

Assim, quando uma classe filha é herdada de uma classe abstrata, temos as seguintes regras:

> o método da classe filha deve ser definido com o mesmo nome;

> o método da classe filha deve ser definido com o mesmo access modifier ou outro menos restrito;

> o número de argumentos necessários deve ser o mesmo. No entanto, a classe filha pode ter argumentos opcionais adicionais


```php
<?php 
    /*
    Ao herdar de uma classe abstrata, o método da classe filha
    deve ser definido com o mesmo nome, e um aceess modifier com restrição igual ou menor.

    Por exemplo, se o método abstrato for definido como protected, o método da classe filha
    deve ser definido como protected ou public. Não pode ser privado.

    Além disso, o tipo e o número de argumentos exigidos devem ser os mesmos. No entanto, as classes filhas podem ter argumentos opcionais.

    Assim, quando uma classe filha é herdada de uma classe abstrata, temos as seguintes regras:

    > o método da classe filha deve ser definido com o mesmo nome;
    > o método da classe filha deve ser definido com o mesmo access moddifier ou outro menos restrito;
    > o número de argumentos necessários deve ser o mesmo. No entanto, a classe filha
    pode ter argumentos opcionais adicionais
    */

    abstract class Pessoa {
        abstract public function falar($mensagem);
    }

    class Cliente extends Pessoa {
        public function falar($mensagem, $autor = 'joao'){
            echo "$mensagem - $autor";
        }
    }

    $cliente = new Cliente();
    $cliente->falar('djskdsfds');

    //IMPORTANTE: a assinatura do método em Cliente, tem que ser igual à assinatura do método na classe abstrata. Contudo, ao adicionar um parametro opcional, podemos passar informação adicional para o interior da função.
?>
```

## CRIAÇÃO DE CLASSES A PARTIR DE INTERFACES

Em programação orientada a objetos, o conceito de INterfaces é semelhante ao de uma classe abstrata. Vamos ver as diferenças. Interfaces permitem especificar métodos que as clases vão ter que implementar nas suas estruturas. Quando várias classes têm que implementar um conjunto de métodos semelhantes, estamos a entrar num conceito muito importante da programação orientada a objetos que é o Polimorfismo.

Principais diferenças:

> As interfaces não podem conter propriedades. As classes abstratas podem;

> Todos os métodos das interfaces são public. Nas classes abstratas, são public ou protected;

> Todos os métodos das interfaces são abstratos por natureza. Não podem ter implementação dentro da interface;

> As classes podem implementar uma interface e herdar de outra classe ao mesmo tempo

```PHP
<?php 
// CRIAÇÃO DE CLASSES A PARTIR DE INTERFACES

/*
Em programação orientada a objetos, o conceito de INterfaces é semelhante ao de uma classe abstrata. Vamos ver as diferenças.

Interfaces permitem especificar métodos que as clases vão ter que implementar nas suas estruturas.

Quando várias classes têm que implementar um conjunto de métodos semelhantes, estamos a entrar num conceito muito importante da programação orientada a objetos que é o Polimorfismo.

Vejamos um exemplo de uma interface
*/

interface Animal {
    public function vocalizar($vezes);
    public function identificar();
    public function executarMovimento($direcao);
}

/* 
    Principais diferenças:

    > As interfaces não podem conter propriedades. As classes abstratas podem;

    > Todos os métodos das interfaces são public. Nas classes abstratas, são public ou protected;

    > Todos os métodos das interfaces são abstratos por natureza. Não podem ter implementação dentro da interface;

    > As classes podem implementar uma interface e herdar de outra classe ao mesmo tempo
*/

class Cao implements Animal {
    public function vocalizar($vezes){
        echo "Foi vocalizado $vezes";
    }
    public function identificar(){
        echo "Foi identificado";
    }
    public function executarMovimento($direcao){
        echo "Foi executado o movimento $direcao vezes";
    }
}

$cachorro = new Cao();

$cachorro->vocalizar(5);
echo '<br>';
$cachorro->identificar();
echo '<br>';
$cachorro->executarMovimento(324);
?>
```

Pegando no exemplo anterior, a interface Animal declara a função vocalizar. Cada animal tem uma forma diferente de vocalizar. Então podemos ter o seguinte:

```PHP
interface Animal {
    public function vocalizar();
}

class Cao implements Animal{
    public function vocalizar()
    {
        echo ("ladrar . . .");
    }
}

class Felino implements Animal{
    public function vocalizar()
    {
        echo ("Miar . . .");
    }
}

class Lobo implements Animal{
    public function vocalizar()
    {
        echo ("Uivar . . .");
    }
}

$cachorro = new Cao();
$cachorro->vocalizar();
echo '<br>';

$gato = new Felino();
$gato->vocalizar();
echo '<br>';

$lobo = new Lobo();
$lobo->vocalizar();
echo '<br>';
```

Em forma de conclusão, enquanto as classes são modelos para a criação de objetos, as interfaces podem ser usadas como modelos para a criação de classes. FUncionam como um contrato no qual o programador, para implementar uma determinada classe, compromete-se a desenvolver essa classe a partir de uma interface, logo, mantendo a estrutura de métodos que essa interface declara, independentemente da implementação de código que esses métodos depois vão ter dentro da classe.

IMPORTANTE: Estes conceitos são centrais no âmbito da programação orientada a objeto, mais isso não quer dizer que tem que os aplicar em todos os seus projetos. Aliás, na maior parte dos casos, estes conceitos são aplicados no desenvolvimento de frameworks que depois tu vai aproveitar para construir suas aplicações.

## O que são Traits & como utilizar?

O PHP apenas suporta heranças únicas: uma classe só pode herdar de uma outra classe. Imagina que quer que a classe seja derivada de outra e, ao mesmo tempo, possa "herdar" outras funcionalidades a partir de outras estruturas

É neste contexto que os traits surgem. Basicamente, traits permitem declarar métodos que podem ser usados em múltiplas classes.

Na sua vertente mais avançada, os traits podem conter métodos abstratos que podem ser usados em múltiplas classes, e esses métodos podem ter qualquer tipo de access modifier.

```php
<?php 
// O QUE SÃO TRAITS E COMO UTILIZAR

/*
O PHP apenas suporta heranças únicas: uma classe só pode herdar de uma outra classe.

Imagina que quer que a classe seja derivada de outra e, ao mesmo tempo, possa "herdar" outras funcionalidades a partir de outras estruturas

É neste contexto que os traits surgem.

Basicamente, traits permitem declarar métodos que podem ser usados em múltiplas classes.
Na sua vertente mais avançada, os traits podem conter métodos abstratos que podem ser usados em múltiplas classes, e esses métodos podem ter qualquer tipo de access modifier

Vamos perceber o conceito através de exemplos simples.
*/

trait funcoes_matematicas {
    public function adicionar($a, $b) {
        return $a + $b;
    }

    public function subtrair($a, $b) {
        return $a - $b;
    }

    public function multiplicar($a, $b) {
        return $a * $b;
    }

    public function dividir($a, $b) {
        return $a / $b;
    }
}

class Matematica {
    use funcoes_matematicas;
}

$calculadora = new Matematica();
echo $calculadora->adicionar(100, 10);
echo '<br>';
echo $calculadora->subtrair(100, 10);
echo '<br>';
echo $calculadora->multiplicar(100, 10);
echo '<br>';
echo $calculadora->dividir(100, 10);
echo '<br>';    

/*
O que aconteceu aqui?
Como pode facilmente concluir pelo exemplo, foi possivel incoporar dentro da classe Matematica, um conjunto de funções pertencentes ao Trait
*/
?>
```

Como pode facilmente concluir pelo exemplo, foi possivel incoporar dentro da classe Matematica, um conjunto de funções pertencentes ao Trait. Aqui vai outro exemplo:

```php
<?php 


trait movimentos {
    public function iniciar() {
        echo "Movimento iniciado";
    }

    public function saltar() {
        echo "Salto realizado";
    }

    public function parar() {
        echo "Movimento finalizado";
    }
}

trait movimentos_de_voo {
    public function levantar() {

    }
}

class SerVivo {
    private $nome;
    private $especie;
    private $peso;

    public function __construct($nome, $especie, $peso)
    {
        $this->nome = $nome;
        $this->especie = $especie;
        $this->peso = $peso;
    }
}

class Homem extends SerVivo {
    use movimentos;
}

class Leao extends SerVivo {
    use movimentos;
}

class Passaro extends SerVivo {
    use movimentos, movimentos_de_voo;
}

$homem = new Homem('Marcelo', 'Homo-Sapiens-Sapiens', 80);
$leao = new Leao('Leozinho', 'Panthera leo', 100);
$passaro = new Passaro('Águia', 'Accipitridae', 30);

$passaro->iniciar();
echo '<br>';
$passro->levantar();
?>
```

## MÉTODOS ESTÁTICOS

Métodos estáticos são métodos de uma classe que podem ser evocados diretamente sem que seja necessário criar um objeto a partir dessa classe. Podemos chamar o método escrevendo o nome da classe, logo depois :: e o nome do método com os respectivos parâmetros.

```PHP
<?php
    //MÉTODOS ESTÁTICOS

    /*
    Métodos estáticos são métodos de uma classe que podem ser evocados diretamente sem que seja necessário criar um objeto a partir dessa classe.

    Vejamos com um exemplo
    */

    class Matematica {
        public static function adicionar($a, $b) {
            return $a + $b;
        }
    }

    // Podemos chamar o método escrevendo o nome da classe, logo depois :: e o nome do método com os respectivos parâmetros.

    echo Matematica::adicionar(10, 20);
?>
```

Outro exemplo de uso, usando uma palavra-chave chamada **self**, e o que ela faz? Ele vai executar ele mesmo, é como se estivesse auto referenciando a classe da qual é: 

```php
<?php
    class Matematica {
        public static function adicionar ($a, $b) {
            return $a + $b;
        }

        public function executar_operacao(){
            $resultado = self::adicionar(10, 20);
            return $this->metodo_interno($resultado);
        }

        private function metodo_interno($valor) {
            return $valor * 2;
        }
    }

    echo Matematica::adicionar(100, 200);
    echo '<br>';
    $matematica = new Matematica();
    echo $matematica->executar_operacao();
?>
```

Podemos também chamar métodos estáticos de uma classe a partir de outra classe. Vejamos o exemplo.

```php
<?php
/*
Podemos também chamar métodos estáticos de uma classe a partir de outra classe. Vejamos o exemplo.
*/

class Matematica {
    public static function adicionar($a, $b){
        return $a + $b;
    }
}

class Operacoes {
    public function executar() {
        echo Matematica::adicionar(10, 20);
    }
}

$soma = new Operacoes();
$soma->executar();
?>
```

Podemos ainda ter uma classe mãe, com um método estático, e numa classe filha chamar esse método usando a expressão **PARENT**:

```php
<?php 
    /*
    Podemos ainda ter uma classe mãe, com um método estático, e numa classe filha chamar esse método usando a expressão PARENT
    */

    class Operacoes {
        protected static function operacao1(){
            return 'operacao1';
        }
    }

    class Matematica extends Operacoes {
        public function executar() {
            return parent::operacao1();
        }
    }

    $operacao = new Matematica();
    echo $operacao->executar();
?>
```

## PROPRIEDADES ESTÁTICAS

À semelhança dos métodos, as classes também podem ter propriedades estáticas. Essas propriedades podem ser chamadas diretamente sem que seja necessário criar uma instância da classe.

```php
<?php
    // PROPRIEDADES ESTÁTICAS

    /*
    À semelhança dos métodos, as classes também podem ter propriedades estáticas.
    Essas propriedades podem ser chamadas diretamente sem que seja ncessário criar
    uma instância da classe.
    */

    class Matematica {
        public static $pi = 3.14;
    }

    //Para chamar a propriedades, usamos ::

    echo "O resultado é: " . Matematica::$pi * 10;
?>
```

As classes podem ter propriedades estáticas e não estáticas, tal como acontece com os métodos. As propriedades estáticas podem ser acedidas a partir de qualquer método da classe usando a expressão SELF.

```php
<?php
/*
As classes podem ter propriedades estáticas e não estáticas, tal como acontece com os métodos.
As propriedades estáticas podem ser acedidas a partir de qualquer método da classe usando a expressão SELF.
*/

class Humano {
    public static $nome;

    public function definir_nome($n) {
        self::$nome = $n;
    }

    public function apresentar() {
        return "O meu nome é " . self::$nome;
    }
}

$humano = new Humano();
$humano->definir_nome("Keven Willians");
echo $humano->apresentar();
?>
```

E tal como acontece com os métodos, as propriedades estáticas também podem ser acedidas a partir de classes derivadas usando a expressão PARENT: 

```php
<?php
/*
* E tal como acontece com os métodos, as propriedades estáticas também podem ser acedidas a partir de classes derivadas usando a expressão PARENT 
*/

class Humano {
    public static $valor = "Valor principal";
}

class Homem extends Humano {
    public function executar() {
        return parent::$valor;
    }
}

$homem = new Homem();
echo $homem->executar();
?>
```

## COMO USAR NAMESPACES

O conceito de Namespaces é muito importante na programação orientada a objetos.

Permitem resolver dois problemas:

- Organizar melhor as classes permitindo agrupá-las num 'espaço';

- Permitem que existam dentro do mesmo projeto classes com o mesmo nome. Mas em Namespaces diferentes

Por exemplo, pode ter uma classe que definiu no seu código e juntar ao seu projeto outra classe criada por outro programador. Verifica que, afinal, ambas as classes têm o mesmo nome. Não necessitando alterar o nome das classes. Basta que estejam em Namespaces diferentes e tens o problema resolvido.

Usar Namespaces dentro dos projetos de média e larga escala, é uma forma de manter o código mais bem organizado. A expressão NAMESPACE deve sempre ser a primeira declaração no topo do script:

```php
namespace classes_principais;

class Matematica {
    public function adicionar ($a, $b){
        return $a + $b;
    }

    public function subtrair ($a, $b){
        return $a - $b;
    }
}
```

Como vamos usar a classe que criamos no script anterior?

```php
<?php 
/*Como vamos usar a classe que criamos no script anterior? */

//1. Vamos importar a classe;

require_once('index1.php');
use classes_principais\Matematica;
//2. Para podermos instanciar a classe do script index_1.php, temos que ter em atenção o seu namespace

$matematica = new Matematica();

$matematica = new classes_principais\Matematica();
echo $matematica->adicionar(10, 20);

//vamos ver então o que os namespaces permitem fazer
?>
```

Podemos importar os dois scripts que têm namespaces diferentes e usar as duas classes com o mesmo nome, mas que pertencem a realidades distintas:

```php
<?php 
    // Podemos importar os dois scripts que têm namespaces diferentes
    // e usar as duas classes com o mesmo nome, mas que pertencem a 
    // realidades distintas

    require_once('index3.php');
    require_once('index4.php');

    $operacoes_loja = new Loja\Operacoes();
    $operacoes_armazem = new Armazem\Operacoes();

    $operacoes_loja->operacao_1();
    $operacoes_loja->operacao_2();
    $operacoes_armazem->operacao_1();
    $operacoes_armazem->operacao_2();
?>
```

Existe uma forma de simplificar a identificação dos namespaces que vamos usar na nossa aplicação:

```php
<?php 
require_once('index6.php');

use Estruturas_principais\Loja;
use Estruturas_principais\Armazem;

$loja = new Loja();
$armazem = new Armazem();

//Sempre que quiser criar novos objetos dentro deste script, já não tem a necessidade de fazer da seguinte forma:

$loja_1 = new Estruturas_principais\Loja();
$loja_2 = new Estruturas_principais\Loja();
$loja_3 = new Estruturas_principais\Loja();

//podemos simplesmente escrever

$loja_1 = new Loja();
$loja_2 = new Loja();
$loja_3 = new Loja();
?>
```
## RESUMO

### Abstração
As classes disponibilizam métodos e propriedades simples de usar mas que podem esconder elevada complexidade nos bastidores. Sabemos todos ligar uma TV, mas não temos que saber o que acontece no interior do equipamento para que possamos ligar e desligar

### Encapsulamento
A criação de propriedades privadas cujos valores só estão acessíveis através de métodos que vão permitir controlar / validar o valor dessas variáveis. É uma barreira de proteção para os dados.

### Hereditariedade
A possibilidade de criar estruturas de classes que derivam umas das outras, permitindo reaproveitamento de código ao máximo e consistência.

### Polimorfismo
A possibilidade de criar classes com diferentes funcionalidades a partir de interfaces. A implementação de um método definido num interface pode ser uma, na classe A, e outra na classe B. Noutras linguagens de programação, o conceito abrange outras situações relacionadas com overriding e overloading.

MUITO IMPORTANTE: Entender como escrever código organizado por classes e objetos, é imperativo para qualquer programador moderno. O PHP, tal como muitas linguagens de programação, já contém no seu core um conjunto vasto de classes que podemos usar nas nossas aplicações.


## DECLARAÇÃO DE STRICK TYPES

A linguagem PHP é muito conhecida por ser fracamente tipada. Na realidade, muitos programadores ainda usam o PHP com variáveis, métodos e parâmetros que não definem que tipo de valores aceitam ou retornam.

Com a evolução da linguagem, e apesar de não ser obrigatório o seu uso, a definição de tipos nas propriedades de uma classe, parâmetro e retorno de funções e métodos passou a ser possível.

```php
function apresentar1($mensagem) {
    echo "Mensagem: $mensagem".'<br>';
}

function apresentar2(string $mensagem) {
    echo "Mensagem: $mensagem".'<br>';
}

apresentar1('FDSHFOIDFSIDJFSODJFOSDFSIDFDSOIFJDSFO');
apresentar2(200);

// ambos vão funcionar, pois o 200 será transformado para uma string
```

## STRICT_TYPES

Para que o php obrigue a passar argumentos que correspondem ao tipo de dado esperado, temos que ativar o strict_types = 1;

```PHP
<?php 
//  DECLARAÇÃO DE STRICK TYPES

/*
Para que o php obrigue a passar argumentos que correspondem ao tipo de dado esperado, temos que ativar o strict_types = 1;
*/

declare(strict_types = 1);

function apresentar1($mensagem) {
    echo "Mensagem: $mensagem".'<br>';
}

function apresentar2(string $mensagem) {
    echo "Mensagem: $mensagem".'<br>';
}

apresentar1('FDSHFOIDFSIDJFSODJFOSDFSIDFDSOIFJDSFO');
apresentar2(200);

// agora a segunda função não irá funcionar
?>
```

Mais uma exemplo de que não funciona dessa forma, caso usada:

```php
<?php 
declare(strict_types=1);


function adicionar(int $a, int $b) {
    return $a + $b;
}

echo adicionar(10,20);
echo adicionar('10', '20');
?>
```

## COMO CHAMAR O CONSTRUTOR DE UMA CLASSE PAI 

Vejamos o cenário, há uma classe de onde deriva outra classe

```php
<?php 
// COMO CHAMAR O CONSTRUTOR DE UMA CLASSE PAI

/* 
    Vejamos o cenário, há uma classe de onde deriva outra classe
*/

class Human {
    public $nome;
    public $perfil;
    public function __construct($nome){
        $this->nome = $nome;
    }
}

class Funcionario extends Humano {
    public function __construct()
    {
        $this->perfil = 'Administrador';
    }
}
?>
```

Da forma mostrada acima, não funciona, mas isso pode ser mudado com o uso da palavra-chave **parent**:

```php
<?php 
// COMO CHAMAR O CONSTRUTOR DE UMA CLASSE PAI

/* 
    Vejamos o cenário, há uma classe de onde deriva outra classe
*/

class Humano {
    public $nome;
    public $perfil;
    public function __construct($nome){
        $this->nome = $nome;
    }
}

class Funcionario extends Humano {
    function __construct($perfil)
    {
        parent::__construct($perfil);
        $this->perfil = 'Administrador';
    }
}

$funcionario = new Funcionario('joao');
echo $funcionario->nome;
echo '<br>';
echo $funcionario->perfil;

?>
```

Esta funcionalidade não está apenas destinada ao construtor.

Se quiseres criar um novo método dentro da classe filha e ainda assim quiseres executar o que está na implementação original, podes usar a expressão **parent::**

E isto aplica-se à chamada do método com o mesmo nome, como a métodos com outro nome

```php
<?php 
    // COMO CHAMAR O CONSTRUTOR DE UMA CLASSE PAI

    /*
    Esta funcionalidade não está apenas destinada ao construtor.
    Se quiseres criar um novo método dentro da classe filha e ainda assim quiseres executar o que está na implementação original, podes usar a expressão parent::

    E isto aplica-se à chamada do método com o mesmo nome, como a métodos com outro nome
    */

    class Veiculo {
        public $marca;

        public function apresentar() {
            echo "Sou da marca: {$this->marca}.";
        }

        public function teste() {
            // ...
        }
    }

    class Automovel extends Veiculo {

        public function  apresentar() {
            parent::apresentar();
            echo '<br>';
            echo 'Chamei a função da classe pai e ainda adicionei este código!';
        }
    }

    $a = new Automovel();
    $a->marca = "Ferrari";
    $a->apresentar();
?>
```

## CONSTANTES DENTRO DE UMA CLASSE

Por vezes podes ter necessidade de definir uma constante que é para ser usada apenas dentro da classe. Bom, na realidade, isto é possível, mas as constantes são, por natureza, públicas:

```php
<?php 
// CONSTANTES DENTRO DE UMA CLASSE

/*
Por vezes podes ter necessidade de definir uma constante que é para ser usada apenas dentro da classe. Bom, na realidade, isto é possível, mas as constantes são, por natureza, públicas.

Vejamos como funcionam
*/

class Matematica {
    const VALOR_FIXO = 10;

    public function calcular($numero) {
        return $numero * SELF::VALOR_FIXO;
    }
}

$multiplica = new Matematica();
echo $multiplica->calcular(10).'<br>';
echo $multiplica::VALOR_FIXO;
?>
```

A partir do PHP 7.1 passou a ser possível usar public, private e protected como access modifier das constantes:

```php
<?php 
// CONSTANTES DENTRO DE UMA CLASSE

/*
A partir do PHP 7.1 passou a ser possível usar public, private e protected como accesse modifier das constantes
*/

class Matematica {
    private const VALOR_FIXO = 10;

    public function calcular($numero) {
        return $numero * SELF::VALOR_FIXO;
    }

    public function get_VALOR_FIXO(){
        return self::VALOR_FIXO;
    }
}

$multiplica = new Matematica();
echo $multiplica->calcular(10).'<br>';
echo $multiplica->get_VALOR_FIXO();
?>
```

## AUTOLOAD DE CLASSES

Até agora vimos que, para usar as classes que criamos, é necessário fazer a importação do script ou scripts que contêm essas classes. Neste vídeo, vamos ver como é possível fazer o carregamento das classes de forma automática.

Temos duas classes criadas dentro da pasta classes, é uma boa prática cada classe estar no seu ficheiro próprio.

```php
<?php 
    // FUNÇÕES ÚTEIS PARA VERIFICAÇÃO DE CLASSES

    /*
    Podes ter necessidade de verificar se uma determinada classe existe, ou se uma determinada classe tem um determinado método ou propriedade

    Vamos ver três funções do PHP que permitem executar estas operações
    */

    class Humano {
        public $nome;

        public function falar($mensagem){
            // ...
        }
    }

    class Pessoa {
        // ...
    }

    //verificar se uma classe existe
    echo class_exists('Pessoa') ? 'sim' : 'não';
    echo '<br>';

    //verificar se um método existe
    echo method_exists('Humano', 'falar') ? 'sim' : 'não';
    echo '<br>';

    //verificar se uma propriedade existe
    echo property_exists('Humano', 'nome') ? 'sim' : 'não';
    echo '<br>';
?>
```

Há no entanto um pequeno detalhe. Se as nossas classes são carregadas com spl_autoload_register() as nossas classes não existem a não se quando são instanciadas.

```php
<?php 
// FUNÇÕES ÚTEIS PARA VERIFICAÇÃO DE CLASSES

/*
Há no entanto um pequeno detalhe. Se as nossas classes são carregadas com spl_autoload_register() as nossas classes não existem a não se quando são instanciadas.

Para isso resolvemos da seguinte forma:
*/

    function carregar_classes ($nome_da_classe) {
        $path = 'classes/'.$nome_da_classe.'.php';
        if (file_exists($path)){
            require_once($path);
        }
    }

    spl_autoload_register('carregar_classes');


//verificar se uma classe existe
echo class_exists('Humano', true) ? 'Sim' : 'Não';
echo '<br>';

//verificar se um método existe dentro de uma classe
echo class_exists('Humano', 'falar') ? 'Sim' : 'Não';
echo '<br>';

//verificar se uma classe existe
echo class_exists('Humano', 'sobrenome') ? 'Sim' : 'Não';
echo '<br>';
?>
```

