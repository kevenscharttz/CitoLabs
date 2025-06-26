## O que é o JavaScript?

O javascript é uma linguagem de programação que permite implementar interatividade e funcionalidades nas Páginas Web, por exemplo, ao clicar em algum botão de um site e algo acontece, isso é Javascript. Ela foi feita para ser executada no lado do usuário, ou seja, **client-side**. Isso significa que o código é executado no navegador do usuário. Com o javascript é possível acessar e manipular elementos HTML, interações do usuário e comunicação com servidores.

## Flexibilidade

A princípio o Javascript foi criado para ser executada e interpretada pelo navegador. Mas, por ser um linguagem muito popular o Javascript também passou a ser utilizado em outros contextos fora do navegador. Ou seja, também ==é possível criar aplicações:==

* Web
* Desktop
* Mobile
* API
* ETC

**Javascript** NÃO É **Java**


## Estrutura dos arquivos

Para criar um arquivo Javascript, sua extensão no final do documento deve ser **.js**, e para vincular ele a página web, devemos usar a tag **script: src** no final do body, para melhor , mas, também é possível colocar o javascript dentro do html, mas, não é tão recomendado para projetos grandes, mantendo-o separado, melhor muito a organização.


## Como fazer comentários no Javascript

Comentários são linhas de texto que são ignoradas, ou seja, não vão influenciar em nada no código, e são muito uteis para explicações, comunicação, separação e etc... Existem comentários em linha, quando não há necessidade de um texto grande e para isso utilizamos **//**, mas também existe um tipo para quando há uma grande quantidade de informação para ser colocada no comentário, usando o **/* */**


## Sintaxe

No javascript é muito importante nós obedecermos algumas regras para que o código funcione de maneira correta e que não se torne difícil de se entender seu funcionamento. Exemplificando isso, posso citar o uso de palavras reservadas e comandos no Javascript. Mas também existem algumas coisas opcionais, como o **;** onde na maioria das linguagens é opcional para indicar que aquela linha de código foi finalizada, aqui não é.


## Variáveis

Uma variável é um espaço reservado na memória RAM(Random Access Memory) do computador para armazenar algo temporariamente. Para ajudar a entender um pouco mais isso, podemos pensar na memória como um armário e as gavetas são espaços na memória para guardar(armazenar) algo.

Durante um programa, teremos inúmeras variáveis e devido a isso, podemos dar nomes a essas variáveis, para no ajudar a identificar cada variável, seria como colocar adesivos em cada gaveta do armário para diferenciar camisas de meias, meias de calças... Lembrete que uma variável pode variar. Ou seja, pode ser alterada/modificada.


## VAR

Var é uma palavra reservada para declararmos uma variável, seja ela sem valor(undefined), ou com valor, por exemplo, declarando que a variável email terá como valor "Kevenscha@gmail.com"

```js
//Declaração sem valor.
var user;
console.log(user);

//Declaração com valor.
var email = "kevenscha@gmail.com";
console.log(email);
```

Podemos também substituir o valor de uma variável

```js
email = "aquelecaramuitobacana@gmail.com";
console.log(email);
```

Se for atento, já notou que na substituição da variável email não foi utilizado o **var**, e por que isso? Porque a variável já foi declara, ela já existe, só está sendo atribuído um novo valor a ela. Mas, é possível sim usar o var antes, sobre escrevendo a variável antiga.


## Case Sensitive

Quando uma linguagem de programação é case-sensitive significa que ela é sensível a letras maiúsculas e minúsculas. Por exemplo, a palavra "Keven" é considerada diferente de "keven", justamente por ter essa letra maiúscula enquanto a outra não tem.


## LET

Let é uma palavra-chave usada para declararmos uma variável, seja ela sem ou com valor, porém a primeira diferença do **let** para o **var** é o fato de não podermos sobrescrever variáveis como o var, declararmos duas vezes uma mesma variável é sinalizado como um erro:

```js
//Isso é um erro.
let user;
let user;
```

Ademais, ele é igual como o var, fora esse detalhe dito acima:

```js
//Declaração de uma variável sem valor.
let user;
console.log("Keven Willians");

//Declaração de uma variável com valor.
let email = "kevenscha@gmail.com";
console.log(email);

email = "aquelecaramuitobacana@gmail.com";
console.log(email);
```

## CONST

Const é uma palavra-chave usada para declararmos uma variável, porém diferente das outras já citadas acima, o **const** é usado para indicar que o valor dessa variável não será alterado, uma vez indicado, ele não pode ser mudado:

```js
// Uma constante cria uma variável cujo valor é fixo (não pode ser alterado)
const number = 42;
console.log(number);
  
//Isso gerará um erro, não será impresso o valor 55.
number = 55;
console.log(number);
```

## Escopo

Escopo é a região do código onde uma variável é acessível, basicamente define o contexto no qual uma variável pode ser referenciada e modificada. Criando um exemplo, pode-se imaginar uma casa, onde para usar o fogão é preciso estar na cozinha.

Existem alguns tipos de escopo:

### Global
Variáveis declaradas fora de qualquer função ou bloco de código(var).

### Bloco
Acessiveis apenas dentro do bloco de código onde foram declaradas (let e const).

### Local(ou escopo da função)
variáveis declaradas dentro de uma função.


## Hoisting

Hoisting(levantar ou içar) se refere ao comportamento do interpretador de mover as declarações de variáveis e funções para o topo do escopo em que foram definidas, antes mesmo da execução do código.

Esse comportamento possibilita usar uma variável ou função antes que ela esteja definida.

### Hoisting de variáveis
Todas as declarações de variável são movidas para o topo do seu escopo independentemente de onde tenham sido declaradas, ela estará disponível para o uso em todo o escopo em que foi definida.

Mesmo que as declarações de variáveis sejam movidas para o topo do escopo, elas ainda precisam ser declaradas antes de serem utilizadas. Caso contrário, recebemos uma referencia indefinida.

### Hoisting de variáveis
Todas as declarações de funções também são movidas para o topo do seu escopo. Isso significa que você pode chamar uma função antes mesmo de declará-la.

Essa característica do JavaScript permite que você organize seu código de forma mais intuitiva, definindo as funções em qualquer ordem que desejar.


## Nomes de variáveis

Antes de começar, devemos lembrar que no JS há caseSensitive. No Javascript nós podemos iniciar variáveis com símbolos no começo de seus nomes, porem, não com números: 
```js
//PODEMOS
let $email = "Kevenscha@gmail.com"
let _email = "teste@email.com"

//NÃO PODEMOS
let 1user;
let 2user;
```
Vale ressaltar que que acentuação também pode ser usada, e esses tipos podem ser usados também no meio ou fim da variável. Apesar disso tudo, existem recomendações para a nomeação de variáveis:

* Usar inglês;
* Não usar acentuação ou caracteres especiais;
* Dar nomes que façam sentido;
* camelCase (começar com letrar minúsculas, e o começo de cada palavra posterior a primeira com letra maiúscula - let nomeDoComprador) muito usado com variáveis;
* snak_case (escrever tudo em minúsculo e separar as palavras com o uso de underline) - muito usado com objetos;

## Tipos de Dados

O JavaScript é uma linguagem dinâmica com tipos dinâmicos. Isso significa que o tipo da variável é definida dinamicamente pelo tipo do valor atribuído (não é necessário declarar o tipo).

Além disso, é possível reatribuir uma mesma variável com um tipo diferente.

### Tipos primitivos

Estes são os principais vlaores primitivos do Javascript:

* String, um tipo de para guardar texto;
* number, um tipo para numero;
* boolean, um tipo para verdadeiro ou falso(true, false);
* null, para definir que o conteúdo de uma variável é vazio.

Também existem outros tipos, que serão explicados em outro momento, como:

* object
* array

## STRING

Como já dito, o tipo string é para armazenarmos palavras, texto. Usando o comando typeof,  é impresso no console o tipo da variável: 

```js
let username = "Rodrigo"
console.log(username)
console.log(typeof username)
```

Para definir que o conteúdo é uma string, usamos aspas ou aspas simples(apóstrofo), mas quando usar uma ou outra? Digamos que depende, caso seja necessário uma string com aspas duplas no texto, usamos aspas simples para criar o texto, e caso seja preciso usar aspas simples dentro do texto, usamos aspas duplas para envolver o texto: 

```js
//aspas duplas
console.log("Uma string que precisa do uso de 'aspas simples' dentro");

//aspas simples
console.log('Uma string que precisa de "aspas duplas" dentro');
```

Também podemos usar acentos graves, o que nos permite escrever a string com tabulação e espaços de acordo com o que for digitado: 

```js
//acento grave
console.log(`
Uma string com acento grave
escreve múltiplas linhas
com tabulação, ou seja
segue a ordem de quebras de linha
e espaços`);
```

## Template Literals

Vamos supor que tenhamos duas variáveis, e que queremos imprimir ambas de uma só vez, isso é possível dessa forma:

```js
let user = "Keven";
let email = "keven@email.com";
console.log(user, email);
```

Dessa forma, tanto o conteúdo de user e de email será impresso no console um ao lado do outro, mas vamos supor que queremos algo mais formato, podemos usar a regra de concatenação do texto, dessa forma: 

```js
let message = "Olá" + user + ". Você conectou com o e-mail " + email;
console.log(message);
```
Nesse caso, poderiamos ter impresso isso sem criar uma variável, e a junção das palavras com as variaveis ocorre graças ao caractere de + entre os elementos.

Mas isso é muito trabalhoso, e para isso existe o **Template Literals**, que, ao utilizar crase para imprimir um texto e, usar o &{ }, podemos definir o conteúdo de uma variavél que será impressa:
```js
console.log (`Olá ${user}. Você se conectou ao e-mail ${email}`);
```
Lembrando novamente que eu poderia criar uma variável para armazenar tudo e depois imprimir apenas a variável.

## NUMBER

Como o próprio nome diz, é um tipo de variável para armazenar valores numéricos, podendo ser:

* Números inteiros
* Números negativos
* Números quebrados (casas decimais ou float) - utilizamos . ao invés de ,
* Podemos colocar formulas, como a soma de dois valores
```js
//Valores inteiros
let num = 10;
console.log(num);
console.log(typeof num);

//Valores negativos
num = -25
console.log(num);

//Valores quebrados, float, com casas decimais...
num = 10.65
console.log(num);

//Calculos
let nota1 = 10;
let nota2 = 6;
let nota3 = 8;
console.log(((nota1 + nota2 + nota3) / 3));
```

## BOOLEAN

O tipo booleano é muito interessante, assim como o bínario que tem apenas 1 ou 0, o tipo boolean tem duas opções, verdadeiro ou falso(true or false).

```js
//Tipos boolean
console.log(true);
console.log(false);

let isLOading = true;
console.log(typeof isLOading)
```


## UNDEFINED E NULL

O undefined representa um elemento indefinido, colocado automaticamente pelo Javascript quando uma variável não tem nenhum valor.

Já o null é para declarar que uma variável é intencionalmente vazia

```js
// undefined (indefinido) e null
let emptiness;
console.log("O valor é: ", emptiness);

let voidness = null;
console.log("O valor é: ",voidness)
```

## Conversão e Coerção de Tipos

### Conversão
Conversão de tipos (type casting ou type conversion) ocorre quando você explicitamente transforma um valor de um tipo para outro. Isso é feito de forma conciente, usando funções ou métodos específicos para realizar a conversão.

