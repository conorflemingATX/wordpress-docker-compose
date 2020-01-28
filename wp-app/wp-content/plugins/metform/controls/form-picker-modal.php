<div id="metform-open-content-editor" style="display:none;">
    <div class="metform-open-content-inner">
        <div class="metform-content">
		<ul class="metform-content-editor-tab">
            <li class="metform-content-editor-tab-item active" data-target="metform-select-form-content">
                <label>
                    <input class="metform-content-editor-radio" name="metform-editor-tab" type="radio" checked value="saved">

                    <div class="metform-content-editor-radio-data">
                        <p><?php esc_html_e('Select Form', 'metform') ?></p>
                        <span><?php esc_html_e('Select saved form', 'metform') ?></span>
                    </div>
                </label>
            </li>

            <li class="metform-content-editor-tab-item" data-target="metform-templates-content">
                <label>
                    <input class="metform-content-editor-radio" name="metform-editor-tab" type="radio" value="template">

                    <div class="metform-content-editor-radio-data">
                        <p><?php esc_html_e('New', 'metform') ?></p>
                        <span><?php esc_html_e('Create new form', 'metform') ?></span>
                    </div>
                </label>
            </li>
        </ul>

        <div class="metform-editor-tab-content">
            <div class="metform-editor-tab-content-item active" id="metform-select-form-content">
                <select name="metform-saved-form" class="metform-open-content-editor-templates metform-editor-input"></select>
            </div>
            <div class="metform-editor-tab-content-item" id="metform-templates-content">

				<div class="metform-template-input-con">
					<input type="text" class="metform-editor-input" placeholder="<?php esc_html_e('Enter a form name', 'metform'); ?>">
				</div>

                <ul class="metform-templates-list">
                    <li>
                        <label>
                            <input class="metform-template-radio" name="metform-editor-template" type="radio" value="0" checked>
                            <div class="metform-template-radio-data"> </div>
                        </label>
                    </li>

                    <?php foreach(\MetForm\Templates\Base::instance()->get_templates() as $template): ?>
                        <li>
                            <label>
                                <input class="metform-template-radio" name="metform-editor-template" type="radio" value="<?php echo esc_attr($template['id']); ?>">
                                <div class="metform-template-radio-data">
                                    <img src="<?php echo esc_url($template['preview-thumb']); ?>" alt="<?php echo esc_attr($template['title']) ?>">
                                </div>
                            </label>
                        </li>
                    <?php endforeach; ?>

                </ul>

            </div>
		</div>
		
		<button  resturl="<?php echo get_rest_url() ?>metform/v1/forms/"  class="metform-open-content-editor-button"><span class="eicon-elementor"></span><?php esc_html_e('Edit form', 'metform') ?></button>

		<span class="metform-close-editor-modals metform-picker-close"><?php esc_html_e('Save & close', 'metform'); ?></span>
        
        <i class="eicon-close metform-close-editor-modals" aria-hidden="true" title="<?php echo esc_attr__('Close', 'metform'); ?>"></i>
		</div>
    </div>
</div>
