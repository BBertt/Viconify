// Videos Dropdown
function toggleAddDropdown() {
    const dropdown = document.getElementById('addDropdown');
    dropdown.classList.toggle('hidden');
}

document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('addDropdown');
    if (!dropdown.contains(event.target) && !dropdown.previousElementSibling.contains(event.target)) {
        dropdown.classList.add('hidden');
    }
});

function showEditModal(videoId) {
    fetch(`/video/edit/${videoId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('editTitle').value = data.Title;
            document.getElementById('editDescription').value = data.Description;
            document.getElementById('editForm').action = `/video/update/${videoId}`;
            document.getElementById('editModal').classList.remove('hidden');
        });
}

function showEditProductModal(productId) {
    fetch(`/product/edit/${productId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('editProductName').value = data.ProductName;
            document.getElementById('editProductDescription').value = data.ProductDescription;
            document.getElementById('editProductPrice').value = data.ProductPrice;
            document.getElementById('editQuantity').value = data.Quantity;
            document.getElementById('editProductForm').action = `/product/update/${productId}`;
            document.getElementById('editProductModal').classList.remove('hidden');
        });
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editProductModal').classList.add('hidden');
}

//Add Dropdown
function toggleDropdown(element) {
    const dropdown = element.nextElementSibling;
    dropdown.classList.toggle('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

function showModal(modalId) {
    closeAllModals();
    document.getElementById(modalId).classList.remove('hidden');
}

function closeModalOnClickOutside(event, modalId) {
    const modal = document.getElementById(modalId);
    if (event.target === modal) {
        closeModal(modalId);
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
}

function closeAllModals() {
    document.getElementById('addVideoModal').classList.add('hidden');
    document.getElementById('addProductModal').classList.add('hidden');
    document.getElementById('addPostModal').classList.add('hidden');
    document.getElementById('addVideoModalShort').classList.add('hidden');
}

document.addEventListener('click', function(event) {
    const dropdowns = document.querySelectorAll('.dropdown-menu');
    dropdowns.forEach(dropdown => {
        if (!dropdown.contains(event.target) && !dropdown.previousElementSibling.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
});

// Hover + Tab
function showTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(function(tabContent) {
        tabContent.classList.add('hidden');
    });
    document.getElementById(tabId).classList.remove('hidden');

    document.querySelectorAll('.tab-link').forEach(function(tabLink) {
        tabLink.classList.remove('bg-blue-500', 'text-white');
        tabLink.classList.add('bg-white', 'text-black', 'border');
    });

    event.target.classList.add('bg-blue-500', 'text-white');
    event.target.classList.remove('bg-white', 'text-black', 'border');
}

function showEditModal(postId, title, description) {
    const editPostForm = document.getElementById('editPostForm');
    console.log(title);
    editPostForm.setAttribute('action', `/posts/${postId}`);
    document.getElementById('editPostId').value = postId;
    document.getElementById('editPostTitle').value = title;
    document.getElementById('editPostDescription').value = description;
    document.getElementById('editPostModal').classList.remove('hidden');
}

function toggleDropdown(element) {
    const dropdown = element.nextElementSibling;
    dropdown.classList.toggle('hidden');
}

function closeModalOnClickOutside(event, modalId) {
    const modal = document.getElementById(modalId);
    if (event.target === modal) {
        modal.classList.add('hidden');
    }
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

function showSlide(postId, index) {
    const slides = document.querySelectorAll(`#carousel-${postId} .carousel-item`);
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
    });
}

function nextSlide(postId) {
    const slides = document.querySelectorAll(`#carousel-${postId} .carousel-item`);
    const activeSlide = Array.from(slides).findIndex(slide => slide.classList.contains('active'));
    const nextIndex = (activeSlide + 1) % slides.length;
    showSlide(postId, nextIndex);
}

function prevSlide(postId) {
    const slides = document.querySelectorAll(`#carousel-${postId} .carousel-item`);
    const activeSlide = Array.from(slides).findIndex(slide => slide.classList.contains('active'));
    const prevIndex = (activeSlide - 1 + slides.length) % slides.length;
    showSlide(postId, prevIndex);
}

function copyToClipboard(url) {
    const tempInput = document.createElement('input');
    tempInput.style.position = 'absolute';
    tempInput.style.left = '-9999px';
    tempInput.value = url;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    alert('URL copied to clipboard: ' + url);
}
