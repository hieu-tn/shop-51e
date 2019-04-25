<template>
  <div class="products">
    <div class="container">
      <div class="row">
        <div class="gr-12@xs gr-12@sm gr-4@md gr-3@lg gr-3@xl" v-for="product in products">
          <!--product type-->
          <div class="product" v-if="product.type == 'product'">
            <div class="thumbnail text-center">
              <a :href="product.url"><img :src="product.featured_image" /></a>
            </div>
            <div class="info">
              <p class="price">$ {{ product.price }}</p>
              <p class="title"><b>{{ product.title }}</b></p>
              <div class="colors">
                <span>Colors: </span>
                <span class="color" v-for="color in product.colors" :style="{ backgroundColor: color.color }" @mouseover="changeFeaturedImage($event, color.image)" @click="changeFeaturedImage($event, color.image)"></span>
              </div>
            </div>
          </div>
          <!--page type-->
          <div class="product" v-else>
            <div class="thumbnail text-center">
              <a :href="product.url"><img :src="product.featured_image" /></a>
            </div>
            <div class="info">
              <p class="title"><b>{{ product.title }}</b></p>
              <p>{{ product.excerpt }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['propProducts'],
    data () {
      return {
        products: [
          {
            title: 'string',
            featured_image: 'string',
            url: 'string url',
            type: ['product', 'page'],
            price: 0,   // type product
            colors: [   // type product
              {
                color: '#FFFFFF',
                image: 'string url'
              }
            ],
            excerpt: 'string'   // type page
          }
        ]
      }
    },
    mounted() {
      this.products = JSON.parse(this.propProducts)
      console.log(this.products)
      this.$nextTick(() => {
        this.setSameHeight($('shop51e-products .products .product .thumbnail'))
        this.setSameHeight($('shop51e-products .products .product .info'))
      })
    },
    methods: {
      setSameHeight: function(items) {
        let maxHeight = 0
        for (let i = 0, item; item = items[i]; i++) {
          $(item).css('height', '')
          let itemHeight = $(item).outerHeight()
          if (itemHeight > maxHeight)
            maxHeight = itemHeight
        }
        for (let i = 0, item; item = items[i]; i++) {
          $(item).css('height', maxHeight + 'px')
        }
      },
      changeFeaturedImage: function(e, url) {
        if (url)
          $(e.target).parent().parent().parent().find('.thumbnail img').attr('src', url)
      }
    }
  }
</script>

<style scoped lang="scss">
  @import "sharingVars", "sharingFunctions", "sharingMixins";
  .product {
    margin-bottom: 2rem;

    &:hover {
      .info {
        background: get-color('vista-white');
      }
    }

    .thumbnail {
      img {
        min-height: 18rem;
        max-height: 100%;
      }

      a {
        display: block;
        height: 100%;
      }
    }

    .info {
      padding: .5rem 1rem;

      .price {
        font-weight: normal;
      }

      .colors {
        .color {
          display: inline-block;
          width: 1rem; height: 1rem;
          vertical-align: middle;
          cursor: pointer;
          margin-right: .5rem;

          &:last-child {
            margin-rigth: 0;
          }
        }
      }
    }
  }
</style>
