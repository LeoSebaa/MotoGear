

document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const tableSections = document.querySelectorAll('.table-section');

    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const sectionId = this.getAttribute('data-section');

        
            navLinks.forEach(l => l.classList.remove('active'));
            tableSections.forEach(s => s.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(sectionId).classList.add('active');
        });
    });
});
