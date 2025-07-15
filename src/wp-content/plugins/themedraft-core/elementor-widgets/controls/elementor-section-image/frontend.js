;(function ($, window, document) {
    'use strict';

    $(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/section', function ($scope) {

            if (elementorFrontend.isEditMode()) {

                var settings = elementorFrontend.config.elements.data[$scope.data('model-cid')].attributes;

                if (settings && settings.td_section_images.length) {

                    $scope.find('.td-section-image-' + $scope.data('id')).remove();

                    var $items = '';

                    $.each(settings.td_section_images.models, function (index, item) {
                        $items += '<div class="td-section-image td-section-image-' + $scope.data('id') + ' elementor-repeater-item-' + item.attributes._id + '"></div>';
                    });

                    if ($items.length) {
                        $scope.prepend($items);
                    }

                }

            } else {

                if ($scope.data('td-section-image')) {

                    var $items = $('.td-section-image-' + $scope.data('id'));

                    if ($items.length) {
                        $scope.prepend($items);
                    }

                }

            }

        });

    });

})(jQuery, window, document);
