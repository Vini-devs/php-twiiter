<?php

include_once __DIR__ . '/../layout/header.php';
?>

<div class="container mt-4">
    <div class="mb-4 d-flex justify-content-around align-items-center text-end">
        <h2>Painel de Controle</h2>
        <div>
            <h5 class="card-title">Bem-vindo, @<?= htmlspecialchars($_SESSION['nickname']) ?>!</h5>
            <p class="card-text">Seu papel: <strong><?= ucfirst($_SESSION['tipo']) ?></strong></p>
        </div>
    </div>

    <!-- Gerenciamento de Tópicos (Moderadores e Admins) -->
    <div class="d-flex">
        <?php if ($_SESSION['tipo'] === 'admin' || $_SESSION['tipo'] === 'moderador'): ?>
        <div class="card mb-4 col-md-6">
            <div class="card-header bg-primary text-white">
                Gerenciar Tópicos
            </div>
            <div class="card-body">
                <?php if (!empty($topicos)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Tópico</th>
                            <th>Mensagens</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($topicos as $topico): ?>
                        <tr>
                            <td><?= htmlspecialchars($topico['id_topico']) ?></td>
                            <td><?= htmlspecialchars($topico['nome']) ?></td>
                            <td><?= count($posts[$topico['id_topico']] ?? []) ?></td>
                            <td>
                                <a href="/topicos/edit.php?id=<?= $topico['id_topico'] ?>"
                                    class="btn btn-sm btn-warning">Editar</a>
                                <a href="/topicos/delete.php?id=<?= $topico['id_topico'] ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir este tópico?')">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <p>Nenhum tópico encontrado.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Gerenciamento de Usuários (Apenas Admins) -->
        <?php if ($_SESSION['tipo'] === 'admin'): ?>
        <div class="card mb-4 col-md-6">
            <div class="card-header bg-success text-white">
                Gerenciar Usuários
            </div>
            <div class="card-body">
                <?php if (!empty($usuarios)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Usuário</th>
                            <th>Email</th>
                            <th>Papel</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $u): ?>
                        <tr>
                            <td><?= htmlspecialchars($u['id_usuario']) ?></td>
                            <td><?= htmlspecialchars($u['nickname']) ?></td>
                            <td><?= htmlspecialchars($u['email']) ?></td>
                            <td><?= ucfirst($u['tipo']) ?></td>
                            <td>
                                <a href="/usuarios/edit.php?id=<?= $u['id_usuario'] ?>"
                                    class="btn btn-sm btn-warning">Editar</a>
                                <a href="/usuarios/delete.php?id=<?= $u['id_usuario'] ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <p>Nenhum usuário registrado.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

</div>

<?php include_once __DIR__ . '/../layout/footer.php'; ?>