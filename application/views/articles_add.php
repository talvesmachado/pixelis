<?php echo form_open('articles/articles_add'); ?>

<h5>Titre *</h5>
<input type="text" name="titre" value="<?php echo set_value('titre'); ?>" size="50" />

<h5>Body</h5>
<textarea name="body" rows="8" cols="40"><?php echo set_value('body'); ?></textarea>

<?php if(isset($form_additional_inputs_hidden)) print form_hidden($form_additional_inputs_hidden); ?>

<div><input type="submit" value="Submit" class="btn" /></div>
</form>
