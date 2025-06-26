## Entendendo o que é um banco de dados

Usando como exemplo um casal, que possui uma filha, foi explicado que cada um deles possui características semelhantes, que são comuns para todos, como: nome, idade, tamanho. Porém, cada um possui seu próprio nome, sua própria idade, e isso faz com que sejam pessoas diferentes. Isso os faz instâncias, ou seja, o objetivo de um banco de dados é armazenar instâncias de características semelhantes.  

Imaginando mais pessoas nessa situação, vamos colocá-las em um contêiner que se chama **pessoas**, sempre que eu quiser guardar uma pessoa, irei colocá-la nesse contêiner. E nesse contêiner, todas as instâncias terão aquelas características, apesar de algumas não serem obrigatórias, mas que são possíveis de serem incluídas.  

Agora imaginando mais de um desses contêineres, por exemplo, de jogos, podemos colocá-los todos em um navio. Esse navio é o **banco de dados**. Então um banco de dados é uma coleção de dados, de características separadas, organizadas em locais específicos e esses locais são as **tabelas**. Os dados dentro das tabelas também têm um nome: **registros**.

## DDL (Data Definition Language)

Alguns comandos do MySQL, tem propósitos diferentes, por exemplo os comandos DDL, que tem a função de definição, como definir um banco, uma tabela.

## DML (Data Manipulation Language)

Alguns comandos do MySQL, tem propósitos diferente, por exemplo, os comandos DML, que tem função de manipular os dados de uma tabela.

## O que são tipos primitivos?

Tipos primitivos são os tipos de dados:

### Numérico

* Inteiro
	- TinyInt, SmallInt, Int, MediumInt, BigInt
* Real
	* Decimal, float, Double, Real
* Lógico
	* Bit, Boolean

### Data/Tempo

* Date, DateTime, TimeStamp, Time, Year

### Literal

* Caractere
	* char, varchar
* Texto
	* TinyText, Text, MediumText, LongText
* Binário
	* TinyBlob, Blob, MediumBlob, LongBlob
* Coleção
	* Enum, Set

### Espacial

* Geometry, Point, Polygon, MultiPolygon


## Criando um banco de dados

Para criar o banco de dados, usamos o seguinte comando:

```sql
CREATE DATABASE cadastro;
```

Para criar a tabela, usamos o seguinte comando:

```sql
CREATE TABLE pessoas (  );
```

E dentro desse comando incluímos os campos com seus tipos:

```
CREATE TABLE Pessoas (
	nome varchar(30),
	idade tinyint,
    sexo char(1),
    peso float,
    altura float,
    nacionalidade varchar(20)
);
```

## Configurando o banco para caracteres da nossa linguá

Existem alguns caracteres na nossa linguá que não existem em outras, para isso, usamos o seguinte código de criação do banco: 

```sql
	CREATE DATABASE registro 
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;
```

### Melhoria do código

Alguns tipos primitivos podem ser de melhor uso para algumas características, e algumas informações extra para melhorar o registro:

```
CREATE DATABASE registro 
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;

CREATE TABLE Pessoas (
	id int NOT NULL AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL,
	nascimento DATE ,
    sexo ENUM('M', 'F'),
    peso DECIMAL (5,2),
    altura DECIMAL (3,2),
    nacionalidade varchar(20) DEFAULT 'Brasil',
    primary key (id)
    
) DEFAULT CHARSET = utf8mb4;

describe pessoas;
```

**AUTO_INCREMENT**: Faz com que, para cada registro, o valor seja incrementado automaticamente;

**NOT NULL** : Definir que aquele campo não pode ser vazio, ele é obrigatório;

**DATE**: Para definir a data, iniciando por ano depois mês e por fim dia;

**ENUM ('M', 'F')**: Define que haverá apenas duas opções, M de masculino e F de feminino, qualquer outro caractere não será aceito;

**DECIMAL (5, 2)**: Define que o valor colocado pode ter até 5 dígitos, com 2 números após a virgula;

**DEFAULT 'BRASIL'**: Define que, caso nada seja colocado, por padrão o valor será Brasil;

**PRIMARY_KEY (id)**: Define a linha escolhida como a chave primária da tabela.

