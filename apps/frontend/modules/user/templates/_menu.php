<?php if($sf_user->isAuthenticated() == false): ?>
	<div class="header">Prihláste sa:</div>
	<div id="signin">
		<a href="<?php echo url_for('@google') ?>" class="signin-google"><span>Google</span></a>
		<a class="signin-facebook" onclick="FB.login(function(response) { window.location = '<?php echo url_for('facebook') ?>'; }, { 	perms:'email' }); return false;"><span>Facebook</span></a>
		<div class="clr"></div>

		<a id="signin-showMore">Nemáte ani jeden z týchto účtov?</a>
		<?php echo form_tag('@signin', array('class' => 'hide')) ?>
			<table>
				<tr>
					<th>E-mail:</th>
					<td><input type="text" name="signin[username]" placeholder="E-mail" /></td>
					<th>Heslo:</th>
					<td><input type="password" name="signin[password]" placeholder="Heslo" /><?php echo $form->renderHiddenFields() ?></td>
				</tr>
				<!--<tr>
					<td colspan="3"></td>
					<td class="small"><?php echo link_to('Zabudli ste heslo?', '@password') ?></td>
				</tr>-->
				<tr>
					<td colspan="3"><?php echo link_to('Nie ste zaregistrovaný? <b>Zaregistrujte sa</b>', '@register') ?></td>
					<td><button type="submit">Prihlásiť sa</button></td>
				</tr>
			</table>
			<!--<p><?php echo link_to('Nie ste zaregistrovaný? <b>Zaregistrujte sa</b>', '@register') ?> <button type="submit">Prihlásiť</button></p>-->
		</form>
	</div>
	<div class="clr"></div>
<?php else: ?>
	Prihlásený užívateľ: <b><?php echo $sf_user->getName() ?></b>
	<p><?php echo link_to('Vaše inzeráty', '@yourItems') ?> &nbsp;|&nbsp; <?php echo link_to('Nastavenia', '@settings') ?> &nbsp;|&nbsp; <?php echo link_to('Odhlásiť', '@signout') ?></p>
<?php endif ?>