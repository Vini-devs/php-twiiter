<?php
function detectarHashtags($texto) {
    preg_match_all('/#(\w+)/u', $texto, $matches);
    return $matches[1] ?? [];
}

 function registrarTopicosParaPost($idPost, $hashtags) {
    $banco = Banco::getConn();
    foreach ($hashtags as $hashtag) {
        $topico = Topico::encontrarTopicos();
        $idTopico = null;
        foreach ($topico as $t) {
            if (mb_strtolower($t['nome']) === mb_strtolower($hashtag)) {
                $idTopico = $t['id_topico'];
                break;
            }
        }
        if ($idTopico) {
            $stmt = $banco->prepare("SELECT COUNT(*) FROM post_topico WHERE id_post = :id_post AND id_topico = :id_topico");
            $stmt->execute([':id_post' => $idPost, ':id_topico' => $idTopico]);
            
            if ($stmt->fetchColumn() == 0) {
                $stmt = $banco->prepare("INSERT INTO post_topico (id_post, id_topico) VALUES (:id_post, :id_topico)");
                $stmt->execute([':id_post' => $idPost, ':id_topico' => $idTopico]);
            }
        }
    }
}
?>