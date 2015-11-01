<?php

    $stock = array(
        'name' => 'stock', 'id' => 'stock',
        'type' => 'text'
    );
    
    $addMorePix = array(
        'class' => 'addMorePix',
        'type' => 'button',
        'onclick' => 'addMorePictures()',
        'content' => 'Add more pictures'
    );
    
    $picture = array (
        'name' => 'picture', 'id' => 'picture', 'type' => 'file'
    );
    
    $name = array (
        'name' => 'name', 'id' => 'name',
        'maxlength' => '255', 'size' => '39', 'type' => 'text'
    );

    $public_notes = array (
        'name' => 'public_notes', 'id' => 'public_notes',
        'rows' => '3', 'cols' => '35'
    );
    
    $public_misc = array (
        'name' => 'public_misc', 'id' => 'public_misc', 'rows' => '3', 'cols' => '35'
    );

    $active_check = array (
        'name' => 'active', 'id' => 'active', 'type' => 'checkbox'
    );
    
    $purchased_from = array (
        'name' => 'purchased_from', 'id' => 'purchased_from',
        'size' => '39', 'type' => 'input', 'maxlength' => '255'
    );

    $purchase_date = array (
        'name' => 'purchase_date', 'id' => 'purchase_date',
        'type' => 'date',
    );
    
    $purchase_price = array (
        'name' => 'purchase_price', 'id' => 'purchase_price',
        'size' => '39', 'type' => 'text', 'maxlength' => '255'
    );

    $sv_options = array (
        'craigslist' => 'Craigslist', 'ebay' => 'eBay',
        'tool_show' => 'tool show', 'other' => 'other'
    );
    
    $sold_via = array (
        'name' => 'sold_by', 'id' => 'sold_by',
        'options' => $sv_options
    );
    
    $date_sold = array (
        'name' => 'date_sold', 'id' => 'date_sold', 'type' => 'text',
        'placeholder' => '(optional)',
        'size' => '6'
    );
    
    $sale_price = array (
        'name' => 'sale_price', 'id' => 'sale_price',
        'size' => '39', 'type' => 'text', 'maxlength' => '255'
    );

    $sold_to_name = array (
        'name' => 'sold_to_name', 'id' => 'sold_to_name',
        'size' => '39', 'type' => 'text', 'maxlength' => '255',
        'placeholder' => 'Name'
    );

    $sold_to_phone = array (
        'name' => 'sold_to_phone', 'id' => 'sold_to_phone',
        'size' => '39', 'type' => 'text', 'maxlength' => '255',
        'placeholder' => 'Phone'
    );

    $sold_to_email = array (
        'name' => 'sold_to_email', 'id' => 'sold_to_email',
        'size' => '39', 'type' => 'email', 'maxlength' => '255',
        'placeholder' => 'E-mail'
    );

    $private_notes = array (
        'name' => 'private_notes', 'id' => 'private_notes',
        'rows' => '3', 'cols' => '35'
    );
    
    $private_misc = array (
        'name' => 'private_misc', 'id' => 'private_misc',
        'rows' => '3', 'cols' => '35'
    );

    $submit_button = array (
        'name' => 'submit', 'id' => 'submit', 'type' => 'submit',
        'value' => true, 'content' => 'Submit'
    );
    
    $submit_add_button = array (
        'name' => 'submit_add', 'id' => 'submit_add', 'type' => 'submit',
        'value' => true, 'content' => 'Submit and Add New Tool'
    );
    
    $more_pictures = array();
    for ($x = 1; $x < 20; $x++) {
        $more_pictures[$x] = array(
            'name' => 'more_pictures'.$x,
            'id' => 'more_pictures'.$x,
            'type' => 'file'
        );
    }
    
    $ebay = array(
        'maxlength' => '255', 'size' => '39',
        'id' => 'ebay_title', 'name' => 'ebay_title', 'type' => 'text'
    );
    
    $craigs_list = array(
        'maxlength' => '255', 'size' => '39',
        'id' => 'cl_title', 'name' => 'cl_title', 'type' => 'text'
    );
    
    $buyers_premium = array(
        'id' => 'buyers_premium', 'name' => 'buyers_premium',
        'type' => 'text', 'value' => '0.00'
    );
    
    $di_options = array(
        'y' => 'Yes', 'n' => 'No'
    );
    
    $display_info = array(
        'id' => 'display_info', 'name' => 'display_info',
        'options' => $di_options
    );
    
    $price_tag = array(
        'maxlength' => '255', 'size' => '39',
        'id' => 'price_tag', 'name' => 'price_tag', 'type' => 'text'
    );
    
    $item_details = array(
        'maxlength' => '255', 'size' => '39',
        'id' => 'item_details', 'name' => 'item_details', 'type' => 'text'
    );
    
    $sold_date_options = array(
        '1' => 'January' , '2' => 'February', '3' => 'March', '4' => 'April',
        '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August',
        '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
    );
    
    $sold_date_month = array(
        'id' => 'sold_date_month', 'name' => 'sold_date_month'
    );
    
    $sold_date_year = array(
        'id' => 'sold_date_year', 'name' => 'sold_date_year', 'class' => 'yearField',
        'type' => 'number', 'value' => date('Y'), 'size' => '6'
    );
    
    $commission = array(
        'maxlength' => '255', 'size' => '39',
        'id' => 'commission', 'name' => 'commission', 'type' => 'text'
    );
    
    $shipping = array(
        'maxlength' => '255', 'size' => '39',
        'id' => 'shipping', 'name' => 'shipping', 'type' => 'text'
    );

    $other_costs = array(
        'maxlength' => '255', 'size' => '39',
        'id' => 'other_costs', 'name' => 'other_costs', 'type' => 'text'
    );

    $profit_loss = array(
        'maxlength' => '255', 'size' => '39',
        'id' => 'profit_loss', 'name' => 'profit_loss', 'type' => 'text'
    );

    $profit_loss_ytd = array(
        'maxlength' => '255', 'size' => '39',
        'id' => 'profit_loss_ytd', 'name' => 'profit_loss_ytd', 'type' => 'text'
    );

    $action_needed = array (
        'name' => 'action_needed', 'id' => 'action_needed', 'rows' => '3', 'cols' => '35'
    );

    $notes_for_sean = array (
        'name' => 'notes_for_sean', 'id' => 'notes_for_sean', 'rows' => '3', 'cols' => '35'
    );
