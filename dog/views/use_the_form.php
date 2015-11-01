<?php
    date_default_timezone_set('America/Chicago');
    $this->load->helper('form');
    
    require_once('data/use_the_form_fields.php');

    echo link_tag('stuff/css/use_the_form.css');
    echo link_tag('stuff/css/jquery.datepick.css');
    echo "<script src='" . base_url('stuff/js/jquery-1.11.3.min.js') . "'></script>";
    echo "<script src='" . base_url('stuff/js/jquery.blockUI.js') . "'></script>";
    echo "<script src='" . base_url('stuff/js/use_the_form.js') . "'></script>";
    echo "<script src='" . base_url('stuff/js/jquery.plugin.min.js') . "'></script>";
    echo "<script src='" . base_url('stuff/js/jquery.datepick.min.js') . "'></script>";
    $form_attributes = array(
        'id' => 'tool_entry_form',
    );
    echo "<div class='formContainer form'>";
    echo form_open_multipart('letme/add_a_tool', $form_attributes);
?>
<table>
    <tr><th></th><th></th></tr>
<!-- Stock -->
    <tr class="privateForm">
        <td class="formPrompt">Stock &num;:</td>
        <td><?= form_input($stock) ?></td>
    </tr>
<!--    Picture-->
    <tr class="privateForm">
        <td class="formPrompt">Picture &num;1 (choose file)<div id="files"></div></td>
        <td><?php echo form_upload($picture) . ' ' . form_button($addMorePix) ?></td>
    </tr>
<?php
    for ($y = 1; $y < 20; $y++) {
        echo '<tr class="privateForm morePix" id="more_pix'.$y.'">';
        echo '<td class="formPrompt">Picture &num;'.($y+1).' (choose file)</td>';
        echo '<td>' . form_upload($more_pictures[$y]);
        if ($y < 19) {
            echo form_button($addMorePix);
        }
        echo '</td>';
        echo '</tr>';
    }
?>
<!--    Name-->
    <tr class="privateForm">
        <td class="formPrompt">Name:</Td>
        <td><?= form_input($name) ?></td>
    </tr>
<!--    Online Classifieds -->
    <tr class="privateForm">
        <td class="formPrompt">Craigslist Title:</td>
        <td><?= form_input($craigs_list) ?></td>
    </tr>
    <tr class="privateForm">
        <td class="formPrompt">eBay Title:</td>
        <td><?= form_input($ebay) ?></td>
    </tr>
<!--    Purchase Date-->
    <tr class="privateForm">
        <td class="formPrompt">Purchase date:</td>
        <td><?= form_input($purchase_date) ?></td>
    </tr>
<!--    Purchase Price-->
    <tr class="privateForm">
        <td class="formPrompt">Purchase price:</td>
        <td>$<?= form_input($purchase_price) ?></td>
    </tr>
<!--    Buyer's premium -->
    <tr class="privateForm">
        <td class="formPrompt">Buyer's premium:</td>
        <td>$<?= form_input($buyers_premium) ?></td>
    </tr>
<!--    Purchased From-->
    <tr class="privateForm">
        <td class="formPrompt">Purchased from:</td>
        <td><?= form_input($purchased_from) ?></td>
    </tr>
<!--    (private) Notes-->
    <tr class="privateForm">
        <td class="formPrompt">Notes:</td>
        <td><?= form_textarea($public_notes) ?></td>
    </tr>
<!--    (private) Miscellaneous-->
    <tr class="privateForm">
        <td class="formPrompt">Miscellaneous:</td>
        <td><?= form_textarea($public_misc) ?></td>
    </tr>
<!--    Categories-->
    <tr class="privateForm">
        <td class="formPrompt">Category:</td>
        <td>
            <?php
                foreach($_SESSION['category'] as $cat_key => $cat_val) {
                    $data = array(
                        'name' => 'category_' . $cat_val['id'],
                        'id' => 'category_' . $cat_val['id'],
                        'value' => $cat_val['name']
                    );
                    echo form_checkbox($data) . $cat_val['name'] . "<br />";
                }
                $data = array(
                    'name' => 'add_category',
                    'id' => 'add_category',
                    'value' => 'Add New Category',
                    'onClick' => 'return addCategory();'
                );
                echo form_button($data,'Add New Category');

            ?>
        </td>
    </tr>
<!--    Display Info? -->
    <tr class="privateForm">
        <td class="formPrompt">Display info?</td>
        <td><?= form_dropdown($display_info) ?></td>
    </tr>
<!--    Active-->
    <tr class="privateForm">
        <td class="formPrompt">Active? (tool for sale?)</td>
        <td><?= form_input($active_check) ?></td>
    </tr>
<!--    Price Tag -->
    <tr class="privateForm">
        <td class="formPrompt">Price tag:</td>
        <td>$<?= form_input($price_tag) ?></td>
    </tr>
    <!-- Item Details -->
    <tr class="privateForm">
        <td class="formPrompt">Item details (size &num; weight):</td>
        <td><?= form_input($item_details) ?></td>
    </tr>
