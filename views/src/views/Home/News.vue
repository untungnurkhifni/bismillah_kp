<template>
     <div class="grid__wrapper">
          <div class="grid__wrapper--heading"><h1>Berita terkini</h1>
          
          <button aria-describedby="Baca selengkapnya"><span>Baca selengkapnya</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="arcs"><path d="M5 12h13M12 5l7 7-7 7"/></svg></button>
          </div>
          <div class="grid__wrapper--news">
            <img src="../../assets/img/placeholder.png" alt="">
            <h2>Judul berita</h2>
            {{ lorem }}
            <a href="#" class="btn-go">Baca selengkapnya</a>
          </div>

          <div class="grid__wrapper--news">
            <img src="../../assets/img/placeholder.png" alt="">
            <h2>Judul berita</h2>
            {{ lorem }}
            <a href="#" class="btn-go">Baca selengkapnya</a>
          </div>

          <div class="grid__wrapper--news">
            <img src="../../assets/img/placeholder.png" alt="">
            <h2>Judul berita</h2>
            {{ lorem }}
            <a href="#" class="btn-go">Baca selengkapnya</a>
          </div>

          <div class="grid__wrapper--news">
            <img src="../../assets/img/placeholder.png" alt="">
            <h2>Judul berita</h2>
            {{ lorem }}
            <a href="#" class="btn-go">Baca selengkapnya</a>
          </div>
        </div>
</template>

<script>
export default {
    data: function() {
    return {
      lorem:"Lorem ipsum dolor sit amet, brute iriure accusata ne mea. Eos suavitate referrentur ad, te duo agam libris qualisque, utroque quaestio accommodare no qui. Et percipit laboramus usu, no invidunt verterem nominati mel."
    }
  }
}
</script>


<style lang="scss" scoped>
@import "../../assets/css/variables";
@import "../../assets/css/mixins";

.grid__wrapper {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: 3.5rem;
  background-color:$white;
  padding:2em 2.5em 3.5em 2.5em;
  margin-bottom: 2.5em;
  -webkit-border-radius: 15px;
  -moz-border-radius: 15px;
  border-radius: 15px;
  @include box-shadow(4px, 8px, 15px, 0, lighten(#000, 90));

  &--heading {
    grid-column: 1/-1;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;

    h1 {
      font-size: 1.85em;
      -webkit-text-fill-color: $white; /* Will override color (regardless of order) */
      -webkit-text-stroke-width: 1.5px;
      -webkit-text-stroke-color: $black;
    }

    button {
      background-color:$secondary-color;
      color:rgba( $white, 0.95);
      font-size: 0.95em;
      font-weight: bold;
      padding:0.5rem 1rem;
      -webkit-border-radius: 30px;
      -moz-border-radius: 30px;
      border-radius: 30px;
      @include transition(400ms ease-in-out);

      &:hover {
        background-color:darken($secondary-color, 25);
      }

      @include bp-medium() {
         span {
          display: none;
        }
      }

      svg {
        display: inline-block;
        margin-left:0.5em;
        vertical-align: middle;
      }
    }
  }

  &--news {
     h2 {
       color:$black;
     }

     img {
       margin-bottom: 1em;
       -webkit-border-radius: 8px;
       -moz-border-radius: 8px;
       border-radius: 8px;
     }

     position: relative;
     color:lighten($black, 45);
     -webkit-border-radius: 15px;
     -moz-border-radius: 15px;
     border-radius: 15px;

     a.btn-go {
       display: block;
       margin-top:0.5em;
       font-weight: bold;
     }
  }

  @include bp-large {
    grid-template-columns: 1fr;
  }
}
</style>