## INSERÇÃO DE DADOS

Existem algumas formas de incluirmos os dados nas tabelas, sendo os seguintes: 

### COM TODOS OS DADOS

```sql
INSERT INTO Pessoas (nome, nascimento, sexo, peso, altura, nascionalidade)
VALUES ('Godofredo', '1984-01-02', 'M', '78.5', '1.83', 'Brasil');
    
SELECT * FROM Pessoas;
```

### USANDO DEFAULT PARA OS VALORES PRÉ-DEFINIDOS

```sql
INSERT INTO Pessoas (id, nome, nascimento, sexo, peso, altura, nacionalidade)
VALUES (DEFAULT, 'Creuza', '1920-12-30', 'F', '50.2', '1.65', DEFAULT);
    
SELECT * FROM Pessoas;
```
O default é usado no caso do id, pois foi colocado que ele seria auto_increment, e na nacionalidade que seu padrão é Brasil.

### SEM USAR OS DADOS PRÉ-DEFINIDOS

```sql
INSERT INTO Pessoas (nome, nascimento, sexo, peso, altura)
VALUES ('Valter', '1980-02-20', 'M', '90.2', '1.95');
    
SELECT * FROM Pessoas;
```
Nesse caso, como já especificamos o id como auto_increment e o padrão da nacionalidade como Brasil, podemos simplesmente não inclui-lós, pois serão colocados automaticamente.

### SEM ESPECIFICAR OS CAMPOS

```sql
INSERT INTO Pessoas VALUES 
(DEFAULT, 'Adalgiza', '1935-11-07', 'F', '63.1', '1.75', 'Irlanda');
    
SELECT * FROM Pessoas;
 
```
Nesse caso é possível não incluir a tabela antes dos valores, porque os valores estão na exata ordem da tabela.

### MAIS DE UMA INSERÇÃO

```sql
INSERT INTO Pessoas VALUES 
	(DEFAULT, 'Carlos', '1987-03-25', 'M', '80.5', '1.82', 'Brasil'),
	(DEFAULT, 'Mariana', '1992-07-19', 'F', '55.3', '1.68', 'Argentina'),
	(DEFAULT, 'Joaquim', '1975-12-05', 'M', '90.2', '1.77', 'Portugal'),
	(DEFAULT, 'Sofia', '2001-09-30', 'F', '62.0', '1.70', 'Espanha'),
	(DEFAULT, 'Roberto', '1966-05-14', 'M', '85.7', '1.80', 'Itália');
    
SELECT * FROM Pessoas;
```

Cada uma das inserções está separada por uma virgula, dessa forma, podemos incluir todos os 5 de uma só vez.

## ALTERAÇÃO DE TABELAS

Vamos imaginar que a tabela já está criada com todos os campos, mas, agora é necessário fazer alguma modificação nela, para não termos que apagar toda a tabela, podemos modifica-lá, e de que forma? 

Nos códigos a seguir, o uso do **COLUMN** é opcional.
### ADICIONANDO UMA NOVA COLUNA 

```sql
ALTER TABLE Pessoas
	ADD COLUMN profissao varchar(10);
```

### APAGANDO UMA COLUNA
```sql
ALTER TABLE Pessoas
	DROP COLUMN profissao;
```

### ADICIONANDO UMA COLUNA EM UMA POSIÇÃO DA ESPECIFICA

```sql
ALTER TABLE Pessoas
	ADD COLUMN profissao varchar(10)
    AFTER nome;
```
PS: Apesar de existir o comando **AFTER**, para adicionar a tabela depois de uma, não existe o **BEFORE**, para colocar antes.

### ADICIONANDO UMA COLUNA ANTES DA PRIMEIRA

```sql
ALTER TABLE Pessoas
	ADD COLUMN codigo int
    FIRST;
```

### MODIFICAR A DEFINIÇÃO DO CAMPO(TIPO PRIMITIVO E AS CONSTRANTS)

```sql
ALTER TABLE Pessoas
	MODIFY COLUMN profissao VARCHAR(20);
```

```SQL
ALTER TABLE Pessoas
	MODIFY COLUMN profissao VARCHAR(20) DEFAULT '' NOT NULL;
```

