<?php
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/dm.php';
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="row g-0">
                    <!-- Sidebar de conversas -->
                    <div class="col-md-4 border-end bg-light" style="min-height:500px;">
                        <div class="p-3 border-bottom">
                            <h5 class="fw-bold mb-0">Mensagens</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <!-- Exemplo de conversa, repetir dinamicamente -->
                            <?php foreach ($usuarios as $usuario): ?>
                            <?php listaUsuario($usuario['id_usuario'], $usuario['nickname']); ?>
                            <?php endforeach; ?>
                            <!-- ... -->
                        </ul>
                    </div>
                    <!-- Área de mensagens -->
                    <div class="col-md-8 d-flex flex-column" style="min-height:500px;">
                        <?php if (isset($usuarioSelecionado)): ?>
                        <div class="p-3 border-bottom d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-circle text-secondary me-2" style="font-size:2rem;"></i>
                                <span class="fw-bold">@<?php echo $usuarioSelecionado['nickname']; ?></span>
                            </div>
                            <div>
                                <a href="/php-twitter/mensagem" class="btn btn-link text-decoration-none">
                                    <i class="bi bi-arrow-left"></i> Voltar
                                </a>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-auto p-3" style="background:#f8f9fa; max-height:350px;">
                            <!-- Exemplo de mensagens, repetir dinamicamente -->
                            <?php foreach ($mensagem as $msg): ?>
                            <?php listaMensagem($idSessaoUsuario, $msg); ?>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <form class="p-3 border-top bg-white" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" name="conteudo" placeholder="Mensagem..."
                                    required>
                                <?php if (!$usuarioSelecionado) { ?>
                                <input type="text" class="form-control" name="nickname_destinatario"
                                    placeholder="@User..." required>
                                <?php } else { ?>
                                <input type="hidden" name="id_destinatario"
                                    value="<?php echo $usuarioSelecionado['id_usuario']; ?>">
                                <?php } ?>

                                <button class="btn btn-primary" type="submit"><i class="bi bi-send"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>