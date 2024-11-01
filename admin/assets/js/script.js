jQuery(function($) {
    'use strict';

    // Dashboard Tabs
$('.wbea-dashboard-tabs li.wbea-tab-btn a').on('click', function(e) {
    e.preventDefault();
    let $this = $(this);

    // Remove "active" class from all tab buttons
    $('.wbea-dashboard-tabs li.wbea-tab-btn a').removeClass('active');

    // Add "active" class to the clicked tab button
    $this.addClass('active');

    // Remove "active" class from all tabs
    $('.wbea-dashboard-tabs-box > div').removeClass('active');

    // Add "active" class to the corresponding tab
    let tab = $this.attr('href');
    $(`.wbea-dashboard-tabs-box ${tab}`).addClass('active');
});

function updateActiveSwitcherPosition(tab) {
    $('.wbea-dashboard-tab, .wbea-dashboard-tabs li.wbea-tab-btn a').removeClass('active');
    $(`.wbea-dashboard-tabs-box ${tab}`).addClass('active');
}


    // Save Button reacting on any changes
    let saveHeaderAction = $('.wbea-dashboard-header-right .wbea-btn');
    $('.wbea-dashboard-tab input, .wbea-dashboard-tab button').on('click', () => handleSaveButtonState());

    function handleSaveButtonState() {
        saveHeaderAction.addClass('wbea-save-now').removeAttr('disabled').css('cursor', 'pointer');
    }

    // Saving Data With Ajax Request
    $('.wbea-save-setting').on('click', function(e) {
        e.preventDefault();
        let $this = $(this);
        if ($this.hasClass('wbea-save-now')) {
            $.ajax({
                url: wbea_js_settings.ajaxurl,
                type: 'post',
                data: {
                    action: 'wbea_ajax_save_elements_setting',
                    security: wbea_js_settings.ajax_nonce,
                    fields: $('#wbea-elements-settings').serialize(),
                },
                beforeSend: function() {
                    $this.html('<svg id="wbea-spinner" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><circle cx="24" cy="4" r="4" fill="#fff"/><circle cx="12.19" cy="7.86" r="3.7" fill="#fffbf2"/><circle cx="5.02" cy="17.68" r="3.4" fill="#fef7e4"/><circle cx="5.02" cy="30.32" r="3.1" fill="#fef3d7"/><circle cx="12.19" cy="40.14" r="2.8" fill="#feefc9"/><circle cx="24" cy="44" r="2.5" fill="#feebbc"/><circle cx="35.81" cy="40.14" r="2.2" fill="#fde7af"/><circle cx="42.98" cy="30.32" r="1.9" fill="#fde3a1"/><circle cx="42.98" cy="17.68" r="1.6" fill="#fddf94"/><circle cx="35.81" cy="7.86" r="1.3" fill="#fcdb86"/></svg><span>Saving Data..</span>');
                },
                success: function(response) {
                    $this.html('Save Settings');
                    $('.wbea-dashboard-header-right').prepend('<span class="wbea-settings-saved">Settings Saved</span>').fadeIn('slow');
                    saveHeaderAction.removeClass('wbea-save-now');
                    setTimeout(function() {
                        $('.wbea-settings-saved').fadeOut('slow');
                    }, 2000);
                },
                error: function() {}
            });
        } else {
            $this.attr('disabled', 'true').css('cursor', 'not-allowed');
        }
    });

    // Checkbox handling
    let inputCheck = $('.wbea-dashboard-checkbox.active .wbea-dashboard-checkbox-label input');
    inputCheck.each(function() {
        if ($(this).prop("checked")) {
            $(this).closest(".wbea-dashboard-checkbox.active").addClass("selected");
        }
    });

    inputCheck.change(function() {
        if ($(this).is(":checked")) {
            $(this).closest(".wbea-dashboard-checkbox.active").addClass("selected");
        } else {
            $(this).closest(".wbea-dashboard-checkbox.active").removeClass("selected");
        }
    });

    // Enable All and Disable All functionality
    $('.wbea-elements-enable, .wbea-elements-disable').click(function(e) {
        e.preventDefault();
        let selected = $(this).hasClass('wbea-elements-enable');
        inputCheck.each(function() {
            let checkBoxActive = $(this).closest(".wbea-dashboard-checkbox.active");
            if (checkBoxActive.css('display') === 'flex') {
                checkBoxActive.toggleClass("selected", selected);
                $(this).prop('checked', selected).change();
            }
        });
        saveHeaderAction.addClass('wbea-save-now');
    });

    // Search Filter
    let inputSearch = $('#wbea-element-filter-search-input');
    let searchResult = $('.wbea-dashboard-checkbox-container .wbea-dashboard-checkbox');
    inputSearch.on("keyup", function() {
        let value = $(this).val().toLowerCase();
        searchResult.filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

});
