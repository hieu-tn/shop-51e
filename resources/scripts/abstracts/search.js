import $ from 'jquery'

export { search as default }

const search = () => {
  $(() => {
    $('#toggle-search').click((e) => {
      e.preventDefault()
      $(e.target).next('.search-form').slideToggle('fast')
    })
  })
}
