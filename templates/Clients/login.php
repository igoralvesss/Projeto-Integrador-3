<style>
    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,
    body {
        background-image: url("webroot/img/paralax1.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }

    .container {
        height: 100%;
        align-content: center;
    }

    .card {
        height: 370px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(0, 0, 0, 0.5) !important;
    }

    .social_icon span {
        font-size: 60px;
        margin-left: 10px;
        color: #FFC312;
    }

    .social_icon span:hover {
        color: white;
        cursor: pointer;
    }

    .card-header h3 {
        color: white;
    }

    .social_icon {
        position: absolute;
        right: 20px;
        top: -45px;
    }

    .input-group-prepend span {
        width: 50px;
        background-color: #FFC312;
        color: black;
        border: 0 !important;
    }

    input:focus {
        outline: 0 0 0 0 !important;
        box-shadow: 0 0 0 0 !important;

    }

    .remember {
        color: white;
    }

    .remember input {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
    }

    .login_btn {
        color: black;
        background-color: #FFC312;
        width: 100px;
    }

    .login_btn:hover {
        color: black;
        background-color: white;
        font-weight: bold;
    }

    .links {
        color: white;
    }

    .links a {
        margin-left: 4px;
    }
</style>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card border border-warning">
                <div class="card-header">
                    <h3>Login</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <img class="mt-n2" src="webroot/img/LogoHamburgueria.svg" height="100px" alt="">
                    </div>
                </div>
                <div class="pl-3">
                   <h5 class="text-danger">
                    <?= $this->Flash->render() ?>
                   </h5> 
                </div>
                <div class="card-body">
                    <div class="users form content">
                        <?= $this->Flash->render() ?>
                        <?= $this->Form->create($client) ?>
                        <fieldset>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <?= $this->Form->input('email', [
                                    'required' => true, 'type' => 'text',
                                    'class' => 'form-control', 'placeholder' => 'Email'
                                ]) ?>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <?= $this->Form->input('password', [
                                    'required' => true, 'type' => 'password',
                                    'class' => 'form-control', 'placeholder' => 'Senha'
                                ]) ?>
                            </div>

                            <div class="row align-items-center remember">
                                <input type="checkbox">Lembre-me
                            </div>

                        </fieldset>
                        <div class="form-group">
                            <?= $this->Form->submit(__('Login'), ['value' => 'Entrar', 'class' => 'btn float-right login_btn']); ?>
                            <?= $this->Form->end() ?>

                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Não tem uma conta?<a href="/projeto/register">Cadastre-se</a>
                    </div>
                    <div class="d-flex mt-1 justify-content-center">
                        <a href="/projeto/users/login">Usuário administrativo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>