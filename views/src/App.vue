<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App'
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
  padding:5.5rem 4rem;
  background-color:lighten(#C6D7DB, 13);

  @include bp-medium() {
    padding:3.5em 2rem 2.5rem 2rem;
  }

  &--inner {
    max-width: 85vw;
    margin:0 auto;

    h1, h2, h3 {
      font-weight: bold;
      margin-bottom: 0.5rem!important;
    }

    &-grid {
      display: grid;
      grid-gap: 4rem;
      grid-template-columns: repeat(2, 1fr);

      @include bp-medium() {
        grid-template-columns: 1fr;
      }
    }
  }
  
}
</style>