```js
//convertendo um numérico para string usando " "
console.log(typeof"9");
let age = 18;
console.log(typeof String(age));
  

//convertendo uma string para númerico usando Number
console.log(typeof Number("9"));
value = "9";
console.log (Number(value));

//convertendo para um booleano, para valores maiores ou menos de zero, o resutado será verdadeiro.
let option = 0
console.log(Boolean(option));
console.log(typeof option);
```
### Coerção

A coersão ocorre de forma automática. O JavaScript tenta automaticamente converter um dos valores para um tipo compatível antes de realizar a operação.

```js
console.log("10" + 5);
```
No exemplo acima o resultado seria 105, pois, ele transformou o 5 em uma string automaticamente.


## Expressões e Operadores

Operadores são símbolos que realizam operações em operandos(valores ou variáveis). São utilizados para manipular e comparar valores, realizar operações aritméticas, lógicas, de atribuição, entre outras.

Uma expressão é uma combinação de valores, variáveis, operadors e chamadas de função que, quando avaliada, resulta em um valor.

```js
//expressão aritmética que soma 3 números
let sum = 5 + 3 + 7;

//expressão aritmética que calcula a média
let average = sum / 3;
```

Devemos ter cuidado para não confundir com concatenação.

## Operadores Aritméticos

```js
//Operadores aritméticos
console.log("CONCATENAÇÃO: ", "12" + "6");
console.log("CONCATENAÇÃO: ", "12" + 8);

console.log("SOMA: ", 12 + 6 + 18.5);
console.log("SUBTRAÇÃO: ", 12 - 12);
console.log("MULTIPLICAÇÃO: ", 10 * 10);
console.log("DIVISÃO: ", 1000 / 5);
console.log("RESTO DA DIVISÃO: ", 12 % 2);
console.log("EXPONENCIAL: ", 3 ** 3);
```

## Incremento e Decremento

Quando queremos incrementar um valor, como faríamos isso? Iriamos definir uma variável como ela mesma mais 1:

```JS
let number = 10;
number = number + 1;
console.log(number);
```

Mas ao invés disso, podemos usar um operador especial com essa exata função, o **++**

```js
let number = 10;
// INCREMENTO
number++
console.log(number);
```

Mas devemos ter cuidado, pois, dependendo de onde esse operador é colocado, podem acontecer diferentes coisas. Por exemplo:

```js

//A impressão será 11, pois, estamos primeiro incrementando a variável e depois a imprimindo.
let number = 10;
console.log(++number);

//A impressão será 10, pois, estamos primeiro imprimindo a variável e depois incrementando seu valor, ou seja, caso eu faça uma segunda impressão, o resultado será 11.
let number = 10;
console.log(number++);
```

O decremento funciona da mesma forma, claro, pela diferença que ele irá decrementar um valor, ao invés de incrementar. seu operador é **--**

Mas o que fazemos quando queremos incrementar ou decrementar um valor acima de 1? É muito simples, basta usarmos os operadores **+=** e **-=**, respectivamente para soma e subtração:

```js
number += 10;
number-=5;
```

## Ordem de precedência

Ordem de precedência é quando uma expressão contém múltiplos operadores, na programação e em expressões matemática, a ordem de precedência define qual operação será realizada primeiro, tipo aquela regra da escola que multiplocação vem antes de soma.

```js
//A multiplicação, por ter maior prioridade vai multiplicar com o 3 e depois somar 2.
total = 2 + 3 * 4;
console.log(total);
  

//Graças ao parenteses, definimos que a soma vai acontencer antes da multiplicação
total2 = (2 + 3) * 4;
console.log(total);
```


## Igualdade e diferença

Para sabermos se duas variáveis são iguais no sentido de terem os mesmos valores ou não, podemos usar alguns operadores lógicos como o == para sabermos de são iguais e o != para sabermos se são diferentes.

```js
let one = 1;
let two = 2;
  
//Nesse caso o resultado no console será false, pois as duas variáveis não são iguais.
console.log(one == two);

//Nesse caso o resultado no console será true, pois a comparação está ocorrendo entre o valor da variável e a string, ignorando seus tipos diferentes
console.log(one == "1");

//Nesse caso o resultado no console será true, pois as duas variáveis são diferentes.
console.log(one != two);

//Nesse caso o resultado será false, já que a comparação está ocorrendo entre o conteúdo da variável one e a string, ignorando seus tipos diferentes.
console.log(one != "2")
```

## Estritamente igual e estritamente diferente

Diferente das comparações acima, que comparavam apenas o conteúdo, nesse caso, é comparado tanto o tipo quanto o conteúdo para saber se é igual ou diferente:

```js
let one = 1;
let two = 2;

//estritamente igual (tipo e valor)
console.log(one == "1");
console.log(one === "1"); 

//estritamente diferente (tipo e valor)
console.log (one !== two);
console.log (two !== 1);
console.log (one !== "1");
console.log (two !== 2);
```

## Maior, menor e igual

Podemos fazer comparações entre valores para saber se um é maior que outro, se esse é menor que aquele e, em alguns casos, se um é maior ou igual / menor ou igual a outro:

```js
let balance = 500;
let payment = 120;  

// > Maior que
console.log(balance > payment);

// < Menor que
console.log(balance < payment);

// >= Maior ou igual
balance = 120;
console.log(balance >= payment);

// <= Menor ou igual
console.log(balance <= payment);
```

## Operadores Lógicos

O primeiro operador lógico que podemos citar é o **AND**, que basicamente retorna um valor verdadeiro quando ambas as variáveis ou valores estão de acordo, caso apenas uma não esteja de acordo com o proposito desejado, o retorno é falso:

```js
let email = true;
let password = true;

//AND (E) &&

// Resultado é true
console.log(email && password);

// Resultado é false
password = false;
console.log(email && password);
```

Outro que podemos falar é o **OR**, que retorna um valor como verdadeiro quando pelo menos uma das condições estiver de acordo com o proposito desejado, e retornando false quando todas são falsas:

```js
//OR (OU) ||
let email = true;
let password = true;

// Resultado é true
console.log(email && password);
password = false;
console.log(email && password);

// Resultado é false
email = false
console.log(email && password);
```

E existe um ultimo, o **not**, que a primeira vista pode parecer que altera o resultado da variável, mas não, ele apenas altera a visualização daquela variável:

```js
//NOT (negação) !
console.log (!password);
```

## Estrutura de condição

Permite executar diferentes ações com base em uma condição (verdadeira ou falsa).

As estruturas de condição são utilizadas para a tomada de decisões. Para exemplificação, podemos imaginar uma pessoa que quer acessar um comodo por uma porta, onde existem duas possibilidades, a da porta estar fechada, e a da porta estar aberta, então podemos montar isso da seguinte forma:

```
Se a porta estiver aberta{
	Eu entro no comodo
}
Caso contrário {
	Eu abro a porta e entro no comodo
}
```

## Operador Condicional Ternário

Como no exemplo acima, o operador condicional ternário serve para verificar essas condições e possibilidades, e tem o nome de ternário pois possui 3 etapas. A primeira etapa é condição, no caso a verificação lógica, depois mostrando o que deve acontecer se o teste lógico for verdadeiro, e por fim, se não for verdadeiro, mostra o resultado caso seja falso. Nesse tipo de operação, a resposta para caso seja verdadeira é usando o simbolo **?**, e para mostrar o resultado caso seja falso é o **:**

```js
console.log(age >= 18 //condição
? "Você pode dirigir" //resultado se for verdadeiro
: "Você não pode dirigir!"); //resultado se for falso
```

## Falsy e Truthy 

**FALSY** é quando um valor é considerado false, normal. **TRUTHY** é quando  o valor é considerado verdadeiro em contextos onde o boolean é obrigatório (condicionais e loops): 

```js
console.log("### EXEMPLOS DE FALSY ###");
console.log(false ? "VERDADEIRO" : "FALSO");
console.log(0 ? "VERDADEIRO" : "FALSE");
console.log(-0 ? "VERDADEIRO" : "FALSE");
console.log("" ? "VERDADEIRO" : "FALSE");
console.log(null ? "VERDADEIRO" : "FALSE");
console.log(undefined ? "VERDADEIRO" : "FALSE");
console.log(NaN ? "VERDADEIRO" : "FALSE");

console.log("### EXEMPLOS DE TRUTHY ###");
console.log(true ? "VERDADEIRO" : "FALSE");
console.log({} ? "VERDADEIRO" : "FALSE");
console.log([] ? "VERDADEIRO" : "FALSE");
console.log(1 ? "VERDADEIRO" : "FALSE");
console.log(3.23 ? "VERDADEIRO" : "FALSE");
console.log(-2.32 ? "VERDADEIRO" : "FALSE");
console.log("Keven" ? "VERDADEIRO" : "FALSE");
console.log(" " ? "VERDADEIRO" : "FALSE");
console.log(Infinity ? "VERDADEIRO" : "FALSE");
```

## If
Se trata basicamente dois dois primeiros passos de operador condicional ternário, onde eu defino a condição e digo o que deve ser retornado caso a condição seja verdadeira:

```js
if (hour <= 12) {
console.log("Bom dia");
console.log("Seja bem-vindo")
}
``` 

Lembrando que é possível usar esse comando sem as chaves, porém, caso a condição não seja verdadeira, apenas a primeira linha não acontece, enquanto a segunda sim. Dito isso, é muito utilizado quando estamos criando uma condicional de apenas uma linha, embora não seja tão recomendado seu uso.

## If e Else

Se trata basicamente do ultimo passo do operador condicional ternário, onde quando a condição não for verdadeira, executa o que precisa caso seja falso:

```js
let age = 17;

if (age < 18) {
	console.log("Você é maior de idade");
} else {
	console.log ("Você é menor de idade")
}
```

Lembrando que o else não precisa de um teste lógico, pois ele só ocorrerá caso o valor não seja verdadeiro.

## If e Else encadeados

Também podemos usar ambos IF e ELSE juntos, mas antes precisamos discutir um exemplo para exemplificar melhor o seu uso: 

```js
let hour = 11;

if (hour <= 12) {
	console.log("Bom dia");
}

if(hour > 18) {
	console.log("Boa noite");
}

if (hour > 12) {
	console.log("Boa tarde");
}
```

Nesse exemplo, dependendo do horário ele exibirá uma mensagem, mas verifique que, caso seja adiciona um valor maior que 18, ele irá exibir tanto a mensagem de boa tarde, quanto a de boa noite, juntos. Para isso existe o **else if** 

```js
let hour = 11;

if (hour <= 12) {
	console.log("Bom dia");
} else if(hour > 12 && hour <= 18) {
	console.log("Boa tarde");
} else {
	console.log("Boa noite");
}
```

Dessa forma, quando uma das condições por atendida, o resto será ignorado, assim evitando o erro citado anteriormente.

## Switch

Switch é um tipo de condicional que pode ter vários casos, por isso é muito usado para tomar decisões especificas para cada um dos casos:

```js
let option = 1;

switch (option) {
	case 1:
		console.log("Consultar pedido");

	case 2:
		console.log("Falar com atendente");
}
```

o conteúdo que vai dentro do parenteses se trata dá variavel que será usada nessas condicionais, e cada número ao lado de case representa o valor que serpa passado.

