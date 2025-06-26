<?php 
    /* 
    As sessões são um dos mecanismos que o PHP oferece para manter informação entre diferentes requests.
    Sempre que navegamos numa página WEB criada em PHP, e sempre que um nome pedido é feito ao servidor (por exemplo para ver uma nova página), toda informação sobre variáveis é perdida.

    Existem várias formas de persistencia de informação.
    Se queremos guardar informação entre request, podemos usar cookies que veremos mais á frente neste módulo, guardar e ler dados de uma base de dadso, passando variáveis atrávez de .POST ou GET(veremos em breve com funciona).

    Com as sessões, podemos guardar dados temporariamente no servidor e, no request seguinte essses dados vão continuar disponíveis.

    Vejamos com um exemplo simples:
    */
?>