### MODIFICAR O NOME DE UMA COLUNA

```sql
ALTER TABLE Pessoas
	CHANGE COLUMN profissao
    prof VARCHAR(20); 

```
PS: Caso não adiciona algum dado, como as contrants no novo nome da váriavel, ela irão ser apagadas.

### MODIFICAR O NOME DE UMA TABELA

```sql
ALTER TABLE Pessoas
	RENAME TO Gafanhotos;
```

## CRIANDO UMA NOVA TABELA COM NOVAS INFORMAÇÕES

Com a criação da nova tabela abaixo, novas informações sobre o MySQL vão ser passadas.
### CRIAÇÃO DA TABELA

```sql
CREATE TABLE IF NOT EXISTS Cursos (

);
```
Esse comando permite a criação de uma tabela apenas se não houver uma tabela com o mesmo nome.

### CONSTRANTS

* **UNIQUE**: Diferente da chave primaria, o unique é para impedir de ser adicionado no campo da tabela um mesmo nome, por exemplo, caso já exista o nome Keven nesse campo com o constrant unique, não será possível incluir Keven novamente.

* **UNSIGNED**: Faz com que o valor não tenha sinal, por exemplo para valores e tipo int que não terão número negativo.

## APAGANDO UMA TABELA

Para apagarmos uma tabela, usamos o seguinte comando: 

```sql

```

## MANIPULANDO LINHAS (UPDATE, DELETE, TRUNCATE)

É possível, assim como nas tabelas, modifica-las por qualquer motivo que seja, então devido a isso para testar-mos os comandos, foram incluídos os seguintes dados na tabela cursos: 

```sql
INSERT INTO Cursos VALUES
('1','HTML4','Curso de HTML5','40','37','2014'),
('2','Algoritmos','Lógica de Programação','20','15','2014'),
('3','Photoshop','Dicas de Photoshop CC','10','8','2014'),
('4','PGP','Curso de PHP para iniciantes','40','20','2010'),
('5','Jarva','Introdução à Linguagem Java','10','29','2000'),
('6','MySQL','Bancos de Dados MySQL','30','15','2016'),
('7','Word','Curso completo de Word','40','30','2016'),
('8','Sapateado','Danças Rítmicas','40','30','2018'),
('9','Cozinha Árabe','Aprenda a fazer Kibe','40','30','2018'),
('10','YouTuber','Gerar polêmica e ganhar inscritos','5','2','2018');

```

### ALTERANDO UMA LINHA

```sql
UPDATE cursos
SET nome = 'HTML5'
WHERE idCursos = '1'
```

Estou definindo nessa linha de comando para realizar uma atualização na tabela cursos, definindo as linhas da coluna nome como HTML5, mas apenas nas linhas em que o idCursos seja igual a 1.

Já no próximo caso, onde a duas instancias errôneas na mesma linha, ao invés de criarmos duas vezes o código de UPDATE, podemos mudar ambas com um único código:

```sql
UPDATE cursos
SET nome = 'PHP', ano = '2015'
WHERE idCursos = '4';
```

Mas, todos somos humanos e podemos errar a qualquer momento, devido isso, podemos acabar por acidente alterando mais de uma linha, par que isso não ocorra, usamos o parâmetro **LIMIT** para limitar as mudanças a apenas 1 unica linha.

```sql
UPDATE Cursos
SET nome = 'Java', carga = '40', ano = '2015'
WHERE idCurso = '5'
LIMIT 1;
```

Além disso, quando acabamos fazendo algum UPDATE e DELETE sem alguma restrição. Graças ao Safe Updates, uma configuração no SQL Editor.

### APAGANDO UMA LINHA

Podemos, além de modificar linhas, apaga-lás, e isso é feito com o parâmetro **DELETE**:

```sql
DELETE FROM Cursos
WHERE idCurso = 8;
```

E assim como o UPDATE, podemos excluir múltiplas linhas, e além disso, podemos limitar a quantidade ou não:

```sql
    DELETE FROM Cursos
    WHERE ano = 2018
    LIMIT 3;
```

Lembrando que a exclusão de múltiplas linhas só é possível com a opção segura desativada.

