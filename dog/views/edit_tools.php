<script src="/stuff/js/jquery-1.11.3.min.js"></script>
<script src="/stuff/js/angular.min.js"></script>
<script src="/stuff/js/editFormNg.js"></script>
<script src="/stuff/js/bootstrap.min.js"></script>
<script src="/stuff/js/jquery.plugin.min.js"></script>
<script src="/stuff/js/jquery.datepick.min.js"></script>

<div data-ng-app="editForm" data-ng-controller="formEdit">
<?php
    $this->load->helper('form');

    echo link_tag('stuff/css/edit_tools.css');
    echo link_tag('stuff/css/bootstrap.min.css');
    echo link_tag('stuff/css/bootstrap-theme.min.css');

    foreach($tools as $tool) {
        echo '<div class="toolRow" id="tool' . $tool->id .'">';
        echo '<div class="buttonColumn">';
        echo '<div class="button editButton commonButton" data-ng-click="populateAngular(' . html_escape(json_encode((array) $tool)) . ')" id="editTool' . $tool->id . '" data-toggle="modal" data-target="#edit_a_tool">Edit</div>';
        echo '<div id="#deleteTool" class="button deleteButton commonButton" data-ng-click="lastToolClicked(' . $tool->id . ')" data-toggle="modal" data-target="#edit_tool_warning">Delete</div>';
        
        $activeTool = $tool->active ? $tool->active : 0;
        if ($tool->active) {
            echo '<div class="button commonButton activeTool activity" data-ng-click="toggleActive(' . $tool->id . ')">Deactivate</div>';
        } else {
            echo '<div class="button commonButton inactiveTool activity" data-ng-click="toggleActive(' . $tool->id . ')">Activate</div>';
        }
        echo '</div>';
        echo '<div class="toolName">' . $tool->name . '</div>';
        echo '<div class="publicNotes">' . $tool->public_notes . '</div>';
        echo '</div>';
    }
    include('data/edit_form_fields.php');
    include('data/edit_a_tool.php');
        
    echo '</div>';
    include('data/edit_tool_delete_warning.php');
