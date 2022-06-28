<script type="text/javascript">
    $(document).ready(function() {

        $('#AddStaff').click(function(e) {
            e.preventDefault();
            $.ajax({
                method: "post",
                url: "p_add_staff.php",
                data: $("#CreateStaff").serialize(),
                dataType: "text",
                success: function(response) {
                    $("#msg").text(response);
                }
            })

        })
    });

    $('#CreateStaff').submit(function(event){
        event.preventDefault();
        var $form = $(this);
        $.ajax({
            method: 'post',
            url: $form.attr('action'),
            data: $form.serialize(),
            dataType: 'text',
            success: function(response) {
                if (response === 'Yes') {
                    $("#msg").text("Profile created.");

                }
            }
        });
    });
</script>
