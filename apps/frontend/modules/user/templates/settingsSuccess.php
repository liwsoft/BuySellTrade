<h1>Nastavenia</h1>

<?php if($sf_user->hasFlash('notice')): ?>
	<div class="notice"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?>

<?php echo form_tag('@settings') ?>
<table>
	<?php echo $form ?>
</table>
<p><button type="submit">Uložiť</button>
</form>