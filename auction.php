<?php

$cardNum = 12;

$materials = [
    'Coal' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/b/bb/Icon_resource_coal.png',
    'Stone' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/4/40/Icon_resource_stone.png',
    'Iron' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/d/de/Icon_resource_iron.png',
    'Coffee' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/1/1d/Icon_resource_coffee.png',
    'Silk' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/3/3b/Icon_resource_silk.png',
    'Cotton' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/b/be/Icon_resource_cotton.png',
    'Pearls' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/6/6e/Icon_resource_pearls.png',
    'Silver' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/0/05/Icon_resource_silver.png',
    'Copper' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/7/72/Icon_resource_copper.png',
    'Oil' => 'https://hydra-media.cursecdn.com/civ6.gamepedia.com/9/9e/Icon_resource_oil.png',
]

?>
<!DOCTYPE html>
<html lang="cs" dir="ltr">
<head profile="http://www.w3.org/1999/xhtml/vocab">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>auctions</title>

  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>    
    <style>
        body {
            height: 100vh;
        }
        .title {
            height: 8vh;
            font-size: 3.56rem;
            font-weight: 400;
        }
        .row {
            height: 90vh;
        }
        .pod {
            height: 20%;
        }
        .card-image {
            margin-left: 10px;
            max-width: 185px !important;
        }
        
        span.badge {
            font-size: 3rem;
            line-height: 3.1rem;
            height: 3.4rem;
            color: #fff;
            padding: 1px 15px 0 6px;
        }
        
        span.badge::after {
            content: "||";
            margin-left: -19px;
            letter-spacing: -5px;
        }

    </style>
    
</head>
<body>
<div class="wrapper">
    <div class="title center">Summit Auction</div>
    <div class="row">
        <?php foreach($materials as $mat => $url) :?>
        <div class="pod col s6">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="<?php echo $url?>">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                      <h2><?php echo $mat;?><span class="badge"><span class="price">10</span> c</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    const rndMin = 3;
    let inter = null;
    function updatePrice() {
        if (inter) clearInterval(inter);
        let min = 100;
        let max = 0;
        document.querySelectorAll('.price').forEach(span => {
            let price = Math.floor((Math.random() * 10) + rndMin);
            if (price < min) {
                min = price;
            }
            if (price > max) {
                max = price;
            }
            span.innerHTML = price;
        });   
        document.querySelectorAll('.price').forEach(span => {
            let price = Number(span.innerHTML);
            let dif = price - rndMin;
            let cl = '';
            if (dif == 0) {
                cl = 'red darken-2';
            }
            if (dif > 0 && dif <= 3) {
                cl = 'red lighten-1';
            }
            if (dif > 3 && dif <= 5) {
                cl = 'amber';
            }
            if (dif > 5 && dif <= 8) {
                cl = 'light-green lighten-1';
            }
            if (dif > 8) {
                cl = 'light-green lighten-2';
            }
            span.parentNode.classList.remove('amber', 'red', 'light-green', 'darken-2', 'lighten-1', 'lighten-2');
            cl = cl.split(' ').forEach(color => {
                span.parentNode.classList.add(color);
            });
        });
        inter = setInterval(updatePrice, 60000);
    }
    updatePrice();
</script>
</body>