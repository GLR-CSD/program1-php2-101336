<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liedjes</title>
    <link rel="stylesheet" href="public/css/simple.css">
</head>
<body>
<h1>Liedjes</h1>
<table>
    <tr>
        <th>ID</th>
        <th>naam</th>
        <th>duration</th>
        <th>BPM</th>
        <th>noot</th>
    </tr>
    <?php foreach ($liedjes as $lied): ?>
        <tr>
            <td><?= $lied->getID() ?></td>
            <td><?= $lied->getNaam() ?></td>
            <td><?= $lied->getDuration() ?></td>
            <td><?= $lied->getBPM() ?></td>
            <td><?= $lied->getNoot() ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
