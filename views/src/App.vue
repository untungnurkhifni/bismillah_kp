<template>
  <div id="app">
    <NavBar v-if="showNav()"></NavBar>
    <Header v-if="homePage()"></Header>
    <router-view/>
    <Footer v-if="showFooter()"></Footer>
  </div>
</template>

<script>
import NavBar from './components/NavBar'
import Header from './components/Header'
import Footer from './components/Footer'

export default {
  name: 'App',
  components: {
    NavBar,
    Header,
    Footer
  },
  methods: {
    /*
    Sementara pake method dulu sebelum menerapkan ini: https://markus.oberlehner.net/blog/dynamic-vue-layout-components/
    */
    homePage() {
      if(this.$route.path == "/") {
        return true
      } else {
        return false
      }
    },
    showNav() {
      if(this.$route.path == "/login") {
        return false
      } else {
        return true
      }
    },
    showFooter() {
      if(this.$route.path == "/login") {
        return false
      } else {
        return true
      }
    }
  }
}
</script>

<style lang="scss">
@import './assets/css/variables';
@import './assets/css/mixins';
@import "../src/assets/css/resets.css";

.theme--light.application {
  background-color:transparent!important;
}

.container__p {
  font-family:$body-font;
  padding:4.5rem 4rem;
  background-color:lighten(#C6D7DB, 13);

  @include bp-medium() {
    padding:2.5rem 2rem;
  }

  &--inner {
    max-width: 1240px;
    margin:0 auto;

    h1, h2, h3 {
    font-weight: bold;
    margin-bottom: 0.5rem!important;
  }
  }
  
}
</style>