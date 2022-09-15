<form role="search" method="get" id="searchform" class="row" action="http://localhost/mitsui/">
    <div class="busca">
        <label class="caixa_pesquisa d-flex justify-content-between align-items-center" class="screen-reader-text" for="s">
            <input class="campo_input col-6 m-2" type="text" placeholder="Digite aqui sua busca" name="s" id="s">
            <button class="col-6 m-2 button-search fs-24 bg-laranja text-white gap-3 px-4 d-none d-md-block" type="submit" id="searchsubmit">Buscar no site <img src="<?php bloginfo('template_url'); ?>/assets/images/lupa-branca.png" alt="Lupa"></button>
        </label>
        <button class="w-100 mt-4 button-search fs-24 bg-laranja text-white d-flex justify-content-center d-md-none" type="submit" id="searchsubmit">Buscar no site <img class="ps-3" src="<?php bloginfo('template_url'); ?>/assets/images/lupa-branca.png" alt="Lupa"></button>
    </div>
</form>