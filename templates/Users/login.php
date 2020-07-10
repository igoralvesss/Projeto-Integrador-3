<style>
    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,
    body {
        background-image: url("../webroot/img/paralax1.jpg");
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
        height: 420px;
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
                    <h3>Login Administrativo</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <img class="mt-n2" src="webroot/img/LogoHamburgueria.svg" height="100px" alt="">
                    </div>
                </div>
                <div class="card-body">
                    <div class="users form content">
                        <?= $this->Flash->render() ?>
                        <?= $this->Form->create() ?>
                        <fieldset>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <?= $this->Form->input('login', ['required' => true, 'type' => 'text',
                             'class'=>'form-control', 'placeholder'=>'Usuário']) ?>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <?= $this->Form->input('password', ['required' => true, 'type' => 'password',
                            'class'=>'form-control', 'placeholder'=>'Senha']) ?>
                        </div>

                        <div class="row align-items-center remember">
                            <input type="checkbox">Lembre-me
                        </div>
                            
                        </fieldset>
                        <div class="form-group">
                        <?= $this->Form->submit(__('Login'),['value'=>'Entrar', 'class'=>'btn float-right login_btn']); ?>
                        <?= $this->Form->end() ?>

                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center text-center links">
                        Login administrativo, caso seja cliente, clique em voltar.
                    </div>
                    <div class="d-flex mt-1 justify-content-center">
                        <a href="/projeto/login">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- <div class="row mt-5">
    <div class="column coloumn-responsive">

        <div class="users form content">
            <?= $this->Flash->render() ?>
            <h3>Login User</h3>
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Please enter your login and password') ?></legend>
                <?= $this->Form->control('login', ['required' => true]) ?>
                <?= $this->Form->control('password', ['required' => true]) ?>
            </fieldset>
            <?= $this->Form->submit(__('Login')); ?>
            <?= $this->Form->end() ?>

        </div>

    </div>
</div> -->