Porém, no exemplo acima existe um erro, quando colocamos isso para rodar, é impresso tanto a mensagem do case 1, quando do case 2. Para que isso não ocorra, usamos a palavra **break**, que impede o comando de continuar para o próximo case. Além disso, só podemos definir uma valor padrão para quando qualquer uma das opções não é a escolhida, usando o **DEFAULT**: 

```JS
let option = 1;

switch (option) {

case 1:
	console.log("Consultar pedido");
	break;

case 2:
	console.log("Falar com atendente");
	break;

case 3:
	console.log("Cancelar pedido");
	break;

default:
	console.log("Opção invalida");
}
```

## Tratamento de Exceções

Uma exceção é uma condição ou evento imprevisto que ocorre durante o uso da aplicação que interrompe o fluxo normal de operações. Essas situações inesperadas podem incluir erros, condições de falha ou eventos que a aplicação não está preparada para lidar.

Por exemplo, tentar abrir um arquivo que não existe. Mas quando exatamente usar o **Try Catch**? Bom se algo depende de algo externo, uma conexão externa, o envio de uma informação invalida (dependendo do contexto)...

E como nós fazemos isso no código? 

```js
try {
	console.log(result);
} catch (error) {
	console.log(error);
} finally {
	console.log ("Fim");
}
```
Nesse caso, a nossa ação/ tentativa fica dentro do **TRY**, caso consiga ser executada o código segue normalmente, porém se por algum motivo ocorrer um erro, esse erro vai para o **CATCH**, onde é guardada em uma variável temporária, no caso do exemplo, **error**. Por fim, o **FINALLY** serve para executar algo independente se tem algum erro ou não. 

Também podemos criar exceções, que são basicamente erros problemas que nós conseguimos prever, como a inserção de um valor invalido para algo. Geralmente damos o nome de **exceção personalizada**. A exceção do **catch** se trata de uma **exceção não tratada**, geralmente por erros não previstos.

## Funções

É um bloco de código que realiza uma tarefa específica ou calcula um valor. Ela é definida uma vez e pode ser chamada (ou invocada) várias vezes. 

Funções ajudam a organizar o código, tornando-o reutilizável e mais fácil de entender. Para criarmos uma função e chama-lá é muito simples: 

```js
function message () {
	console.log ("Essa é minha primeira função!");
}

message();
message();
message();
```

Para definirmos que estamos criando uma função usamos a palavra-chave **function**, seguido do nome que daremos para essa função, no caso **message**, abrimos fechamos parenteses e abrimos e fechamos chaves.

Dentro dessas chaves podemos incluir todo o código que queremos. Ele só será utilizado quando chamarmos sua função.

Para chamarmos uma função escrevemos seu nome e depois abrimos e fechamos parenteses.

## Parametros e Argumentos

Parâmetro é uma variável (escopo da função) que irá receber um valor em uma função: 

```js
function message (username) {
	console.log("Olá ", username)
}
```

No caso, o parâmetro é o username dentro dos parenteses da função, dessa forma podemos imprimir o nome de forma mais dinâmica. Mas como que enviamos o nome para essa função? Através dos **argumentos**.

Argumento é o valor que é passado para a função:

```js
message("Keven");
message("Beatriz");
```
Nesse caso estou passando os nomes Keven e Beatriz para a função message, e logo depois a função imprime a mensagem com o nome personalizado.

Vale ressaltar que o uso de username só ocorre dentro da função, fora dela nada ocorre, e que, caso exista uma variável username no global, nada dentro da função será alterado, o resultado será o mesmo.

```js
let num;

function sum (a, b){
	console.log(a + b);
}

sum(10, 2);
sum(1240, 10);
sum(7, 2110);
sum(10, 110);
```

Lembrando que a ordem importa aqui, então devemos deixar os argumentos em ordem.

```js
function innerJoin (text1, text2 = '', text3 = '') {
	console.log (text1, text2, text3);
}

innerJoin("Keven", "Willians", "Scharttz");
innerJoin("Keven", "Scharttz", "Willians");
innerJoin ("Keven")
```

Também podemos não passar todos os argumentos, mas, ao imprimi-los eles ficarão como indefinidos. Para que possamos sumir com esses "undefined", colocamos um sinal de  **=** seguido de algo, muito parecido com o default do switch

## Retornando valores

Quando se cria uma função em programação, é possivel executar instruções de calculo dentro dela. Pode-se usar a palavra-chave **return** para retornar um valor especifico da função. Dessa forma, é possível utilizar o resultado fora da função, atribuindo-a uma variável ou exibindo-a diretamente com o console.log()

O **return** permite que o valor calculado dentro da função seja acessado e utilizado em outras partes do código.

## Escopo da função 

Exemplificando um pouco o comportamento de Hosting da funções, temos o seguinte código:

```js
showMessage("Hello World");

function showMessage (message) {
	console.log(message);
	endLine();
	function endLine () {
		console.log("---------")
	}
}
```

Veja que antes mesmo da função ser criada eu já estou fazendo a chamada dela, duas vezes, para mostrar as mensagens e as linhas.

## Comentário de Documentação

É possível incluir um tipo de comentário destino para explicação das funções, parâmetros, retornos... Esse tipo de comentário se chama **Comentário de Documentação**

Para incluí-lo precisamos digitar: /** e dar um enter para uma seleção opção automática, mas claro, podemos fazer isso de forma personalizada.

```js
/**
* Authentication user.
*
* @param {String} email user email.
* @param {String} password more than 6 caracteres.
* @returns {Number} user id.
*/
function signIn(email, password) {
	// TODO FLUXO DE AUTENTICAÇÃO DO USUÁRIO.
	return 7;
}
```

## Função Anonima

Funções anonimas são funções que não possuem nome, geralmente armazenadas em variáveis para uso imediato.

```JS
const showMessage1 = function(){
	return "Olá Keven";
}

console.log(showMessage1());

const showMessage2 = function(message, name){
	return message + name;
}

console.log(showMessage2("Olá ", "Keven"));
```

## Arrow Function

Arrow function é basicamente uma forma mais concisa de escrever funções anônimas. Ela não requer a palavra-chave "function" e permite uma sintaxe mais enxuta e elegante para funções em JavaScript:

```js
const showMessage = (username, email) => {
	console.log(`Seja bem-vindo ${username}, seu email é ${email}`)
}

showMessage("keven", "keven@email.net");
```

## CALL BACK FUNCTION

Em resumo se trata de uma função que passa para outra função como um argumento.

```js
function execute (taskName, callback) {
	console.log("Executando a tarefa: ", taskName);
	callback()
}

function callback(){
	console.log("Tarefa finalizada.");
}

//Passando para a função
execute ("Download do arquivo...", callback);

//Criando a função no próprio parâmetro.
execute("Upload do arquivo...", function() {
	console.log("Função de callback com uma função anônima");
})

execute("Excluindo do arquivo...", () => {
console.log("Arquivo excluído");

})

execute("Salvando arquivo...", () =>
console.log("Arquivo salvo"));
```

## Document Object Model

O DOM (Document Object Model) é a representação de dados dos objetos que compõem a estrutura e o conteúdo de um documento na Web (uma página HTML é um documento).

O DOM representa o documento com nós e objetos (estrutura de árvore) que pode ser acessado e modificado.

## Acessando elementos no DOM

Como falado anteriorme, o DOM representa o documento de HTML com todos os seus nós e objetos, por isso, podemos justamente acessar isso tudo, usando o **document**:

```js
//visualizar o conteúdo do document.

console.log(document)
```

Tendo essa noção de que document é todo o nosso documento HTML, podemos obter, por exemplo, o title da página:

```js 
//Obter o Tite da página;

console.log(document.title);
```

Mas não ficamos limitados a obter informações do nosso documento apenas dessa maneira, podemos obter informações usando seus seletores, como o **ID**:

```js
//Acessar o elemento pelo ID

const guest = document.getElementById("guest-1")
console.log(guest)
```

nesse exemplo, estamos imprimindo no console, 
```js
<li id="guest-2" class="guest">
	<span>Mayk</span>
</li>
```

Mas também podemos usar uma nova propriedade chamada **dir**, para mostrar tudo sobre o elemento:

```js
console.dir(guest);
```

Também podemos acessar elementos através de suas **classes**, mas com um pequeno detalhe, que classes podem ser usadas em múltiplos elementos, diferentemente do ID:

```js

//Acessar o elemento pela CLASSE

const guestsByClass = document.getElementsByClassName("guest");

console.log(guestsByClass);
```

E caso seja preciso, por exemplo, o primeiro elemento com essa classe, usamos a propriedade **item**, lembrando que o primeiro item inicia em 0, mas também podemos pegar esse elemento usando colchetes com o valor 1:

```js 

console.log(guestsByClass.item(0));

console.log(guestsByClass[1]);

```

Também podemos selecionar items através de suas tags, por exemplo: 

```js
const guestsByTags = document.getElementsByTagName("li")
```

## Query Selector

Muito similar aos comandos citados anteriormente, porém com a diferença de que, ele se parece muito com o funcionamento de seletores do CSS, por exemplo, para obtermos apenas um **ID**, ao invés de apenas colocarmos o nome, precisamos especificar o seu seletor, no caso o **#**. E claro, também funciona com **CLASS**, mas utilizando um **.**

```js
//Acessa o elemento pelo ID
const guest = document.querySelector("#guest-1");
console.log(guest);

//Acessa o elemento pela CLASSE
consts guests = document.querySelector(".guest")
console.log(guests);
```

Seu funcionamento se parece muito com o CSS, pois ele pode trabalhar com combinações, por exemplo, uma tag ul, que possui um li, que possui um span que tem uma classe:

```js
const choice = document.querySelector("ul li span.teste");
```

Vale reforçar que essa chamada só chama um elemento, por exemplo, caso haja mais de uma combinação, só a primeira virá. Para chamarmos todos os elementos precismos usar outro comando, o **querySelectorAll**:

```js
const choice = document.querySelectorAll("ul li span.teste");
```

## Manipulando o conteúdo

Até o momento foi aprendido a como selecionar partes do documento, mas não exatamente seu conteúdo, como poderiamos fazer isso, bom, uma das formas de se obter texto é usando o **.textContent**:

```js
const guest = document.querySelector("#guest-1");
console.log(guest.textContent);
```

o textContent também pode servir para alterar o conteúdo em texto, como nesse exemplo onde mostrarei o antes e depois: 

_Código_

```js
const guest = document.querySelector("#guest-1");
console.log(guest.textContent);
guest.textContent = "Keven Willians"
```

_Antes_
```html
<ul>
	<li id="guest-1" class="guest">
		<span>Rodrigo</span>
	</li>

	<li id="guest-2" class="guest">
		<span>Mayk</span>
	</li>
</ul>
```

```html
<ul>
    <li id="guest-1" class="guest">Keven Willians</li>
    <li id="guest-2" class="guest">
        <span>Mayk</span>
    </li>
</ul>
```

Se notar, ao fazer isso a tag span desapareceu. Pois isso substitui tudo como texto, incluindo as tags, e para isso não acontecer, apenas alteramos o querySelector no começo: 

```js
const guest = document.querySelector("#guest-1 span");
console.log(guest.textContent);
guest.textContent = "Keven Willians"
```

Mas além desse textContent, existem outros com funções parecidas, como o **.innerText**, que retorna o texto, assim como o anterior, porém as diferenças são que ele não retorna com formatação do texto, ou seja, sem espaçamentos e etc, e ele retorna somente o conteúdo visível, que não estejam ocultos pelo display, por exemplo, coisa que:

```js
//retorna apenas o texto vísivel
console.log(guest.innerText);
```

Já o ultimo não é tão diferente, ao invés de retornar apenas o texto, ele retorna o HTML como texto, ou seja, tags, classes, ids: 

```js
console.log(guest.innerHTML);
```

# Adicionando e removendo classes

Existem alguns comandos que nos permitem adicionar por programação classes noas tags HTML essas sendo: 

```js
const input = document.querySelector("#name")