### APAGANDO TODAS AS LINHAS DE UMA TABELA

Além dos parâmetros que foram ditos acima, podemos excluir de uma única vez, usando o **TRUNCATE**:

```sql
TRUNCATE TABLE Cursos;
```


## GERENCIAMENTO DE CÓPIAS DE SEGURANÇA MySQL

Isso é algo muito importante, já que a todo momento podemos acabar em um situação a qual precisamos de dados de uma tabela ou de múltiplas tabelas que por algum motivo foram modificados ou apagados, nesse situação, o que faríamos? Bom, para isso existem as cópias de segurança. Chamamos cópias de um banco de dados como DUMP.  No MySQL Workbrench seguimos os seguintes passos:

* Ir até a opção de Server;
* Clicar na opção Data Export;
* Selecionar o banco desejado e selecionar o conteúdo desejado do banco, como por exemplo, apenas uma ou mais tabelas, e deixar outras de lado;
* Podemos escolher se desejamos criar uma cópia da estrutura e dos dados, apenas da estrutura ou apenas dos dados;
* Escolher se desejamos gerar uma pasta ou um arquivo único;
* Podemos incluir para criar um schema, permitindo que não seja necessário criar um banco de dados para utilizar o DUMP;
* Será requisitado a senha do servidor e o backup estará pronto.


## COMO IMPORTAR PARA MINHA MAQUINA O DUMP?

Aprendemos com criar uma cópia de segurança do banco de dados, mas, como podemos importar isso para nossa máquina?

* Ir até a opção de Server;
* Clicar na opção Data Import;
* Selecionar o formato de dump e o próprio dump;
* Começar a importação.

## ORDER BY

O parâmetro order by me permite especificar a ordem com que eu desejo que os registros sejam exibidos:

```sql
SELECT * FROM cursos
ORDER BY nome;
```

Nesse exemplo, estamos especificando que queremos a tabela ordenada pelos nomes dos cursos, ou seja, os id's vão ser impressos todos misturados pois o curso que inicia com a letra A, pode ter o id 27, por exemplo. 

Mas tem como deixar essa ordenação reversa? Iniciando do ultimo número ou da ultima letra do alfabeto? A resposta é sim, usando outro parametro, o **DESC**:

```sql
SELECT * FROM cursos
ORDER BY nome DESC;
```

Dessa forma, o Result Set na tela irá começar pelos nomes, de Z-A.

Enfim, muito interessante, mas e se quisermos que seja selecionado apenas alguns campos da tabela, e não todos, como eu faria isso? Bom, como eu disse no começo desse documento, tem um jeito muito fácil de fazer isso, substituindo o asterisco.

## SELECIONANDO COLUNAS

Alterando o asterisco pelo nome dos campos que desejamos selecionar individualmente, nos permite imprimir apenas aqueles campos:

```sql
SELECT nome, carga, ano FROM cursos
ORDER BY nome;
```

Lembrando que coloquei 3 campos porque foi o que eu quis ver, podemos colocar quantos campos quisermos. Outro ponto importante é que a ordem em que selecionamos as tabelas será a mesma do Result Set, no caso do exemplo, começara pelo nome, carga e por fim o ano.

Vale ressaltar que podemos alterar o ORDER BY,  os ordenando pelo ano por exemplo:

```sql
SELECT ano, nome, carga  FROM cursos
ORDER BY carga DESC;
```

## MAIS DE UMA ORDENAÇÃO

Além da ordenação normal da tabela, podemos ordenar os campos por dois parâmetros, por exemplo, supondo que existam 3 cursos que foram feitos em 2014, e queremos mostra-lós em ordem crescente, colocamos os parâmetros ano e nome no ORDER BY, separados por virgula:

```sql
SELECT ano, nome, carga  FROM cursos
ORDER BY ano, nome;
```

Dessa forma, ordenamos todos os cursos pelo ano e, caso haja mais de um curso nesse ano, esses cursos serão ordenados também. Lembrando que caso queira ordenar um dos parâmetros em ordem decrescente, por exemplo, basta utilizar o parâmetro já citado anteriormente depois de cada um:

```sql
SELECT ano, nome, carga  FROM cursos
ORDER BY ano DESC, nome;
```

