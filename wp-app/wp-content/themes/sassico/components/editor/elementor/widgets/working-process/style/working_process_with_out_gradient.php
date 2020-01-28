<div class="col-lg-3 col-md-6 sassico-single-working-step">
    <div class="sassico-single-working-step-wraper text-center wow sassicozoomIn"  data-wow-delay="<?php echo esc_attr($i);?>00ms" style="--sassico-working-process-color: <?php echo esc_attr($working_process_color)?>">
        <span class="sassico-working-step">
            <span class="sassico-working-step-text">0<?php echo esc_html($i); ?></span>
        </span>
        <?php if ($sassico_working_process_list['sassico_working_process_image']['url'] !== '') { ?>
            <div class="sassico-working-process-icon-wraper">
                <div class="sassico-working-process-icon">
                    <img src="<?php echo esc_url($sassico_working_process_list['sassico_working_process_image']['url'])?>" alt="sassico-working-process-image">
                    <div class="sassico-flat-shadow"></div>
                </div>
            </div>
        <?php }; ?>
        <?php if ($sassico_working_process_list['sassico_working_process_title'] !== '') { ?>
            <h2 class="sassico-wokring-process-title"><?php echo esc_html($sassico_working_process_list['sassico_working_process_title']); ?></h2>	
        <?php }; ?>
    </div>
</div>