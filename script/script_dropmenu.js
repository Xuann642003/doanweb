const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
    const dropdownContent = dropdown.querySelector('.dropdown-content');

    dropdown.addEventListener('mouseenter', () => {
        dropdownContent.style.display = 'block';
    });

    dropdown.addEventListener('mouseleave', () => {
        dropdownContent.style.display = 'none'; 
    });
});