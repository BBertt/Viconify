$(document).ready(function(){
    // Existing quantity adjustment code
    function updateSubtotal(quantity, price) {
        const subtotal = quantity * price;
        $('#subtotal').val(`Rp ${subtotal.toLocaleString('id-ID', { minimumFractionDigits: 0 })}`);
    }

    $('.btn-number').click(function(e){
        e.preventDefault();

        let fieldName = $(this).attr('data-field');
        let type = $(this).attr('data-type');
        let input = $("input[name='"+fieldName+"']");
        let currentVal = parseInt(input.val());
        let minValue = parseInt(input.attr('min'));
        let maxValue = parseInt(input.attr('max'));

        if (!isNaN(currentVal)) {
            if(type === 'minus' && currentVal > minValue) {
                input.val(currentVal - 1).change();
            } else if(type === 'plus' && currentVal < maxValue) {
                input.val(currentVal + 1).change();
            }
            updateSubtotal(input.val(), window.productPrice);
        } else {
            input.val(1);
            updateSubtotal(1, window.productPrice);
        }
    });

    $('.input-number').change(function() {
        let valueCurrent = parseInt($(this).val());
        let minValue = parseInt($(this).attr('min'));
        let maxValue = parseInt($(this).attr('max'));

        if (valueCurrent >= minValue && valueCurrent <= maxValue) {
            $(this).val(valueCurrent);
        } else if (valueCurrent < minValue) {
            $(this).val(minValue);
        } else {
            $(this).val(maxValue);
        }
        updateSubtotal($(this).val(), window.productPrice);
    });

    $('.input-number').keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode === 65 && e.ctrlKey === true) ||
            // Allow: Ctrl+C
            (e.keyCode === 67 && e.ctrlKey === true) ||
            // Allow: Ctrl+X
            (e.keyCode === 88 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    
    const images = window.productImages;
    let currentIndex = 0;
    const productImage = document.getElementById('productImage');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    // console.log('Loaded images:', images);

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
        productImage.src = `/storage/${images[currentIndex]}`;
        // console.log('Prev button clicked, currentIndex:', currentIndex);
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
        productImage.src = `/storage/${images[currentIndex]}`;
        // console.log('Next button clicked, currentIndex:', currentIndex);
    });
});
