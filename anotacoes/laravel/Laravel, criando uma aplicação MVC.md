
## O que é um framework?

Um **framework** por definição, é um código que outra pessoa também criou, que outra equipe criou, e que vai chamar o meu código, o que isso quer dizer? Um **framework**, é um pedaço de código, é um código maior vamos dizer assim, escrito por outras pessoas que vai lidar com muita coisa, então por exemplo, um **framework** **PHP**, que é um **framework** web, o que ele vai fazer?

Então um **_framework_** como o Laravel, resolve problemas como, realizar _log_, tratar erros, exibir esses erros de forma mais amigável para vermos como corrigir, acesso ao banco de dados de forma facilitada, para inclusive não precisarmos escrever SQL, e diversas outras coisas, lidar com fila de trabalhos, mensageira e etc., então várias dessas tarefas do dia a dia, tarefas mais genéricas já são resolvidas pelo _framework_.

o Laravel é um _framework full stack_, o que isso quer dizer? Utilizando as ferramentas que o Laravel fornece, nós vamos escrever uma aplicação só, que possui o _back-end_, com nossas regras de negócio, e o _front-end_ com nosso HTML, visualização.

## Instalando o Laravel

A instalação que será feita, será a que utiliza o composer, com essa forma, teremos tudo na nossa maquina, executaremos o servidor na nossa maquina também. Para isso, vamos utilizar o comando: ```composer create-project laravel/laravel nome-do-projeto```

Bom, mas o que exatamente esse **create-project** faz? Ele verifica o pacote que se segue depois, no caso o **laravel/laravel** que existe no packages, só que ele é diferente, ele é um projeto que possui somente outras dependências e uma estrutura inicial, como se fosse a base para criarmos um novo projeto e é exatamente isso que queremos, a base do **framework Laravel**.

## Dando uma pequena olhada na estrutura

Dentro da estrutura gerada temos uma série de arquivos e pastas, as principais em questão nesse momento são: a pasta **vendor**, onde temos os pacotes que vamos instalar ou que já foram instalados previamente pelo Laravel, **storage** que apesar de que não será usado nesse treinamento, se trata do local onde armazenaríamos imagens que talvez queiramos manipular, coisas que nossos usuários fizeram **uploads**, enfim, também temos as configurações de rotas dentro da pasta **routes**, temos a pasta **resources** onde estão os recursos relacionado ao front-end, a pasta **public**, que será acessivel pelo servidor web, enfim, muitas coisas, mas algo que não podemos deixar de citar é a pasta **config**, onde podemos configurar diversas coisas.

Enfim, muita coisa citada, mas onde exatamente nós vamos trabalhar a principio? Bom, será dentro da pasta **app**.

