<?php
    $arquivo = "https://api.themoviedb.org/3/movie/now_playing?api_key=".KEY."&language=pt-BR";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);
?>

<h1 class="text-center">Últimos Filmes Adicionados</h1>

<div class="row">
    <?php
        foreach($dados->results as $dado) {
            ?>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="<?=IMG?>/<?=$dado->poster_path?>" alt="<?= $dados->title ?>" class="w-100">
                        <div class="card-body text-center">
                            <p class="title"><strong><?= $dado->title ?></strong></p>
                            <p class="text-center">
                                <a href="filme/<?= $dado->id ?>" title="<?= $dado->title?>" class="btn btn-waring btn-sn">
                                    Detalhes do Filme
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                    <?php    
                }
            ?>
</div>