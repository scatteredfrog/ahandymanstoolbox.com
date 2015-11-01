<?php
    echo link_tag('stuff/css/monkey.css');
    echo "<script src='" . base_url('stuff/js/jquery-1.11.3.min.js') . "'></script>";
    echo "<script src='" . base_url('stuff/js/bootstrap.min.js') . "'></script>";
    $this->load->helper('cookie');
    if (get_cookie('hmoreo',TRUE) === 'flirzelkwerp') {
        echo "<script src='" . base_url('stuff/js/handyoreo.js') . "'></script>";
    }
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div id='main_box' class="center-block">
            <div id='monkeywrench'></div>
            <div id='monkeyright'>
                <div class="titleContainer">
                    <div class="toolboxSubhead text-center">Welcome to</div>
                    <div class="toolboxHeader text-center">
                        A Handyman's Toolbox
                    </div>
                    <div id="monkey_button_container" class="text-center container">
                        <div id="about_me">About Me</div>
                        <div id="my_collection">My Collection</div>
                        <div id="new_tools_ho">New Tools for the Homeowner</div>
                        <div id="used_tools">Used Tools</div>
                        <div id="toolbox_registry">Toolbox Registry</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>