<?php
    $usetheform = anchor('letme/usetheform','Add a tool');
    $seethetools = anchor('letme/seethetools', 'See what tools I\'ve entered');
    $editthetools = anchor('letme/edit_tools', 'Edit tools');
    $ul_list = array($usetheform, $seethetools, $editthetools);
?>
LET ME:<br />
<?= ul($ul_list)    ?>