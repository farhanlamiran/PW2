<form method="post" action="<?= site_url('kota/insert') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Provinsi</td>
      <td>
        <!-- <select name="provinsi_id">
          <?php foreach($data_provinsi as $provinsi):?>
          <option value="<?= $provinsi['id'] ?>"><?= $provinsi['nama'] ?></option>
          <?php endforeach?>
        </select> -->
        <?php foreach ($data_provinsi as $provinsi) : ?>
                    <input type="radio" value="<?= $provinsi['id'] ?>" name="provinsi_id">
                    <?= $provinsi['nama'] ?> <br>
                <?php endforeach ?>
      </td>
    </tr>
    <tr>
      <td>Kota</td>
      <td>
        <input type="text" name="kota" value="" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit">Save</button>
      </td>
    </tr>
  </table>
</form>