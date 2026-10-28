const dashboardShell = document.querySelector('.dashboard-shell');

if (dashboardShell) {
    const sidebar = dashboardShell.querySelector('.dashboard-sidebar');
    const menuButton = dashboardShell.querySelector('[data-dashboard-menu-toggle]');
    const backdrop = dashboardShell.querySelector('[data-dashboard-sidebar-backdrop]');

    if (sidebar && menuButton && backdrop) {
        const setSidebarOpen = (isOpen) => {
            sidebar.classList.toggle('is-open', isOpen);
            backdrop.classList.toggle('is-visible', isOpen);
            menuButton.setAttribute('aria-expanded', String(isOpen));
            document.body.classList.toggle('dashboard-sidebar-open', isOpen);
        };

        menuButton.addEventListener('click', () => {
            setSidebarOpen(menuButton.getAttribute('aria-expanded') !== 'true');
        });

        backdrop.addEventListener('click', () => setSidebarOpen(false));
        sidebar.querySelectorAll('nav a, form button').forEach((item) => {
            item.addEventListener('click', () => setSidebarOpen(false));
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                setSidebarOpen(false);
            }
        });

        window.matchMedia('(min-width: 1024px)').addEventListener('change', (event) => {
            if (event.matches) {
                setSidebarOpen(false);
            }
        });
    }
}
