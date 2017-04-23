<?php

$cardNum = 16;

$cards = [
    'Coal' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/b/bb/Icon_resource_coal.png',
    'Copper' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/7/72/Icon_resource_copper.png',
    'Stone' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/4/40/Icon_resource_stone.png',
    'Iron' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/d/de/Icon_resource_iron.png',
    'Coffee' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/1/1d/Icon_resource_coffee.png',
    'Silk' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/3/3b/Icon_resource_silk.png',
    'Cotton' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/b/be/Icon_resource_cotton.png',
    'Pearls' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/6/6e/Icon_resource_pearls.png',
    'Silver' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/0/05/Icon_resource_silver.png',
    'Oil' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/9/9e/Icon_resource_oil.png',
]

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
    }
    </style>
    
</head>
<body class="html front col-md-12" >
<div class="break">
<?php $zlom = 0;?>
<?php foreach ($cards as $name=>$card):?>
<?php for($i=0; $i<$cardNum; $i++){ $zlom++;?>
<div class="card col-md-3">
<div class="title"><?php echo $name ?></div>
<img src="<?php echo $card;?>">
</div>
<?php echo (($zlom % 16 == 0) ? '</div><div class="break">' : '') ?>
<?php } ?>
<?php endforeach;?>
</div>
</body>