adiciona a classe
input.classList.add("input-error");

remove a classe
input.classList.remove("input-error");

Caso não exista a classe adiciona, e caso exista remove
input.classList.toggle("input-error");
```

## Modificando o estilo

É possivel alterar o CSS pelo JS, usando o atributo s**tyle**:

```js
const button = document.querySelector("button");
// Modificar as propriedades css do elemento
button.style.backgroundColor = "red;"
```

## Criar elementos

Para criar elementos usamos um comando muito simples chamado **createElement** e definimos o que queremos adicionar:

```js
const guests = document.querySelector("ul");

//criando os elementos li e span
const newGuest = document.createElement("li");
const guestName = document.createElement("span");
```

E também podemos colocar coisas dentro desse conteúdo recém-criado, usando o textContent que já foi falado, mas, como eu posso adicionar uma tag criada dentro de outra, bom, podemos usar o **append** ou o **prepend**:

```js
const guests = document.querySelector("ul");

//criando os elementos li e span
const newGuest = document.createElement("li");
const guestName = document.createElement("span");

//criando um texto dentro da span
guestName.textContent = "Keven";

const guestSurname = document.createElement("span");
guestSurname.textContent = "Fernandes";


//adiciona após o ultimo filho
newGuest.append(guestName);

//adiciona antes do primeiro filho
newGuest.prepend(guestSurname)

console.log (newGuest)
```

No exemplo acima, foram adicionados dois spans dentro do li, mas, eu poderia deixar isso um pouco mais resumido dessa forma:

```js
newGuest.append(guestName, guestSurname);
```

Também existe uma outra maneira, mais simples até que o append, porém que só aceita um argumento por vez, ou seja, o exemplo de cima não pode ocorrer com esse, o **appendChild**:

```js
newGuest.appendChild(guestName);
```

## Manipulando Atributos

É possível adiciona ou remover atributos de um elemento HTML, isso se dá graças a dois comandos, o primeiro, responsável por adicionar elementos é o **setAtribute(atributo, valor)**, onde o primeiro se trata do atributo que queremos adicionar, e o segundo se trata do valor do atributo que queremos adicionar:

```js
const input = document.querySelector("input");

input.setAttribute("disabled", true);

input.setAttribute("type", "file");
```

E para removermos um atributo é ainda mais simples, usando o **removeAttribute(atributo)**, onde o único valor que passamos é o atributo:

```js
input.removeAttribute("id");
```

## Eventos

Eventos são ações realizadas pelo usuário para interagir com a aplicação:

```js
window.addEventListener("load",() => {
	console.log("A página foi carregada!");
})

addEventListener("click", (event) => {
	event.preventDefault()

	//Retorna todas as informações do evento.
	//console.log(event)

	//Retorna o elemento clicado
	console.log(event.target);

	//Retorna o textContent do elemento clicado
	console.log(event.target.textContent);
})
```

## Eventos em um elemento específico

Antes os eventos estavam acontecendo em toda nossa tela, como o evento de click, mas agora nós podemos adicionar eventos em área especificas, como em uma lista ul: 

```js
const ul = document.querySelector("ul");

ul.addEventListener("scroll", () => {
	console.log(ul.scrollTop);

	if(ul.scrollTop > 300) {
		console.log("Fim da lista");
		ul.scrollTo({
			top: 0,
			behavior: "smooth",
		})
	}
})
```

Nesse exemplo eu estou criando uma variável constante que vai pegar a lista não ordenada do documento, e em seguida vai adicionar um evento, nesse evento, sempre que eu dar scroll na lista, vou chamar uma função de flecha que vai imprimir a posição do scroll de forma numérica, isso graças a propriedade  **.scrollTop**. Depois vai ocorrer uma condicional que, quando esse valor de scroll ultrapassar 300, será impresso uma mensagem no console e vai chamar uma função que permite manipular o número desse scroll, essa função é a **scrollTo**
e o objeto que permite definir a posição é o **top**, e para não deixar essa mudança tão seca, adicionamos o objeto **behavior** que permite deixarmos isso mais suave.

```js
const button = document.querySelector("button");
button.addEventListener("click", (event) => {
	event.preventDefault()
	console.log("VOCÊ CLICOU!")
})
```

## Eventos de formulário

Existem duas formas de criar o evento de envio, no caso o submit, de um formulário:

```js
const form = document.querySelector("form")

form.onsubmit = (event) => {
	event.preventDefault()
	console.log("Você fez submit no formulário #1")
}

form.onsubmit = (event) => {
	event.preventDefault()
	console.log("Você fez submit no formulário #2")
}
```

No exemplo acima, diferente dos últimos eventos, podemos colocar de maneira direta o evento que queremos indo direto para a **arrow function**, e propositalmente eu fiz duas, pois quando fazemos desa forma, apenas o ultimo colocarado será contado e o resto ignorado.


```js
form.addEventListener("submit", (event) => {
	event.preventDefault()
	console.log("Você fez submit no formlário #3")
})

form.addEventListener("submit", (event) => {
	event.preventDefault()
	console.log("Você fez submit no formlário #4")
})
```

No caso acima, onde executamos todo o comando de submit, ambos contam, nenhum é ignorado.

## Eventos de input

Existem dois tipos de input, o de **keydown**, que basicamente coleta toda tecla que é pressionada, incluindo CTRL, SHIFT, etc:

```js
input.addEventListener("keydown", (event) =>{
console.log(event.key);
})
```
O ".key" depois do event serve para que seja impresso no console apenas a tecla digitada. Fora esse, também existe o **keypress**, que é bem parecido com o keydown, pela diferença de que o **keypress** coleta apenas teclas do tipo caractere, ou seja, não aceita CTRL, SHIFT, etc... 

```js
input.addEventListener("keypress", (event) => {
console.log(event.key);
})
```

Nó temos o **keyup**, que diferentemente dos demais, ele só coleta o caractere digitado quando nós soltamos a tecla, ou seja, podemos ficar com o dedo apertando infinitamente, que ele só irá coletar a tecla quando eu tirar o dedo. Lembrando que ele também aceita qualquer valor, como CTRL e SHIFT:

```js
input.addEventListener("keyup", (event) => {
console.log(event.key);
})
```

Também podemos usar o **change** que chama uma função ou impressão de algo, apenas quando mudamos do input para outra coisa, tipo quando pressionamos TAB:

```js
input.onchange = () => {
console.log("O input foi");
}
```

Existe também o **input**, que coletar o valor inteiro do input, como por exemplo todo o nome digitado nele:

```js
input.addEventListener("input", (event) => {
console.log(input.value)
})
```

O value serve para mostrar não o código HTML, mas sim o valor dentro dele que estou definindo

## Expressões Regulares

É utilizado para identificar se uma ocorrência ou padrão existem em uma string. Um padrão de expressão é composto por um conjunto de caracteres ou uma combinação de caracteres simples e especiais. 

## Manipulando o valor do input

Usando o regex, podemos definir o que nosso input poderá receber, dessa forma:

```js
input.addEventListener("input", (event) => {
const value = input.value;
const regex = /\D+/g;
console.log(value.match(regex))
})

```

O match serve para comparar se o value do nosso input está de acordo com o padrão definido em regex, se eles tem um "match".

Também podemos substituir ou apagar partes do texto com base na expressão regular e definindo o tipo de substituição ou exclusão:

```js
form.addEventListener("submit", (event) => {
event.preventDefault();
const regex = /\D+/g;
const value = input.value.replace(regex, "");
console.log(value);
})
```

utilizando o .replace, fazemos essas mudanças, caso deixamos o final sem nada, o valor será excluído, caso coloquemos algo, ele será substituído 

também podemos testar o valor, para saber se ele está de acordo com os padrões definidos: 

```js
const isValid = regex.test(value);
```

## Depuração de código

Debug é processo de encontrar e corrigir erros(bugs). Para isso podemos utilizar os **breakpoints**, que são pontos no código-fonte onde a execução do programa será pausada quando atingir esse ponto especifico para que você possa inspecionar o estado do programa.

## Inspecionar

Inspecionar permite examinar o código-fonte de um programa para entender sua lógica e a estrutura da aplicação.

## Objetos 

Um objeto é uma estrutura que representa algo com propriedades e comportamentos. Para melhor compreensão, podemos imaginar um carro, esse carro é um objeto e ele possui várias características, essas características são o que chamamos de  **propriedades**, por exemplo a cor desse carro, o modelo, o número de portas.

Um objeto também pode ter métodos, que são como os comportamentos desse veiculo, como acelerar, freiar, ligar, desligar...


## Criando um objeto

Criar um objeto é bem simples, por exemplo, um objeto vazio: 

```js
//Criando um objeto vazi  
const obj = {};
console.log(obj);
```

Também podemos criar um objeto já com algumas propriedades e seus respectivos valores: 

```js
const person = {
	email: "kevenscha@gmail.com",
	age: 21
}
```

Mas além disso, também podemos trazer um objeto dentro de um outro objeto:

```js
const person = {
	email: "kevenscha@gmail.com",
	age: 21,
	name: {
		first_name:"Keven Willians",
		Last_name:"Scharttz de Melo"
	},
	adress: {
		street: "Rua alpha",
		number: 888,
		city: "Criciuma",
		state: "SC",
		postal_code: 88888-888
	}

}
```

Um ponto muito importante é o uso do snake_case para as propriedades dos objetos. E outra coisa muito legal é que um objeto também pode ter funções:

```js
message: function() {
	console.log("Hello WOrld");
}
```

## Acessando um objeto

Podemos acessar um objeto de duas maneiras diferentes, uma delas é acessando as propriedades desse objeto e métodos usando a notação de ponto . :

```js
//Aceesando propriedades e métodos usando a notação de ponto .
console.log(person.email);

//Acessando propriedades e métodos de um objeto
console.log(person.name.first_name);

//Executando um método de um objeto
person.message();
```

A outra forma que podemos usar para acessar isso é com o uso de colchetes: 

```js
//Acessando propriedades e métodos usando a notação de colchetes []
console.log(person["email"]);

console.log(person["name"]["Last_name"]);

person["message"]();
```

## Acessando propriedades no contexto do objeto

Podemos utilizar as propriedades de um objeto dentro de métodos desses mesmos objetos:

```js
const user = {
	name: "Keven",
	message: function() {
		console.log(`Olá ${user.name}`)
	},
}
user.message();
```

Mas também podemos trocar o **user** por **this**, pois o this serve para indicar que quero utilizar, por exemplo, a propriedade name, do objeto atual ao qual o this está, nesse caso o user:

```js
const user = {
	name: "Keven",
	message: function() {
		console.log(`Olá ${this.name}`)
	},
}
user.message();
```

## Atualizando um objeto

```js
const product = {
	name: "Teclado",
	quantity: 100
}


//Atualiza o valor de uma propriedade
console.log(product.name);
console.log(product.quantity);

product.quantity = 90;
product.name = "Mouse";

