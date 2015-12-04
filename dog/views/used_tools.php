<?php
    echo "<script src='" . base_url('stuff/js/jquery-1.11.3.min.js') . "'></script>";
    echo "<script src='" . base_url('stuff/js/bootstrap.min.js') . "'></script>";
    echo link_tag('stuff/css/monkey.css');
?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hmtb_navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand toolboxBrand" href="#">&nbsp; &nbsp; A Handyman's Toolbox</a>
            </div>
            <div class="collapse navbar-collapse" id="hmtb_navbar">
                <ul class="tb-menu-items nav navbar-nav navbar-right">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">About Me</a></li>
                    <li><a href="#">My Collection</a></li>
                    <li><a href="#">New Tools for the Homeowner</a></li>
                    <li class="active"><a href="#">Used Tools</a></li>
                    <li><a href="#">Toolbox Registry</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div id="used_tool_carousel" class="carousel slide" data-ride="carousel">
    <!-- indicators -->
    <ol class="carousel-indicators">
<?php
    $tool_count = count($tools);
    
    for ($x = 0; $x < $tool_count; $x++) {
        $target_data = '<li data-target="#used_tool_carousel" data-slide-to="';
        $target_data .= $x . '" ';
        if ($x === 0) {
            $target_data .= 'class="active"';
        }
        $target_data .= '></li>';
        echo $target_data;
    }
    
?>

<!--        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
    </ol>
    
    <!--    wrapper for slides-->
    <div class="carousel-inner">
        
<?php
    $tool_num = 0;
    foreach($tools as $tool) {
        $item = '<div class="item';
        if ($tool_num === 0) {
            $item .= ' active';
        }
        $item .= '">';
        // IMAGE
        $item .= '<img src="/stuff/images/tool_photos/' . $tool['picture_filename'] . '" alt="..." class="center-block"';
        $item .= 'data-price="' . $tool['price_tag'] . '" ';
        $item .= 'data-category="' . $tool['category'] . '" ';
        $item .= 'data-notes="' . htmlentities($tool['public_notes']) . '" ';
        $item .= 'data-additional="' . $tool['public_misc'] . '" ';
        $item .= 'data-mainpicture="' . $tool['picture_filename'] . '" ';
        $item .= 'data-active="' . $tool['active'] . '" ';
        $item .= '/>';
        // CAPTION
        $item .= '<div class="carousel-caption">';
        // TOOL NAME
        $item .= '<h3>' . $tool['name'] . '</h3>';
        $item .= '</div></div>';
//        echo "<br />Notes: " . $tool['notes'];
//        echo "<br />Additional: " . $tool['misc'];
//        echo "<br /><img src='/stuff/images/tool_photos/" . $tool['picture'] . "' />\";
        echo $item;
        $tool_num++;
    }
?>
    </div>
    
    <!--    controls-->
    <a class="left carousel-control" href="#used_tool_carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#used_tool_carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<div class="chunk">
<div class="row">
    <div class="row largeFile">
        <div class="col-xs-1 col-md-1 col-lg-3 col-sm-1"></div>
        <div class="col-xs-5 col-md-3 col-sm-3 col-lg-2">Full size picture:</div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-4 toolFullSize"></div>
        <div class="col-md-2 col-lg-3 col-sm-2"></div>
    </div>
    <div class="row" id="category_row">
        <div class="col-xs-1 col-md-1 col-lg-3 col-sm-1"></div>
        <div class="col-xs-5 col-md-3 col-sm-3 col-lg-2">Category:</div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-4 toolCategory"></div>
        <div class="col-md-2 col-lg-3 col-sm-2"></div>
    </div>
    <div class="row priceRow">
        <div class="col-xs-1 col-md-1 col-lg-3 col-sm-1"></div>
        <div class="col-xs-5 col-md-3 col-sm-3 col-lg-2">Price:</div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-4 toolPrice"></div>
        <div class="col-md-2 col-lg-3 col-sm-2"></div>
    </div>
    <div class="row notesRow">
        <div class="col-xs-1 col-md-1 col-lg-3 col-sm-1"></div>
        <div class="col-xs-5 col-md-3 col-sm-3 col-lg-2">Notes:</div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-4 toolNotes"></div>
        <div class="col-md-2 col-lg-3 col-sm-2"></div>
    </div>
    <div class="row additionalInfoRow">
        <div class="col-xs-1 col-md-1 col-lg-3 col-sm-1"></div>
        <div class="col-xs-5 col-md-3 col-sm-3 col-lg-2">Additional info:</div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-4 toolAdditional"></div>
        <div class="col-md-2 col-lg-3 col-sm-2"></div>
    </div>
    <div class="row">&nbsp;</div>
    <div class="row availabilityRow">
        <div class="col-xs-1 col-md-1 col-lg-3 col-sm-1"></div>
        <div class="col-xs-5 col-md-3 col-sm-3 col-lg-2">Availability:</div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-4 toolAvailability"></div>
        <div class="col-md-2 col-lg-3 col-sm-2"></div>
    </div>
</div>
</div>
<script>
    $('.carousel').carousel({
        interval: false
    });
    
    updateToolData();
    
    $('#used_tool_carousel').on('slid.bs.carousel', function() {
//        $('.chunk').hide();
        updateToolData();
//        $('.chunk').show();
    });
    
    function updateToolData() {
        var mainPicture = $('.active img').data('mainpicture');
        var notAvail = "Sorry, this tool is not available at this time.";
        var isAvail = "<span class='toolAvailable'>AVAILABLE TO BUY. Click here if interested.</span>";
        var actIm = $('.active img');
        
        $('.largeFile').css('display','none');
        if (actIm.data('notes')) {
            $('.toolNotes').html(actIm.data('notes'));
            $('.notesRow').show();
        } else {
            $('.notesRow').hide();
        }
        
        if (actIm.data('additional_info')) {
            $('.toolAdditional').html(actIm.data('additional_info'));
            $('.additionalInfoRow').show();
        } else {
            $('.additionalInfoRow').hide();
        }

    if ( actIm.data('category')) {
            $.post('parseCategory', { 'category': actIm.data('category') }, function(data) {
                $('.toolCategory').html(data);
                $('#category_row').css('display','block');
            });
        } else {
            $('#category_row').css('display','block');
        }
                    
        if (mainPicture.indexOf('_resized') > 0) {
            var originalSize = mainPicture.replace('_resized','');
            var img_src = '/stuff/images/tool_photos/' + originalSize;
            $('.toolFullSize').html('<a href="'+img_src+'" target="_blank">Click here</a>');
            $('.largeFile').css('display','block');
        }
        
        if (actIm.data('active') && actIm.data('price')) {
            $('.toolPrice').html('$'+actIm.data('price'));
            $('.priceRow').show();
            $('.toolAvailability').html(isAvail);
        } else  if (actIm.data('active')) {
            $('.priceRow').hide();
            $('.toolAvailability').html(isAvail);
        } else {
            $('.priceRow').hide();
            $('.toolAvailability').html(notAvail);
        }
    }
</script>