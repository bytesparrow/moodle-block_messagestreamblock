define(['jquery'], function ($) {
    return {
        init: function () {
            const isBook = window.location.pathname.includes('/mod/book/view.php');
            if (!isBook)
            {
                return;
            }

            const $block = $('[data-block="messagestream"]');
            const $toc = $('section.block_book_toc.block_fake'); // oder andere geeignete Referenz

            if ($block.length && $toc.length) {
                // Verschiebe den Block vor das TOC
                $block.insertBefore($toc);
            }
        }
    };
});