## SELECIONANDO CAMPOS COM CONDIÇÕES

Além de tudo que já foi citado, podemos criar comparações para selecionar os itens. Digamos que queremos selecionar apenas os cursos que foram feitos em 2016, faríamos dessa forma:

```sql
SELECT ano, nome, carga  FROM cursos
WHERE ano = '2016'
ORDER BY ano DESC, nome;
```

Podemos usar outros operadores relacionais também para o uso do **WHERE**, como:

* Igual (=)
- Diferente (!=) ou (<>)
- Maior (>)
- Menor (<)
- Maior ou igual (>=)
- Menor ou igual (<=)
  
```sql
SELECT nome, descricao, ano FROM cursos
WHERE ano != '2015'
ORDER BY ano, nome;
```

Fora o uso desses operadores relacionais, podemos usar outros operadores, como o **BETWEEN** e o **AND** :

```sql
SELECT nome, descricao, ano FROM cursos
WHERE ano BETWEEN 2014 AND 2016
ORDER BY ano, nome;
```

Nesse exemplo o Result Set setá dos nomes, descrições e anos, dos cursos em que o ano está entre 2014 e 2016, anos anteriores e posteriores não serão exibidos.

Além do BETWEEN e o AND citados, podemos usar o operador **IN**, que serve para valores específicos 

```sql
SELECT nome, ano, carga FROM cursos
WHERE ano IN ('2014', '2016')
ORDER BY ano DESC, nome;
```

## COMBINAÇÕES

Além de tudo que já foi dito nos tópicos anteriores, podemos, podemos junta-los para uma seleção ainda mais especifica, por exemplo, com o uso do **AND** e do **OR**:

```sql
SELECT nome, totaulas, carga FROM cursos
WHERE totaulas > '20' AND carga > '35'
ORDER BY ano, nome;
```

```sql
SELECT nome, totaulas, carga FROM cursos
WHERE totaulas > '20' OR carga > '35'
ORDER BY ano, nome;
```

Basicamente, quando usamos o AND, é porque o resultado só será verdadeiro se todas as condições forem verdadeiras.

Já com o OR, o resultado será verdadeiro mesmo que apenas uma condição seja verdadeira, ou as duas.

## USANDO O OPERADOR LIKE

Podemos ter um Result Set apenas de um nome, como por exemplo PHP, mas e se quisermos obter o nome de todos os cursos que comecem com P? O **LIKE** é a solução para isso:

```sql
SELECT nome, descricao, ano FROM cursos
WHERE nome LIKE 'P%'
ORDER BY nome;
```

Alguns detalhes são importantes para a compreensão total do LIKE, como por exemplo o fato dele não ser **case sensitive**, ou seja, independente de usar o P maiúsculo ou minusculo, o resultado será o mesmo. A palavra LIKE quer dizer **parecido**, e o **%** quer dizer depois do P pode haver nenhum ou vários caracteres. Podemos usar o % em outros lugares, como nesse exemplo: 

```sql
SELECT nome, descricao, ano FROM cursos
WHERE nome LIKE '%A'
ORDER BY nome;
```

Nesse caso, o Result Set será  de qualquer curso que termine com A. Além disso, podemos selecionar os cursos que possuem curso em qualquer lugar do curso, como: 

```sql
SELECT nome, descricao, ano FROM cursos
WHERE nome LIKE '%A%'
ORDER BY nome;
```

Além do uso normal do parametro LIKE, que significa parecido, podemos usar o **NOT LIKE**, para ter com Result Set apenas aqueles que não se parecem:

```sql
SELECT nome, descricao, ano FROM cursos
WHERE nome NOT LIKE '%P%'
ORDER BY nome;
```

Nesse exemplo, estou dizendo para não selecionar os nomes que possuem P em alguma parte.

Falando um pouco mais sobre o %, podemos usar outro parâmetro, como o **underline**, para especificar que depois de determinado caractere, obrigatoriamente deve haver algo:

```sql
SELECT * FROM cursos
WHERE nome LIKE 'PH%p_'
ORDER BY ano, nome;
```

