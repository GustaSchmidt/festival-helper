<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programação Carnavibe</title>

    <link rel="stylesheet" href="/public_assets/css/master.css">
    <link rel="stylesheet" href="/public_assets/css/home.css">
    <script src="/public_assets/js/liLink.js"></script>
    
    </style>
</head>
<body>
    <div class="container">
        <img id="logo-evento" src="/public_assets/imagens/logo.png" alt="">    
        

        <ul class="prog-list">
            <?php
                for ($i=0; $i < count($_ARGS['Show']); $i++) { 
                    $show = $_ARGS['Show'][$i];
                    $now = date_create(date("H:i"));
                    $end = date_create($show["HorarioFim"]);
                    $diff = date_diff($now, $end);
                
                    if($diff->h == 0){
                        $proxMsg = "proximo em ".$diff->i."min";
                    }else{
                        $proxMsg = "proximo em ".$diff->h."h".$diff->i."m";
                    }
                    
                
                    print('<li id="b'.$show['Pista'].'" class="bloco" onclick="goPage('.$show['Pista'].')">');
                        print('<h2 class="local">BLOCO '.$show['Pista'].'</h2>');
                        print('<h3 class="nome-artitista">'.$show['Artista'].'</h3>');
                        print('<span class="horario">'.$proxMsg.'</span>');
                    print('</li>');
                }
            ?>
        </ul>

        <!-- <div class="dev-by">
            <p>Developer -> <a href="https://github.com/GustaSchmidt" target="_blank" rel="noopener noreferrer">Gustavo Schmidt</a> </p>
        </div> -->
    </div>
</body>
</html>