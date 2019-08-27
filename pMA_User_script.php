
<script type="text/javascript">
    $(document).ready(function(){
        $('.btnClose').click(function(){            
            $('#insert-form')[0].reset();
        })

        /* attach a submit handler to the form */
        $("#insert-form").submit(function(event) {
            /* stop form from submitting normally */
            event.preventDefault();            
            
            console.log( $( this ).serialize() );
            $.ajax({
                url: "pMA_User_insert.php",
                method: "post",
                data: $('#insert-form').serialize(),
                beforeSend:function(){
                    $('#insert').val('Insert...')
                },
                success: function(data){
                    if (data == '') {
                        $('#insert-form')[0].reset();
                        $('#insert_modal').modal('hide');
                        location.reload();
                    }
                    else
                    {
                        alert(data);
                        location.reload();
                    }
                }
            });   
        });

        $("#edit-form").submit(function(event) {
            /* stop form from submitting normally */
            event.preventDefault();            
            
            console.log( $( this ).serialize() );
            $.ajax({
                url: "pMA_User_edit.php",
                method: "post",
                data: $('#edit-form').serialize(),
                beforeSend:function(){
                    $('#edit').val('Edit...')
                },
                success: function(data){
                    if (data == '') {
                        $('#edit-form')[0].reset();
                        $('#edit_modal').modal('hide');
                        location.reload();
                    }
                    else
                    {
                        alert(data);
                        location.reload();
                    }
                }
            });   
        });

        $('.edit_data').click(function(){            
            var code = $(this).attr("emp_code");            
            $.ajax({
                url: "pMA_User_fetch.php",
                method: "post",
                data: {id: code},
                dataType: "json",
                success: function(data)
                {
                    $('#parameditempCode').val(data.emp_code);
                    $('#editempCode').val(data.emp_code);
                    $('#editeMail').val(data.user_email);
                    $('#edituserType').val(data.user_type);
                    $('#editcreatedDate').val(data.user_create_date);
                    $('#edit_modal').modal('show');
                }
            });            
        });

        $('.view_data').click(function(){            
            var code = $(this).attr("emp_code");            
            $.ajax({
                url: "pMA_User_view.php",
                method: "post",
                data: {id: code},                
                success: function(data){
                    $('#view_detail').html(data);
                    $('#view_modal').modal('show');
                }
            });            
        });

        $('.delete_data').click(function(){            
            var code = $(this).attr("emp_code");            
            var lConfirm = confirm("Do you want to delete this record?");
            if (lConfirm)
            {                
                $.ajax({
                    url: "pMA_User_delete.php",
                    method: "post",
                    data: {id: code},
                    success: function(data){
                        location.reload();
                    }
                });  
            } 
        });
    });

</script>