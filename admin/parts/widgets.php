<?php
use WebbricksAddons\Elementor\Webbricks_Addons_Manager;
use WebbricksAddons\Elementor\Plugin;
?>

    <div id="widgets" class="wbea-dashboard-tab">
        <div class="wbea-element-filter">
            <div class="wbea-element-filter-btn">
                <ul>
                    <li>
                        <a href="" class="wbea-elements-enable"><?php echo esc_html('Enable All', 'webbricks-addons') ?></a>
                    </li>
                    <li>
                        <a href="" class="wbea-elements-disable"><?php echo esc_html('Disable All', 'webbricks-addons') ?></a>
                    </li>
                </ul>
            </div>
            <div class="wbea-element-filter-text">
                <div class="wbea-element-filter-search">
                    <input id="wbea-element-filter-search-input" type="text" placeholder="<?php echo esc_html('Search Widget', 'webbricks-addons') ?>">
                </div>
            </div>
        </div>
        <div class="wbea-dashboard-checkbox-container">
            <?php ksort(Webbricks_Addons_Manager::$default_widgets); ?>
            <?php foreach (Webbricks_Addons_Manager::$default_widgets as $key => $widget) : ?>
            <?php if (isset($key)) : ?>
                <div class="wbea-dashboard-checkbox-wrapper" data-tag="<?php echo esc_attr($widget['tags']); ?>">
                    <div class="wbea-dashboard-checkbox <?php echo esc_attr($widget['tags']); ?><?php echo ($widget['is_pro'] && !Plugin::$is_pro_active) ? ' inactive' : ' active'; ?>" data-tag="<?php echo esc_attr($widget['tags']); ?>">
                        <?php if (true === $widget['is_pro']) { ?>
                            <div class="wbea-dashboard-item-label">
                                <span class="wbea-el-label"><?php echo esc_html($widget['tags']); ?></span>
                            </div>
                        <?php } ?>
                        <div class="wbea-dashboard-checkbox-text">
                            <p class="exad-el-title"><?php echo esc_html($widget['title']); ?></p>
                        </div>
                        <div class="wbea-dashboard-checkbox-label">
                            <input class="wbea-dashboard-input" type="checkbox" <?php echo ($widget['is_pro'] && !Plugin::$is_pro_active) ? 'disabled="disabled"' : ''; ?> 
                                id="<?php echo esc_attr($key); ?>" name="<?php echo esc_attr($key); ?>" 
                                <?php echo ($widget['is_pro'] && !Plugin::$is_pro_active) ? '' : checked(1, $this->get_dashboard_settings[$key], true); ?>>
                            <label for="<?php echo esc_attr($key); ?>"></label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var checkboxWrappers = document.querySelectorAll('.wbea-dashboard-checkbox-wrapper');

        checkboxWrappers.forEach(function (wrapper) {
            wrapper.addEventListener('click', function () {
                var checkbox = wrapper.querySelector('.wbea-dashboard-input');
                if (!checkbox.disabled) {
                    checkbox.checked = !checkbox.checked;
                }
            });
        });
    });
</script>