E o undeline pode ser usado mais de uma vez seguida, ou seja podemos definir que depois de um caractere, haja 3 caracteres obrigatórios usando 3 undelines.

## DISTINGUIR

O **DISTINCT** é um parâmetro para definir que o Result Set não tenha palavras ou valores repetidos, por exemplo, supondo que existam 4 cursos com a mesma carga, 40 horas, apenas o primeiro cursos será mostrado.

```sql
SELECT DISTINCT carga FROM cursos;
```

## AGREGRAÇÃO

Podemos saber a quantidade de linhas de um campo ou tabela com um comando, o **COUNT(  )**.

```sql
SELECT COUNT(*) carga FROM cursos
WHERE carga >= 60;
```

Além do próprio count, também especifiquei que queria apenas as cargas acima ou iguais a 60 horas.

Além de saber a quantidade de registros, podemos saber qual o valor máximo registrado, utilizando o **MAX( )**.

```sql
SELECT max(totaulas) FROM cursos
WHERE ano = '2014';
```

Nesse exemplo, eu quero saber o valor máximo de carga, da tabela cursos, onde o ano é 2014.

Por tabelas, se existe uma maneira de obter o valor máximo, existe uma forma de se obter o valor mínimo, e para isso, utilizamos o **MIN( )**:

```sql
SELECT MIN(carga) FROM cursos
WHERE totaulas BETWEEN 30 AND 50;
```

Além de tudo isso, podemos somar valores, usando o parâmetro **SUM( )**:

```sql
SELECT SUM(TOTAULAS) FROM cursos
WHERE ano <= 2016;
```

E para finalizar, também podemos saber a média de um campo, usando o parâmetro **AVG ( )**:

```sql
SELECT AVG(TOTAULAS) FROM cursos
WHERE ano = '2016';
```

## AGRUPAMENTO

Anteriormente, aprendemos um comando chamado **DISTINCT**, que fazia com que o Result Set fosse uma lista com todos os valores diferentes, pois, caso um valor se repita ele é descartado. Mas agora, existe uma outra forma de tratar esses dados repetidos, usando o **GROUP BY**, que irão agrupar os elementos iguais: 

```sql
SELECT carga FROM cursos
GROUP BY carga;
```

A diferença do **GROUP BY** para o **DISTINCT** é o fato de eu conseguir usar os operadores COUNT, MAX, MIN, AVG com o GROUP BY.

```sql
SELECT totaulas, COUNT(totaulas) FROM cursos
GROUP BY totaulas
ORDER BY totaulas;
```

Nesse exemplo estamos agrupando todas as linhas iguais de totaulas, e depois usando a o count para sabermos quanto há de cada um.

Além disso, podemos utilizar comparações e outros tipos de propriedades para filtrar com mais especificidade o conteúdo:

```sql
SELECT totaulas, COUNT(*) FROM cursos
WHERE totaulas > '15'
GROUP BY totaulas
ORDER BY totaulas;
```

## HAVING

O **HAVING** para o GROUP BY, é o como o WHERE para o SELECT:

```SQL
SELECT ano, count(*) FROM cursos
WHERE totaulas > '30'
GROUP BY ano
HAVING ano > 2013
ORDER BY COUNT(*);
```

## MODELO RELACIONAL

O modelo relacional é uma forma de organizar dados em tabelas (ou "relações"), onde cada tabela possui linhas (registros) e colunas (atributos). Ele é a base dos bancos de dados relacionais e usa chaves para conectar informações entre tabelas.

usando um diagrama onde as entidades são retângulos, e o relacionamento entre dois ou mais um losangolo. Chamamos isso de **DIAGRAMA E-R**(ENTIDADE E RELACIONAMENTO), ou simplesmente **DER**.

Pensando agora em duas entidades, gafanhotos e cursos, um gafanhoto pode assistir um curso, mas também pode assistir mais do que um curso, então um gafanhoto pode assistir vários cursos. Olhando agora do sentido dos cursos, um curso, pode ter um gafanhoto como aluno, mas pode ter vários também, então um curso pode ter vários alunos. Então temos que sempre partir de uma lado e verificar quantos de um lado assistem isso aqui, e depois, quantos do outro de lá assistem quantos do outro. E isso tem um nome, **cardinalidade**, ela pode ser simples ou múltipla (1 ou n).

