<div class="modal fade" id="edit_a_tool" tabindex="-1" role="dialog" aria-labelledby="toolEdit">
    <div class="modal-dialog">
        <div class="modal-content">
<?php
    $b = '<br />';
    $field = '<div class="row privateRow"><div class="field col-xs-4">';
    $dfield = '</div><div class="fieldData col-xs-8">';
    $efield = '</div></div>';
    $puField = '<div class="row publicRow"><div class="field col-xs-4">';
    $pvField = '<div class="row privateRow" data-ng-show="showPrivate"><div class="field col-xs-4">';
    
    $publicFields[] = array('fieldName' => 'craigslist title: ', 'fieldData' => form_input($craigs_list));
    $publicFields[] = array('fieldName' => 'eBay title: ', 'fieldData' => form_input($ebay));
    $publicFields[] = array('fieldName' => 'Purchase date:',
        'fieldData' => form_dropdown($purchase_month) . form_input($purchase_day) . ',' . form_input($purchase_year)
    );
    $publicFields[] = array('fieldName' => 'Purchase price: ', 'fieldData' => '$' . form_input($purchase_price));
    $publicFields[] = array('fieldName' => 'Buyer\'s premium: ', 'fieldData' => form_input($buyers_premium));
    $publicFields[] = array('fieldName' => 'Purchased from: ', 'fieldData' => form_input($purchased_from));
    $publicFields[] = array('fieldName' => 'Display info?', 'fieldData' => form_dropdown($display_info));
    $publicFields[] = array('fieldName' => 'Price tag: ', 'fieldData' => form_input($price_tag));
    $publicFields[] = array('fieldName' => 'Item details: ', 'fieldData' => form_input($item_details));
    $publicFields[] = array('fieldName' => 'Public notes: ', 'fieldData' => form_textarea($public_notes));
    $publicFields[] = array('fieldName' => 'Public misc: ', 'fieldData' => form_textarea($public_misc));

    $privateFields[] = array('fieldName' => 'Sold price:', 'fieldData' => '$' . form_input($sale_price));
    $privateFields[] = array('fieldName' => 'Sold date:',
        'fieldData' => form_dropdown($sold_date_month) . form_input($sold_date) . ',' . form_input($sold_date_year)
    );
    $privateFields[] = array('fieldName' => 'Sold to:',
        'fieldData' => form_input($sold_to_name) . $b . form_input($sold_to_phone) . $b . form_input($sold_to_email)
    );
    $privateFields[] = array('fieldName' => 'Sold via:', 'fieldData' => form_dropdown($sold_via));
    $privateFields[] = array('fieldName' => 'Commission:', 'fieldData' => '$' . form_input($commission));
    $privateFields[] = array('fieldName' => 'Shipping:', 'fieldData' => '$' . form_input($shipping));
    $privateFields[] = array('fieldName' => 'Other costs:', 'fieldData' => '$' . form_input($other_costs));
    $privateFields[] = array('fieldName' => 'Profit/loss:', 'fieldData' => '$' . form_input($profit_loss));
    $privateFields[] = array('fieldName' => 'Private notes: ', 'fieldData' => form_textarea($private_notes));
    $privateFields[] = array('fieldName' => 'Private misc: ', 'fieldData' => form_textarea($private_misc));
    $privateFields[] = array('fieldName' => 'Action needed: ', 'fieldData' => form_textarea($action_needed));
    $privateFields[] = array('fieldName' => 'Notes for Sean: ', 'fieldData' => form_textarea($notes_for_sean));

    echo '<div class="container-fluid">';
    echo form_open('post',$form_attribs);
    echo form_input($id);
    echo $field . 'Name:' . $dfield . form_input($name) . $efield;
    echo $field . 'Stock:' . $dfield . form_input($stock) . $efield;
    displayButtonRow($field, $dfield, $efield);
    echo '<div class="publicData" data-ng-show="showPublic">'; // begin public
    echo $puField . 'Categories: ' . $dfield;
    foreach ($_SESSION['category'] as $key => $val) {
        echo '<input type="checkbox" id="cat' . $_SESSION['category'][$key]['id'];
        echo '" data-ng-checked=isCatChecked(' . $_SESSION['category'][$key]['id'] . ') /> ';
        echo $_SESSION['category'][$key]['name'] . '<br />';
    }
    echo $efield;
    foreach($publicFields as $key) {
        echo $puField . $key['fieldName'] . $dfield . $key['fieldData'] . $efield;
    }
    echo '</div>'; // end public
    echo '<div class="privateData">'; // begin private
    
    foreach($privateFields as $key) {
        echo $pvField . $key['fieldName'] . $dfield . $key['fieldData'] . $efield;
    }
    echo '</div>'; //end private
    ?>
            <span data-ng-show="showPrivate||showPublic"><?php
    displayButtonRow(true);
    ?></span>
            <?php
    echo form_close();
    echo '</div>';
    
    function displayButtonRow($isBottom) {
        echo '<div class="row privateRow';
        if ($isBottom) {
            echo ' isBottom';
        }
        echo '">';
        echo '<div class="commonButton showPubButton" data-ng-click="toggleButton(\'public\')">Toggle Public</div>';
        echo '<div class="commonButton showPrivButton" data-ng-click="toggleButton(\'private\')">Toggle Private</div>';
        echo '<div class="commonButton saveButton" data-ng-click="updateTool()">Save</div>';
        echo '<div class="commonButton closeButton" data-ng-click="closeTool()">Close (no save)</div>';
        echo '</div>';
    }
?>
        </div>
    </div>
</div>