<?php
    echo "<script src='" . base_url('stuff/js/jquery-1.11.3.min.js') . "'></script>";
    echo "<script src='" . base_url('stuff/js/bootstrap.min.js') . "'></script>";
    echo link_tag('stuff/css/monkey.css');
?>
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
        $item .= '<img src="/stuff/images/tool_photos/' . $tool['picture'] . '" alt="..." class="center-block"';
        $item .= 'data-price="' . $tool['purchase_price'] . '" ';
        $item .= 'data-category="' . $tool['category'] . '" ';
        $item .= 'data-notes="' . htmlentities($tool['notes']) . '" ';
        $item .= 'data-additional="' . $tool['misc'] . '" ';
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
<div class="row">
    <div class="row" id="category_row">
        <div class="col-xs-1 col-md-1 col-lg-3 col-sm-1"></div>
        <div class="col-xs-5 col-md-3 col-sm-3 col-lg-2">Category:</div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-4 toolCategory"></div>
        <div class="col-md-2 col-lg-3 col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-1 col-md-1 col-lg-3 col-sm-1"></div>
        <div class="col-xs-5 col-md-3 col-sm-3 col-lg-2">Price:</div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-4 toolPrice"></div>
        <div class="col-md-2 col-lg-3 col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-1 col-md-1 col-lg-3 col-sm-1"></div>
        <div class="col-xs-5 col-md-3 col-sm-3 col-lg-2">Notes:</div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-4 toolNotes"></div>
        <div class="col-md-2 col-lg-3 col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-1 col-md-1 col-lg-3 col-sm-1"></div>
        <div class="col-xs-5 col-md-3 col-sm-3 col-lg-2">Additional info:</div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-4 toolAdditional"></div>
        <div class="col-md-2 col-lg-3 col-sm-2"></div>
    </div>
</div>
<script>
    $('.carousel').carousel({
        interval: false
    });
    
    updateToolData();
    
    $('#used_tool_carousel').on('slid.bs.carousel', function() {
        updateToolData();
    });
    
    function updateToolData() {
        $('.toolNotes').html($('.active img').data('notes'));
        $('.toolPrice').html('$'+$('.active img').data('price'));
        if ( $('.active img').data('category')) {
            $.post('parseCategory', { 'category': $('.active img').data('category') }, function(data) {
                $('.toolCategory').html(data);
                $('#category_row').css('display','block');
            });
        }
    }
</script>