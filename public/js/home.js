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
});
