<?php
    check_auth($routes); //faz o check se o usuario está logado

    // dados fake pra teste
    $data = [
        [
            "id"=>1,
            "titulo"=> "servico teste",
            "descricao"=>"servico teste de teste categoria",
            "endereco"=>"afogados da ingazeira, centro, 21",
            "valor"=>"800.00", 
            "status"=>"aberto"          
        ],
        [
            "id"=>2,
            "titulo"=> "servico teste",
            "descricao"=>"servico teste de teste categoria",
            "endereco"=>"afogados da ingazeira, centro, 21",
            "valor"=>"800.00", 
            "status"=>"aberto"          
        ],
        [
            "id"=>3,
            "titulo"=> "servico teste",
            "descricao"=>"servico teste de teste categoria",
            "endereco"=>"afogados da ingazeira, centro, 21",
            "valor"=>"800.00", 
            "status"=>"aberto"          
        ],
        [
            "id"=>4,
            "titulo"=> "servico teste",
            "descricao"=>"servico teste de teste categoria",
            "endereco"=>"afogados da ingazeira, centro, 21",
            "valor"=>"800.00", 
            "status"=>"aberto"          
        ],
        [
            "id"=>5,
            "titulo"=> "servico teste",
            "descricao"=>"servico teste de teste categoria",
            "endereco"=>"afogados da ingazeira, centro, 21",
            "valor"=>"800.00", 
            "status"=>"finalizado"          
        ],
        [
            "id"=>6,
            "titulo"=> "servico teste",
            "descricao"=>"servico teste de teste categoria",
            "endereco"=>"afogados da ingazeira, centro, 21",
            "valor"=>"800.00", 
            "status"=>"finalizado"          
        ],
        [
            "id"=>7,
            "titulo"=> "servico teste",
            "descricao"=>"servico teste de teste categoria",
            "endereco"=>"afogados da ingazeira, centro, 21",
            "valor"=>"800.00", 
            "status"=>"finalizado"          
        ],
        [
            "id"=>8,
            "titulo"=> "servico teste",
            "descricao"=>"servico teste de teste categoria",
            "endereco"=>"afogados da ingazeira, centro, 21",
            "valor"=>"800.00", 
            "status"=>"aberto"          
        ],
        [
            "id"=>9,
            "titulo"=> "servico teste",
            "descricao"=>"servico teste de teste categoria",
            "endereco"=>"afogados da ingazeira, centro, 21",
            "valor"=>"800.00", 
            "status"=>"aberto"          
        ],
        [
            "id"=>10,
            "titulo"=> "servico teste",
            "descricao"=>"servico teste de teste categoria",
            "endereco"=>"afogados da ingazeira, centro, 21",
            "valor"=>"800.00", 
            "status"=>"finalizado"          
        ],
    ];
    $datactt = [
        
        [
            "id"=>2,
            "nome"=> "username",
            "foto_perfil"=>"https://boostchiropractic.co.nz/wp-content/uploads/2016/09/default-user-img.jpg",
        ],
        [
            "id"=>3,
            "nome"=> "username",
            "foto_perfil"=>"https://boostchiropractic.co.nz/wp-content/uploads/2016/09/default-user-img.jpg",
        ],
        [
            "id"=>4,
            "nome"=> "username",
            "foto_perfil"=>"https://boostchiropractic.co.nz/wp-content/uploads/2016/09/default-user-img.jpg",
        ],
        [
            "id"=>5,
            "nome"=> "username",
            "foto_perfil"=>"https://boostchiropractic.co.nz/wp-content/uploads/2016/09/default-user-img.jpg",
        ],
        [
            "id"=>6,
            "nome"=> "username",
            "foto_perfil"=>"https://boostchiropractic.co.nz/wp-content/uploads/2016/09/default-user-img.jpg",
        ],
    ];
    $datamsg = [
        [
            "id"=>11,
            "contratado_id"=>1,
            "contratante_id"=>2,
            "mensagem"=>"olá"
        ],
        [
            "id"=>22,
            "contratado_id"=>1,
            "contratante_id"=>2,
            "mensagem"=>"olá"
        ],
        [
            "id"=>33,
            "contratado_id"=>1,
            "contratante_id"=>2,
            "mensagem"=>"olá"
        ],
        [
            "id"=>24,
            "contratado_id"=>2,
            "contratante_id"=>1,
            "mensagem"=>"olá tudo bem?"
        ],
        [
            "id"=>3,
            "contratado_id"=>1,
            "contratante_id"=>3,
            "mensagem"=>"olá tudo bem?"
        ],
        [
            "id"=>4,
            "contratado_id"=>3,
            "contratante_id"=>1,
            "mensagem"=>"olá tudo bem? olá tudo bem? olá tudo bem? olá tudo bem? olá tudo bem? olá tudo bem?"
        ],
        [
            "id"=>5,
            "contratado_id"=>1,
            "contratante_id"=>3,
            "mensagem"=>"olá tudo bem?"
        ],
        [
            "id"=>6,
            "contratado_id"=>3,
            "contratante_id"=>1,
            "mensagem"=>"olá tudo bem?"
        ],
    ];
    $categorias=[
        (Object)["nome"=>"cat1"],
        (Object)["nome"=>"cat2"],
        (Object)["nome"=>"cat3"],
        (Object)["nome"=>"cat4"],
        (Object)["nome"=>"cat5"],
    ]

