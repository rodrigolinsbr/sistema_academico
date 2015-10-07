<?php

    function __autoload($class)
    {
        include("conf/config.inc.php");
        $directorys = array(
            'controller/',
            'model/',
            'lib/MVC/'
        );

        //for each directory
        foreach($directorys as $directory):
            $diretorio = CAMINHO_PORTAL.$directory;
            $lista = filesFolder($diretorio);
        endforeach;
    }

    function filesFolder($address)
    {
        if (is_dir($address)):
            $ponteiro  = opendir($address);
            while ($nome_itens = readdir($ponteiro)):
                if(!in_array($nome_itens, array('.', '..'))):
                    if (is_dir($address.$nome_itens.'/')):
                        filesFolder($address.$nome_itens);
                    endif;
                endif;
            endwhile;
        else:
            echo $address.'<br />';
            //$ponteiro  = opendir($address);
//            while ($nome_itens = readdir($ponteiro)) {
//                $itens[] = $nome_itens;
//            }
        endif;
        //return $itens;
    }
    __autoload('asd');

//$a = new ControllerHome();
?>
