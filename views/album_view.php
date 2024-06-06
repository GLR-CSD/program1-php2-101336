
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumlijstje</title>
    <link rel="stylesheet" href="public/css/simple.css">
</head>
<body>
<h1>Albumlijst</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Artiesten</th>
        <th>Release datum</th>
        <th>URL</th>
        <th>Afbeelding</th>
        <th>Prijs</th>
    </tr>
    <?php foreach ($albums as $album): ?>
        <tr>
            <td><?= $album->getId() ?></td>
            <td><?= $album->getNaam() ?></td>
            <td><?= $album->getArtiesten() ?></td>
            <td><?= $album->getReleaseDatum() ?></td>
            <td><?= $album->getURL() ?></td>
            <td><?= $album->getAfbeelding() ?></td>
            <td><?= $album->getPrijs() ?></td>
        </tr>
    <?php endforeach; ?>
</table>