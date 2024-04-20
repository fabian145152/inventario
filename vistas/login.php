


<h1>Revisar el ajax.js </h1>
<h2>Voy por cuardar datos cap1</h2>
<div class="main-container">
    <form class="box login" action="./php/usuario_guardar.php" method="POST" autocomplete="off">
        <h5 class="title is-5 has-text-centred is-uppercase">Sistema de inventario</h5>
        <div class="label">Usuario</label>
            <div class="control">
                <input class="input" type="text" name="login_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
            </div>
        </div>
        <div class="label">Clave</label>
            <div class="control">
                <input class="input" type="password" name="login_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="20" required>
            </div>
        </div>
        <p class="has-text-centered mb-4 mt3">
            <button type="submit" class="button is-info is-rounded">Iniciar session</button>
        </p>
    </form>
</div>