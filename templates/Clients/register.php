<style>
    .fc{
        color: #006400;
        font-size: 1.2em;
    }
</style>
<div id="titulo_home" class="d-flex  flex-wrap justify-content-center">
    <img src="webroot/img/imgcardapio.png" width="1800px" alt="cardapio">
    <div class="text-center ml-5 mt-n5">
        <h1 class="mt-n5 mb-5 text-muted">Cadastro</h1>
    </div>
</div>

<div id="cardapio_home" class="text-center mt-5 px-5 ">
    <div>
        <h1 class="text-muted">Cadastre-se e aproveite os benefícios! </h1>
        <h4 class="text-muted mx-5 mt-3 mb-5">Ao realizar o cadastro, você se torna um cliente oficial da Speed Burguer, sendo possível realizar pedidos pelo próprio site e aguardar no conforte de sua casa.</h4>
    </div>
</div>

<div class="container mb-5">
    <div class="clients form content mb-5">

        <?= $this->Form->create($client) ?>
        <fieldset>

            <div class="border p-5 d-flex flex-wrap justify-content-between">
                <hr style="width: 300px;">
                <h5 class="text-center text-muted">Dados do cliente</h5>
                <hr style="width: 300px;">

                <!-- Nome -->
                <div>
                    <label for="formGroupExampleInput2" class="fc font-weight-bold mt-5">Nome*</label><br>
                    <?php
                    echo $this->Form->input('name', ['style' => 'width: 450px;', 'class' => 'form-control border border-success', 'id' => 'formGroupExampleInput2', 'placeholder' => 'Digite seu primeiro nome.']);
                    ?>
                </div>

                <!-- Surname -->
                <div>
                    <label for="formGroupExampleInput2" class="fc font-weight-bold mt-5">Sobrenome*</label><br>
                    <?php
                    echo $this->Form->input('surname', ['style' => 'width: 450px;', 'class' => 'form-control border border-success text-success', 'id' => 'formGroupExampleInput2', 'placeholder' => 'Digite seu sobrenome.']);
                    ?>
                </div>

                <!-- Email -->
                <div>
                    <label for="formGroupExampleInput2" class="fc font-weight-bold mt-5">E-mail*</label><br>
                    <?php
                    echo $this->Form->input('email', ['style' => 'width: 280px;', 'class' => 'form-control border border-success text-success', 'id' => 'formGroupExampleInput2', 'placeholder' => 'Digite seu e-mail.']);
                    ?>
                </div>

                <!-- Senha -->
                <div>
                    <label for="formGroupExampleInput2" class="fc font-weight-bold mt-5">Senha*</label><br>
                    <?php
                    echo $this->Form->input('password', ['style' => 'width: 280px;', 'type' => 'password', 'class' => 'form-control border border-success text-success', 'id' => 'formGroupExampleInput2', 'placeholder' => 'Digite uma nova senha.']);
                    ?>
                </div>

                <!-- CPF -->
                <div>
                    <label for="formGroupExampleInput2" class="fc font-weight-bold mt-5">CPF*</label><br>
                    <?php
                    echo $this->Form->input('cpf', ['style' => 'width: 280px;', 'class' => 'form-control border border-success text-success', 'id' => 'formGroupExampleInput2', 'placeholder' => 'Digite seu CPF']);
                    ?>
                </div>

            </div>

            <div class="border mt-5 p-5 d-flex flex-wrap justify-content-between">

                <hr style="width: 300px;">
                <h5 class="text-center text-muted">Dados de Entrega</h3>
                    <hr style="width: 300px;">

                    <!-- CEP -->
                    <div>
                        <label for="formGroupExampleInput2" class="fc font-weight-bold mt-5">CEP*</label><br>
                        <?php
                        echo $this->Form->input('cep', ['style' => 'width: 280px;', 'class' => 'form-control border border-success text-success', 'id' => 'formGroupExampleInput2', 'placeholder' => 'Digite seu CEP']);
                        ?>
                    </div>

                    <!-- RUA -->
                    <div>
                        <label for="formGroupExampleInput2" class="fc font-weight-bold mt-5">Rua*</label><br>
                        <?php
                        echo $this->Form->input('rua', ['style' => 'width: 700px;', 'class' => 'form-control border border-success text-success', 'id' => 'formGroupExampleInput2', 'placeholder' => 'Digite sua Rua.']);
                        ?>
                    </div>

                    <!-- Bairro -->
                    <div>
                        <label for="formGroupExampleInput2" class="fc font-weight-bold mt-5">Bairro*</label><br>
                        <?php
                        echo $this->Form->input('bairro', ['style' => 'width: 700px;', 'class' => 'form-control border border-success text-success', 'id' => 'formGroupExampleInput2', 'placeholder' => 'Digite seu Bairro.']);
                        ?>
                    </div>

                    <!-- Numero -->
                    <div>
                        <label for="formGroupExampleInput2" class="fc font-weight-bold mt-5">Número*</label><br>
                        <?php
                        echo $this->Form->input('numero', ['style' => 'width: 280px;', 'class' => 'form-control border border-success text-success', 'id' => 'formGroupExampleInput2', 'placeholder' => 'Digite seu Número.']);
                        ?>
                    </div>

                    <!-- City -->
                    <div>
                        <label for="formGroupExampleInput2" class="fc font-weight-bold mt-5">Cidade*</label><br>
                        <?php
                        echo $this->Form->input('city', ['style' => 'width: 700px;', 'class' => 'form-control border border-success text-success', 'id' => 'formGroupExampleInput2', 'placeholder' => 'Digite sua cidade.']);
                        ?>
                    </div>

                    <!-- Uf -->
                    <div>
                        <label for="formGroupExampleInput2" class="fc font-weight-bold mt-5">UF*</label><br>
                        <?php
                        echo $this->Form->input('uf',  ['style' => 'width: 200px;', 'class' => 'form-control border border-success text-success', 'id' => 'formGroupExampleInput2', 'placeholder' => 'Estado']);
                        ?>
                    </div>

            </div>

    </div>
    </fieldset>
    <?= $this->Form->button(__('Finalizar'), ['class' => 'btn btn-success btn-lg btn-block mt-2']) ?>
    <?= $this->Form->end() ?>
</div>
