<template>
<div>
  <div class="container__p">
    <div class="container__p--inner">
      <div class="container__p--inner-grid">
        <div class="grid__inner">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="arcs"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          <h1>Terakreditasi B</h1>
          Universitas Amikom Purwokerto telah diakui oleh Pemerintah sebagai perguruaan tinggi dengan kualitas <strong>Baik Sekali</strong>
          </div>
        <div class="grid__inner">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="arcs"><path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/><path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/></svg>
          <h1>Kurikulum Terbaru</h1>
          Perkembangan dunia teknologi informasi begitu cepat. STMIK AMIKOM Purwokerto menyediakan kurikulum yang mengimbangi perkembangan zaman.
        </div>
        <div class="grid__inner">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="arcs"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
          <h1>Fasilitias Unggulan</h1>
          Fasilitas terbaik disiapkan agar mahasiswa nyaman dalam mengikuti perkuliahan.
        </div>
      </div>
  
        <div class="grid__wrapper">
          <div class="grid__wrapper--heading"><h1>Berita terkini</h1>
          
          <button aria-describedby="Baca selengkapnya"><span>Baca selengkapnya</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="arcs"><path d="M5 12h13M12 5l7 7-7 7"/></svg></button>
          </div>
          <div class="grid__wrapper--news">
            <h2>Judul berita</h2>
            {{ lorem }}
          </div>

          <div class="grid__wrapper--news">
            <h2>Judul berita</h2>
            {{ lorem }}
          </div>

          <div class="grid__wrapper--news">
            <h2>Judul berita</h2>
            {{ lorem }}
          </div>

          <div class="grid__wrapper--news">
            <h2>Judul berita</h2>
            {{ lorem }}
          </div>
        </div>
      
    </div>
  </div>

  <div class="container__maps">
  </div>
</div>
</template>

<script>
import gmapsInit from '../utils/gmaps';
export default {
  name: "Home",
  data() {
    return {
      lorem:
        "Lorem ipsum dolor sit amet, brute iriure accusata ne mea. Eos suavitate referrentur ad, te duo agam libris qualisque, utroque quaestio accommodare no qui. Et percipit laboramus usu, no invidunt verterem nominati mel."
    }
  },
  async mounted() {
    try {
      const google = await gmapsInit();
      const geocoder = new google.maps.Geocoder();
      const map = new google.maps.Map(document.querySelector(".container__maps"));

      geocoder.geocode({ address: 'Austria' }, (results, status) => {
        if (status !== 'OK' || !results[0]) {
          throw new Error(status);
        }

        map.setCenter(results[0].geometry.location);
        map.fitBounds(results[0].geometry.viewport);
      });
    } catch (error) {
      console.error(error);
    }
  },
  metaInfo: {
    title: "Home | Prodi Teknik Informatika - Universitas Amikom Purwokerto",
    // override the parent template and just use the above title only
    titleTemplate: null
  }
};
</script>

<style lang="scss" scoped>
@import "../assets/css/variables";
@import "../assets/css/mixins";

h1,
h2,
h3 {
  font-family: $heading-font;
  font-weight: bold;
}

.container__p {
  &--inner {
    &-grid {
      display:grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 3em;
      margin-bottom:3em;

      &::-webkit-scrollbar {
        display: none;
      }

      &:after {
        content: 'spacing';
        color:transparent;
      }

      @include bp-large() {
        -webkit-overflow-scrolling: touch;
        align-items: stretch;
        margin:0 -2em 3em -2em;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        overflow-x: auto;
      }

      .grid__inner {
        background-color:$white;
        color:lighten($black, 45);
        padding:2.85em 2.5em 2.9em 2.5em;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
        transition:400ms;
        cursor: pointer;

        h1, h2, h3 {
          color:$black;
        }

        &:hover {
          transform: scale(0.97);
        }

        @include bp-large() {
          padding:1.85em;
          max-width: 70%;
          flex-basis: 1;
          flex-grow: 0;
          flex-shrink: 0;
          margin-bottom:1em;

          & + .grid__inner {
            margin-left:2em;
          }

          &:first-child {
            margin-left:2em;
          }
        }

        @include box-shadow(4px, 8px, 15px, 0, lighten(#000, 90));
        text-align: center;
        h1 {
          font-size: 1.5em;
        }

        svg {
          margin-bottom:0.5em;
          color:$primary-color;
        }
      }
    }
  }
}

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

     position: relative;
     color:lighten($black, 45);
     -webkit-border-radius: 15px;
     -moz-border-radius: 15px;
     border-radius: 15px;
  }

  @include bp-large {
    grid-template-columns: 1fr;
  }
}

.container__maps {
  width:100%;
  height:65vh;
  background:grey;
}
</style>

