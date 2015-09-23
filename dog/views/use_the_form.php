<?php
    $this->load->helper('form');
    
    require_once('data/use_the_form_fields.php');
    
    $this->db->select('id,category');
    $query = $this->db->get('lf_tool_form_category');
    if (isset($_SESSION['category'])) {
        unset($_SESSION['category']);
    }
    $x = 0;
    foreach ($query->result() as $row) {
        $_SESSION['category'][$x]['name'] = $row->category;
        $_SESSION['category'][$x]['id'] = $row->id;
        $x++;
    }

    $x=0;
    echo link_tag('stuff/css/use_the_form.css');
    echo "<script src='" . base_url('stuff/js/jquery-1.11.3.min.js') . "'></script>";
    echo "<script src='" . base_url('stuff/js/jquery.blockUI.js') . "'></script>";
    echo "<script src='" . base_url('stuff/js/use_the_form.js') . "'></script>";
    echo "<script src='" . base_url('stuff/js/ajaxfileupload.js') . "'></script>";
    $form_attributes = array(
        'id' => 'tool_entry_form',
    );
    echo "<div class='formContainer form'>";
    echo form_open_multipart('letme/uploadapicture', $form_attributes);
?>
<table>
    <tr><th></th><th></th></tr>
<!--    Picture-->
    <tr class="publicForm">
        <td class="formPrompt">Picture:<br /><div id="files"></div></td>
        <td><?= form_upload($picture) ?></td>
    </tr>
<!--    Thumbnail-->
    <tr class="publicForm">
        <td class="formPrompt">Thumbnail:</td>
        <td><?= form_upload($thumbnail) ?></td>
    </tr>
<!--    Name-->
    <tr class="publicForm">
        <td class="formPrompt">Name:</Td>
        <td><?= form_input($name) ?></td>
    </tr>
<!--    Categories-->
    <tr class="publicForm">
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
<!--    Purchase price-->
    <tr class="publicForm">
        <td class="formPrompt">Purchase price:</td>
        <td><?= form_input($purchase_price) ?></td>
    </tr>
<!--    Notes-->
    <tr class="publicForm">
        <td class="formPrompt">Notes:</td>
        <td><?= form_textarea($public_notes) ?></td>
    </tr>
<!--    Miscellaneous-->
    <tr class="publicForm">
        <td class="formPrompt">Miscellaneous:</td>
        <td><?= form_textarea($public_misc) ?></td>
    </tr>
<!--    Active-->
    <tr class="privateForm">
        <td class="formPrompt">Active?</td>
        <td><?= form_input($active_check) ?></td>
    </tr>
<!--    Purchased From-->
    <tr class="privateForm">
        <td class="formPrompt">Purchased from:</td>
        <td><?= form_input($purchased_from) ?></td>
    </tr>
<!--    Purchase Date-->
    <tr class="privateForm">
        <td class="formPrompt">Purchase date:</td>
        <td><?= form_input($purchase_date) ?></td>
    </tr>
<!--    Purchase Price-->
    <tr class="privateForm">
        <td class="formPrompt">Purchase price:</td>
        <td><?= form_input($private_purchase_price) ?></td>
    </tr>
<!--    Purchase Location-->
    <tr class="privateForm">
        <td class="formPrompt">Purchase location:</td>
        <td><?= form_input($purchase_location) ?></td>
    </tr>
<!--    Sold Via-->
    <tr class="privateForm">
        <td class="formPrompt">Sold via:</td>
        <td><?= form_dropdown($sold_via) ?></td>
    </tr>
<!--    Date Sold-->
    <tr class="privateForm">
        <td class="formPrompt">Date sold:</td>
        <td><?= form_input($date_sold) ?></td>
    </tr>
<!--    Sale Price-->
    <tr class="privateForm">
        <td class="formPrompt">Sale price:</td>
        <td><?= form_input($sale_price) ?></td>
    </tr>
<!--    Sold To-->
    <tr class="privateForm">
        <td class="formPrompt">Sold to:</td>
        <td>
            <?= form_input($sold_to_name) ?><br />
            <?= form_input($sold_to_phone) ?><br />
            <?= form_input($sold_to_email) ?>
        </td>
    </tr>
<!--    Profit/Loss-->
    <tr class="privateForm">
        <td class="formPrompt">Profit/loss:</td>
        <td><span id="profit_loss"></span></td>
    </tr>
<!--    (private) Notes-->
    <tr class="privateForm">
        <td class="formPrompt">Notes:</td>
        <td><?= form_textarea($private_notes) ?></td>
    </tr>
<!--    (private) Miscellaneous-->
    <tr class="privateForm">
        <td class="formPrompt">Miscellaneous:</td>
        <td><?= form_textarea($private_misc) ?></td>
    </tr>
<!--    Submit Button-->
    <tr class="privateForm">
        <td class='formPrompt'></td>
        <td id='submit_button'>
            <?= form_button($submit_button) ?>
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
    $(document).ready(function() {
        $('#private_purchase_price,#sale_price').on('change', function() {
            $('#private_purchase_price,#sale_price').each(function () {
                $(this).val($.trim($(this).val()));
                if ($(this).val() === '') {
                    $(this).val('0');
                }
            });
            var purchase_price = $('#private_purchase_price').val().indexOf('$') === 0 ? parseFloat($('#private_purchase_price').val().substr(1)) : parseFloat($('#private_purchase_price').val());
            if (isNaN(purchase_price)) {
                alert("Please enter a valid number for purchase price.");
            }
            var sale_price = $('#sale_price').val().indexOf('$') === 0 ? parseFloat($('#sale_price').val().substr(1)) : parseFloat($('#sale_price').val());
            if (isNaN(sale_price)) {
                alert("Please enter a valid number for sale price." + sale_price);
            }
            $('#profit_loss').html('$' + (sale_price - purchase_price));
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