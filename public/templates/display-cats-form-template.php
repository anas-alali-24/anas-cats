
<div class="apicontainer">
    <div class="plug-error"><?php echo $err ?></div>
    <div search_form>
      <form id="search_form"  method="POST">
          <select class="form-select" name="selected-breed" id="selected-breed" onchange="this.form.submit()">
            <option <?php echo(($selected) ? 'selected':''); ?> >select breed</option>
            <option <?php echo(($selected == 'bsho') ? 'selected':''); ?> value="bsho">British Shorthair</option>
            <option <?php echo(($selected == 'chee') ? 'selected':''); ?> value="chee">Cheetoh</option>
            <option <?php echo(($selected == 'hima') ? 'selected':''); ?> value="hima">Himalayan</option>
            <option <?php echo(($selected == 'pers') ? 'selected':''); ?> value="pers">Persian</option>
            <option <?php echo(($selected == 'soma') ? 'selected':''); ?> value="soma">Somali</option>
          </select>
          <img src="<?php echo $url ?>" class="apiimg" alt="">
      </form>
    </div>
</div>
