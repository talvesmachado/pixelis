<?php echo form_open_multipart('articles/articles_add'); ?>

<h5>Titre *</h5>
<input type="text" name="titre" value="<?php echo set_value('titre'); ?>" class="input-large" />
<h5>File*</h5>
<input type="file" name="inputfile" id="inputfile" style="display:none"/>
<div class="input-append">
   <input id="imagefile" class="input-large" type="text">
   <a class="btn" onclick="$('input[id=inputfile]').click();">Browse</a>
</div>

<h5>Body</h5>
<textarea name="body" rows="4" class="input-large"><?php echo set_value('body'); ?></textarea>

<?php if(isset($form_additional_inputs_hidden)) print form_hidden($form_additional_inputs_hidden); ?>

<div><input type="submit" value="Submit" class="btn btn-large btn-primary" /></div>
</form>
