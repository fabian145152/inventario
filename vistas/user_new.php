<div class="container is-fluid mb-6">
    <h1 class="litle">Usuarios</h1>
    <h2 class="subtitle">Nuevo Usuario</h2>
</div>
<div class="container pb-6 pt-6">
    <div class="form-rest mb-6 mt-6"></div>

    <form action="./php/usuario_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">
        <div class="column">
            <div class="column">
                <div class="control">
                    <label>Nombres</label>
                    <input class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZñÑ]{3,40}" maxlength="40" required>
                </div>
            </div>
            <div class="column">
                <div class="column">
                    <div class="control">
                        <label>Apellido</label>
                        <input class="input" type="text" name="usuario_apellido" pattern="[a-zA-ZñÑ]{3,40}" maxlength="40" required>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="column">
                    <div class="control">
                        <label>Usuario</label>
                        <input class="input" type="text" name="usuario_usuario" pattern="[a-zA-ZñÑ]{3,40}" maxlength="40" required>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="column">
                    <div class="control">
                        <label>Email</label>
                        <input class="input" type="email" name="usuario_email" maxlength="40">
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="column">
                    <div class="control">
                        <label>Clave</label>
                        <input class="input" type="password" name="usuario_password_1" pattern="[a-zA-Z]{3,40}" maxlength="40">
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="column">
                    <div class="control">
                        <label>Repetir Clave</label>
                        <input class="input" type="password" name="usuario_password_2" pattern="[a-zA-Z]{3,40}" maxlength="40">
                    </div>
                </div>
            </div>

            <p class="has-text-centrered">
                <button type="submit" class="button is-info is-rounded">Guardar</button>
            </p>

        </div>
    </form>

</div>