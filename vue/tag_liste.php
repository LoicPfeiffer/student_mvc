<table>

  <tr>
    <th>Id</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Note</th>
    <th><a href="<?= $baseURI ?>tag/insert">+</a></th>
  </tr>

  <?php
  foreach ($tags as $tag1) { ?>
    <tr>
      <td><?= $tag1['id'] ?></td>
      <td><?= $tag1['name'] ?></td>
      <td><?= $tag1['description'] ?></td>
      <td><?= $tag1['note'] ?></td>
      <td><a href="index.php?table=tag&id=<?= $tag1['id'] ?>& op=insert">✏</a></td>
      <td><a href="index.php?table=tag&id=<?= $tag1['id'] ?>& op=delete">❌</a></td>

    </tr>
  <?php } ?>
</table>