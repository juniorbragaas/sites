<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        
            <a class="navbar-brand" href="https://www.toffy.com.br"><img src="imagens/logo.svg" alt="logo" height="50px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?
                    //define o encoding do cabeçalho para utf-8
                    @header("Content-Type: text/html; charset=utf-8");
                    //carrega o arquivo XML e retornando um Objeto
                    $xml = simplexml_load_file("inc/menu_principal.xml");
                    // se o xml for um link e nao um arquivo como livros.xml, troque -o pelo link ex.
                    // $xml = simplexml_load_file(“http://endereco/link/mesmoQueNaoTenhaExtensaoXML/“);
                    //para cada nó LIVRO  atribui à variavel $livro (obj simplexml)
                    foreach ($xml->item as $item) {
                        echo "<li class='nav-item'><a href='" . $item->link . "' class='nav-link scrollSuave'>" . $item->nome . "</a></li>";
                    }
                    ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Procurar..." aria-label="Search">
                    <button class="btn btn-default my-2 my-sm-0" type="submit">🔍</button>
                    <span class="sr-only">Procurar</span>
                </form>
            </div>
        
    </nav>
</header>