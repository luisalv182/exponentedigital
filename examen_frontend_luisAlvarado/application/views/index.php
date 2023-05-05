
        <br />
        <h3 align="center">USO DE CRUD CON API</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">CRUD REST API in Codeigniter</h3>
                    </div>
                    <div class="col-md-6" align="right">
                        <button type="button" id="add_button" class="btn btn-info btn-xs">Add</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <span id="success_message"></span>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Usuario</h4>
                </div>
                <div class="modal-body">
                    <label>Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <span id="name_error" class="text-danger"></span>
                    <br />
                    <label>Correo Electronico</label>
                    <input type="text" name="email" id="email" class="form-control" />
                    <span id="email_error" class="text-danger"></span>
                    <br />
                    <label>Teléfono</label>
                    <input type="phone" name="telefono" id="telefono" class="form-control" />
                    <span id="telefono_error" class="text-danger"></span>
                    <br />
                    <label>Dirección</label>
                    <input type="phone" name="Direccion" id="Direccion" class="form-control" />
                    <span id="Direccion_error" class="text-danger"></span>
                    <br />
                    <label>Fecha de Nacimiento</label>
                    <input type="date" name="birth" id="birth" class="form-control" />
                    <span id="birth_error" class="text-danger"></span>
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_user" id="id_user" />
                    <input type="hidden" name="data_action" id="data_action" value="Insert" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
