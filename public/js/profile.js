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

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
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
