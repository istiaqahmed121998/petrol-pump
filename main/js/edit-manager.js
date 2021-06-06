$(function () {

    $(document).on( "click", '.management-id',function() {
        //get id;
        var id = $(this).data('id');
        $('#manager_id').val(id);

        $.ajax({
            url: 'management/getmanager.php',
            dataType: 'json',
            contentType: 'application/json',
            success: function(data) {
            
                $.each(data.data, function(k, v) {
                    if(id==v.id){
                        $('#editName').val(v.name);
                        $('#editPhone').val(v.phone);
                        $('#editShift').val(v.shift);
                        $('#modal-title').html('Edit info for '+v.name);
                        return false;
                    }
                });

            }
        });
    });
    $('#edit_manager').click(function (e) {
        e.preventDefault();
        $.ajax({
            url:'management/edit_manager_info.php',
            type:'POST',
            data:{
                'manager_name':$.trim($('#editName').val()),
                'manager_phone':$.trim($('#editPhone').val()),
                'shift':$.trim($('#editShift').val()),
                'id':$.trim($('#manager_id').val()),
            },
            success: function(result) { //we got the response
              location.reload();
            },
            error: function(jqxhr, status, exception) {
              alert('Exception:', exception);
            }
        });
    });
    $('#add_manager').click(function () {
        if($('#name_add').val()==='' && $('#shift_add').val()==='' && $('#phone_add').val()===''){
            $.toast({
                heading: 'Missing Input',
                text: 'Input Missing',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 4000,

            });
            return false;
        }
        else{
            $.ajax({
                url: 'management/manager_info.php',
                type: 'post',
                data:{
                    'name':$('#name_add').val(),
                    'shift':$('#shift_add').val(),
                    'phone':$('#phone_add').val()

                }
            });
            location.reload();
        }
    });

    
});