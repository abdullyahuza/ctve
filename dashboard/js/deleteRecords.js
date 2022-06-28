$(document).ready(function(){
    $('.delete').click(function(e){
       e.preventDefault();
       var id = $(this).attr('id');
       var parent = $(this).parent('tr');
       bootbox.dialog({
            message: "Are you sure you want to Delete ?",
            title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                      label: "No",
                      className: "btn-success",
                      callback: function() {
                      $('.bootbox').modal('hide');
                      dataTable.ajax.reload();
                  }
                },
                danger: {
                  label: "Delete!",
                  className: "btn-danger",
                  callback: function() {
                   $.ajax({
                        type: 'POST',
                        url: 'delete_data.php',
                        data: 'id='+id
                   })
                   .done(function(response){
                        parent.fadeOut('slow');
                        bootbox.alert(response);
                   })
                   .fail(function(){
                        bootbox.alert('Error....');
                   })
                  }
                }
            }
       });
    });
 });
