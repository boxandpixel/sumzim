function mobileNavControl() {
  var navControl   = document.querySelector('.header__nav-button');
  var headerNav    = document.querySelector('.header__nav');
  var body         = document.querySelector('body');
  var siteHeader   = document.querySelector('.site-header');
  var utilityNav   = document.querySelector('.utility-menu');
  var socialIcons  = document.querySelector('.header__social');

  if (!navControl || !headerNav) return;

  // ── Build slide-panel structure ──────────────────────────────────────────
  var menuContainer = headerNav.querySelector('.menu-primary-navigation-container');
  var primaryMenu   = headerNav.querySelector('#primary-menu');

  // Wrap everything in a panels container
  var panelsWrapper = document.createElement('div');
  panelsWrapper.classList.add('nav-panels');

  var mainPanel = document.createElement('div');
  mainPanel.classList.add('nav-main-panel');

  menuContainer.parentNode.insertBefore(panelsWrapper, menuContainer);
  panelsWrapper.appendChild(mainPanel);
  mainPanel.appendChild(menuContainer);

  // Helper: sync wrapper height to whichever panel is active
  function syncHeight(panel) {
    panelsWrapper.style.minHeight = panel.scrollHeight + 'px';
  }

  // For each top-level parent item, build a sub-panel
  var parentItems = primaryMenu ? primaryMenu.querySelectorAll(':scope > .menu-item-has-children') : [];

  parentItems.forEach(function (item) {
    var link    = item.querySelector(':scope > a');
    var subMenu = item.querySelector(':scope > .sub-menu');
    if (!link || !subMenu) return;

    // Arrow icon on the link
    var arrow = document.createElement('span');
    arrow.classList.add('material-symbols-outlined', 'nav-arrow-icon');
    arrow.setAttribute('aria-hidden', 'true');
    arrow.textContent = '\ue5c8'; // arrow_forward
    link.appendChild(arrow);

    // Sub panel
    var subPanel = document.createElement('div');
    subPanel.classList.add('nav-sub-panel');

    // Back button
    var backBtn = document.createElement('button');
    backBtn.classList.add('nav-back-btn');
    backBtn.innerHTML = '<span class="material-symbols-outlined" aria-hidden="true">&#xe5c4;</span> Back';
    subPanel.appendChild(backBtn);

    // Sub-panel heading (parent link label)
    var heading = document.createElement('p');
    heading.classList.add('nav-sub-heading');
    heading.textContent = link.firstChild.textContent.trim();
    subPanel.appendChild(heading);

    // Clone sub-menu into sub panel — original stays in li for desktop hover
    subPanel.appendChild(subMenu.cloneNode(true));
    panelsWrapper.appendChild(subPanel);

    // Open sub-panel on parent link click (mobile only)
    link.addEventListener('click', function (e) {
      if (window.innerWidth >= 1280) return;
      e.preventDefault();
      mainPanel.classList.add('--slide-out');
      subPanel.classList.add('--active');
      syncHeight(subPanel);
    });

    // Back to main panel
    backBtn.addEventListener('click', function () {
      mainPanel.classList.remove('--slide-out');
      subPanel.classList.remove('--active');
      syncHeight(mainPanel);
    });
  });

  // ── Open / close helpers ─────────────────────────────────────────────────
  function openNav() {
    headerNav.classList.add('header__nav--show');
    body.classList.add('body__no-overflow');
    siteHeader.classList.add('header__nav--open');
    if (socialIcons)  socialIcons.classList.add('header__social--navOpen');
    if (utilityNav)   utilityNav.classList.add('utility-menu--show');
    navControl.setAttribute('aria-expanded', 'true');
    syncHeight(mainPanel);
  }

  function closeNav() {
    headerNav.classList.remove('header__nav--show');
    body.classList.remove('body__no-overflow');
    siteHeader.classList.remove('header__nav--open');
    if (socialIcons)  socialIcons.classList.remove('header__social--navOpen');
    if (utilityNav)   utilityNav.classList.remove('utility-menu--show');
    navControl.setAttribute('aria-expanded', 'false');
    // Reset panels to home position
    mainPanel.classList.remove('--slide-out');
    panelsWrapper.querySelectorAll('.nav-sub-panel').forEach(function (p) {
      p.classList.remove('--active');
    });
    panelsWrapper.style.minHeight = '';
  }

  navControl.addEventListener('click', function () {
    if (navControl.getAttribute('aria-expanded') === 'true') {
      closeNav();
    } else {
      openNav();
    }
  });

  // Close on resize to desktop
  window.addEventListener('resize', function () {
    if (window.innerWidth >= 1280) {
      closeNav();
    }
  });
}

document.addEventListener('DOMContentLoaded', function () {
  mobileNavControl();
});
