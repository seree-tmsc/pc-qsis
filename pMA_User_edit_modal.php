<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <!--<div class="modal-content" style='background-color: rgb(178, 231, 247);'>-->
        <div class="modal-content">
            <div class="modal-header" style='background-color: rgb(8, 188, 243);color: navy;'>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Mode :</h4>
            </div>
            
            <form class="form-horizontal" role="form" id='edit-form' method='post'>
                <div class="modal-body" id="edit_detail">                
                    <input type="hidden" id="parameditempCode" name="parameditempCode">
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Code:</label>
                            <input type="text" id="editempCode" class='form-control' disabled>
                        </div>
                        <div class="col-lg-9">
                            <label>e-Mail:</label>
                            <input type="email" id="editeMail" class='form-control' disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>User Type:</label>
                            <select class="form-control" id="edituserType" name="edituserType">
                                <option value="U">User</option>
                                <option value="P">Power User</option>
                                <option value="A">Administrator</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>Created Date:</label>
                            <input type="date" id="editcreatedDate" name ='editcreatedDate' class='form-control' value="<?php echo date('Y-m-d'); ?>" disabled>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" id='insert' class="btn btn-success">Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                    
                </div>
            </form>            
        </div>
    </div>
</div>