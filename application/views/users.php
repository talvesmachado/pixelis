<?php echo form_open('users'); ?>

<h5>Username *</h5>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

<h5>Password *</h5>
<input type="text" name="password" value="" size="50" />

<div><input type="submit" value="Submit" class="btn" /></div>
</form>
