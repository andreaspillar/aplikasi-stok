<div style="color:red">
  <?php echo validation_errors(); ?>
  <?php if(isset($error)){print $error;}?>
</div>
<?php echo form_open_multipart('produksi/uploadtest'); ?>
  <div class="form-group">
    <label for="pic_file">Select Image*:</label>
    <input type="file" name="pic_file" class="form-control"  id="pic_file">
  </div>
  <button type="submit" name="kirim">Send</button>
</form>
