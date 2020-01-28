<?php
$settings = \MetForm\Core\Admin\Base::instance()->get_settings_option();
?>
<div class="wrap">
    <h2><?php esc_html_e('MetForm Settings', 'metform');?></h2>
    <div class="mf-settings-tab">
        <h2 class="nav-tab-wrapper">
            <a href="#mf-general_options" class="nav-tab"><?php echo esc_html__('General', 'metform'); ?></a>
            <?php if(class_exists('\MetForm_Pro\Core\Integrations\Payment\Paypal') || class_exists('\MetForm_Pro\Core\Integrations\Payment\Stripe')): ?>
            <a href="#mf-payment_options" class="nav-tab"><?php echo esc_html__('Payment', 'metform'); ?></a>
            <?php endif; ?>
            <a href="#mf-mail_integration" class="nav-tab"><?php echo esc_html__('Mail Integration', 'metform'); ?></a>
        </h2>
    </div>
    <div class="metform-admin-container stuffbox">
        <div class="attr-card-body metform-admin-container--body">
            <form action="" method="post" class="form-group mf-admin-input-text mf-admin-input-text--metform-license-key">

                    <!-- General Tab -->
                    <div class="mf-settings-section" id="mf-general_options">
                        <div class="mf-settings-single-section">
                            <h3 class="mf-settings-single-section--title"><?php esc_html_e('reCaptcha', 'metform');?></h3>
                            <div class="attr-form-group">
                                <label class="mf-setting-label" for="captcha-method"><?php esc_html_e('Select version:', 'metform');?></label>
                                <select name="mf_recaptcha_version" class="mf-setting-input attr-form-control mf-recaptcha-version" id="captcha-method">
                                    <option <?php echo esc_attr((isset($settings['mf_recaptcha_version']) && ($settings['mf_recaptcha_version'] == 'recaptcha-v2')) ? 'Selected' : ''); ?> value="recaptcha-v2"><?php esc_html_e('reCAPTCHA V2', 'metform');?></option>
                                    <option <?php echo esc_attr((isset($settings['mf_recaptcha_version']) && ($settings['mf_recaptcha_version'] == 'recaptcha-v3')) ? 'Selected' : ''); ?> value="recaptcha-v3"><?php esc_html_e('reCAPTCHA V3', 'metform');?></option>
                                </select>
                                <p class="description"><?php esc_html_e('Select google reCaptcha version which one want to use.', 'metform');?></p>
                            </div>
                            
                            <div class="mf-recaptcha-settings-wrapper">
                                <div class="mf-recaptcha-settings" id="mf-recaptcha-v2">
                                    <div class="attr-form-group">
                                        <label class="mf-setting-label"><?php esc_html_e('Site key:', 'metform');?> </label>
                                        <input type="text" name="mf_recaptcha_site_key" value="<?php echo esc_attr((isset($settings['mf_recaptcha_site_key'])) ? $settings['mf_recaptcha_site_key'] : ''); ?>" class="mf-setting-input attr-form-control mf-recaptcha-site-key" placeholder="<?php esc_html_e('Insert site key', 'metform');?>">
                                        <p class="description"><?php esc_html_e('Create google reCaptcha site key from reCaptcha admin panel. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://www.google.com/recaptcha/admin/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform');?></a></p>
                                    </div>
                                    <div class="attr-form-group">
                                        <label  class="mf-setting-label"><?php esc_html_e('Secret key:', 'metform');?> </label>
                                        <input type="text" name="mf_recaptcha_secret_key" value="<?php echo esc_attr((isset($settings['mf_recaptcha_secret_key'])) ? $settings['mf_recaptcha_secret_key'] : ''); ?>" class="mf-setting-input attr-form-control mf-recaptcha-secret-key" placeholder="<?php esc_html_e('Insert secret key', 'metform');?>">
                                        <p class="description"><?php esc_html_e('Create google reCaptcha secret key from reCaptcha admin panel. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://www.google.com/recaptcha/admin/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform');?></a></p>
                                    </div>
                                </div>

                                <div class="mf-recaptcha-settings" id="mf-recaptcha-v3">
                                    <div class="attr-form-group">
                                        <label class="mf-setting-label"><?php esc_html_e('Site key:', 'metform');?> </label>
                                        <input type="text" name="mf_recaptcha_site_key_v3" value="<?php echo esc_attr((isset($settings['mf_recaptcha_site_key_v3'])) ? $settings['mf_recaptcha_site_key_v3'] : ''); ?>" class="mf-setting-input attr-form-control mf-recaptcha-site-key" placeholder="<?php esc_html_e('Insert site key', 'metform');?>">
                                        <p class="description"><?php esc_html_e('Create google reCaptcha site key from reCaptcha admin panel. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://www.google.com/recaptcha/admin/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform');?></a></p>
                                    </div>
                                    <div class="attr-form-group">
                                        <label  class="mf-setting-label"><?php esc_html_e('Secret key:', 'metform');?> </label>
                                        <input type="text" name="mf_recaptcha_secret_key_v3" value="<?php echo esc_attr((isset($settings['mf_recaptcha_secret_key_v3'])) ? $settings['mf_recaptcha_secret_key_v3'] : ''); ?>" class="mf-setting-input attr-form-control mf-recaptcha-secret-key" placeholder="<?php esc_html_e('Insert secret key', 'metform');?>">
                                        <p class="description"><?php esc_html_e('Create google reCaptcha secret key from reCaptcha admin panel. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://www.google.com/recaptcha/admin/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform');?></a></p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <?php if (class_exists('\MetForm_Pro\Base\Package')): ?>
                        <div class="mf-settings-single-section">
                            <h3 class="mf-settings-single-section--title"><?php esc_html_e('Map', 'metform');?></h3>
                            <div class="attr-form-group">
                                <label class="mf-setting-label"><?php esc_html_e('Map API:', 'metform');?> </label>
                                <input type="text" name="mf_google_map_api_key" value="<?php echo esc_attr((isset($settings['mf_google_map_api_key'])) ? $settings['mf_google_map_api_key'] : ''); ?>" class="mf-setting-input attr-form-control mf-google-map-api-key" placeholder="<?php esc_html_e('Insert map api key', 'metform');?>">
                                <p class="description"><?php esc_html_e('Create google map api key from google developer console. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://console.cloud.google.com/google/maps-apis/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform');?></a></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- ./End General Tab -->

                    <!-- Payment Tab -->
                    <div class="mf-settings-section" id="mf-payment_options">
                        <div class="mf-settings-single-section">
                            <?php if (class_exists('\MetForm_Pro\Core\Integrations\Payment\Paypal')): ?>
                                <h3 class="mf-settings-single-section--title"><?php esc_html_e('Paypal', 'metform');?></h3>
                                <div class="attr-form-group">
                                    <label class="mf-setting-label"><?php esc_html_e('Paypal email:', 'metform');?></label>
                                    <input type="email" name="mf_paypal_email" value="<?php echo esc_attr((isset($settings['mf_paypal_email'])) ? $settings['mf_paypal_email'] : ''); ?>" class="mf-setting-input mf-paypal-email attr-form-control" placeholder="<?php esc_html_e('Paypal email', 'metform');?>">
                                    <p class="description"><?php esc_html_e('Enter here your paypal email. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://www.paypal.com/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform');?></a></p>
                                </div>
                                <div class="attr-form-group">
                                    <label class="mf-setting-label"><?php esc_html_e('Paypal token:', 'metform');?></label>
                                    <input type="text" name="mf_paypal_token" value="<?php echo esc_attr((isset($settings['mf_paypal_token'])) ? $settings['mf_paypal_token'] : ''); ?>" class="mf-setting-input mf-paypal-token attr-form-control" placeholder="<?php esc_html_e('Paypal token', 'metform');?>">
                                    <p class="description"><?php esc_html_e('Enter here your paypal token. This is optional. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://www.paypal.com/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform');?></a></p>
                                </div>
                                <div class="attr-form-group">
                                    <label class="mf-setting-label"><?php esc_html_e('Enable sandbox mode:', 'metform');?>
                                        <input type="checkbox" value="1" name="mf_paypal_sandbox" <?php echo esc_attr((isset($settings['mf_paypal_sandbox'])) ? 'Checked' : ''); ?> class="mf-admin-control-input mf-form-modalinput-paypal_sandbox">
                                        <p class="description"><?php esc_html_e('Enable this for testing payment method. ', 'metform');?></p>
                                    </label>
                                </div>
                            <?php endif;?>
                        </div>

                        <div class="mf-settings-single-section">
                            <?php if (class_exists('\MetForm_Pro\Core\Integrations\Payment\Stripe')): ?>
                                <h3 class="mf-settings-single-section--title"><?php esc_html_e('Stripe', 'metform');?></h3>
                                <div class="attr-form-group">
                                    <label for="attr-input-label" class="mf-setting-label attr-input-label"><?php esc_html_e('Image url:', 'metform');?></label>
                                    <input type="text" name="mf_stripe_image_url" value="<?php echo esc_attr((isset($settings['mf_stripe_image_url'])) ? $settings['mf_stripe_image_url'] : ''); ?>" class="mf-setting-input mf-stripe-image-url attr-form-control" placeholder="<?php esc_html_e('Stripe image url', 'metform');?>">
                                    <p class="description"><?php esc_html_e('Enter here your stripe image url. This image will show on stripe payment pop up modal. ', 'metform');?></p>
                                </div>
                                <div class="attr-form-group">
                                    <label for="attr-input-label" class="mf-setting-label attr-input-label"><?php esc_html_e('Live publishiable key:', 'metform');?></label>
                                    <input type="text" name="mf_stripe_live_publishiable_key" value="<?php echo esc_attr((isset($settings['mf_stripe_live_publishiable_key'])) ? $settings['mf_stripe_live_publishiable_key'] : ''); ?>" class="mf-setting-input mf-stripe-live-publishiable-key attr-form-control" placeholder="<?php esc_html_e('Stripe live publishiable key', 'metform');?>">
                                    <p class="description"><?php esc_html_e('Enter here your stripe live publishiable key. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://stripe.com/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform');?></a></p>
                                </div>
                                <div class="attr-form-group">
                                    <label for="attr-input-label" class="mf-setting-label attr-input-label"><?php esc_html_e('Live secret key:', 'metform');?></label>
                                    <input type="text" name="mf_stripe_live_secret_key" value="<?php echo esc_attr((isset($settings['mf_stripe_live_secret_key'])) ? $settings['mf_stripe_live_secret_key'] : ''); ?>" class="mf-setting-input mf-stripe-live-secret-key attr-form-control" placeholder="<?php esc_html_e('Stripe live secret key', 'metform');?>">
                                    <p class="description"><?php esc_html_e('Enter here your stripe live secret key. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://stripe.com/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform');?></a></p>
                                </div>
                                <div class="attr-form-group">
                                    <label class="mf-setting-label attr-input-label">
                                        <?php esc_html_e('Enable sandbox mode:', 'metform');?>
                                        <input type="checkbox" value="1" name="mf_stripe_sandbox" <?php echo esc_attr((isset($settings['mf_stripe_sandbox'])) ? 'Checked' : ''); ?> class="mf-admin-control-input mf-form-modalinput-stripe_sandbox">
                                        <p class="description"><?php esc_html_e('Enable this for testing your payment system. ', 'metform');?></p>
                                    </label>
                                </div>
                                <div class="mf-form-modalinput-stripe_sandbox_keys">
                                    <div class="attr-form-group">
                                        <label for="attr-input-label" class="mf-setting-label attr-input-label"><?php esc_html_e('Test publishiable key:', 'metform');?></label>
                                        <input type="text" name="mf_stripe_test_publishiable_key" value="<?php echo esc_attr((isset($settings['mf_stripe_test_publishiable_key'])) ? $settings['mf_stripe_test_publishiable_key'] : ''); ?>" class="mf-setting-input mf-stripe-test-publishiable-key attr-form-control" placeholder="<?php esc_html_e('Stripe test publishiable key', 'metform');?>">
                                        <p class="description"><?php esc_html_e('Enter here your test publishiable key. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://stripe.com/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform');?></a></p>
                                    </div>
                                    <div class="attr-form-group">
                                        <label for="attr-input-label" class="mf-setting-label attr-input-label"><?php esc_html_e('Test secret key:', 'metform');?></label>
                                        <input type="text" name="mf_stripe_test_secret_key" value="<?php echo esc_attr((isset($settings['mf_stripe_test_secret_key'])) ? $settings['mf_stripe_test_secret_key'] : ''); ?>" class="mf-setting-input mf-stripe-test-secret-key attr-form-control" placeholder="<?php esc_html_e('Stripe test secret key', 'metform');?>">
                                        <p class="description"><?php esc_html_e('Enter here your test secret key. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://stripe.com/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform');?></a></p>
                                    </div>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- ./End Payment Tab -->

                    <!-- Mail Integration Tab -->
                    <div class="mf-settings-section" id="mf-mail_integration">
                        <div class="mf-settings-single-section">
                            <h3 class="mf-settings-single-section--title"><?php esc_html_e('Campaign', 'metform');?></h3>
                            <?php if (class_exists('\MetForm\Core\Integrations\Mail_Chimp')): ?>
                                <div class="attr-form-group">
                                    <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('MailChimp API Key:', 'metform');?></label>
                                    <input type="text" name="mf_mailchimp_api_key" value="<?php echo esc_attr((isset($settings['mf_mailchimp_api_key'])) ? $settings['mf_mailchimp_api_key'] : ''); ?>" class="mf-setting-input mf-mailchimp-api-key attr-form-control" placeholder="<?php esc_html_e('Mailchimp api key', 'metform');?>">
                                    <p class="description"><?php esc_html_e('Enter here your Mailchimp api key. ', 'metform');?><a target="__blank" href="<?php echo esc_url('https://admin.mailchimp.com/'); ?>"><?php esc_html_e('Get API.', 'metform'); ?></a></p>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- ./End Mail Integration Tab -->

                    <input type="hidden" name="mf_settings_page_action" value="save">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_attr_e('Save Changes', 'metform');?>">

                    <?php wp_nonce_field('metform-settings-page', 'metform-settings-page');?>
                </form>
            </div>
        </div>
    </div>