import $ from 'jquery'

export { navigation as default }

const navigation = () => {
  $(() => {
    // trigger menu mobile
    let $mobileTrigger = $('header.site-header .menu-bar .mobile-trigger')
    if ($mobileTrigger.length) {
      $mobileTrigger.click((e) => {
        e.preventDefault()
        $(e.target).siblings('.main-navigation#navigation-header-mobile').slideToggle()
      })
    }

    // add expand icon to 1st sub-menu (mobile)
    let $menuItemHasChildrenMobile = $('header.site-header .menu-bar #navigation-header-mobile > #primary-menu > .menu-item-has-children')
    if ($menuItemHasChildrenMobile.length) {
      let $toggleExpanded = $('<span></span>', {
        class: 'toggle-expanded',
        text: '+',
        click: (e) => {
          e.preventDefault()
          $(e.target).siblings('.sub-menu').slideToggle()
        }
      })
      $menuItemHasChildrenMobile.prepend($toggleExpanded)
    }

    // add image to 1st sub-menu (desktop)
    let $menuItemHasChildrenDesktop = $('header.site-header .menu-bar #navigation-header-desktop > #primary-menu > .menu-item-has-children')
    if ($menuItemHasChildrenDesktop.length) {
      let bg = $menuItemHasChildrenDesktop.data('bg')
      if (!bg) return

      $menuItemHasChildrenDesktop.children('.sub-menu').css('background-image', 'url("' + bg + '")')
    }
  })
}
