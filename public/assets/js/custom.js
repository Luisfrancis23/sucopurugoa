(function() {
    'use strict';

    $(document).ready(function() {

        /* ===== TOOLTIPS ===== */
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(el) {
            return new bootstrap.Tooltip(el);
        });

        /* ===== SIDEBAR ACTIVE STATE ===== */
        var currentPath = window.location.pathname;
        $('.nav-sidebar a').each(function() {
            var href = $(this).attr('href');
            if (href && currentPath.indexOf(href) !== -1 && href !== '#') {
                $(this).addClass('active');
                $(this).closest('.has-treeview').addClass('menu-open');
            }
        });

        /* ===== AUTO CALCULATE AGE ===== */
        $('input[name="birth_date"]').on('change', function() {
            var birthDate = $(this).val();
            if (birthDate) {
                var today = new Date();
                var birth = new Date(birthDate);
                var age = today.getFullYear() - birth.getFullYear();
                var m = today.getMonth() - birth.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) {
                    age--;
                }
                var ageInput = $('input[name="age"]');
                if (ageInput.length) {
                    ageInput.val(age);
                }
            }
        });

        /* ===== INPUT VALIDATION ===== */
        $('.input-number').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $('input[name="phone"]').on('input', function() {
            this.value = this.value.replace(/[^0-9+]/g, '');
        });

        /* ===== SCROLL TO TOP ===== */
        var scrollBtn = $('<button id="scrollTopBtn"><i class="fas fa-arrow-up"></i></button>');
        $('body').append(scrollBtn);

        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 400) {
                $('#scrollTopBtn').addClass('show');
            } else {
                $('#scrollTopBtn').removeClass('show');
            }
        });

        $('#scrollTopBtn').on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 400);
        });

        /* ===== KEYBOARD SHORTCUTS ===== */
        $(document).on('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 's') {
                var form = $('form').last();
                if (form.length && form.find('[type="submit"]').length) {
                    e.preventDefault();
                    form.find('[type="submit"]').click();
                }
            }
        });

        /* ===== FORM ENHANCEMENTS ===== */
        $('form').on('reset', function() {
            var self = this;
            setTimeout(function() {
                $(self).find('select').trigger('change');
            }, 50);
        });

        $('.form-control').on('focus', function() {
            $(this).closest('.form-group').addClass('focused');
        }).on('blur', function() {
            $(this).closest('.form-group').removeClass('focused');
        });

        /* ===== TABLE ROW LINK ===== */
        $('.table-clickable tbody tr').css('cursor', 'pointer').on('click', function() {
            var link = $(this).find('a.btn-view').attr('href');
            if (link) window.location.href = link;
        });

        /* ===== AUTO-RESIZE TEXTAREA ===== */
        $('textarea').each(function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 200) + 'px';
        }).on('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 200) + 'px';
        });
    });

    /* ===== IMAGE PREVIEW ===== */
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + previewId).attr('src', e.target.result).show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    /* ===== LOADING SPINNER ===== */
    function showLoading() {
        Swal.fire({
            title: 'Prosesa...',
            text: 'Favor hein momentu.',
            allowOutsideClick: false,
            didOpen: function() {
                Swal.showLoading();
            }
        });
    }

    function hideLoading() {
        Swal.close();
    }

    /* ===== CONFIRMATION DIALOG ===== */
    function confirmAction(message, callback) {
        Swal.fire({
            title: 'Konfirmasaun',
            text: message || 'Ita boot nia serteza?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#4e73df',
            cancelButtonColor: '#858796',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Kansela',
            reverseButtons: true
        }).then(function(result) {
            if (result.isConfirmed && typeof callback === 'function') {
                callback();
            }
        });
    }

    /* ===== SUCCESS TOAST ===== */
    function showToast(message, type) {
        type = type || 'success';
        var bg = type === 'success' ? '#1cc88a' : type === 'error' ? '#e74a3b' : type === 'warning' ? '#f6c23e' : '#4e73df';
        var icon = type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : type === 'warning' ? 'fa-exclamation-triangle' : 'fa-info-circle';
        var title = type === 'success' ? 'Susesu!' : type === 'error' ? 'Erro!' : type === 'warning' ? 'Atenaun!' : 'Informasaun';

        var toast = $(`
            <div class="toast-notification" style="
                background: ${bg};
                color: #fff;
                padding: 14px 20px;
                border-radius: 10px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.15);
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 8px;
                animation: slideInRight 0.3s ease;
                max-width: 380px;
                z-index: 9999;
            ">
                <i class="fas ${icon}" style="font-size: 1.3rem;"></i>
                <div>
                    <strong style="font-size: 0.85rem;">${title}</strong>
                    <p style="margin: 2px 0 0; font-size: 0.82rem; opacity: 0.9;">${message}</p>
                </div>
            </div>
        `);

        var container = $('.toast-container');
        if (!container.length) {
            container = $('<div class="toast-container"></div>');
            $('body').append(container);
        }
        container.append(toast);

        setTimeout(function() {
            toast.fadeOut(300, function() { $(this).remove(); });
        }, 4000);
    }

    window.previewImage = previewImage;
    window.showLoading = showLoading;
    window.hideLoading = hideLoading;
    window.confirmAction = confirmAction;
    window.showToast = showToast;
})();
