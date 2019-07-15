<template>
  <div>
    <header>
    <flickity ref="flickity" :options="flickityOptions">
      <div class="carousel-cell">
        <div class="carousel-cell__inner">
          <div class="carousel-cell__inner--grid"><img src="../assets/img/placeholder.png" alt=""></div>
          <div class="carousel-cell__inner--grid">
            <div class="body__text">
              <h2>Heading</h2>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus modi ullam quaerat illum possimus voluptatem, at minus doloribus rem id quae, illo fugiat dolorem autem, officia asperiores cum consequuntur nisi.
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-cell">
        <div class="carousel-cell__inner">
          <div class="carousel-cell__inner--grid"><img src="../assets/img/placeholder.png" alt=""></div>
          <div class="carousel-cell__inner--grid">
            <div class="body__text">
              <h2>Heading 2</h2>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus modi ullam quaerat illum possimus voluptatem, at minus doloribus rem id quae, illo fugiat dolorem autem, officia asperiores cum consequuntur nisi.
            </div>
          </div>
        </div>
      </div>
    </flickity>
    </header>
  </div>
</template>

<script>
import Flickity from './Flickity.vue';
export default {
  components: {
    Flickity
  },
  
  data() {
    return {
      flickityOptions: {
        pageDots: false,
        prevNextButtons: false,
        autoPlay: 5000,
        wrapAround: true
        
        // any options from Flickity can be used
      }
    }
  },
  
  methods: {
    next() {
      this.$refs.flickity.next();
    },
    
    previous() {
      this.$refs.flickity.previous();
    }
  }
}
</script>


<style lang="scss" scoped>
@import '../assets/css/variables';
@import '../assets/css/mixins';
$header-bg: #ddd;

header {
  width: 100%;
  background-color: $header-bg;
  background: rgb(102, 59, 177);
  background: linear-gradient(
    45deg,
    rgba(102, 59, 177, 1) 0%,
    rgba(245, 133, 63, 1) 100%
  );
  // background-image:url('../assets/img/header_h.jpg');
  background-size: cover;
  background-attachment: fixed;
  font-family: $body-font;
}

.carousel-cell {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 85vh;

  @include bp-small() {
    height:65vh;
  }

  &__inner {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin:0 3.5em;

    @media (max-width:60rem) {
      flex-direction: column;
      margin:0 2em;
    }

    &--grid {
      flex: 1;

      img {
        display: block;
      }

      .body__text {
        padding:1.5em 2em;
        color:$white;

        @media (max-width:60rem) {
          padding: 1.5em 0em;
        }

        h2 {
          font-family: $heading-font;
          font-weight: bold;
          font-size: 1.8em;
        }
      }
    }
  }
}
</style>

