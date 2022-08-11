<div id="conteudo" class="container align-self-center align-content-center text-center" style="margin-top: 200px;padding-top: 100px;height: 50vh;margin-bottom: 200px; ">
    <div class="card">
        <div class="card-body">
            <h1>Login</h1>
            <form action="./segurança/login.php" method="POST">
                <div class="form-group">
                    <label>Usuario:</label>
                    <input type="text" name="nome">
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="senha">
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <input type="submit" class="btn btn-primary" name="enviar"/>
            </form>
        </div>
    </div>
</div>