console.log(product.name);
console.log(product.quantity);
```

## Encadeamento Opcional (Optional Chaining)

Se a propriedade ou função chamada é nullish (null ou undefined), a expressão retorna undefined em vez de gerar um erro. Útil ao explorar o conteúdo de um objeto quando não existe garantia da existência de determinadas propriedades obrigatórias:


```js
//Criando um objeto vazio

const obj = {};
console.log(obj);
console.log(typeof obj);

//Criando um objeto com propriedades
const person = {
	id: 1,
	name: {
	firstName:"Keven Willians",
	LastName:"Scharttz de Melo"
	},
	/*adress: {
		street: "Rua alpha",
		city: "Criciuma",
		state: "SC",
		geo: {
		latitude: 47.808,
		longitude: 17.5674,
		}
	},*/
	message: function() {
	console.log(`Olá ${this.name.firstName}`)
	}
}

console.log(person?.adress?.street)
```

Basicamente, usando o **?** antes do ponto, é como dizermos que não temos a certeza de que essa informação será passada, não gerando um erro caso aquilo não exista. No caso de uma **função**, colocamos essa interrogação junto de um ponto antes dos parenteses: 

```js
person.message?.();
```


## Operador de Coalescência nula (??)

É um operador lógico que retorna o seu operando do lado direito quando o seu operador do lado esquerdo é null ou undefined. Caso contrário, ele retorna o seu operando do lado esquerdo.

```js
let content = null;
console.log(content ?? "Conteúdo padrão");
```

Dessa forma, como o content é nulo, será exibido no console a String conteúdo padrão. Mas caso houvesse algo em content, seria exibido seu conteúdo normalmente. Além disso, não podemos esquecer dos objetos: 

```js
const user = {
	nome: "Keven",
	avatar: null,
}

console.log(`Olá ${user.nome}, seu avatar é ${user.avatar ?? "Default image"}`)
```

## Função construtora

É uma função que utilizamos com a palavra-chave **new**, que é capaz de instanciar objetos, e o que seria uma **instancia**? Basicamente criar uma cópia de um objeto na memória, e o **new** serve para isso.

```js
function createProduct(name){
		const product = {}
		product.name = name
		product.details = function(){
		console.log(`O nome do produto é ${this.name}`)
	} 
	return product;
}

const product1 = new createProduct("Keven");
console.log(product1.name);
product1.details();

const product2 = new createProduct("Marcos");
console.log(product1.name);
product1.details();
```

Aproveitando o assunto, vale lembrar que apesar dos objetos parecerem serem iguais, caso você use uma condicional de comparação, o resultado será false, pois, os objetos apontam para espaços diferentes da memória, logo não são iguais.

Resumindo tudo isso, uma função construtora é um modelo de estrutura para nossos objetos. E existem muitas já prontas que usamos, por exemplo:

```js
let user = new String("Keven");
console.log(user);  

let price = "46.8".replace(".", ",");
console.log(price);

let date = new Date ("2025-4-25");
console.log(date);
```

## Texto maiúsculo ou minusculo

Existem dois métodos que nos permitem manipular um texto para deixá-lo maiúsculo ou minúsculo, sendo o **toLowerCase** e o **toUpperCase**:

```js
let mensagem = "Hello World";

//deixa texto pequeno uga buga
console.log(mensagem.toLocaleLowerCase());

//deixa texto grande uga buga
console.log(mensagem.toLocaleUpperCase());
```

## Obtendo o comprimento de uma String

Conseguimos obter a quantidade de caracteres gerais de uma string usando a propriedade **lenght**:

```js
console.log(mensagem.length);
```

Pode ser usada para validação do tamanho minimo de uma senha e verificar a quantidade de digitos de um número:

```js
if (senha.length < 6) {
	console.log("A senha deve conter 6 caracteres");
}

let value = 12345;
console.log(value.toString().length)
```

## Substituindo e fatiando um texto

A alteração de um texto ocorre de uma maneira muito simples, usando o método **replace()**:

```js
let mensagem = "Estou estudando Javascript.";
console.log(mensagem);
console.log(mensagem.replace("Javascript", "JS"));
```

E sobre esse "Fatiar", podemos delimitar de qual posição até qual, será pego, por exemplo, uma string possui 27 caracteres, e eu quero iniciar dá posição 0, até a posição 15, apenas os caracteres dentro disso estariam sendo pegos:

```js
let mensagem = "Estou estudando os fundamentos do Javascript.";

console.log(mensagem.length)
console.log(mensagem.slice(0, 27));
```

Mas também podemos pegar  uma parte da string de trás para frente, por exemplo, pegando apenas o Javascript:

```js
let mensagem = "Estou estudando os fundamentos do Javascript.";

console.log(mensagem.length)
console.log(mensagem.slice(-11));
```

## Apagar espaços em branco

Podemos excluir espaços em branco no começo e fim de uma string usando o método **trim()**, mas ele não remove espaços entre a string:

```js
let texto = " espaços ";
console.log(texto);
console.log(texto.trim())
```

## Completando uma String

Podemos colocar mais caracteres no começo ou no final de uma string, usando dois métodos, o **padStart** que adiciona antes da string, e o **padEnd**, que adiciona depois da String:

```js
const creditCard = "1234567812344928";
const lastDigits = creditCard.slice(-4);

console.log(lastDigits);
console.log(creditCard);

const maskedNumber = lastDigits.padStart(creditCard.length, "X");
console.log(maskedNumber)

const maskedNrumber = lastDigits.padEnd(creditCard.length, "X");
console.log(maskedNrumber);
```

Lembrando que ele não exatamente faz essa adição pelas posições, par ficar mais claro, podemos pensar num exemplo de uma string "ABC", o padStart é como se alguém falasse: "Eu quero que uma string tenha 5 de tamanho". Se ele quer 5 de tamanho, nós vamos até o padStart ou end e definimos isso, com o primeiro número sendo o comprimento total que queremos que essa string tenha, e o outro elemento o que queremos colocar nas áreas vazias para que esse comprimento seja alcançado.

## Separando e unindo strings

É possível separar uma string em mais de strings usando o comando **split()**, onde dentro dos parentenses definimos o que vai definir esse separação, por exemplo, uma separação a cada virgula com um espaço:

```js
let text = "Estudar, Aprende, Praticar";
let separate = text.split(", ");

console.log(separate);
```

Mas também podemos unir strings, usando o **join()** que acaba sendo bem parecido com o split, pela diferença do conteúdo interno definir como as strings individuais vão ficar juntas, o que terá entre elas dentro dessa string única: 

```js
let joined = separate.join(", ")
console.log(joined);
```

## Encontrando um conteúdo no texto

Podemos obter a posição em que uma palavra começa com o  método **indexOf()**, onde o conteúdo dos parenteses é a palavra que queremos ver onde começa: 

```js
let text = "Estou estudando os fundamentos do Javascript";
//Obter a posição da palavra - quando não encontra retorna -1
console.log(text.indexOf("estudando"));
```

Também podemos saber se determinada palavra existe no texto ou não, usando o método **includes()**, da mesma forma onde havia a palavra desejada no método indexOf, aqui serve para retornar para nós se verdadeira é sua existência ou não.


## Array

Array é uma coleção ordenada de valores. Podemos comparar um array a uma lista, onde cada item da lista possui um posição específica, conhecida como índice. Um detalhe muito importante dos Arrays é que eles sempre começam em 0, ou seja, caso que queira uma lista com 100 itens, ele vai começar do 0 e vai até o 99, resultando em 100.

## Criando um array com um construtor

Podemos criar um array usando um construtor, ficando da seguinte forma:

```js
const newArray = new Array();
```

Podemos também especificar a quantidade de espaços desse array, colocando dentro das chaves nosso valor desejado.

## Criando e acessando um array

Diferente de um objeto, quando criamos um array usamos **[]** ao invés de **{}**: 

```js
const fruits = ['Apple', 'Grappes', 'Banana'];
```

Caso queiramos acessar um valor especifico do array, como seu primeiro elemento, podemos fazer isso da seguinte forma:

```js
console.log(fruits[1]);
```

Já o último elemento de um array é um pouco diferente, sendo dessa forma para sempre conseguirmos seu final:

```js
console.log(fruits[fruits.length-1]);
```

## Convertendo uma string para um array

Podemos converter uma string para um array de duas formas diferentes, a primeira que já é conhecida é usando o split():

```js
let fullName = "Keven Willians Scharttz de Melo";

//Cria um array com os nomes separados por espaços
console.log(fullName.split(" "));
```

Mas também existe uma outra forma, onde cada caractere se torna um elemento do array: 

```js
let fullName = "Keven Willians Scharttz de Melo";

// Cria um array com as letras
console.log(Array.from(fullName));
```

## Adicionando e removendo um item do array

Podemos adicionar mais elementos em um array com o método **push()** e o método **unshift()**, porém, quando usamos o push, o item é adicionado no final do array, já quando usamos o unshift ele é colocado no começo do array:

```js
let user = [];

user.push("Keven");
user.push("João");
user.push("Matheus");
user.unshift("Ana");
```

Para removermos um elemento de um array, podemos fazer isso de forma não especificada, onde removemos o primeiro elemento e o ultimo elemento.

Quando usamos o método **shift()**, estamos removendo o primeiro elemento do array: 

```js
user.shift();
```

Quando usamos o método **pop()**, estamos removendo o ultimo elemento do array:

```js
user.pop();
```

## Usando índice

Podemos encontrar o índice de um elemento em especifico para que dessa forma possamos usar outras ações, como excluir, de forma mais especifica. Para achar o índice de um elemento especifico nós usamos o **indexOf()** passando como parâmetro o elemento:

```js

let user = [];

user.push("Keven");
user.push("João");
user.push("Matheus");
user.unshift("Ana");

//Encontra e retorna o indice do elemento no Array, se não encontra, retorna -1
let position = user.indexOf("Keven");
console.log(position);
```

Com o índice, podemos excluir itens especificando sua posição para excluir o elemento que queremos, isso é possível com o método **splice()**:

```js
//O primeiro parametro é referente ao indice do elemento, o segundo é referente a quantos elementos queremos excluir apartir dele.
user.splice(1, 1);
console.log(user);

user.splice(position, 1);
```

## Quais tipos um array aceita

Em resumo, todos:
```js
let myArray = [
	"Um texto",
	10,
	true,
	function(){
		console.log("Fodao Games!");
	},
	{
		name: "Keven",
		email: "kevenscha@gmail.com"
	}
]

//string
console.log(myArray[0]);

//número
console.log(myArray[1]);

//booleano
console.log(myArray[2]);

//função
console.log(myArray[3]);

//objeto
console.log(myArray[4]);
```

## Verificando se existe um conteúdo no array

Podemos verificar a existência ou não de um elemento em especifico dentro de um Array, isso usando o **includes()**, onde passamos como parametro para o includes o elemento que queremos verificar a existencia, e nos é retornado true ou false:

```js
let fruits = ['Apple', 'Watermelon', 'Banana', 'Orange']

// Verifica se um item existe Array
console.log(fruits.includes('Watermelon'));
```

## Repetições

Repetição é quando executamos um bloco de código várias vezes de acordo com um condição específica

## While

O while significa **enquanto**, e ele executa um bloco de código até que a condição seja **verdadeira**:

```js
let execute = true;

while (execute) {

	let response = window.prompt("Deseja continuar: 1 (SIM), 2 (NÃO)")

	if (response == 22) {
		execute = false;
	}
}

