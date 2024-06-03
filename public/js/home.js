document.addEventListener('DOMContentLoaded', () => {
    const scrollContainer = document.getElementById('scrollContainer');
    const scrollLeft = document.getElementById('scrollLeft');
    const scrollRight = document.getElementById('scrollRight');

    const updateScrollButtons = () => {
        if (scrollContainer.scrollLeft <= 0) {
            scrollLeft.classList.add('hidden');
        } else {
            scrollLeft.classList.remove('hidden');
        }

        if (scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth) {
            scrollRight.classList.add('hidden');
        } else {
            scrollRight.classList.remove('hidden');
        }
    };

    scrollLeft.addEventListener('click', () => {
        scrollContainer.scrollBy({
            left: -100,
            behavior: 'smooth'
        });
    });

    scrollRight.addEventListener('click', () => {
        scrollContainer.scrollBy({
            left: 100,
            behavior: 'smooth'
        });
    });

    scrollContainer.addEventListener('scroll', updateScrollButtons);

    updateScrollButtons(); // Initial check

    const searchBar = document.getElementById('searchBar');
    const recommendations = document.getElementById('recommendations');

    const searchSuggestions = ["Mixes", "Music", "Games", "Valorant", "Python", "Visual Studio 2022", "Genshin Impact", "Laravel 9", "Adobe Photoshop", "Blender", "Unreal Engine"];

    searchBar.addEventListener('input', (event) => {
        const query = event.target.value.toLowerCase();
        recommendations.innerHTML = '';
        if (query) {
            const filteredSuggestions = searchSuggestions.filter(suggestion =>
                suggestion.toLowerCase().includes(query)
            );
            filteredSuggestions.forEach(suggestion => {
                const suggestionItem = document.createElement('div');
                suggestionItem.className = 'p-2 cursor-pointer hover:bg-gray-200';
                suggestionItem.innerText = suggestion;
                suggestionItem.addEventListener('click', () => {
                    searchBar.value = suggestion;
                    recommendations.innerHTML = '';
                    recommendations.classList.add('hidden');
                    // Trigger search logic here
                    handleSearch(suggestion);
                });
                recommendations.appendChild(suggestionItem);
            });
            recommendations.classList.remove('hidden');
        } else {
            recommendations.classList.add('hidden');
        }
    });

    document.addEventListener('click', (event) => {
        if (!searchBar.contains(event.target) && !recommendations.contains(event.target)) {
            recommendations.classList.add('hidden');
        }
    });

    const handleSearch = (query) => {
        // Implement your search logic here
        console.log('Searching for:', query);
        // For example, you might want to submit a form or redirect the user to a search results page
        // window.location.href = `/search?q=${encodeURIComponent(query)}`;
    };

    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;

    document.getElementById('next').addEventListener('click', function() {
        console.log('clicked')
        goToSlide(currentSlide + 1);
    });

    document.getElementById('prev').addEventListener('click', function() {
        goToSlide(currentSlide - 1);
    });

    function goToSlide(n) {
        slides[currentSlide].classList.remove('active');
        currentSlide = (n + totalSlides) % totalSlides;
        slides[currentSlide].classList.add('active');
    }
});

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
