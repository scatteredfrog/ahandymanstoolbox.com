<?php

    // "Picture" field
    $picture = array (
        'name' => 'picture', 'id' => 'picture',
        'type' => 'file'
    );
    
    // "Thumbnail" field
    $thumbnail = array (
        'name' => 'thumbnail', 'id' => 'thumbnail',
        'type' => 'file'
    );
    
    // "Name" field
    $name = array (
        'name' => 'name', 'id' => 'name',
        'maxlength' => '255', 'size' => '39',
        'type' => 'text'
    );

    // "Purchase Price" field
    $purchase_price = array (
        'name' => 'purchase_price', 'id' => 'purchase_price',
        'size' => '39', 'type' => 'text', 'maxlength' => '255'
    );
    
    // public "Notes" field
    $public_notes = array (
        'name' => 'public_notes', 'id' => 'public_notes',
        'rows' => '3', 'cols' => '35'
    );
    
    // public "Misc" field
    $public_misc = array (
        'name' => 'public_misc', 'id' => 'public_misc',
        'rows' => '3', 'cols' => '35'
    );

    // "Active" checkbox
    $active_check = array (
        'name' => 'active', 'id' => 'active',
        'type' => 'checkbox'
    );
    
    // "Purchased From" field
    $purchased_from = array (
        'name' => 'purchased_from', 'id' => 'purchase_from',
        'size' => '39', 'type' => 'input', 'maxlength' => '255'
    );

    // "Purchase Date" field
    $purchase_date = array (
        'name' => 'private_purchase_date', 'id' => 'private_purchase_date',
        'size' => '39', 'type' => 'date', 'maxlength' => '255',
        'placeholder' => 'YYYY-MM-DD'
    );
    
    // "Purchase Price" field
    $private_purchase_price = array (
        'name' => 'private_purchase_price', 'id' => 'private_purchase_price',
        'size' => '39', 'type' => 'text', 'maxlength' => '255'
    );

    // "Purchase Location" field
    $purchase_location = array (
        'name' => 'purchase_location', 'id' => 'purchase_location',
        'size' => '39', 'type' => 'text', 'maxlength' => '255'
    );

    // "Sold Via"
    $sv_options = array (
        'craigslist' => 'Craigslist',
        'ebay' => 'eBay',
        'tool_show' => 'tool show',
        'yard_sale' => 'yard sale'
    );
    $sold_via = array (
        'name' => 'sold_by', 'id' => 'sold_by',
        'options' => $sv_options
    );
    
    // "Date Sold" field
    $date_sold = array (
        'name' => 'date_sold', 'id' => 'date_sold',
        'size' => '39', 'type' => 'date', 'maxlength' => '255',
        'placeholder' => 'YYYY-MM-DD'
    );
    
    // "Sale Price" field
    $sale_price = array (
        'name' => 'sale_price', 'id' => 'sale_price',
        'size' => '39', 'type' => 'text', 'maxlength' => '255'
    );

    // "Sold To" fields
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

    // private "Notes" field
    $private_notes = array (
        'name' => 'private_notes', 'id' => 'private_notes',
        'rows' => '3', 'cols' => '35'
    );
    
    // private "Misc" field
    $private_misc = array (
        'name' => 'private_misc', 'id' => 'private_misc',
        'rows' => '3', 'cols' => '35'
    );

    $submit_button = array (
        'name' => 'submit', 'id' => 'submit',
        'type' => 'submit',
        'value' => true, 'content' => 'Submit'
    );