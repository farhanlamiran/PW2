<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Judul</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($list as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['provinsi_nama']; ?></td>
          <td><?= $row['nama']; ?></td>
      <?php endforeach ?>
    </tbody>
</table>