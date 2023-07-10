<?php
    //Etapas
    //Criar requisição para buscar informações de um determinado filme
    $arquivo = "https://api.themoviedb.org/3/movie/$id?api_key=".KEY."&language=pt-BR";
    $dados = file_get_contents($arquivo);
    //Pegar a resposta da requisição e transformar em array
    $dados = json_decode($dados);

    //print_r($dados);
?>

<div class="tarja">
    <div class="row">
        <div class="col-12 col-md-3">
            <img src="<?= IMG.$dados->poster_path ?>" alt="<?= $dados->title ?>" class="w-100">
        </div>
        <div class="col-12 col-md-9">
            <h2><?= $dados->title ?></h2>
            <p><strong>Sinopse:</strong></p>
            <p><?= $dados->overview ?></p>
        </div>
    </div>
</div>

<h3>Elenco:</h3>

<?php
    $arquivo = "https://api.themoviedb.org/3/movie/$id/credits?api_key=".KEY."&language=pt-BR";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);
?>

<div class="row">
    <?php
        foreach ($dados->cast as $dado) {
    ?>
    <div class="col-12 col-md-2">
            <div class="card">
                <a href="ator/<?=$dado->id?>" title="<?=$dado->name?>">
                    <img src="<?=IMG.$dado->profile_path?>" alt="<?=$dado->name?>" class="w-100">
                </a>
                <div class="card-body text-center">
                    <p><strong><?=$dado->name?></strong></p>
                    <i><?=$dado->character?></i>
                </div>
            </div>
    </div>
    <?php        
        }
    ?>
</div>