<!--    Sold Price-->
    <tr class="publicForm">
        <td class="formPrompt">Sold price:</td>
        <td>$<?= form_input($sale_price) ?></td>
    </tr>
<!--    Sold Date-->
    <tr class="publicForm">
        <td class="formPrompt">Sold date:</td>
        <td><?php echo form_dropdown($sold_date_month,$sold_date_options,date('n')) . form_input($date_sold) . ', ' . form_input($sold_date_year) ?></td>
    </tr>
    <!--    Sold To-->
    <tr class="publicForm">
        <td class="formPrompt">Sold to:</td>
        <td>
            <?= form_input($sold_to_name) ?><br />
            <?= form_input($sold_to_phone) ?><br />
            <?= form_input($sold_to_email) ?>
        </td>
    </tr>
    <!--    Sold Via-->
    <tr class="publicForm">
        <td class="formPrompt">Sold via:</td>
        <td><?= form_dropdown($sold_via) ?></td>
    </tr>
    <!-- Commission -->
    <tr class="publicForm">
        <td class="formPrompt">Commission paid (eBay):</td>
        <td>$<?= form_input($commission) ?></td>
    </tr>
    <!-- Shipping -->
    <tr class="publicForm">
        <td class="formPrompt">Shipping charge:</td>
        <td>$<?= form_input($shipping) ?></td>
    </tr>
    <!-- Other costs -->
    <tr class="publicForm">
        <td class="formPrompt">Other costs:</td>
        <td>$<?= form_input($other_costs) ?></td>
    </tr>
    <!--    Profit/Loss -- ADD TO DB -->
    <tr class="publicForm">
        <td class="formPrompt">Profit/loss:</td>
        <td>$<?= form_input($profit_loss) ?></td>
    </tr>
    <!--    Profit/Loss YTD -->
    <tr class="publicForm">
        <td class="formPrompt">Profit/loss YTD:</td>
        <td><span id="profit_loss_ytd"></span></td>
    </tr>
    <!--    Notes-->
    <tr class="publicForm">
        <td class="formPrompt">Notes:</td>
        <td><?= form_textarea($private_notes) ?></td>
    </tr>
    <!--    Miscellaneous-->
    <tr class="publicForm">
        <td class="formPrompt">Miscellaneous:</td>
        <td><?= form_textarea($private_misc) ?></td>
    </tr>
    <!--    Action needed -->
    <tr class="publicForm">
        <td class="formPrompt">Action needed:</td>
        <td><?= form_textarea($action_needed) ?></td>
    </tr>
    <!--    Notes for Sean -->
    <tr class="publicForm">
        <td class="formPrompt">Notes for Sean:</td>
        <td><?= form_textarea($notes_for_sean) ?></td>
    </tr>
<!--    Submit Button-->
    <tr class="pForm">
        <td class='formPrompt'></td>
        <td id='submit_button'>
            <?php echo form_button($submit_button) . ' ' . form_button($submit_add_button); ?>
            
        </td>
    </tr>
</table>

<?= form_close(); ?>

<div id="add_category_form">
    <form id="add_cat_form">
        <span class="form">Category to add: </span>
        <input type="text" id="category_to_add" /><br />
        &nbsp;<br />
        <input type="button" id="add_cat_cancel" value="cancel" onclick="$.unblockUI();" />
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <input type="button" id="add_cat_submit" value="Add this category" onclick="return submitCategory();" />
    </form>
</div>
<script>
    var pixCount = 0;
    $(document).ready(function() {
        $('#purchase_date').datepick({
            'defaultDate' : '-lw',
            'selectDefaultDate' : true,
            dateFormat : 'yyyy-mm-dd'
        });
        $('#purchase_price,#sale_price,#commission,#shipping,#other_costs').on('change', function() {
            $('#purchase_price,#sale_price').each(function () {
                $(this).val($.trim($(this).val()));
                if ($(this).val() === '') {
                    $(this).val('0');
                }
            });
            var purchase_price = parseFloat($('#purchase_price').val());
            var sold_price = parseFloat($('#sale_price').val());
            var commission = parseFloat($('#commission').val());
            var shipping = parseFloat($('#shipping').val());
            var other_costs = parseFloat($('#other_costs').val());
            
            sold_price = isNaN(sold_price) ? parseFloat(0) : parseFloat(sold_price).toFixed(2);
            commission = isNaN(commission) ? parseFloat(0) : parseFloat(commission).toFixed(2);
            purchase_price = isNaN(purchase_price) ? parseFloat(0) : parseFloat(purchase_price).toFixed(2);
            shipping = isNaN(shipping) ? parseFloat(0) : parseFloat(shipping).toFixed(2);
            other_costs = isNaN(other_costs) ? parseFloat(0) : parseFloat(other_costs).toFixed(2);
            
            var profitLoss = sold_price - (parseFloat(purchase_price) + parseFloat(commission) + parseFloat(shipping) + parseFloat(other_costs));
            $('#profit_loss').val(profitLoss);
        });
        
        var key_event = navigator.userAgent.indexOf('Mozilla') > 1 ? 'keypress' : 'keydown';
        $('#category_to_add').on(key_event, function(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                return submitCategory();
            }
        });
        
    });
</script>