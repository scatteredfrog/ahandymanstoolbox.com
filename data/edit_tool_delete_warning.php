<div class="modal fade" id="edit_tool_warning" tabindex="-1" role="dialog" aria-labelledby="deleteTool">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">WARNING: Before you delete...</h4>
            </div>
            <div class="modal-body">
                Please be aware that deleting a tool will completely remove it from the database. 
                The tool will not be marked as "inactive" or archived; it will be removed. This 
                action is not recoverable. Are you sure you want to delete the tool?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-ng-click="deleteTool()">Yes, I WANT TO DELETE THE TOOL</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">No, thanks</button>
            </div>
        </div>
    </div>
</div>