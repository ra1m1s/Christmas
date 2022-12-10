<thead>
    <tr>
        <th scope="col">Dovanėlė</th>
        <th scope="col">Kaina</th>
        <th scope="col">Supakuuota</th>
        <th scope="col">Redaguoti</th>
        <th scope="col">Trinti</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($presents as $present) { ?>
    <tr>
        <td><?=$present->presentTiltle?></td>
    <td><?=$present->price?></td>
<td><? ($present->wrapped) ? "taip" : "ne" ?></td>
<td>
    <form action="" method="GET">
        <input type="hidden" name="id" value="<?=$present->id?>">
    <button class="btn btn-success" name="edit" type="submit">redaguoti</button>
    </form>
    </td>
<td>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?=$present->id?>">
    <button class="btn btn-danger" name="destroy" type="submit">trinti</button>
    </form>
    </td>
    </tr>
    <?php } ?>
    </tbody>
