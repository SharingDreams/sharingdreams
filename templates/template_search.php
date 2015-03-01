<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
</head>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '410942295730302',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
<link rel="stylesheet" href="http://sharingdreams.co/assets/css/index.css">
<title>Search: <?php echo $busca; ?> - Sharing Dreams</title>

<?php
            if(isset($_SESSION['usuario_logado'])) {
                if(isset($_GET['art'])) {
                    include "templates/template_topoLogado.php";
                } else {
                    include "libs/menu_logado.php";
                }
            } else{
                if(isset($_GET['art'])) {

                    #include "libs/config.php";
                    #include "libs/banco.php";
                    #include "libs/helper.php";
                    include "libs/Classes/Cadastros.php";

                    echo "<div class='top'>
                        <div class='logo'>
                            <a href='/gallery'><img src='http://sharingdreams.co/assets/img/logo.png' class='logo_img'></a>
                        </div>
                        <ul class='menu_list'>
                            <li><a href='/about.php' id='menu'>About</a></li>
                            <li><a href='/join' id='menu'>Join</a></li>
                            <li><a href='/login' id='menu'>Login</a></li>
                        </ul>
                    </div>";
                } else {
                    include "templates/menu_visitante.php";
                }
            }
        ?>
        <div style="height:20px;"></div>
        <form method="GET">
                <center>
                    <input type="text" name="q" id="search" placeholder="Find someone to help">
                    <button type="submit" class="search-button-after" style="cursor: pointer"></button>
                </center>
            </form>
		<div class="gallery">
            <div class="searchLabel">Search: <?php echo protege_busca($_GET['q']); ?></div>
            <br>
            <ol class="gallery_ol">
                <?php while ($arte = (mysqli_fetch_assoc($artes_pagina))) : ?>
                        <?php 
                                $artista = buscar_dados_artista($mysqli, $arte['cadastro_id']);
                                $usuario_artista = $artista['usuario'];
                                $nome_artista = $artista['nome'];
                                $foto_artista = buscar_foto($mysqli, $arte['cadastro_id']);
                                $arte_nome_id = str_replace(" ", "-", $arte['nome_arte']);
                                $arte_nome_id = str_replace(".", "-", $arte_nome_id);
                                $arte_nome_id = str_replace("<", "-", $arte_nome_id);
                                $arte_nome_id = str_replace(">", "-", $arte_nome_id);
                                $arte_nome_id = str_replace("&lt;", "-", $arte_nome_id);
                                $arte_nome_id = str_replace("&gt;", "-", $arte_nome_id);
                                $arte_nome_id = str_replace("/", "-", $arte_nome_id);
                                ?>
                    <li align="center" class="art_li">
                        <div class="view view-fifth">
                            <a href="/art/<?php echo $arte_nome_id; ?>/<?php echo $arte['id']; ?>0">
                                <?php if(file_exists("artes/thumbnails/".$arte['nome'])){?>
                                    <img src="artes/thumbnails/<?php echo $arte['nome']; ?>" class="art_img_src"/>
                                <?php }else{ ?>
                                    <img src="artes/<?php echo $arte['nome']; ?>" class="art_img_src"/>
                                <?php } ?>
                            </a>
                            <div class="mask">
                                <center>
                                    <br>Did you like it?
                                    <br>    <a href="/art/<?php echo $arte_nome_id; ?>/<?php echo $arte['id']; ?>0" style="margin-top:15px;" class="donate">
                                        See more
                                    </a>
                                    <div style="height:5px;"></div>
                                    <div class="fb-like" data-href="http://sharingdreams.co/art/<?php echo $arte_nome_id; ?>/<?php echo $arte['id']; ?>0" data-layout="button_count" data-action="like" data-share="true" data-show-faces="false"></div>
                                        <a href="http://www.pinterest.com/pin/create/button/?url=http://sharingdreams.co/&media=http://sharingdreams.co/artes/<?php echo $arte['nome']; ?>&description=Look this art made by <?php echo $nome_artista; ?>! I loved it!! http://sharingdreams.co/art/<?php echo $farte_nome_id; ?>/<?php echo $arte['id']; ?>0" data-pin-do="buttonPin">
        <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
    </a>
                                </center>

                                
                                    
                                <?php if (isset($foto_artista)) : ?>    
                                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="assets/fotos_perfil/<?php echo $foto_artista['nome'] ?>" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
                                <?php else : ?>
                                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="assets/img/sem-foto.png" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
                                <?php endif ?>
                                <p class="name-art"  style="position:absolute;">"<?php echo $arte['nome_arte']; ?>"</p>
                                <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><p class="name-author"  style="position:absolute;"><?php if(strlen($nome_artista) >= 24){$narte = substr($nome_artista, 0, 21); echo $narte."...";}else{echo $nome_artista;}  ?></p></a>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
                </ol>

                <center class="pages_box">
                    <?php

                        if ($pagina_atual > 1) {
                            echo "<div class='page-button'><a id='num-page-start' href='/gallery?q=$busca&page=".($pagina_atual - 1)."'><<</a></div>";
                        }

                        for($i = $inicio; $i <= $limite + 1; $i++) {
                            if ($i == $pagina_atual) {
                                echo "<div class='page-button stroke-page'>".$pagina_atual."</div> ";
                            } else {
                                if ($i >= 1 && $i <= $numPaginas) {
                                    echo "<div class='page-button'><a  id='num-page' href='/gallery?q=$busca&page=$i'>".$i."</a></div> ";
                                }
                            }
                        }

                        if ($pagina_atual < $numPaginas) {
                            echo "<div class='page-button'><a id='num-page-final' href='/gallery?q=$busca&page=".($pagina_atual + 1)."'>>></a></div>";
                        }
                    ?>
                </center>
            
            <br>
            </div>
        </div>

