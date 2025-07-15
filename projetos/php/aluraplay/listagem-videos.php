<?php


if (strpos($_SERVER['REQUEST_URI'], 'sucesso=0')) {
    echo "<script type='text/javascript'>
        alert('Não foi possível realizar a ação');
    </script>";
} else

    require "./connection.php";

$sql = "SELECT * FROM videos;";

$statement = $pdo->query($sql);
$videosList = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require "./inicio-html.php";?>

    <ul class="videos__container" alt="videos alura">
        <?php foreach ($videosList as $video): ?>
            <?php if (!str_starts_with($video['url'], 'http')) {
                $video['url'] = "https://www.youtube.com/embed/d_VinJe8mfQ?si=B2uKbqwRoQki2bzu";
                $video['title'] = "
Conheça o canal do YouTube da Alura";
            } ?>
            <li class="videos__item">
                <iframe width="100%" height="72%" src="<?= $video['url'] ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="descricao-video">
                    <img src="./img/logo.png" alt="logo canal alura">
                    <h3><?= $video['title'] ?></h3>
                    <div class="acoes-video">
                        <a href="./edit-video?id=<?=$video['id'] ?>">Editar</a>
                        <a href="./remove-video?id=<?= $video['id'] ?>">Excluir</a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php require "./fim-html.php";?>