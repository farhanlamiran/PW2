<form method="post" action="<?= site_url('konversi/insert') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Satuan</td>
      <td>
        <select name="satuan_id">
          <?php foreach($data_satuan as $satuan):?>
          <option value="<?= $satuan['id'] ?>"><?= $satuan['nama'] ?>-<?= $satuan['id'] ?></option>
          <?php endforeach?>
        </select>
      </td>
    </tr>
    <tr>
      <td>suhu</td>
      <td>
        <input type="text" name="suhu" value="" />
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