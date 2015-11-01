<?php
    $usetheform = anchor('letme/usetheform','Add a tool');
    $seethetools = anchor('letme/seethetools', 'See what tools I\'ve entered');
    $ul_list = array($usetheform, $seethetools);
?>
LET ME:<br />
<?= ul($ul_list)    ?>