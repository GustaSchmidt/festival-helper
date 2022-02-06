<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programação Carnavibe</title>

    <link rel="stylesheet" href="/public_assets/css/master.css">
    <link rel="stylesheet" href="/public_assets/css/pista.css">

    
    </style>
</head>
<body>
    <div class="container">
        <img id="logo-evento" src="/public_assets/imagens/logo.png" alt="">     
        <h1 id="TituloBloco">Bloco <?= $_ARGS['idPista']?></h1>   

        <ul class="pist-list">
            <?php
            
                $time = new DateTime(date("H:i:s"));

                $i=0;
                for ($i; $i < count($_ARGS['shows']); $i++) { 
                    $show = $_ARGS['shows'][$i];
                    $TimeInicio = new DateTime(date($show['HorarioInicio']));
                    $TimeFim = new DateTime(date($show['HorarioFim']));
                    
                    /**
                     * Array ( 
                     * [idHorario] => 1 
                     * [Pista] => 1 
                     * [Artista] => Indicação 
                     * [Estilo] => ? 
                     * [HorarioInicio] => 11:00:00 
                     * [HorarioFim] => 12:59:00 
                     * ) 
                    */
                    if($time >= $TimeInicio and $time <= $TimeFim){
                        print('<div class="container-list">');
                            print('<span class="time"> * </span>');

                            print('<li class="presentation active">');
                                print('<h2>'.$show['Artista'].'</h2>');
                                print('<p>'.$show['Estilo'].'</p>');
                            print('</li>');
                        print('</div>');
                        
                    }else{
                        print('<div class="container-list">');
                            print('<li class="presentation">');
                                print('<h2>'.$show['Artista'].'</h2>');
                                print('<p>'.$show['Estilo'].'</p>');
                            print('</li>');
                        print('</div>');
                    }
                }
                unset($i);
            ?>
        </ul>
        
    </div>
</body>
</html>