No exemplo anterior, o nome do relacionamento seria **muitos-para-muitos**.

Mas pensando em outras duas entidades, marido e esposa, onde um marido pode ter uma esposa e uma esposa pode te um marido, ou seja, cada entidade pode ter apenas 1 do outro lado, ou seja, há um relacionamento de cardinalidade **um-para-um**

Por fim, pensando em duas entidades, funcionário e dependente, onde um funcionário cuida de um dependente e um dependente é cuidado por um funcionário, mas, um funcionário pode cuidar de mais de um dependente, ou seja, um funcionário pode cuidar de n dependentes e um dependente pode ter 1 funcionário, dessa forma, temos uma relacionamento de **um-para-muitos**.

## CHAVES

Além das chaves primarias que já foram citadas anteriormente, existem as **chaves estrangeiras**. Para ajudar no entendimento, vamos imaginar que existem chaves primarias em diferentes lugares do mundo, se for necessário fazer uma relação em uma entidade em outra, há uma troca dessas chaves, porém, ao passar uma chave primaria para o "outro lado", agora existem duas chaves primarias, o que não está certo, essa chave passada para o outro lado se torna uma chave estrangeira nessa nova entidade. Basicamente uma chave primaria passada para outro local.

Agora imaginando os exemplos de cardinalidade falados anteriormente, por exemplo o caso um-para-um das entidades de marido e esposa, nesses casos, posso jogar a chave primaria de um, por exemplo de marido, para a entidade esposa, assim se tornando uma chave estrangeira nessa nova entidade, também posso fazer a mesma coisa com a esposa, passando a chave primaria dela para a outra entidade, assim se tornando uma chave estrangeira. Essas chaves não precisam ter o mesmo nome, mas precisam ser do mesmo tipo. Além disso, é normal considerarmos a passagem da chave vendo qual entidade seria a dominante.

Para um relacionamento um-para-muitos também é simples, pegamos a chave primaria da entidade 1, e passamos como chave estrangeira para a entidade muitos.

Mas como isso funciona em uma relação de muitos-para-muitos? Bom, o relacionamento entre eles se torna uma entidade, e o n de muitos passa a pertencer a essa nova entidade, e duas sub-relações são criadas, agora as entidades tem uma relação de um-para muitos com a nova entidade. Dessa forma, a chave primaria das duas entidades passa para a nova entidade, como chave estrangeira.

## ENGINE

Existem diferentes tipos de engine que permitem a criação de tabelas, por exemplo, estou usando a InnoDB, mas existem outras como o MyISAM e o XtraDB. Mas o que de diferente entre elas? Bom, a InnoDB e a XtraDB suportam **ACID**, as 4 principais regras de uma boa transação. Além disso, permitem o uso de chaves estrangeiras.

### Atomicidade

O 'A' da sigla, uma transação tem que ser atômica, ela não pode ser dividida em sub-tarefas, por exemplo, uma tarefa tem que ser feita por completo, ou tudo acontece, ou nada acontece.

### Consistência

O 'C' da sigla, um banco de dados que estava consistente, depois da transação, ele deve continuar consistente, não podem ocorrer falhas, ou tudo é desfeito.

### Isolamento

O 'I' da sigla, quando a duas transações ocorrendo ao mesmo tempo, elas devem acontecer como se estivessem ocorrendo de forma isolada.

### Durabilidade

O 'D' da sigla, uma transação deve ser durável, durar o tempo necessário que seja preciso. Não podemos perder dados.


## CRIANDO A CHAVE ESTRANGEIRA

Para criarmos a chave primaria, primeiro precisamos de uma nova coluna na tabela gafanhotos, usando o comando: 

```sql
ALTER TABLE gafanhotos
ADD COLUMN cursopreferido int;
```

Depois da coluna criada, precisamos adicionar a chave estrangeira, definindo-a como uma das colunas, no caso, a que acabamos de criar: 

```sql
ALTER TABLE gafanhotos
ADD FOREIGN KEY (cursopreferido)
REFERENCES cursos(idcurso);
```

