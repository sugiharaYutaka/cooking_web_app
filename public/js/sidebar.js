document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar');
    const sidebarCloseButton = document.getElementById('sidebar-close-button');
    const content = document.querySelector('.col-md-9');

    sidebarCloseButton.addEventListener('click', function() {
        sidebar.classList.toggle('sidebar-closed');

        if (sidebar.classList.contains('sidebar-closed')) {
            content.classList.remove('col-md-9');
            content.classList.add('col-md-12');
        } else {
            content.classList.remove('col-md-12');
            content.classList.add('col-md-9');
        }
    });
});
