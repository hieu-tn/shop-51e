import $ from 'jquery'
import 'slick-carousel'

require('../../../node_modules/slick-carousel/slick/slick.scss')
require('../../../node_modules/slick-carousel/slick/slick-theme.scss')

export { home as default }

const home = () => {
  if ($('body').hasClass('page-template-home')) {
    /**
     * section masthead
     */
    let $hero = $('.section--masthead #hero')
    try {
      $hero.not('.slick-initialized').on('init', function() {
        $hero.find('.slick-slide').each((index, slide) => {
          let bg = $(slide).find('img')
          $(slide).css('background-image', `url('${bg.attr('src')}')`).empty()
        })
        $hero.css('opacity', 1)
      }).slick({
        fade: true,
        speed: 5500,
        autoplay: true,
        arrows: false,
        swipeToSlide: true,
        mobileFirst: true
      })
    } catch(err) {
      console.log('err', err)
    }
    let $promotions = $('.section--masthead .promotions')
    try {
      $promotions.children('.list').not('.slick-initialized').slick({
        // autoplay: 3000,
        arrows: true,
        prevArrow: $promotions.children('.arrows').children('.slick-prev.slick-arrow'),
        nextArrow: $promotions.children('.arrows').children('.slick-next.slick-arrow'),
        swipeToSlide: true,
        mobileFirst: true
      })
    } catch(err){
      console.log('err', err)
    }
  }
}
