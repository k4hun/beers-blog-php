<?php
    require_once 'models/beer.php';
    require_once 'models/style.php';
    require_once 'models/brewery.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Beers</title>
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="assets/stylesheets/styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/javascripts/scripts.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body onload='startSlider()'>
    <div id='menu-top'>
        <div class='menu-top'><a href="index.php"><img src="assets/images/logo2.png"></a></div>
        <div class='menu-top'><p>Blog about craft beers</p></div>
    </div>
    
    <div id='top'></div>
    
    <div id='container'>
        <div id='beers'>
            <div class='beer'>
                <div align='center'>
                    <div class='slider-nav'>
                                <a class="btn btn-default" href="javascript:setSlide(0)" id="slider-nav-0">1</a>
                                <a class="btn btn-default" href="javascript:setSlide(1)" id="slider-nav-1">2</a>
                                <a class="btn btn-default" href="javascript:setSlide(2)" id="slider-nav-2">3</a>
                    </div>
                <!-- <div class='slider-side-left'><a class="btn btn-default" href="javascript:setSlide('prev')">&lt;</a></div> -->
                
                    <?php 
                        $recent = Beer::getLimited(3); 
                        $slide = 0;
                        foreach ($recent as $val) {
                            echo "<div class='slider-item' id='slide$slide'>
                                    <img height='600' src='uploads/$val->photo_url' width='450' alt='slide1'/>
                                    <div id='item-text'>
                                        <p>$val->name</p>
                                    </div>
                                </div>";
                            $slide++;
                        }
                    ?>
                </div>
            </div>

            <?php
                $beers = Beer::getAll();
                if(isset($_GET['style'])) $beers = Beer::getByStyle($_GET['style']);
                
                foreach ($beers as $beer) {
                    $style = Beer::getStyle($beer->style_id);
                    $brewery = Beer::getBrewery($beer->brewery_id);
                    echo "<div class='beer'>
                            <p class='beername'>$beer->name</p>
                            <p class='beerstyle'>$style->name from $brewery->name</p>
                            <hr>
                            <div class='beer-content'><img class='beerimg' src='uploads/$beer->photo_url'/></div>
                            
                            <div class='beer-content'><p class='beerrating'><strong>Rating: </strong>";
                                for($i=0; $i<$beer->rating; $i++){
                                    echo "<img src='assets/images/rate_star.png' height='20' width='20'/>";
                                }
                            echo "</p>
                            <p class='beerdescription'><strong>About: </strong>$beer->description</p></div>
                        </div>";
                }
            ?>
        </div>
        <div id='sidebar' >
            <div id='about'>
                <img id='aboutbg' src="assets/images/cups_horizontal.jpg">
                <img id='aboutphoto' src="assets/images/photoabout.jpg" class="img-circle">
                <h2>BARTEK</h2>
                <hr>
                <p>Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
            </div>
            <div id='styles'>
                <h2>STYLES</h2>
                <hr>
                <ul>
                <?php
                    $tasted = Style::getAll();
                    foreach ($tasted as $style) {
                        $beers = count(Style::getBeers($style->id));
                        echo "<li><a href='". $_SERVER['PHP_SELF'] ."?style=". $style->id ."#beers'>". $style->name. "</a> <span class='badge'>". $beers ."</span></li>";
                    }
                ?>
                </ul>
            </div>
            <div id='info'>
                <img id='info-photo' src="assets/images/info.jpg">
            </div>
        </div>
    </div>
    <div id='footer'>
        <div id='footer-text'>All Rights Reserved</div>
    </div>
 
</body>

</html>