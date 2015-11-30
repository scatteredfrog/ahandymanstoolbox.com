<?php

    $id = array(
        'name' => 'edit_id', 'id' => 'edit_id', 'type' => 'text', 'data-ng-model' => 'id'
    );
    
    $stock = array(
        'name' => 'edit_stock', 'id' => 'edit_stock', 'type' => 'text',
        'data-ng-model' => 'stock'
    );
    
    $name = array (
        'name' => 'edit_name', 'id' => 'edit_name', 'data-ng-model' => 'name',
        'maxlength' => '255', 'size' => '39', 'type' => 'text'
    );

    $public_notes = array (
        'name' => 'edit_public_notes', 'id' => 'edit_public_notes',
        'rows' => '3', 'cols' => '35', 'data-ng-model' => 'public_notes'
    );
    
    $public_misc = array (
        'name' => 'edit_public_misc', 'id' => 'edit_public_misc', 'rows' => '3', 
        'cols' => '35', 'data-ng-model' => 'public_misc'
    );

    $private_notes = array (
        'name' => 'edit_private_notes', 'id' => 'edit_private_notes',
        'rows' => '3', 'cols' => '35', 'data-ng-model' => 'private_notes'
    );
    
    $private_misc = array (
        'name' => 'edit_private_misc', 'id' => 'edit_private_misc', 'rows' => '3', 
        'cols' => '35', 'data-ng-model' => 'private_misc'
    );
    
    $active_check = array (
        'name' => 'edit_active', 'id' => 'edit_active', 'type' => 'checkbox'
    );
    
    $purchased_from = array (
        'name' => 'edit_purchased_from', 'id' => 'edit_purchased_from',
        'size' => '39', 'type' => 'input', 'maxlength' => '255',
        'data-ng-model' => 'purchased_from'
    );

    $purchase_date = array (
        'name' => 'edit_purchase_date', 'id' => 'edit_purchase_date',
        'type' => 'text', 'data-ng-click' => 'dateClick()',
        'data-ng-model' => 'purchase_date'
    );
    
    $purchase_price = array (
        'name' => 'edit_purchase_price', 'id' => 'edit_purchase_price',
        'size' => '39', 'type' => 'text', 'maxlength' => '255',
        'data-ng-model' => 'purchase_price'
    );

    $sv_options = array (
        'craigslist' => 'Craigslist', 'ebay' => 'eBay',
        'tool_show' => 'tool show', 'other' => 'other'
    );
    
    $sold_via = array (
        'name' => 'edit_sold_by', 'id' => 'edit_sold_by',
        'options' => $sv_options, 'data-ng-model' => 'sold_via'
    );
    
    $date_sold = array (
        'name' => 'edit_date_sold', 'id' => 'edit_date_sold', 'type' => 'text',
        'placeholder' => '(optional)',
        'size' => '6'
    );
    
    $sale_price = array (
        'name' => 'edit_sale_price', 'id' => 'edit_sale_price',
        'size' => '39', 'type' => 'text', 'maxlength' => '255',
        'data-ng-model' => 'sale_price'
    );

    $sold_to_name = array (
        'name' => 'edit_sold_to_name', 'id' => 'edit_sold_to_name',
        'size' => '39', 'type' => 'text', 'maxlength' => '255',
        'placeholder' => 'Name', 'data-ng-model' => 'sold_to_name'
    );

    $sold_to_phone = array (
        'name' => 'edit_sold_to_phone', 'id' => 'edit_sold_to_phone',
        'size' => '39', 'type' => 'text', 'maxlength' => '255',
        'placeholder' => 'Phone', 'data-ng-model' => 'sold_to_phone'
    );

    $sold_to_email = array (
        'name' => 'edit_sold_to_email', 'id' => 'edit_sold_to_email',
        'size' => '39', 'type' => 'email', 'maxlength' => '255',
        'placeholder' => 'E-mail', 'data-ng-model' => 'sold_to_email'
    );

    $ebay = array(
        'maxlength' => '255', 'size' => '39', 'data-ng-model' => 'ebay_title',
        'name' => 'edit_ebay_title', 'id' => 'edit_ebay_title', 'type' => 'text'
    );
    
    $craigs_list = array(
        'maxlength' => '255', 'size' => '39', 'data-ng-model' => 'craigslist_title',
        'name' => 'edit_cl_title', 'id' => 'edit_cl_title', 'type' => 'text'
    );
    
    $buyers_premium = array(
        'name' => 'edit_buyers_premium', 'id' => 'edit_buyers_premium',
        'type' => 'text', 'value' => '0.00', 'data-ng-model' => 'buyers_premium'
    );
    
    $di_options = array( 'y' => 'Yes', 'n' => 'No' );
    
    $display_info = array(
        'name' => 'edit_display_info', 'id' => 'edit_display_info',
        'options' => $di_options, 'data-ng-model' => 'display_info'
    );
    
    $price_tag = array(
        'maxlength' => '255', 'size' => '39', 'data-ng-model' => 'price_tag',
        'name' => 'edit_price_tag', 'id' => 'edit_price_tag', 'type' => 'text'
    );
    
    $item_details = array(
        'maxlength' => '255', 'size' => '39', 'data-ng-model' => 'item_details',
        'name' => 'edit_item_details', 'id' => 'edit_item_details', 'type' => 'text'
    );
    
    $sold_date_options = array(
        '1' => 'January' , '2' => 'February', '3' => 'March', '4' => 'April',
        '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August',
        '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
    );
        
    $sold_date_month = array(
        'name' => 'edit_sold_date_month', 'id' => 'edit_sold_date_month',
        'options' => $sold_date_options, 'data-ng-model' => 'sold_date_month'
    );
    
    $purchase_month_options = $sold_date_options;
    
    $purchase_month = array(
        'name' => 'edit_purchase_month', 'id' => 'edit_purchase_month',
        'options' => $purchase_month_options, 'data-ng-model' => 'purchase_month'
    );
    
    $purchase_day = array(
        'name' => 'edit_purchase_day', 'id' => 'edit_purchase_day',
        'type' => 'text', 'data-ng-model' => 'purchase_day'
    );

    $purchase_year = array(
        'name' => 'edit_purchase_year', 'id' => 'purchase_year', 'class' => 'yearField',
        'type' => 'text', 'data-ng-model' => 'purchase_year', 'size' => '6'
    );
    
    $sold_date = array(
        'name' => 'edit_sold_date', 'id' => 'edit_sold_date',
        'type' => 'text', 'data-ng-model' => 'sold_date'
    );
    
    $sold_date_year = array(
        'name' => 'edit_sold_date_year', 'id' => 'edit_sold_date_year', 'class' => 'yearField',
        'type' => 'text', 'data-ng-model' => 'sold_year', 'size' => '6'
    );
    
    $commission = array(
        'maxlength' => '255', 'size' => '39', 'data-ng-model' => 'commission',
        'name' => 'edit_commission', 'id' => 'edit_commission', 'type' => 'text'
    );
    
    $shipping = array(
        'maxlength' => '255', 'size' => '39', 'data-ng-model' => 'shipping',
        'name' => 'edit_shipping', 'id' => 'edit_shipping', 'type' => 'text'
    );

    $other_costs = array(
        'maxlength' => '255', 'size' => '39', 'data-ng-model' => 'other_costs',
        'name' => 'edit_other_costs', 'id' => 'edit_other_costs', 'type' => 'text'
    );

    $profit_loss = array(
        'maxlength' => '255', 'size' => '39', 'data-ng-model' => 'profit_loss',
        'name' => 'edit_profit_loss', 'id' => 'edit_profit_loss', 'type' => 'text'
    );

    $profit_loss_ytd = array(
        'maxlength' => '255', 'size' => '39',
        'name' => 'edit_profit_loss_ytd', 'id' => 'edit_profit_loss_ytd', 'type' => 'text'
    );

    $action_needed = array (
        'name' => 'edit_action_needed', 'id' => 'edit_action_needed', 'rows' => '3',
        'cols' => '35', 'data-ng-model' => 'action_needed'
    );

    $notes_for_sean = array (
        'name' => 'edit_notes_for_sean', 'id' => 'edit_notes_for_sean', 'rows' => '3', 
        'cols' => '35', 'data-ng-model' => 'notes_for_sean'
    );
    
    $form_attribs = array(
        'name' => 'edit_form', 'id' => 'edit_form'
    );
