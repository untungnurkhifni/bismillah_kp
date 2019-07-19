<template>
    <div class="container__achievement">
    <div class="container__achievement--inner">
      <div class="container__achievement--inner-heading">
        <h1>Prestasi sebelumnya</h1>
      </div>
      <div class="container__achievement--inner-grid">
        <img src="../../assets/img/placeholder.png" alt="">
        <div class="body__text">
          <h2>Judul disini</h2>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam eius nisi placeat at assumenda fugiat, hic consequatur repellat explicabo maiores repellendus voluptatem ducimus? Modi unde maxime molestiae laborum. Repellat, debitis.
          <a href="#" class="btn-go">Baca selengkapnya</a>
        </div>
        </div>
      <div class="container__achievement--inner-grid">
        <img src="../../assets/img/placeholder.png" alt="">
        <div class="body__text">
          <h2>Judul disini</h2>
          Molestiae omnis facere, neque molestias magni hic sunt fugit, cum magnam qui repellat adipisci modi! Doloremque reiciendis officia repudiandae numquam quia quod ex iusto ratione, minima consequuntur modi explicabo obcaecati.
          <a href="#" class="btn-go">Baca selengkapnya</a></div></div>
      <div class="container__achievement--inner-grid">
        <img src="../../assets/img/placeholder.png" alt="">
      <div class="body__text">
        <h2>Judul disini</h2>
        Hic asperiores at, labore unde aliquam officia, ipsam nihil sit tempora error soluta. Possimus, harum quisquam. Repudiandae, atque animi et dolore deleniti ducimus cupiditate minima, nobis beatae illum accusantium natus!
        <a href="#" class="btn-go">Baca selengkapnya</a>
        </div></div>
    </div>
  </div>
</template>

<script>
export default {
    
}
</script>


<style lang="scss" scoped>
@import "../../assets/css/variables";
@import "../../assets/css/mixins";

h1, h2, h3, h4 {
    font-family: $heading-font;
    font-weight: bold;
}

.container__achievement {
  font-family:$body-font;
  background: rgb(102, 59, 177);
  background: linear-gradient(
    45deg,
    rgba(102, 59, 177, 1) 0%,
    rgba(245, 133, 63, 1) 100%
  );
  padding:5.5em 2em;

  @include bp-medium() {
    padding:2.5em 1.5em;
  }

  &--inner {
    max-width: 85vw;
    margin:auto;

    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 1.5em;

    @include bp-medium() {
      grid-template-columns: 1fr;
      grid-gap: 2em;
    }

    &-heading {
      grid-column: 1/-1;
      color:rgba($white, 0.95);
      margin-bottom:1em;

      h1 {
        -webkit-text-fill-color: transparent; /* Will override color (regardless of order) */
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: $white;
      }
    }

    &-grid {
      overflow: hidden;
      background-color:$white;
      @include box-shadow(4px, 8px, 15px, 0, rgba(#111, 0.25));
      -webkit-border-radius: 13px;
      -moz-border-radius: 13px;
      border-radius: 13px;
      @include transition(400ms ease-out);

      &:hover {
        transform: translateY(-2%);
      }

      img {
        display: block;
      }

      .body__text {
        font-size: 0.9em;
        padding:1.5em 2em;
        color:rgba($black, 0.85);

        h2 {
          margin-bottom:0.5em!important;
        }
        
        a.btn-go {
          display: block;
          margin-top:0.5em;
          font-weight: bold;
        }
      }
    }
  }
}
</style>
