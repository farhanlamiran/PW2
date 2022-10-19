<form method="post" action="<?= site_url('kota/'.$data['id']) ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Provinsi</td>
      <td>
        <!-- <select name="provinsi_id">
          <?php foreach($data_provinsi as $provinsi):?>
          <?php if($provinsi['id'] == $data['provinsi_id']):?>
            <option value="<?= $provinsi['id'] ?>" selected><?= $provinsi['nama'] ?></option>
          <?php else:?>
            <option value="<?= $provinsi['id'] ?>"><?= $provinsi['nama'] ?></option>
          <?php endif?>
          <?php endforeach?>
        </select> -->

        <?php foreach ($data_provinsi as $provinsi) : ?>
                    <input type="radio" name="provinsi_id" <?php if ($provinsi['id'] == $data['provinsi_id']) echo 'checked' ?> value="<?= $provinsi['id'] ?>">
                    <?= $provinsi['nama'] ?> <br>
                <?php endforeach ?>
      </td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit">Save</button>
        <a href="<?= site_url('kota/delete/'.$data['id']) ?>" >Delete</a>
      </td>
    </tr>
  </table>
</form>