console.log("receba...");
```

Devemos ter cuidado usando o while, pois, podemos acabar criando loops infinitos.

## Do

O do serve para dizer "faça isso" ou "faça aquilo", funcionando em conjunto com o while , ou seja, em uma tradução livre é como dizer " Faça tal coisa enquanto tal coisa for assim":

```js
let value = 0;
do {
	value++;
	console.log(value);
} while (value < 10)
```

Detalhe importante é que ele vai fazer o do pelo menos 1 vez, já que vem antes da comparação.

## For

O for repete até que a condição seja falsa, porém diferente do while, ele vem com uma variável de controle e um incremento ou decremento de controle:

```js
for (step = 0; step < 10; step++){
	console.log(step+1);
}
```

## For in

O for in executa iterações a partir de um objeto e percorre as propriedades:

```js
let person = {
	name: "Keven",
	username: "Xx_KeVeN_xX",
	email: "keven@email.com",
} 

for (let property in person){
	//exibe o nome da propriedade
	console.log(property)

	//exibe o conteúdo da propriedade
	console.log(person[property]);
}
```

Também podemos usar o for in para Arrays: 

```js
let students = ['Keven', 'Lucas', 'João', 'Maria', 'Ana'];
for (let indexStudents in students){

//exibe a posição
console.log(indexStudents)

//exibe o conteúdo
console.log(students[indexStudents])
}
```

## For of

Diferente do for in, o **for of** itera sobre os valores de um objeto iterável:

```js
let students = ['Keven', 'Lucas', 'João', 'Maria', 'Ana'];

for (let student of students){
	console.log(student)
}
```

## Break

O break encerra a execução da repetição ou switch para seguir para a instrução seguinte:

```js
//Utilizando o break para finalizar a repetição.
for (let i = 0; i < 10; i++) {
	if (i === 5){
		break;
	}
	console.log(i)
}
```

## Continue

O continue encerra (pula) a execução das instruções na iteação atual e continua a execução do loop com a próxima iteração:

```js
for (let i = 0; i < 10; i++) {
	if (i === 5){
		continue;
	}
	console.log(i)
}
```

## Obtendo data e a hora

Podemos obter dia, dia da semana, mês, ano, e horário, definido automaticamente pela localidade da maquina, ou seja, com as diferenciações de fuso-horários, a partir do método **Date()**:

```js
//data e hora atual
console.log(new Date());

