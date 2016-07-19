<?php

$cardNum = 12;

$cards = array (
    'Bulbasaur' => array(
        'type' => 'GRA',
        'http' => 'http://pokemondb.net/pokedex/bulbasaur',
    ),
    'Charmander' => array(
        'type' => 'FIR',
        'http' => 'http://pokemondb.net/pokedex/charmander',
    ),
    'Squirtle' => array(
        'type' => 'WAT',
        'http' => 'http://pokemondb.net/pokedex/squirtle',
    ),
    'Pidgey' => array(
        'type' => 'NOR',
        'http' => 'http://pokemondb.net/pokedex/pidgey',
    ),
    'Pikachu' => array(
        'type' => 'ELE',
        'http' => 'http://pokemondb.net/pokedex/pikachu',
    ),
    'Nidorino' => array(
        'type' => 'POI',
        'http' => 'http://pokemondb.net/pokedex/nidorino',
    ),
    'Vulpix' => array(
        'type' => 'FIR',
        'http' => 'http://pokemondb.net/pokedex/vulpix',
    ),
    'Oddish' => array(
        'type' => 'GRA',
        'http' => 'http://pokemondb.net/pokedex/oddish',
    ),
    'Growlithe' => array(
        'type' => 'FIR',
        'http' => 'http://pokemondb.net/pokedex/growlithe',
    ),
    'Koffing' => array(
        'type' => 'POI',
        'http' => 'Poison	http://pokemondb.net/pokedex/koffing',
    ),
);

$elements = array (
    'GRA' => '#78c850',
    'FIR' => '#f08030',
    'WAT' => '#6890f0',
    'NOR' => '#8a8a59',
    'ELE' => '#f8d030',
    'POI' => '#a040a0',
);

/*
 * Function for calculating contrast difference of background and foreground
 * more info: http://24ways.org/2010/calculating-color-contrast/
 */

function getImgSrc($url) {
    $path = parse_url($url, PHP_URL_PATH);
    $pathFragments = explode('/', $path);
    $end = end($pathFragments);
    return 'https://img.pokemondb.net/artwork/' . $end . '.jpg';
}

?>
<!DOCTYPE html>
<html lang="cs" dir="ltr">
<head profile="http://www.w3.org/1999/xhtml/vocab">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>pokecards</title>

  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    
    <style>
    .card {
        border: 1px #000 solid;
    }
    .card img {
        display: block;
        margin: 10px auto;
        height:150px;
        width: auto;
    }
    .elem {
        border: 1px #000 solid;
        text-shadow: 1px 1px 1px #333;
        text-align: center;
        font-size: 1.2em;
        color: #fff;
        padding: 8px 16px;
        display: inline-block;
        -webkit-print-color-adjust: exact;
    }
    .title {
        font-size: 1.7em;
        font-weight: bold;
        text-align: center;
        border-bottom: 2px #000 solid;
    }
    .cp-wrap {
        position: relative;
    }
    .cp {
        position: absolute;
        top: 10px;
        font-size: 1.2em;
    }
    .cp .val {
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        padding: 5px;
    }
    .qr img {
        width: 100%;
        height: auto;
        display: block;
        margin: 0 0 5px auto;
    }
    .break {
        overflow: auto;
        position:relative;
        page-break-after: always;
    }
    @media print {
        .card {
            width: 25%;
            float: left;
        }
        .col-md-offset-6 {
            margin-left: 50%;
        }
        .elem {
            text-shadow: 1px 1px 1px #333 !important;
            color: #fff !important;
        }
    }
    </style>
    
</head>
<body class="html front col-md-12" >
<div class="break">
<?php foreach ($cards as $name=>$card):?>
<?php for($i=0; $i<$cardNum; $i++){?>
<div class="card col-md-3">
<div class="title"><?php echo $name ?></div>
<img src="<?php echo getImgSrc($card['http'])?>">
<div class="elem" style="background-color:<?php echo $elements[$card['type']];?> !important;"><?php echo $card['type'];?></div>
<div class="cp-wrap">
    <div class="cp">CP:&nbsp;<span class="val">&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
    <div class="qr col-md-offset-6 col-md-6"><img src='qr.php?u=<?php echo urlencode($card['http']);?>' /></div>
</div>
</div>
<?php echo ((($i+1) % 12 == 0) ? '</div><div class="break">' : '') ?>
<?php } ?>
<?php endforeach;?>
</div>
</body>