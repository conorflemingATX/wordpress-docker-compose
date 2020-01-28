<div class="attr-modal attr-fade" id="metform_form_modal" tabindex="-1" role="dialog"
	aria-labelledby="metform_form_modalLabel" style="display:none;">
	<div class="attr-modal-dialog attr-modal-dialog-centered" id="metform-form-modalinput-form" role="document">
		<form action="" mathod="post" id="metform-form-modalinput-settings" 
		data-open-editor="0" 
		data-editor-url="<?php echo get_admin_url(); ?>"
		data-nonce="<?php echo wp_create_nonce('wp_rest');?>"
		>
		<input type="hidden" name="post_author" value ="<?php echo get_current_user_id(); ?>">
			<div class="attr-modal-content">
				<div class="attr-modal-header">
					<button type="button" class="attr-close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
					<h4 class="attr-modal-title" id="metform_form_modalLabel"><?php esc_html_e('Form Settings', 'metform'); ?></h4>
					<div id="message" style="display:none" class="attr-alert attr-alert-success mf-success-msg"></div>
					<ul class="attr-nav attr-nav-tabs" role="tablist">
						<li role="presentation" class="attr-active"><a href="#mf-general" aria-controls="general" role="tab" data-toggle="tab"><?php esc_html_e('General', 'metform'); ?></a></li>
						<li role="presentation"><a href="#mf-confirmation" aria-controls="confirmation" role="tab" data-toggle="tab"><?php esc_html_e('Confirmation', 'metform');?></a></li>
						<li role="presentation"><a href="#mf-notification" aria-controls="notification" role="tab" data-toggle="tab"><?php esc_html_e('Notification', 'metform'); ?></a></li>
						<li role="presentation"><a href="#mf-integration" aria-controls="integration" role="tab" data-toggle="tab"><?php esc_html_e('Integration', 'metform');?></a></li>
						<?php if(class_exists('MetForm_Pro\Base\Package')) : ?>
						<li role="presentation"><a href="#mf-payment" aria-controls="payment" role="tab" data-toggle="tab"><?php esc_html_e('Payment', 'metform');?></a></li>
						<?php endif; ?>
					</ul>
				</div>

				<div class="attr-tab-content">
					<div role="tabpanel" class="attr-tab-pane attr-active" id="mf-general">
						
						<div class="attr-modal-body" id="metform_form_modal_body">
							<div class="mf-input-group">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Title:', 'metform'); ?></label>
								<input type="text" name="form_title" class="mf-form-modalinput-title attr-form-control" data-default-value="<?php echo esc_html__('New Form # ', 'meform') . time(); ?>">
								<span class='mf-input-help'><?php esc_html_e('This is the form title','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Success Message:', 'metform'); ?></label>
								<input type="text" name="success_message" class="mf-form-modalinput-success_message attr-form-control" data-default-value="<?php esc_html_e('Thank you! Form submitted successfully.','metform'); ?>" >
								<span class='mf-input-help'><?php esc_html_e('This mesage will be shown after a successful submission.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="require_login" class="mf-admin-control-input mf-form-modalinput-require_login">
									<span><?php esc_html_e('Required Login:', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('Without login, users can\'t submit the form.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="capture_user_browser_data" class="mf-admin-control-input mf-form-modalinput-capture_user_browser_data">
									<span><?php esc_html_e('Capture User Browser Data:', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('Store user\'s browser data (ip, browser name, etc)','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="hide_form_after_submission" class="mf-admin-control-input mf-form-modalinput-hide_form_after_submission">
									<span><?php esc_html_e('Hide Form After Submission:', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('After submission, hide the form for preventing multiple submission.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="store_entries" class="mf-admin-control-input mf-form-modalinput-store_entries">
									<span><?php esc_html_e('Store Entries:', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('Save submitted form data to database.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group">
								<div class="mf-input-group-inner">
									<label class="attr-input-label">
										<input type="checkbox" value="1" name="limit_total_entries_status" class="mf-admin-control-input mf-form-modalinput-limit_status">
										<span><?php esc_html_e('Limit Total Entries:', 'metform'); ?></span>
									</label>
									<div class="mf-input-group" id='limit_status'>
										<input type="number" min="1" name="limit_total_entries" class="mf-form-modalinput-limit_total_entries attr-form-control">
									</div>
								</div>
								<span class='mf-input-help'><?php esc_html_e('Limit the total number of submissions for this form.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="count_views" class="mf-admin-control-input mf-form-modalinput-count_views">
									<span><?php esc_html_e('Count views:', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('Track form views.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Redirect To:', 'metform'); ?></label>
								<input type="text" name="redirect_to" class="mf-form-modalinput-redirect_to attr-form-control" placeholder="<?php esc_html_e('Redirection link', 'metform'); ?>">
								<span class='mf-input-help'><?php esc_html_e('Users will be redirected to the this link after submission.','metform'); ?></span>
							</div>
							<br>

						</div>
						
					</div>
					<div role="tabpanel" class="attr-tab-pane" id="mf-confirmation">
						
						<div class="attr-modal-body" id="metform_form_modal_body">

							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="enable_user_notification" class="mf-admin-control-input mf-form-user-enable">
									<span><?php esc_html_e('Confirmation mail to user :', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('Want to send a submission copy to user by email? Active this one.','metform'); ?><strong><?php esc_html_e('The form must have at least one Email widget and it should be required.', 'metform'); ?></strong></span>
							</div>
							<br>
							<div class="mf-input-group mf-form-user-confirmation">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email Subject:', 'metform'); ?></label>
								<input type="text" name="user_email_subject" class="mf-form-user-email-subject attr-form-control" placeholder="<?php esc_html_e('Email subject', 'metform');?>" >
								<span class='mf-input-help'><?php esc_html_e('Enter here email subject.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group mf-form-user-confirmation">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email From:', 'metform'); ?></label>
								<input type="email" name="user_email_from" class="mf-form-user-email-from attr-form-control" placeholder="<?php esc_html_e('From email', 'metform');?>">
								<span class='mf-input-help'><?php esc_html_e('Enter the email by which you want to send email to user.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group mf-form-user-confirmation">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email Reply To:', 'metform'); ?></label>
								<input type="email" name="user_email_reply_to" class="mf-form-user-reply-to attr-form-control" placeholder="<?php esc_html_e('Reply to email', 'metform');?>">
								<span class='mf-input-help'><?php esc_html_e('Enter email where user can reply/ you want to get reply.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group mf-form-user-confirmation">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Thank you message :', 'metform'); ?></label>
								<textarea name="user_email_body" id="" class="mf-form-user-email-body attr-form-control" cols="30" rows="5" placeholder="<?php esc_html_e('Thank you message!', 'metform');?>"></textarea>
								<span class='mf-input-help'><?php esc_html_e('Enter here your message to include it in email body. Which will be send to user.','metform'); ?></span>
							</div>
							<br>
							<!-- <div class="mf-input-group">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email Attached Submission Copy:', 'metform'); ?></label>
								<input type="checkbox" value="1" name="user_email_attach_submission_copy" class="mf-admin-control-input mf-form-user-submission-copy">
							</div> -->
							
						</div>
						
					</div>
					<div role="tabpanel" class="attr-tab-pane" id="mf-notification">
						
						<div class="attr-modal-body" id="metform_form_modal_body">
							
							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="enable_admin_notification" class="mf-admin-control-input mf-form-admin-enable">
									<span><?php esc_html_e('Notification mail to admin :', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('Want to send a submission copy to admin by email? Active this one.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group mf-form-admin-notification">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email Subject:', 'metform'); ?></label>
								<input type="text" name="admin_email_subject" class="mf-form-admin-email-subject attr-form-control" placeholder="<?php esc_html_e('Email subject', 'metform');?>">
								<span class='mf-input-help'><?php esc_html_e('Enter here email subject.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group mf-form-admin-notification">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email To:', 'metform'); ?></label>
								<input type="text" name="admin_email_to" class="mf-form-admin-email-to attr-form-control" placeholder="<?php esc_html_e('example@mail.com, example@email.com', 'metform');?>">
								<span class='mf-input-help'><?php esc_html_e('Enter admin email where you want to send mail.','metform'); ?><strong><?php esc_html_e(' for multiple email addresses please use "," separator.', 'metform'); ?></strong></span>
							</div>
							<br>
							<div class="mf-input-group mf-form-admin-notification">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email From:', 'metform'); ?></label>
								<input type="email" name="admin_email_from" class="mf-form-admin-email-from attr-form-control" placeholder="<?php esc_html_e('Email from', 'metform');?>">
								<span class='mf-input-help'><?php esc_html_e('Enter the email by which you want to send email to admin.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group mf-form-admin-notification">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email Reply To:', 'metform'); ?></label>
								<input type="email" name="admin_email_reply_to" class="mf-form-admin-reply-to attr-form-control" placeholder="<?php esc_html_e('Email reply to', 'metform');?>">
								<span class='mf-input-help'><?php esc_html_e('Enter email where admin can reply/ you want to get reply.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group mf-form-admin-notification">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Admin Note : ', 'metform'); ?></label>
								<textarea name="admin_email_body" class="mf-form-admin-email-body attr-form-control" cols="30" rows="5" placeholder="<?php esc_html_e('Admin note!', 'metform');?>"></textarea>
								<span class='mf-input-help'><?php esc_html_e('Enter here your email body. Which will be send to admin.','metform'); ?></span>
							</div>
						</div>
						
					</div>
					<div role="tabpanel" class="attr-tab-pane" id="mf-integration">
						
						<div class="attr-modal-body" id="metform_form_modal_body">

							<?php if(class_exists('MetForm_Pro\Core\Integrations\Rest_Api')): ?>
							<div class="mf-input-group mf-input-group-inner">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="mf_rest_api" class="mf-admin-control-input mf-form-modalinput-rest_api">
									<span><?php esc_html_e('REST API:', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('Send entry data to third party api/webhook','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-rest-api-group">
								<div class="mf-input-group mf-rest-api">
									<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('URL/Webhook:', 'metform'); ?></label>
									<input type="text" name="mf_rest_api_url" class="mf-rest-api-url attr-form-control" placeholder="<?php esc_html_e('Rest api url/webhook', 'metform');?>">
									<span class='mf-input-help'><?php esc_html_e('Enter rest api url/webhook here.','metform'); ?></span>
								</div>
								<div class="mf-input-group mf-rest-api-key">
									<div class="mf-input-group" id='rest_api_method'>
										<select name="mf_rest_api_method" class="mf-rest-api-method attr-form-control" >
											<option value="POST"><?php esc_html_e('POST', 'metform'); ?></option>
											<option value="GET"><?php esc_html_e('GET', 'metform'); ?></option>
										</select>
									</div>
								</div>
								
							</div>
							<br>
							<?php endif ?>

							<?php if(class_exists('\MetForm\Core\Integrations\Mail_Chimp')): ?>
							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="mf_mail_chimp" class="mf-admin-control-input mf-form-modalinput-mail_chimp">
									<span><?php esc_html_e('Mail Chimp:', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('Integrate mailchimp with this form.','metform'); ?><strong><?php esc_html_e('The form must have at least one Email widget and it should be required. ', 'metform'); ?><a target="_blank" href="<?php echo get_dashboard_url().'admin.php?page=metform-menu-settings'; ?>"><?php esc_html_e('Configure Mail Chimp.', 'metform'); ?></a></strong></span>
							</div>
							<br>
							<div class="mf-input-group mf-mailchimp">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('MailChimp List ID:', 'metform'); ?></label>
								<input type="text" name="mf_mailchimp_list_id" class="mf-mailchimp-list-id attr-form-control" placeholder="<?php esc_html_e('Mailchimp contact list id', 'metform');?>">
								<span class='mf-input-help'><?php esc_html_e('Enter here mailchimp list id. ','metform'); ?><a target="__blank" href="<?php echo esc_url('https://admin.mailchimp.com/'); ?>"><?php esc_html_e('Get list id', 'metform'); ?></a></span>
							</div>
							<br>
							<?php endif ?>

							<?php if(class_exists('\MetForm_Pro\Core\Integrations\Zapier')): ?>
							<div class="mf-input-group">
							<label class="attr-input-label">
								<input type="checkbox" value="1" name="mf_zapier" class="mf-admin-control-input mf-form-modalinput-zapier">
								<span><?php esc_html_e('Zapier:', 'metform'); ?></span>
							</label>
							<span class='mf-input-help'><?php esc_html_e('Integrate zapier with this form.','metform'); ?><strong><?php esc_html_e('The form must have at least one Email widget and it should be required.', 'metform'); ?></strong></span>
							</div>
							<br>
							<div class="mf-input-group mf-zapier">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Zapier webhook:', 'metform'); ?></label>
								<input type="text" name="mf_zapier_webhook" class="mf-zapier-web-hook attr-form-control" placeholder="<?php esc_html_e('Zapier webhook', 'metform');?>">
								<span class='mf-input-help'><?php esc_html_e('Enter here zapier web hook.','metform'); ?></span>
							</div>
							<br>
							<?php endif ?>

							<?php if(class_exists('\MetForm\Core\Integrations\Slack')): ?>
							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="mf_slack" class="mf-admin-control-input mf-form-modalinput-slack">
									<span><?php esc_html_e('Slack:', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('Integrate slack with this form.','metform'); ?><strong><?php esc_html_e('slack info.', 'metform'); ?></strong></span>
							</div>
							<br>
							<div class="mf-input-group mf-slack">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Slack webhook:', 'metform'); ?></label>
								<input type="text" name="mf_slack_webhook" class="mf-slack-web-hook attr-form-control" placeholder="<?php esc_html_e('Slack webhook', 'metform');?>">
								<span class='mf-input-help'><?php esc_html_e('Enter here slack web hook.','metform'); ?><a href="http://slack.com/apps/A0F7XDUAZ-incoming-webhooks"><?php esc_html_e('create from here', 'metform');?></a></span>
							</div>
							<br>
							<?php endif ?>

							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="mf_recaptcha" class="mf-admin-control-input mf-form-modalinput-recaptcha">
									<span><?php esc_html_e('reCAPTCHA:', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('reCAPTCHA protects you against spam and other types of automated abuse. ','metform'); ?><strong><?php esc_html_e('The form must have reCAPTCHA widget to use this feature. ', 'metform'); ?></strong><a target="_blank" href="<?php echo get_dashboard_url().'admin.php?page=metform-menu-settings'; ?>"><?php esc_html_e('Configure reCAPTCHA.', 'metform'); ?></a></span>
							</div>

						</div>
						
					</div>

					<?php if(class_exists('MetForm_Pro\Base\Package')) : ?>
					<div role="tabpanel" class="attr-tab-pane" id="mf-payment">
						<div class="attr-modal-body" id="metform_form_modal_body">
							<div class="mf-input-group">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Success url:', 'metform'); ?></label>
								<input type="text" name="success_url" class="mf-form-modalinput-success_url attr-form-control" placeholder="<?php esc_html_e('Success url', 'metform'); ?>">
								<span class='mf-input-help'><?php esc_html_e('Users will be redirected to the this link after successfully form submission.','metform'); ?></span>
							</div>
							<br>
							<div class="mf-input-group">
								<label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Failed/ Cancel url:', 'metform'); ?></label>
								<input type="text" name="mf_payment_failed_cancel_url" class="mf-form-modalinput-mf_payment_failed_cancel_url attr-form-control" placeholder="<?php esc_html_e('Failed/Cancel url', 'metform'); ?>">
								<span class='mf-input-help'><?php esc_html_e('Users will be redirected to the this link after any failure/ cancelation of form submission.','metform'); ?></span>
							</div>
							<?php if(class_exists('\MetForm_Pro\Core\Integrations\Payment\Paypal')): ?>
							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="mf_paypal" class="mf-admin-control-input mf-form-modalinput-paypal">
									<span><?php esc_html_e('Paypal:', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('Integrate paypal payment with this form.','metform'); ?><a target="_blank" href="<?php echo get_dashboard_url().'admin.php?page=metform-menu-settings'; ?>"><?php esc_html_e('Configure paypal payment.', 'metform'); ?></a></span>
							</div>
							<?php endif ?>
							<br>

							<?php if(class_exists('\MetForm_Pro\Core\Integrations\Payment\Stripe')): ?>
							<div class="mf-input-group">
								<label class="attr-input-label">
									<input type="checkbox" value="1" name="mf_stripe" class="mf-admin-control-input mf-form-modalinput-stripe">
									<span><?php esc_html_e('Stripe:', 'metform'); ?></span>
								</label>
								<span class='mf-input-help'><?php esc_html_e('Integrate stripe payment with this form. ','metform'); ?><a target="_blank" href="<?php echo get_dashboard_url().'admin.php?page=metform-menu-settings'; ?>"><?php esc_html_e('Configure stripe payment.', 'metform'); ?></a></span>
							</div>
							<?php endif ?>
							<br>

						</div>
						
					</div>
					<?php endif; ?>

				</div>

				<div class="attr-modal-footer">
					<button type="button" class="attr-btn attr-btn-default metform-form-save-btn-editor"><img class="form-editor-icon" src="<?php echo \MetForm\Plugin::instance()->public_url().'assets/img/elementor-edit-logo.png'; ?>"><?php esc_html_e('Edit content', 'metform'); ?></button>
					<button type="submit" class="attr-btn attr-btn-primary metform-form-save-btn"><?php esc_html_e('Save changes', 'metform'); ?></button>
				</div>

				<div class="mf-spinner"></div>
			</div>
		</form>	
	</div>
</div>