//exibe a data e hora de refêrencia (considera o fuso)
console.log(new Date(0);

// exibe o número de milisegundo
console.log(new Date().getTime())
```

## Como definir uma data e hora especifica

Podemos definir passando o que desejamos como parametro do Data:

```js
//Define com ano, mês (0-11), dia.
console.log(new Date(2024, 6, 3));

//Define data e hora
console.log(new Date(2004, 4, 20, 20, 30, 14));

//Definindo data e hora com string
console.log(new Date("2004-04-20T20:30:14"));
```

## Métodos para trabalhar com data e hora

Essa função construtora tem alguns métodos bem legais de se trabalhar, sendo eles: 

```js
let date = new Date("2004-04-20T08:30:14");

//Dia da semana de 0 à 6 (domingo é 0)
console.log(date.getDay());

//Dia do mês (0 à 30)
console.log(date.getDate());

// Mês (0 à 11)
console.log(date.getMonth()+1);

//Ano
console.log(date.getFullYear());

//HOras
console.log(date.getHours());

//Minutos
console.log(date.getMinutes());

//Segundos
console.log(date.getSeconds());
```

## Modificando uma data e uma hora

Usando os métodos que citamos antes, claro, usando os setters e não os getters, conseguimos modificar essas datas, dessa forma:

```js
let date = new Date("April 20, 2004 08:30:14");

console.log(date);

//Modificar o ano
date.setFullYear(2100);

//Modificar o mês (começa com 0)
date.setMonth(9);

//Mdificar o dia
date.setDate(10)

//Modificar a hora
date.setHours(23);

//Modificar os minutos
date.setMinutes(34);

//Modificar os segundos
date.setSeconds(15);

//Modificar os milissegundos
console.log(date);
```

## Formatando data e hora

Podemos formatar essas informações, por exemplo, utilizando métodos como **getDate**, **getMonth** e **padStart** para garantir que os valores tenham sempre dois dígitos:

```js
let date = new Date("2004-04-02T08:30:14");

//Aqui formatamos para que o dia sempre tenha 2 dígitos.
let day = date.getDate().toString().padStart(2, "0")

//formata para o mês sempre ter 2 dígitos
let month = (date.getMonth()+1).toString().padStart(2, "0")

let year = date.getFullYear();
let hour = date.getHours();
let minute = date.getMinutes();

console.log(`Hoje é dia ${day}, do mês ${month} de ${year}. São exatamente ${hour} e ${minute} da noite`)
```

## Convertendo uma data para string

Até agora quando convertíamos a data para string, o resultado impresso era o mesmo, não havia diferença alguma, agora, porém podemos usar métodos mais específicos para a conversão para string, isso graças ao **toDateString** e o **toTimeString**:

```js
let date = new Date("2004-04-02T08:30:14");

//imprime normalmente
console.log(date.toString());

//imprime em um formato que apresenta apenas o dia da semana, mês, dia e ano
console.log(date.toDateString());

//imprime em um formato que apresenta apenas hora, minuto e segundo, junto com o fuso-horário
console.log(date.toTimeString);
```

## Exibindo data de hora formatadas de acordo com a localidade

Nós podemos definir o formato de data de acorco com a localidade que queremos, ou deixar a padrão, isso graças ao **toLocaleDateString** e o **toLocaleTimeString**:

```js
let date = new Date ("2024-07-02T14:00:00");

//Exibe a data e hora no formato local
console.log(date.toLocaleDateString())
console.log(date.toLocaleTimeString())

//Exibe a data e hora no formato escolhido
console.log(date.toLocaleDateString("en"))
console.log(date.toLocaleTimeString("en"))
```

## Usando o toLocaleString()

O **toLocaleString** permite com que façamos uma impressão da data de forma local, dentro dos formatos usados em cada localidade, porém, podemos passar mais parâmetros para que dessa forma possamos especificar o tamanho dessa impressão:

```js
//22/09/2016
console.log(date.toLocaleString("pt-BR", {
	dateStyle: short",
}))  

//22 de set. de 2016
console.log(date.toLocaleString("pt-BR", {
	dateStyle: "medium",
}))

//22 de setembro de 2016
console.log(date.toLocaleString("pt-BR", {
	dateStyle: "long",
}))

//quinta-feira, 22 de setembro de 2016
console.log(date.toLocaleString("pt-BR", {
	dateStyle: "full",
}))
```

Além disso, usando o mesmo **toLocaleString**, podemos editar como que os dados serão impressos, por exemplo, definindo que os dias, meses, horas e minutos tenham 2 digitos:

```js
console.log(date.toLocaleString("pt-BR", {
	day: "2-digit",
	month: "2-digit",
	hour: "2-digit",
	minute: "2-digit",
}))
```

Mas não apenas isso, nós podemos editar também, apesar de sair um pouco do contexto de datas, valores:

```js
let amount = 12.5;

console.log(amount.toLocaleString("pt-BR", {
	style: "currency",
	currency: "BRL",
}))
```


## Aprendendo sobre fuso horário

### Timestamp

Uma data é representada como um número. Esse número também é conhecido com timestamp(carimbo de data/hora). O timestamp é um valor que representa um ponto específico no tempo, geralmente expresso como uma contagem de segundos ou milissegundo desde um momento de referencia.

### Referência

A data do Javascript é baseada no valor de tempo em milissegundo desde a meia noite do dia 01 de Janeiro de 1970, UTC. Mas claro, devemos lembrar que caso queiramos ver essa informação impressa, ela pode acabar um pouco diferente, já que ela se altera dependendo do fuso horário local.

## Fuso horário

Sempre há duas maneiras de interpretar data e hora: local ou como Tempo Universal Coordenado (UTC). O fuso horário local não é armazenado no objeto de data, mas é determinado pelo ambiente que está executando (dispositivo do usuário).

## Conhecendo a Intl

A Intl é a API de Internacionalização do ECMAScript. Usando essa API podemos obter algumas informações extras, usando o seguinte comando:

```js

//Obter informações sobre a localidade
const currentLocate = Intl.DateTimeFormat().resolvedOptions();

console.log (currentLocate);
```

Mas também podemos exibir tudo no formato de acordo com a localidade: 

```js
//Exibe no formato de acordo com a localidade

console.log (new Intl.DateTimeFormat("pt-BR").format(new Date()));

console.log (new Intl.DateTimeFormat("en-US").format(new Date()));
```

Também podemos obter a diferença em minutos do timezone: 

```js
let date = new Date();

//Obtem a diferença em minutos do timezone
console.log(date.getTimezoneOffset());  

//Obtém a diferença em horas do timezone
console.log(date.getTimezoneOffset()/60);
```

## Criando um data e hora com fuso horário

Usando o método **toISOString** podemos obter data e hora em um formato necessário para adicionarmos um deslocamento de fuso horários, aumentando esse fuso, voltando um pouco no norário ou diminuindo, fazendo o horário passar mais 

```js
const dateWithZone = new Date("2025-04-24T17:01:11.274-03:00");

//console.log(dateWithZone.toISOString());
console.log(new Date().toLocaleString());
console.log(dateWithZone.toLocaleString());
```

## Classes 

No JavaScript as classes são uma forma de criar objetos e definir o seu comportamento por meio de construtores e métodos.

Elas foram introduzidas no ECMAScript 2015 (também conhecido como ES6) para fornecer uma sintaxe mais amigável para a criação de objetos e herança de protótipos(syntax sugar).

### Construtores e métodos

Uma classe é basicamente um modelo para criar objetos. Ela contém um construtor, que é um método especial chamado quando um objeto é instanciado a partir da classe.

Além do construtor, você pode adicionar métodos a uma classe. Métodos são funções associadas a objetos e descrevem o comportamento desses objetos.

### Herança

Uma classe pode herdar as propriedades e métodos de outa classe, permitindo a reutilização do código

## Criando uma classe com um método Construtor

Para nomes de classes, é interessante se utilizar o PascalCase. sua estrutura básica é assim: 

```js
class MyClass {

}
```

Para começarmos, dentro dessa classe podemos criar um método construtor, que recebe como parâmetro um nome, e depois quando criarmos um objeto a partir dessa classe, passamos junto o nome:

```js
class Person {
	constructor(name) {
		console.log("Olá", name);
	}
}

const person = new Person("Keven");
```

## Criando propriedades dentro das classes

```js
class Product {
	constructor(name){
			//this referencia que o name passado como parametro vai ser recebido pelo name que pertence a classe Product, criando-a.
		this.name = name;
	}
}

const product = new Product("Teclado");
console.log(product.name);

const product2 = new Product("Mouse");
console.log(product2.name);
```

Aqui está ocorrendo o seguinte, no meu método construtor estou dizendo que o name passado como parâmetro vai ser recebido por outro name, mas isso é confuso, qual name vai receber o que? O **this** serve para ajudar nisso, ele define que o name no contexto da classe, ou seja, um name que está dentro de Product irá receber o conteúdo de name que for passado como parâmetro. Por consequencia esse name é criado na classe Product, e pode ser impresso.

## Adicionando métodos nas classes

Podemos além de criar propriedades em uma classe, criar métodos, mas diferente o convencional, não precisamos incluir o "function":

```js
class User {
	constructor(name, email){
	this.name = name;
	this.email = email;
}

sendEmail (){
	console.log(
			"Mensagem enviada para",
			this.name,
			"para o endereço de e-mail:",
			this.email
		);
	}
}

const usuario = new User("Keven", "Kevenscha@gmail.com");
console.log(usuario.name+" "+usuario.email); 

usuario.sendEmail();
```

## O que é um método estático?

Um método estático é um método que pode ser acessado sem a necessidade de se instanciar a classe a qual pertence, diferente de métodos não estáticos que requerem umas instanciação. Porém, caso elas dependam de algo que envolve outras partes da classe, provavelmente não irá funcionar, por exemplo usar uma propriedade que necessite de um parâmetro passado para outro método, ah não ser que seja passado diretamente para esse método estático:

```js
class User {
	static showMessage (name) {
		console.log("Essa é uma mensagem de", name);
	}
}
//const user = new User();
//user.showMessage();

User.showMessage("Keven");
```

## Como aplicar heranças com classes

Herança é basicamente criar uma classe e dizer que outras classes vão ter o mesmo conteúdo que essa classe ter, como se fosse uma herança passada dessa classe para as outras, para definir que uma classe vai herdar de outras usamos a palavra **extends**:

```js
class Animal {
	constructor (name){
		this.name = name;
	}

	makeSound(){
		console.log("Fazendo barulho!");
	}
}

	//o método de som está aqui, mas não aparece, pois está sendo herdado de animal
class Dog extends Animal{
}
class Cat extends Animal{

}

const animal = new Animal("animal");
const cat = new Cat("Jaque");
const puppy = new Dog("Black");

animal.makeSound();
cat.makeSound();
puppy.makeSound();

console.log(animal.name);
console.log(cat.name);
console.log(puppy.name);
```

No exemplo acima, além de herdar o método de fazer barulho, eu também herdei seu construtor, permitindo que eu não precisasse criar um método construtor para cachorro e gato, deixando eu definir seus nomes e imprimi-lós.

## Sobrescrita de métodos

Apesar da herança ser muito útil, algumas vezes os métodos passados podem não estar de acordo com o conteúdo que você esperava que eles tivessem, para isso existe a sobrescrita, que permite editar um método passado por herança:

```js
class Animal {
	makeSound(){
		console.log("Fazendo barulho!");
	}
}

	
class Dog extends Animal{
	makeSound(){
	//pode parecer que estou apenas criando um método, mas não, eu estou editando o mesmo método que foi passado de Animal por herança
	console.log("Woof! Woof!");
	}
}

const puppy = new Dog("Black");

puppy.makeSound();
```

## Prototype chain

O JavaScript é dinâmico e não dispõe de uma implementação de uma class (a palavra-class foi introduzida no ES2015, mas é syntax sugar, o JavaScript permanece baseado em prototype).

### Mas o que é prototype?

Quando se trata de herança, o JavaScript tem somente um construtor: objetos. Cada objeto tem um link interno para um outro objeto chamado prototype.

O objeto prototype tem um atributo prototype, e assim por diante até que o valor null seja encontrado como sendo o seu prototype. O null, por definição, não tem prototype, e age como um link final nesta cadeita de protótipos (prototype chain).

Image um array, esse array é herda de um outro objeto, o Array.prototype, e esse Array.prototype herda de um Object.prototype, já o Object não tem como herdar de algo, ele é a ponta, então ele chega no null.

### Resumo

* Quando um objeto é criado ele possui automaticamente uma propriedade que referencia outro objeto, esse objeto é chamado de prototype
* O objeto prototype herda propriedades e métodos do seu protótipo ascendente. Essas propriedades não pertencem ao objeto em si, mas sim ao prototype do objeto
* O prototype é o mecanismo pelo qual os objetos JavaScript herdam recursos uns dos outros.
* A cadeira termina quando chegamos a um protótipo que tem null por protótipo.
* Um objeto pode utilizar qualquer propriedade ou método que existir nesse encadeamento de Protótipos.


## Acessando um objeto prototype

```js
const address = {
	city: "Criciúma",
	country: "Brazil",
}
console.log(address.__proto__);
```

## Utilizando classes para lidar com exceções

Podemos tratar diferentes tipos de erros, como o TypeError e RangeError. Usando o método throwNew podemos gerar excessões personalizadas:

```js
let obj = [];
let index = 300;

try {
	obj.includes(17);

	if (!obj.includes(17)){
		throw new Error (console.log("O número 17 não existe na lista"));
	}
  
	if (index > 100) {
		throw new RangeError ("O número está fora do intervalo. Escolha um número de 0 à 99");
	}
} catch (error) {
	if (error instanceof TypeError){
		console.log("Método indisponível");
	} else if (error instanceof RangeError){
		console.log(error.mensage);
	} else {
		console.log("Não foi possivel realizar a ação");
	}
}
```

## Como utilizar classes para criar errors customizados

```js
class MyCustomErro {
    constructor(message) {
        this.message = "CLASSE DE ERRO CUSTOMIZADA: "+message;
    }
}

try {
    throw new Error("Erro genérico");

    throw new MyCustomErro ("Erro personalizado lançado");
} catch (error) {
    if (error instanceof MyCustomErro){
        console.log(error.message);
    } else {
        console.log("Não foi possível executar!");
    }
}
```

## ECMAScript

ECMAScript é a especialização que define a linguagem JavaScript deve se comportar. Sempre que há uma nova atualização dos recursos do JavaScript, ela é lançada pelo ECMAScript, que pode ser abreviada com ES. 

## Strict Mode (Modo restrito)
Ativando esse modo, os erros que eram silenciosos passam a gerar exceções no Javascript

```js
"use strict"

function showMessage() {

    let personName = "Keven Willians";
    console.log(personName);
}

showMessage();

class Student {
    get point() {
        return 7;
    }
}

let student = new Student();

//tenta mudar uma propriedade somente leitura.
//student.point = 10;
console.log(student.point);

//tentando deletar uma propriedade de um objeto que não posso deletar.
//delete window.document;


//Quando passamos parametros duplicados

/*
function sum (a, a, c){
    return a + a + c;
}
    */
```

Em suma, o strict protege a gente de fazer um código todo cagado.

## Desestruturação de array (destructuring assignment)

Permite extrair dados de arrays ou objetos em variáveis distintas: 
```js
const data = ["Keven Willians", "kevenscha@gmail.com"];


//Desestruturando um array
const[username, email] = data;

//Desestruturando o primeiro item do array
const frutas = ["bandddana", "maça", "Pessego"];

const [primeiraFruta] = frutas;
console.log(primeiraFruta);

//Desestruturando o terceirto item do array
const[,,terceiraFruta] = frutas;
console.log(terceiraFruta);
```

Se perceber, é como criarmos uma variável, mas sem definir seu nome e a cada virgula, é como se um item do array fosse pulado.

Já os objetos são um pouco diferentes, quando fazemos essa desestruturação, suas propriedades se tornam variáveis, então não precisamos criar uma variável

```js
const person = {
    nome: "Keven",
    idade: 21,
}

const {nome, idade} = person;

console.log(nome);
console.log(idade);
```

essa desestruturação pode ser muito útil para funções, já que quando passasmos um argumento para o parametro de uma função, ele deve estar na ordem de parametros dessa função, ou as informações vão se misturar. Isso não ocorre mais:

```js
const person = {
    nome: "Keven",
    idade: 21,
}

const {nome, idade} = person;

function newProduct({nome, idade}) {
    console.log("### NOVO PRODUTO ###");
    console.log(nome);
    console.log(idade);
}

newProduct ({
    nome: "keven",
    idade: "900",
})

newProduct ({
    idade: "900",
    nome: "Hiago",
})
```

## Rest Params (...)

Permite representar um número indefinido de argumentos como um array:

```js
function value (...rest) {
    console.log(...rest)
}

value(10, 2, 4, 9);
```

Caso removido sejam esses três pontos do console, retornado um Array será.

```js
function value (...rest) {
    console.log(rest)
}

value(10, 2, 4, 9);
```

Também podemos usar **args** no lugar de rest.

## Spread (espalhar)

Permite que um objeto iterável, como uma expressão de array ou uma string seja expandido para ser usado onde zero ou mais argumentos

```js
const numbers = [1, 2, 3];

console.log(numbers);

console.log(...numbers);
```

## Métodos de array

Podemos usar métodos de array para percorrer, manipular e retornar novos arrays.

### Método map()

O método **map()** chama a função de callback recebida por parâmetro para cada elemento do Aray original, em ordem, e constrói um novo array com base nos retornos de cada chamada. E no final, devolve o novo array.

```js
const products = ["Teclado", "Mouse", "Monitor", "Impressora", "Scanner", "Notebook", "Desktop", "Tablet", "Celular", "Cabo HDMI", "Cabo USB"];

// Percorrendo os itens do Array

products.map((product) =>{

    //console.log(product);

})

// Sintaxe reduzida
products.map((product) => console.log(product));


//Utilizando o novo objeto retornado
const formatted = products.map((product) => { 
    //return product.toUpperCase();
    return {
        id: Math.random(),
        description: product,
        price: 150,
    }
})

console.log(formatted);
```

### Método filter

```js
const words = ["JavaScript", "Python", "Java", "C++", "Ruby", "PHP", "Swift", "Go", "Kotlin", "Rust"];

//filtrando palavras com 5 ou mais letras
const results = words.filter((word) =>{
    return word.length >= 5;
})

console.log(results);

const products = [
    { 
        name: "laptop",
        price: 1000,
        category: "electronics"
    },
    { 
        name: "phone",
        price: 500,
        category: "electronics"
    },
    {
        name: "shirt",
        price: 20,
        category: "clothing"
    },
    {
        name: "pants",
        price: 30,
        category: "clothing"
    }
]

//filtrando objetos com o preço maior ou igual a 50
const filteredProducts = products.filter((product) =>{
    return product.price >= 50;
});

console.log(filteredProducts);
```

### Método findIndex()

Retorna o índice no array do primeiro elemento que satisfizer a condição. Caso contrário, retorna -1, indicando que nenhum elemento passou no teste.

```js
const values = [4, 6, 8, 12]


//Obtendo o primeiro índice do elemento que o valor é maior do que 4.
const index = values.findIndex((value) =>{
    return value > 4
});

//retorna o elemento que atende ao requisito
console.log(values[index]);
```

### Método find()

Retorna o valor do primeiro elemento do array que satisfaz a condição, caso contrário, undefined é retornado.

```js
const values = [4, 6, 8, 12]


//Obtendo o primeiro elemento que o valor é maior do que 4.
const found = values.find((value) =>{
    return value > 4
});
console.log(found);


const fruits = [
    {
        name: "banana",
        quantity: 10,
    },
    {
        name: "uvas",
        quantity: 43,
    },
    {
        name: "maça",
        quantity: 12,
    }
]

const results = fruits.find((fruit) => {
    return fruit.name === "maça";
})

console.log(results);
```

### Método every()

Testa se todos os elementos do array pssam na condição e retorna um valor Boolean

```js
//exemplo de array de idades

const ages = [22, 18, 30, 25, 17, 19, 16, 21, 20, 23, 24];

console.log(ages.every((age) =>{
    return age >= 18;
}))
```

## Método some()

Testa se ao menos um dos elementos no array passa na condição e retorna um valor true ou false

```js
//exemplo de array de idades

const ages = [22, 18, 30, 25, 17, 19, 16, 21, 20, 23, 24];

console.log(ages.some((age) =>{
    return age >= 29;
}))
```

### Método reduce()

É um método que reduz um array a um único elemento. Nós precisamos passar algumas coisas para que ele funcione bem:

```js
const ages = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

const sum = ages.reduce((accumulator, currentValue, index) => {
    console.log("ACUMULADOR:", accumulator);
    console.log("VALOR ATUAL:", currentValue);
    console.log("INDEX:", index);
    console.log("SOMA:", accumulator + currentValue);
    console.log("--------------");

    return accumulator + currentValue;
}, 0);

console.log("SOMA TOTAL:", sum);
```

O 0 no final serve para indicar o valor inicial disso, o accumulator serve para ir acumulando a soma, o currentValue serve para indicar qual o valor atual do array que temos, e o index é a posição do valor atual no array.


## ES Modules

Define um formato para organizar e restruturar o código em módulos, permitindo a modularização e reutilização de código. Uma de suas principais caracteristicas é o encapsulamento de código em módulos, permitindo a separação de responsabilidades e reutilização de código. Outra é o import, que usamos pra incluir módulos. Por fim, o export, usado para expor funcionaldades de um módulo para outros.

## Criando módulos

Primeiramente, quando estamos trabalhando com módulos, o main.js linkado no html precisa receber um **type="module"**

Quando criamos um novo arquivo js, que tenha métodos, precisamos usar antes da function a palavra-chave **export** ou ao final com **export {métodos, métodos}**, que permite com que essas funções de outros arquivos pudessem ser usados em outros lugares, e para fazer essa importação usamos o **import**:

__calc.js__
```js
function sum (a, b){
    return a + b;
}

function multiply (a, b){
    return a * b;
}

export {sum, multiply};
```

__main.js__
```js
import {sum, multiply} from "./calc.js";

console.log(sum(4, 6));
console.log(multiply(4, 6));
```


## Importando tudo

também podemos importar todos os métodos de uma vez (os que estão importados), usando um simples asteristico e definindo um nome para o conjunto desses métodos pela palavra chave **as**

__main.js__
```js
import * as calc from "./calc.js";

console.log(calc.sum(4, 6));
console.log(calc.multiply(4, 6));
```

## Renomeando as exportações

Podemos alterar o nome de uma função quando exportamos ela para outro arquivo:

__main.js__
```js
import {soma, multiplica} from "./calc.js";

console.log(soma(4, 6));
console.log(multiplica(4, 6));
```

__calc.js__
```js
function sum (a, b){
    return a + b;
}

function multiply (a, b){
    return a * b;
}

export {sum as soma, multiply as multiplica};
```

## Renomeando as importações

Dá mesma forma que renomeamos as exportações, também podemos renomear as importações: 

__main.js__
```js
import {soma as s, multiplica as m} from "./calc.js";

console.log(soma(4, 6));
console.log(multiplica(4, 6));
```

__calc.js__
```js
function sum (a, b){
    return a + b;
}

function multiply (a, b){
    return a * b;
}

export {sum, multiply};
```

## Usando classes nos módulos

Podemos utilizar classes em módulos, para que todos os métodos que queremos sejam exportados junto com a classe:

__main.js__
```js
import {Calculator} from "./calc.js";

const calc = new Calculator();

console.log(calc.soma(4, 6));
console.log(calc.multiplica(4, 6));
```

__calc.js__
```js
export class Calculator {
    sum (a, b){
        return a + b;
    }

    multiply (a, b){
        return a * b;
    }
}
```
### setTimeout()

Executa uma função após um intervalo de tempo especificado

```js
setTimeout(() => {
    console.log('Hello World');
}, 1000);
```

O que estiver dentro desse setTimeout é o que será feito depois de determinado tempo, o tempo nessa função é feito em **milisegundos**, e vão ao final.

## setInterval()

Executa uma função após um intervalo de tempo especificado, e a diferença dele para o timeOut, é que ele vai ficar repetindo essa função, nós definimos o intervalo entre as repetições:

```js
let value = 10;

const Interval = setInterval(() => {
    console.log(value);
    value = value - 1;

    if (value <= 0) {
        console.log("Decremento feito");

        clearInterval(Interval);
    }
}, 1000);
```

E quando queremos finalizar essa repetição, usamos o **clearInterval()**


## Funções Assíncronas

Quando uma função assíncrona é chamada, ela retorna uma **Promise**, uma promessa, de forma simples, é como se o sistema prometesse para você que vai trazer o que foi pedido, e retornar o resultado disso  for finalizado.

Quando uma função assíncrona retorna um valor, a **Promise** será resolvida com o valor retornado. Quando a função assíncrona lança uma exceção ou algum valor, a Promise será rejeitada com o valor lançado.

Uma função assíncrona pode contar com uma expressão **await**, que pausa a execução da função assíncrona e espera pela resolução da Promise passada, e depois retoma a execução da função assíncrona e retorna o valor resolvido.

## Conhecendo promises

```js
//Função que retorna uma Promise
function asyncFunction (){
    return new Promise((resolve, reject) => {
        //simulando uma operação assíncrona
        setTimeout(() => {
            const isSuccess = true;

            if (isSuccess) {
                resolve("A operação foi concluída com sucesso");
            } else{
                reject("A operação falhou");
            }
        }, 3000);
    }) //Simula uma operação que leva 3 segundos.
}        


console.log("Executando função assincrona...");

//Visualizando que o retorno é uma promise
//console.log(asyncPromise());


asyncFunction().then((response) => {
    console.log("Sucesso");
}).catch((error) => {
    console.log("Falhou")
}).finally(() => {
    console.log("Conclúido")
})
```


## Conhecendo Async e Await

```js

//Função que retorna uma Promise
function asyncFunction (){
    return new Promise((resolve, reject) => {
        //simulando uma operação assíncrona
        setTimeout(() => {
            const isSuccess = true;

            if (isSuccess) {
                resolve("A operação foi concluída com sucesso");
            } else{
                reject("A operação falhou");
            }
        }, 3000);
    }) //Simula uma operação que leva 3 segundos.
}        

async function fetch() {
    const response = await asyncFunction();
    console.log(response);
}

fetch()
```

## Event loop

O JavaScript é single threaded, ou seja, ela executam um coisa por vez. Além disso ele é no-blocking, então não trava o contexto da execução. Asynchronous, pois por ser no-blocking, precisa utilizar um paradigma assíncrono para lidar com a execução das coisas. Por fim, é concurrent, as tarefas que são executadas assíncronicamente concorrem uma com as outras pelo processamento.

## Concorrência e Event Loop

O JavaScript possui um modelo de concorrência baseado em um event loop reponsável por gerenciar a execução de código assíncrono e eventos em um único thread, permitindo que o JavaScript seja não bloqueante.


Tudo passa pela Call Stack. Algumas tarefas serão resolvidas nele mesmo e outras somente irá passar pela Call Stack sem fazer nada e será resolvido em alguma Web API. O Event Loop é quem fica checando constantemente a Call Stack e Callback Queue

## Micro e Macro Tasks

Existem dois tipos principais de tarefas na fila de callback: As **Microtasks**, que são tarafas de alta prioridade que são executadas antes das Macrotasks (temporizadores e promises). E as **Macrotasks** que são tarefas de menor prioridade, como callbacks de eventos, (setTImeout e setInterval).

## Pacotes 

Pacotes(ou bibliotecas) fornecem funcionalidades prontas que você pode reutilizar em seu próprios projetos. Isso economiza tempo e eforço, evitando a necessidade de reescrever funcionalidades. Você pode acelerar o desenvolvimento, porque não precisa criar tudo do zero. Isso é útil para tarefas repetitivas ou padrões de programas comuns.

## Gerenciador de pacotes

É uma ferramenta que facilita a instalação, atualização e gerenciamento de bibliotecas e dependências de um projeto. O gerenciador de pacotes lida com a resolução de dependências, garantindo que as bibliotecas necessárias estejam disponíveis e em versões compatíveis.

## NPM 

É um dos gerenciadores de pacote mais populares para JavaScript


## API 

Uma API é uma interface que disponibiliza um conjunto de cuncionalidades para serem utilizadas. Exemplos: API de CEP, previsão do tempo, cotação de moedas, etc.

## Relação Cliente e Servidor

Em resumo, o cliente faz uma requisição, por exemplo uma listagem de produtos, e a API dá uma resposta com do que foi pedido.

## JSON

O JSON(JavaScript Object Notation) é uma notação de bjetos utulizado para representar dados. É amplamente utilizado na comunicação entre servidores e clientes

__modelo__
```json
{
	"user": {
		"nome": "keven",
		"idade": 12,
		"cidade": "Criciúma"
	},
	"teste": {
		"blá": "blé blé blé"
	}
}
```

## Iniciando uma versão específica 

Usamos o comando ```npm install nome@versão```

## Criando uma api de exemplo

 Utilizando o json-server para simular a API foi testado acessando os produtos via navegador, fazendo requisições do tipo GET. Demonstraremos como filtrar produtos por ID e como simular o comportamento de uma API.

```js
{
    "products": [
        {
            "id": "1",
            "name": "Mouse",
            "price": 150.25
        },
        {
            "id": "2",
            "name": "Keyboard",
            "price": 90
        },
        {
            "id": "3",
            "name": "Monitor",
            "price": 500
        }
    ] 
}
```

## Como consumir API usando o Fetch

A função Fetch é utilizado para fazer requisões HTTP e consumir dados de uma API no JavaScript. Ele é a estratégia padrão para consumir API no JavaScript. 

```js
//quando estamos lidando com uma api web, não local, devemos incluir "s" ao final do http.
fetch("http://localhost:3333/products")
.then(response =>{
    //vai converter a resposta para um formato json com o conteúdo da api. E como também é assincrono, vou usar outro then
    response.json().then((data) => {
        console.log(data)
    })
});
```

## Utilizando o aync e await

Ao invés de usar o then como no exemplo anterior, podemos utilizar o **async** e o **await** para aguardar uma promise e obter os dados de uma requisição:


```js
async function fetchProducts() {
    const response = await fetch("http://localhost:3333/products")
    const data = await response.json()
    console.log(data)
}

fetchProducts();
```


## Passando parâmetros na requisição

Para sermos mais especificos quanto a nossa requisição, podemos especificar qual item do JSON nós queremos, por exemplo usando o id:

```js
async function fetchProductsById(id) {
    const response = await fetch(`http://localhost:3333/products/${id}`);
    const data = await response.json();
    console.log(data);
}

fetchProductsById("2");
```

## Fetch com Post

Nós além de exibir dados de um API, podemos também enviar dados para cadastrar algo. Com um formulário HTML nós podemos criar um evento no form assincrono, onde com o fetch nós definimos o método, sendo o tipo POST, o headers que especifica o envio dos dados em formato json, e por fim o body, onde podemos trazer uma representação em String do JSON, onde definimos o id, nome e preço:

```js
const productName = document.getElementById("name");
const productPrice = document.getElementById("price");
const form = document.querySelector("form");

form.addEventListener ("submit", async (event) => {
    event.preventDefault();

    await fetch("http://localhost:3333/products", {
        //método para enviar dados
        method: "POST",
        headers: {
            //enviando dados em formato json
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: new Date().getTime().toString(),
            name: productName.value,
            price: productPrice.value
        })
    });
})
```