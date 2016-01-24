<?php
/*
    Dynamic Heading Generator
    By Stewart Rosenberger
    http://www.stewartspeak.com/headings/    

    Ce script genère des images PNG d'un texte, écrit dans
    la police et la taille que vous spécifiez. Ces images PNG
    sont envoyées au navigateur. En option, vous pouvez les mettre
    en cache pour une utilisation ultérieure.
    Si une image en cache existe, une nouvelle image ne sera pas générée,
    et la copie existante sera envoyée au navigateur.

    De la documentation complémentaire sur les capacités de gestion des images par PHP
    peut être trouvée sur http://www.php.net/image/    
*/


$font_file  = '../calibril.ttf' ;
$font_size  = 14 ;
$font_color = '#000080' ;
$background_color = '#ffffff' ;
$transparent_background  = true ;
$cache_images = true ;
$cache_folder = '../cache' ;


/*
  ---------------------------------------------------------------------------
   Pour une utilisation basique, vous ne devriez pas avoir besoin d'éditer quoi
   que ce soit sous ce commentaire.
   Si vous avez besoin de personnaliser plus avant ce script,
   assurez-vous d'être suffisamment familier avec PHP et ses capacités de gestion
   d'images.
  ---------------------------------------------------------------------------
*/

$mime_type = 'image/png' ;
$extension = '.png' ;
$send_buffer_size = 4096 ;

// vérification du support de la librairie GD
if(!function_exists('ImageCreate'))
    fatal_error('Erreur: Ce serveur ne supporte pas la génération d\'images par PHP.') ;

// nettoyage dy texte
if(empty($_GET['text']))
    fatal_error('Erreur: Aucun texte spécifié.') ;
    
$text = $_GET['text'] ;
if(get_magic_quotes_gpc())
    $text = stripslashes($text) ;
$text = javascript_to_html($text) ;

// vérification de l'existence d'une copie en cache, et envoi le cas échéant
$hash = md5(basename($font_file) . $font_size . $font_color .
            $background_color . $transparent_background . $text) ;
$cache_filename = $cache_folder . '/' . $hash . $extension ;
if($cache_images && ($file = @fopen($cache_filename,'rb')))
{
    header('Content-type: ' . $mime_type) ;
    while(!feof($file))
        print(($buffer = fread($file,$send_buffer_size))) ;
    fclose($file) ;
    exit ;
}

// vérification de la disponibilité de la police
$font_found = is_readable($font_file) ;
if(!$font_found)
{
    fatal_error('Erreur: Le serveur ne contient pas la police spécifiée.') ;
}

// création de l'image
$background_rgb = hex_to_rgb($background_color) ;
$font_rgb = hex_to_rgb($font_color) ;
$dip = get_dip($font_file,$font_size) ;
$box = @ImageTTFBBox($font_size,0,$font_file,$text) ;
$image = @ImageCreate(abs($box[2]-$box[0]),abs($box[5]-$dip)) ;
if(!$image || !$box)
{
    fatal_error('Erreur: Le serveur n\'a pu créer cette image-titre.') ;
}

// allocation des couleurs et dessin du texte
$background_color = @ImageColorAllocate($image,$background_rgb['red'],
    $background_rgb['green'],$background_rgb['blue']) ;
$font_color = ImageColorAllocate($image,$font_rgb['red'],
    $font_rgb['green'],$font_rgb['blue']) ;   
ImageTTFText($image,$font_size,0,-$box[0],abs($box[5]-$box[3])-$box[1],
    $font_color,$font_file,$text) ;

// Mise en place de la transparence
if($transparent_background)
    ImageColorTransparent($image,$background_color) ;

header('Content-type: ' . $mime_type) ;
ImagePNG($image) ;

// sauvegarde de l'image en cache
if($cache_images)
{
    @ImagePNG($image,$cache_filename) ;
}

ImageDestroy($image) ;
exit ;


/*
	Essais pour déterminer le nombre de pixels sous la baseline de cette police
	pour cette taille
*/
function get_dip($font,$size)
{
	$test_chars = 'abcdefghijklmnopqrstuvwxyz' .
			      'ABCDEFGHIJKLMNOPQRSTUVWXYZ' .
				  '1234567890' .
				  '!@#$%^&*()\'"\\/;.,`~<>[]{}-+_-=' ;
	$box = @ImageTTFBBox($size,0,$font,$test_chars) ;
	return $box[3] ;
}


/*
    Tentative de création d'une image contenant le message d'erreur donné. 
    Si cela fonctionne, l'image est envoyée au navigateur.
    Sinon, une erreur est enregistrée et envoyée au navigateur sous le code 500.
*/
function fatal_error($message)
{
    // send an image
    if(function_exists('ImageCreate'))
    {
        $width = ImageFontWidth(5) * strlen($message) + 10 ;
        $height = ImageFontHeight(5) + 10 ;
        if($image = ImageCreate($width,$height))
        {
            $background = ImageColorAllocate($image,255,255,255) ;
            $text_color = ImageColorAllocate($image,0,0,0) ;
            ImageString($image,5,5,5,$message,$text_color) ;    
            header('Content-type: image/png') ;
            ImagePNG($image) ;
            ImageDestroy($image) ;
            exit ;
        }
    }

    // send 500 code
    header("HTTP/1.0 500 Erreur Interne au Serveur") ;
    print($message) ;
    exit ;
}


/* 
    Décode le code hexadecimal HTML en un tableau de valeurs Rouge, Vert et Bleu.
    Accepte ces formats : (insensible à la casse) #ffffff, ffffff, #fff, fff 
*/    
function hex_to_rgb($hex)
{
    // enlève le '#'
    if(substr($hex,0,1) == '#')
        $hex = substr($hex,1) ;

    // expansion de la forme raccourcie ('fff') de la couleur
    if(strlen($hex) == 3)
    {
        $hex = substr($hex,0,1) . substr($hex,0,1) .
               substr($hex,1,1) . substr($hex,1,1) .
               substr($hex,2,1) . substr($hex,2,1) ;
    }

    if(strlen($hex) != 6)
        fatal_error('Error: Couleur invalide "'.$hex.'"') ;

    // conversion
    $rgb['red'] = hexdec(substr($hex,0,2)) ;
    $rgb['green'] = hexdec(substr($hex,2,2)) ;
    $rgb['blue'] = hexdec(substr($hex,4,2)) ;

    return $rgb ;
}


/*
    Convertit les caractères unicode javascript en entités HTML.
    (par exemple : '%u2018' => '&#8216;'). Renvoie la chaîne corrigée.
*/
function javascript_to_html($text)
{
    $matches = null ;
    preg_match_all('/%u([0-9A-F]{4})/i',$text,$matches) ;
    if(!empty($matches)) for($i=0;$i<sizeof($matches[0]);$i++)
        $text = str_replace($matches[0][$i],
                            '&#'.hexdec($matches[1][$i]).';',$text) ;

    return $text ;
}

?>
