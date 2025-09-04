define(['jquery'], function ($) {
    return {
        init: function () {


            const $block = $('[data-block="messagestreamblock"]');
            const $toc = $('section.block_book_toc.block_fake'); // oder andere geeignete Referenz

            if ($block.length && $toc.length) {
                // Verschiebe den Block vor das TOC
                $block.insertBefore($toc);
            }
        }
    };
});

