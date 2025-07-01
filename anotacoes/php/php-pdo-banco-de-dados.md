
# PHP e PDO, trabalhando com bancos de dados

O banco de dados que será utilizado durante o curso será o **SQLite**. Vamos conhecer a maneira de executar o **SQL** para inserir um alno e trazer seus dados, lidar com problemas ligados a **segurança**, nos defender de **SQL Injections**. Vamos ver os **prepare** e **statement**.

Observaremos as diferenças entre **bindParam()** e **bindValue()** para sabermos quando utilizar casa um baseado em suas peculiaridades. Boas práticas de programação serão abordadas, bem como a criação de um repositório e implementação através do **PdoStudenteRepository**.

Neste repositório de alunos falaremos bastante sobre formas de trazer e buscar dados com o **Fetch Mode** e o **Fetch Style**. Enfim, muitas coisas.

## Primeira Conexão

Primeiro foi criado um arquivo para realizar essa conexão, o nosso **conexão.php**, e depois um arquivo de texto vazio para ser o nosso banco, o **banco.sqlite**. Na nossa conexão, instanciamos um objeto do tipo **PDO**, passando como parâmetros, primeiro, a **string de conexão**, onde passamos o **host**, o **nome do banco**. No nosso caso como estamos utilizando o sqlite, passamos apenas o caminho para nosso banco.

Vale ressaltar que também são aceitos como parâmetros **usuario**, **senha**, parâmetros extra, o que não será nosso caso.

## Instancia do PDO

Antes de mais nada, vamos ver o que exatamente é o PDO. **PDO** é uma sigla para **PHP Data Objects**, e é uma extensão que define uma forma leve e consistente para acessar bancos em PHP. Só que cada um dos bancos de dados fornecem formas muito específics de executarmos querys e etc. Então o PDO utiliza e conversa com drivers específicos para cada database, executando a **comunicação**. Então o PDO é uma interface, uma "fachada" para  acesso ao nosso sistema. Em nooso caso, estamos conversando com o driver do SQLite por enquanto.

Olhando a documentação, algo que nos é mostrado que é bem interessante é que no caso do **SQLite**, no caminho do arquivo, recomendasse a utilização de caminhos absolutos. Um atalho para isso é utilizar a constante __DIR__, outra particularidade é que ao tentar se conectar a um banco de dados comum, que não existe, nos é apresentado um erro, já com o **SQLIte**, é criado um novo arquivo para ser o banco.


