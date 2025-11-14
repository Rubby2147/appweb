document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.getElementById('menu-button');
    const sidebar = document.querySelector('.sidebar');
    const userButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');
 
    menuButton.addEventListener('click', function () {
      sidebar.classList.toggle('active');
      userMenu.classList.add('hidden'); // esconde o menu de perfil se o menu for aberto
    });
 
    userButton.addEventListener('click', function (e) {
      e.stopPropagation();
      userMenu.classList.toggle('hidden');
      sidebar.classList.remove('active'); // esconde a sidebar ao abrir o menu de perfil
    });
 
    document.addEventListener('click', function (e) {
      if (!sidebar.contains(e.target) && e.target.id !== 'menu-button') {
        sidebar.classList.remove('active');
      }
      if (!userMenu.contains(e.target) && e.target !== userButton) {
        userMenu.classList.add('hidden');
      }
    });
 
    // Ativa ícones lucide
    lucide.createIcons();
  });
 
 