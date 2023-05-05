
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    base = "<?= urlAPI; ?>";

    function fetch_data()
    {
        $.ajax({
            url: base + "/registros",
            method:"GET",
            data:{},
            success:function(data)
            {
                html = '';
                Object.values(data.data).forEach(val => {
                    html += '<tr>'
                    html += '<td>'+ val.id_user+'</td>'
                    html += '<td>'+ val.Name+'</td>'
                    html += '<td>'+ val.Email+'</td>'
                    html += '<td>'+ val.telefono+'</td>'
                    html += '<td>'+ val.Direccion+'</td>'
                    html += '<td>'+ val.fecha_naci+'</td>'
                    html += '<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id_user="'+val.id_user+'">Edit</button></td>'
                    html += '<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id_user="'+val.id_user+'">Eliminar</button></td>'
                    html += '</tr>'
                })
                $('tbody').html(html);
            }
        });
    }

    fetch_data();

    $('#add_button').click(function(){
        $('#user_form')[0].reset();
        $('.modal-title').text("Add User");
        $('#action').val('Add');
        $('#data_action').val("Insert");
        $('#userModal').modal('show');
    });


    $(document).on('click', '.edit', function(){
        var id_user = $(this).attr('id_user');
        $.ajax({
            url: base + "/cliente",
            method:"POST",
            data:{id_user:id_user,},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                Object.values(data.data).forEach(val => {
                    $('#name').val(val.Name);
                    $('#email').val(val.Email);
                    $('#telefono').val(val.telefono);
                    $('#Direccion').val(val.Direccion);
                    $('#birth').val(val.fecha_naci);
                    $('#id_user').val(val.id_user);
                })
                $('.modal-title').text('Edit User');
                $('#action').val('Edit');
                $('#data_action').val('Edit');
            }
        })
    });

    $(document).on('submit', '#user_form', function(event){
        event.preventDefault();
        $.ajax({
            url: base + "/action",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
                if(data.error == false)
                {
                    $('#user_form')[0].reset();
                    $('#userModal').modal('hide');
                    fetch_data();
                    if($('#data_action').val() == "Insert")
                    {
                        $('#success_message').html('<div class="alert alert-success">Creación realizada con exito</div>');
                    }
                }
            }
        })
    });

    

    $(document).on('click', '.delete', function(){
        var id_user = $(this).attr('id_user');
        if(confirm("Esta seguro de que desa eliminar el usuario ?"))
        {
            $.ajax({
                url: base + "/action",
                method:"POST",
                data:{id_user:id_user, data_action:'Delete'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.error == false)
                    {
                        $('#success_message').html('<div class="alert alert-success">Usuario Eliminado Correctamente</div>');
                        fetch_data();
                    }
                }
            })
        }
    });
    
});
</script>