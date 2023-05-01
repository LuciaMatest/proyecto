<?php if (isset($_REQUEST['editarPerfil'])) : ?>
    <div class="d-flex justify-content-center align-items-center mb-2">
        <button type="submit" class="btn btn-lg btn-block btn-primary" id="guardarCambios" name="guardarCambios">Guardar cambios</button>
        <button type="submit" class="btn btn-lg btn-block btn-primary ms-1" onclick="location.reload()">Cancelar</button>
    </div>
<?php else : ?>
    <div class="d-flex justify-content-center align-items-center mb-2">
        <button type="submit" class="btn btn-lg btn-block btn-primary" name="editarPerfil" id="editarPerfil" onclick="editarPerfil()">Editar perfíl</button>
    </div>
<?php endif; ?>

<input type="text" class="form-control campo-perfil" name="nombre" value="<? if ($_SESSION['accion'] == 'editar') {
                                                                                echo $usuario->nombre_usuario;
                                                                            } ?>" readonly>
<input type="text" id="nombre" class="dato text-muted mb-0" name="nombre" value="<?php echo $_SESSION['nombre_usuario']; ?>" readonly>


<input type="number" class="form-control campo-perfil" name="telefono" value="<? if ($_SESSION['accion'] == 'editar') {
                                                                                    echo $usuario->telefono_usuario;
                                                                                } ?>" readonly>
<input type="text" class="dato text-muted mb-0" name="telefono" value="<?php echo $_SESSION['telefono_usuario']; ?>" readonly>



<input type="email" class="form-control campo-perfil" name="email" value="<? if ($_SESSION['accion'] == 'editar') {
                                                                                echo $usuario->email_usuario;
                                                                            } ?>" readonly>
<input type="email" class="dato text-muted mb-0" name="email" value="<?php echo $_SESSION['email_usuario']; ?>" readonly>



<input type="<? if ($_SESSION['accion'] == 'editar') {
                    echo 'text';
                } else {
                    echo 'password';
                } ?>" class="form-control campo-perfil" name="contraseña" value="<? if ($_SESSION['accion'] == 'editar') {
                                                                                                                echo $usuario->contrasena_usuario;
                                                                                                            } ?>" readonly>
<input type="password" class="dato text-muted mb-0" name="contraseña" value="<?php echo $usuario->contrasena_usuario; ?>" readonly>


document.getElementById('editarPerfil').addEventListener('click', function() {
  document.getElementById('nombre').removeAttribute('readonly');
  this.style.display = 'none';
  document.getElementById('guardarCambios').style.display = 'block';
  document.getElementById('cancelar').style.display = 'block';
});

document.getElementById('guardarCambios').addEventListener('click', function() {
  document.getElementById('nombre').setAttribute('readonly', true);
  this.style.display = 'none';
  document.getElementById('cancelar').style.display = 'none';
  document.getElementById('editarPerfil').style.display = 'block';
});

document.getElementById('cancelar').addEventListener('click', function() {
  document.getElementById('nombre').setAttribute('readonly', true);
  this.style.display = 'none';
  document.getElementById('guardarCambios').style.display = 'none';
  document.getElementById('editarPerfil').style.display = 'block';
});




//Cuando pulsamos Editar perfil, la información del usuario se vuelve editable.
const campos = document.querySelectorAll('.campo-perfil');
const btnEditar = document.querySelector('#editarPerfil');

function editarPerfil() {
campos.forEach(campo => {
campo.readOnly = !campo.readOnly;
});
btnEditar.style.display = btnEditar.style.display === 'none' ? 'block' : 'none';
}