?>
<?php require "layouts/app/head.php"?>
<div class="row m-0 container-perfil">
    <perfil-descricao-component ation_profile_img="url_aqui" avaliacao_usuario="3"></perfil-descricao-component>
    <perfil-component servicos='<?php echo json_encode($data);?>' mensagens='<?php echo json_encode($datamsg);?>'
        contatos='<?php echo json_encode($datactt);?>'>
    </perfil-component>
</div>

<!-- Modal alterar apelido -->
<div class="modal fade" id="alterar_apelido" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="col-md-12 form-group">
                        <label for="apelido" class="required">Apelido</label>
                        <input type="text" name="apelido" id="apelido" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-md btn-block rounded-pill">
                            Alterar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal termos e responsabilidade -->
<div class="modal fade" id="termos_e_responsabilidade" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-muted text-uppercase text-center mb-4">Termos e resonsabilidade</h3>
                <div class="col-md-6 mx-auto form-group text-center">
                    <p class="text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus consequatur aspernatur
                        tempore alias sed, exercitationem sapiente doloremque aliquam magnam, nihil ipsam incidunt
                        dolore voluptates necessitatibus eius beatae itaque, a optio!
                    </p>
                    <p class="text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus consequatur aspernatur
                        tempore alias sed, exercitationem sapiente doloremque aliquam magnam, nihil ipsam incidunt
                        dolore voluptates necessitatibus eius beatae itaque, a optio!
                    </p>
                    <p class="text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus consequatur aspernatur
                        tempore alias sed, exercitationem sapiente doloremque aliquam magnam, nihil ipsam incidunt
                        dolore voluptates necessitatibus eius beatae itaque, a optio!
                    </p>
                    <p class="text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus consequatur aspernatur
                        tempore alias sed, exercitationem sapiente doloremque aliquam magnam, nihil ipsam incidunt
                        dolore voluptates necessitatibus eius beatae itaque, a optio!
                    </p>
                    <p class="text-right">
                        <strong>JOBFINDER</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal adicionar servico -->
<div class="modal fade" id="adicionar_servico" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <label for="" class="required">Titulo</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="required">Descricao</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="">Endereço</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" id="valor">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="categorias" class="required">Categoria</label>
                            <select multiple class="form-control" name="categoria[]" id="categorias" required>
                                <?php foreach($categorias as $c): forea?>
                                <option><?php echo $c->nome?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-success btn-md btn-block rounded-pill">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deletar_conta" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-muted text-uppercase text-center">Deseja realmente deletar sua conta?</h4>
                <form action="urldeletarconta" method="post" id="deletarConta">
                    <div class="form-group mt">
                        <span class="badge badge-danger p-2 mt-5 mb-2">Para deletar sua conta, você precisa confirmar sua senha</span>
                        <input type="password" class="form-control shadow-none" name="senha" placeholder="Senha" id="inputDeletarConta" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger shadow-none" id="btnDeletarConta"               onclick="$('#deletarConta').submit()">Deletar</button>
            </div>
        </div>
    </div>
</div>

<?php require "layouts/app/footer.php"?>