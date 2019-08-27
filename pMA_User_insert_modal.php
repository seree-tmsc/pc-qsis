<div class="modal fade" id="insert_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style='background-color: SeaGreen; color: Lime;'>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Insert Mode :</h4>
            </div>
            
            <form class="form-horizontal" role="form" id='insert-form' method='post' >
                <div class="modal-body" id="insert_detail">                    
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Employee Code:</label>
                            <input type="text" name ="empCode" class='form-control' required>
                        </div>
                        <div class="col-lg-9">
                            <label>e-Mail:</label>
                            <input type="email" name ='eMail' class='form-control' required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>User Type:</label>                                        
                            <select class="form-control" name="userType" required>                                
                                <option value="U">User</option>
                                <option value="P">Power User</option>
                                <option value="A">Administrator</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Created Date:</label>
                            <input type="date" class='form-control' value="<?php echo date('Y-m-d'); ?>" disabled>
                        </div>                        
                        <input type="hidden" name ='createdDate' value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" id='insert' class="btn btn-success">Insert</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>            
        </div>
    </div>
</div>