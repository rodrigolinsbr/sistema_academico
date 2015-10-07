<?php
class Functions
{

	function formatCep($string)
	{
		if (strstr($string, '-')):

			$string = str_replace(array('.', '-'), '', $string);
		else:

			$string = substr($string, 0, 2).'.'.substr($string, 2, 3).'-'.substr($string, 5, strlen($string));

		endif;

		return $string;
	}

    function formatDecimal($string) {

        $string = str_replace('.', '', $string);
        $string = str_replace(',', '.', $string);
        return $string;
    }

    function convertToFloat($value)
    {
        return number_format($value, 2, ',', '.');
    }

    function formatCpf($string)
	{
		return str_replace(array('.', '-'), '', $string);
	}

	function convertDate($date)
	{
		if (trim($date) != ''):
			if (strstr($date, '-')):
				$date = explode('-', $date);
				$date = $date[2].'/'.$date[1].'/'.$date[0];
			else:
				$date = explode('/', $date);
				$date = $date[2].'-'.$date[1].'-'.$date[0];
			endif;

		endif;

		return $date;

	}
	function isDateValid($str)
	{
		$stamp = strtotime($str);
		if (!is_numeric($stamp))
			return FALSE;
		if ( checkdate(date('m', $stamp), date('d', $stamp), date('Y', $stamp)) ){
			return TRUE;
		}
		return FALSE;
	}


    function resize_crop( $image, $new_width, $new_height )
    {
        $new_width  = ( int ) $new_width;
        $new_height = ( int ) $new_height;
        $old_width  = imagesx( $image );
        $old_height = imagesy( $image );
        $hm         = ( $old_height / $new_width );
        $wm         = ( $old_width / $new_height );
        $h_height   = ( $new_height / 2 );
        $h_width    = ( $new_width / 2 );

        if( $wm > $hm )
        {
            $position_crop[ 2 ] = ( $old_width / $hm );
            $position_crop[ 3 ] = $new_height;
            $position_crop[ 0 ] = ( ( $position_crop[ 2 ] / 2 ) - $h_width );
            $position_crop[ 1 ] = 0;
        }
        elseif( $wm <= $hm )
        {
            $position_crop[ 2 ] = $new_width;
            $position_crop[ 3 ] = ( $old_height / $wm );
            $position_crop[ 0 ] = 0;
            $position_crop[ 1 ] = ( ( $position_crop[ 3 ] / 2 ) - $h_height );
        }

        $img = imagecreatetruecolor( $new_width, $new_height );
        imagecopyresampled( $img, $image, - $position_crop[ 0 ], - $position_crop[ 1 ], 0, 0, $position_crop[ 2 ], $position_crop[ 3 ], $old_width, $old_height );

        return $img;
    }

	function dateDiff($sDataInicial, $sDataFinal)
	{
		$sDataI = explode("-", $sDataInicial);
		$sDataF = explode("-", $sDataFinal);

		$nDataInicial = mktime(0, 0, 0, $sDataI[1], $sDataI[0], $sDataI[2]);
		$nDataFinal = mktime(0, 0, 0, $sDataF[1], $sDataF[0], $sDataF[2]);

		$dias = ($nDataFinal - $nDataInicial)/86400;
		$dias = ceil($dias);
		return $dias;
	}

	function listaMeses ($idMes)
	{
		$mes[0]	=	'';
		$mes[1	]	=	'Janeiro';
		$mes[2	]	=	'Fevereiro';
		$mes[3	]	=	'Março';
		$mes[4	]	=	'Abril	';
		$mes[5	]	=	'Maio';
		$mes[6	]	=	'Junho';
		$mes[7	]	=	'Julho';
		$mes[8	]	=	'Agosto	';
		$mes[9	]	=	'Setembro';
		$mes[10]	=	'Outubro';
		$mes[11]	=	'Novembro';
		$mes[12]	=	'Dezembro';
		return $mes[$idMes];
	}

    function criarImagem($foto, $tamanho, $excluir = false, $destino) {


        $caminho = CAMINHO_PORTAL . 'templates/'.TEMPLATE.'/'.$destino.'/';
        if (!file_exists($caminho)):
            mkdir($caminho, 0777);
            chmod($caminho, 0777);
        endif;

        move_uploaded_file($foto['tmp_name'], $caminho.$foto['name']);

        $ex = explode(".", $foto['name']);
	    $ex = array_pop($ex);

        $imagem = $caminho.$foto['name'];

        if($ex == 'jpg') {
           $image = imagecreatefromjpeg($imagem);
        } elseif($ex == 'png') {
           $image = imagecreatefrompng($imagem);
        } else {
           $image = imagecreatefromgif($imagem);
        }

        if($image) {
            $image = $this->resize_crop($image, $tamanho, $tamanho);

            $prefixo = strtoupper(substr($destino, 0, 4))."_".substr(md5(date("Y-m-d H:i:s")), 0, 5);

            $novaImagem = $prefixo.str_pad(6, "0", STR_PAD_LEFT).'_'.$tamanho.'.jpg';

            $pastaDestino = $caminho;

            if(!file_exists($pastaDestino)):
                mkdir($pastaDestino, 0777);
                chmod($pastaDestino, 0777);
            endif;

            if($ex == 'jpg') {
               imagejpeg($image, $pastaDestino.$novaImagem, 100);
            } elseif($ex == 'png') {
               imagepng($image, $pastaDestino.$novaImagem, 9, 10);
            } else {
               imagegif($image, $pastaDestino.$novaImagem, 100);
            }


            if($excluir) {
                imagedestroy($image);
                unlink($imagem);
            }
            return $novaImagem;
        }

    }

}
