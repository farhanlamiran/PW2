<form method="post" action="<?= site_url('konversi/'.$data['id']) ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Satuan</td>
      <td>
        <select name="satuan_id">
          <?php foreach($data_satuan as $satuan):?>
          <?php if($satuan['id'] == $data['satuan_id']):?>
            <option value="<?= $satuan['id'] ?>" selected><?= $satuan['nama'] ?></option>
          <?php else:?>
            <option value="<?= $satuan['id'] ?>"><?= $satuan['nama'] ?></option>
          <?php endif?>
          <?php endforeach?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Suhu</td>
      <td>
        <input type="text" name="suhu" value="<?= $data['suhu'] ?>" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit">Save</button>
        <a href="<?= site_url('konversi/delete/'.$data['id']) ?>" >Delete</a>
      </td>
    </tr>
  </table>
</form>