Agora podemos referenciar o id da tabela cursos com o curso preferido da tabela gafanhotos:

```sql
UPDATE gafanhotos
SET cursopreferido = '6'
WHERE id = '1';
```

## INTEGRIDADE REFERENCIAL

Para fins de teste, é possível tentar deletar o idcurso de valor 6, ao tentar fazer isso haverá uma falha, não ira ser apagado pois, se isso fosse possível iria criar inconsistência na tabela dos gafanhotos.

## JOIN

Join é o que permite juntarmos diferentes entidades em uma só, como no exemplo abaixo:

```sql
SELECT gafanhotos.nome, gafanhotos.cursopreferido, cursos.nome, cursos.ano 
FROM gafanhotos 
JOIN cursos;
```

Mas da forma que isso foi feito, vai acabar juntando as tabelas de forma não tão inteligente, mostrando o nome do gafanhoto várias vezes, com todos os alunos, para isso, precisamos de um filtro, e fazemos isso usando o **ON**

## ON

O ON serve para ligar a chave primaria, dizendo que ela é igual a chave estrangeira:

```sql
SELECT gafanhotos.nome, gafanhotos.cursopreferido, cursos.nome, cursos.ano 
FROM gafanhotos JOIN cursos
ON cursos.idcurso = gafanhotos.cursopreferido;
```

Mas se repararmos bem, o resultado disso não mostra todos os 60 alunos, e por que isso? Bom,  quando usamos o JOIN, estamos fazendo um INNER JOIN, um tipo de JOIN só com as relações. Ou seja, no código acima podemos usar só JOIN, ou INNER JOIN.

Podemos também usar apelidos nas colunas usando o **AS**, já que algumas podem acabar tendo nomes parecidos ou iguais.

```sql
SELECT g.nome, c.nome, c.ano 
FROM gafanhotos AS g INNER JOIN cursos AS c
ON c.idcurso = g.cursopreferido
ORDER BY g.nome;
```

## INNER JOIN

O objetivo do INNER JOIN é obter as relações, mostrando apenas os dados que possuem relação.


## OUTER JOIN

Trabalha com os conceitos de INNER, mas além disso com os dados que não tem conexão alguma.

Porém existem algumas coisas a mais sobre o OUTER JOIN, considerado que a tabela gafanhotos é a da esquerda e a de cursos a direita. Então se for necessário mostrar todos os gafanhotos, inclusive os que não preferem nada, precisamo usar o LEFT:

```SQL
SELECT g.nome, c.nome, c.ano 
FROM gafanhotos AS g LEFT OUTER JOIN cursos AS c
ON c.idcurso = g.cursopreferido
ORDER BY g.nome;
```


Dessa forma, foi dado preferencia a tabela da esquerda, gafanhotos, mostrando de todo mundo, inclusive aqueles que não tem um curso preferido.

Podemos também usar apenas o left sem outer.

E ao usar o RIGHT, a tabela de cursos se torna a prioridadade:

```
SELECT g.nome, c.nome, c.ano 
FROM gafanhotos AS g RIGHT JOIN cursos AS c
ON c.idcurso = g.cursopreferido;
```


## INNER JOIN COM VÁRIAS TABELAS

Como foi dito anteriormente, quando temos um relacionamento de muitos-para-muitos, uma nova tabela é criada do relacionamento, que recebe as cardinalidades n, de muitos e as tabelas originais recebem cardinalidade 1.

Essa nova entidade recebe as próprios atributos, e como chaves estrangeiras as chaves primarias das duas tabelas originais.

## JUNÇÕES

Para juntarmos uma tabela a tabela de junção, usamos o seguinte, por exemplo:

```sql
SELECT g.nome, c.nome, a.idcurso FROM gafanhotos AS g
JOIN gafanhoto_assiste_curso AS a
ON g.id = a.idgafanhoto
```

Para juntarmos a segunda tabela, usamos o seguinte: 

```sql
SELECT g.nome, c.nome, a.idcurso FROM gafanhotos AS g
JOIN gafanhoto_assiste_curso AS a
ON g.id = a.idgafanhoto

JOIN cursos AS c
ON c.idcurso = a.idcurso
ORDER BY g.nome;
```
