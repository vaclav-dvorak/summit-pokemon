<?php

$cardNum = 1;

$cards = [
    'Jan Melmuka' => 'tcc',
    'Martina Heindl' => 'tcc',
    'Marek Mach' => 'Inventi',
    'Monika Koubková' => 'Inventi',
    'Andriy Botnarenko' => 'Inventi',
    'Lukáš Čížek' => 'Inventi',
    'Martin Macháček' => 'Inventi',
    'Jan Kaštura' => 'Inventi',
    'Hana Bísková' => 'Mainstream',
    'David Moravec' => 'Mainstream',
    'Petr Nešetřil' => 'MRM',
    'Biljana Horvitz' => 'CPI',
    'Gábina Pojerová' => 'A7 studio',
    'Zbyněk Linhart' => 'A7 studio',
    'Ivana Leopoldová' => 'Moore Stephens',
    'Michaela Tydlačková' => 'Moore Stephens',
    'Jitka Jíchová' => 'Moore Stephens',
    'Darren Moss' => 'Mayalukas',
    'Petra Moss' => 'Mayalukas',
    'Lenka Hankovcová' => 'Billigence',
    'Lukáš Havránek' => 'Billigence',
    'Tomáš Frnka' => 'Billigence',
    'Emma Bailey' => 'Summit',
    'Dave Trolle' => 'Summit',
    'Claire Acum' => 'Summit',
    'James Dewes' => 'Summit',
    'Hedley Aylott' => 'Summit',
    'Jill Anderson' => 'Summit',
    'Adam Abonyi' => 'Summit',
    'Lukáš Novák' => 'Summit',
    'Zdeněk Burda' => 'Summit',
    'Martin Polívka' => 'Summit',
    'Jan Kazar' => 'Summit',
    'Irena Šnýdrová' => 'Summit',
    'Ondra Borůvka' => 'Summit',
    'Pavla Šimanová' => 'Summit',
    'Ondřej Drkula' => 'Summit',
    'Vojtěch Sedláček' => 'Summit',
    'Václav Dvořák' => 'Summit',
    'Vadim Torosyan' =>	'Inventi',
    'Tomaš Kriška' => 'Summit',
    'Pavlína Mroczkowská' => 'Summit',
];

$cards = [
    'Pavlína Mroczkowská' => 'Summit',
    'Monika Koubková' => 'Inventi',
    'Martina Heindl' => 'tcc',  
    'Marek Mach' => 'Inventi',
    'Lenka Hankovcová' => 'Billigence',
    'Darren Moss' => 'Mayalukas',
    'Petra Moss' => 'Mayalukas',
];

$cards = [
    'Petr Böhm' => 'Summit',
];


$cards = [
    'Marcel Veselovský' => 'Summit',
    'Jiří Andras' => 'Summit',
];

$cards = [
    'Viktoriya Vitova' => 'Summit',
    'Jakub Jirka' => 'Summit',
    'Jan Hoker' => 'Summit',
];

$cards = [
    'Jiří Karásaek' => 'Summit',
];




function glob_recursive($pattern, $flags = 0) {
    $files = glob($pattern, $flags);

    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
        $files = array_merge($files, glob_recursive($dir.'/'.basename($pattern), $flags));
    }
    return $files;
}

function logo($name) {
    $find = strtolower(str_replace([' '], '-', $name));
    if ($find  == 'summit') {
        return '';
    }
    $path = realpath('./logo');
    foreach (glob_recursive($path . '/' . $find . '.*') as $filename) {
        
        return '/logo/' . basename ($filename);
    }
    return '';
}

?>
<!DOCTYPE html>
<html lang="cs" dir="ltr">
<head profile="http://www.w3.org/1999/xhtml/vocab">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>opening</title>

  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    
    <style>
    body {
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
    }
    .card {
        
        border: 1px #000 solid;
    }
    .card img.cl {
        display: block;
        margin: 10px auto;
        max-height: 130px;
        max-width: 50%;
    }
    .card img.l {
        display: block;
        margin: 50px auto;
        width: 95%;
    }
    .title {
        font-size: 2.5em;
        font-weight: bold;
        text-align: center;
        border-bottom: 2px #000 solid;
        min-height: 3em;
    }
    .company {
        font-size: 1.7em;
        font-weight: normal;
        font-style: italic;
        text-align: center;
        border-top: 2px #000 solid;
    }
    .break {
        overflow: auto;
        position:relative;
        page-break-after: always;
    }
    .logowrap {
        width: 30%;
        height: 130px;
        max-height: 130px;
        display:table-cell;
        vertical-align:middle;
        text-align:center
    }
    @media print {
        .card {
            width: 50%;
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
<div class="card col-md-6">
<img class="l" src="logo/summit.jpg">
<div class="title"><?php echo $name ?></div>
<div class="logowrap">
<?php $logo = logo($card);
if (!empty($logo)) {?>
<img class="cl" src="<?php echo $logo;?>">
<?php } ?>
</div>
<div class="company"><?php echo $card ?></div>
</div>
<?php echo (($zlom % 4 == 0) ? '</div><div class="break">' : '') ?>
<?php } ?>
<?php endforeach;?>
</div>
</body>