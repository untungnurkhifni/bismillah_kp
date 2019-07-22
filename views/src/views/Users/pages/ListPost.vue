<template>
  <div class="list__post">
    <h1>Daftar artikel</h1>
    <div class="list__post--entries">
      <div class="list__post--entries__grid">
        <img src="https://picsum.photos/id/1000/600/400" alt />
        <div class="body__text">
          <div class="body__text--inner">
            <h2>Judul artikel</h2>
            {{ isi__artikel }}
          </div>

          <div class="body__text--inner">
            <v-btn outline color="purple darken-3">
              <v-icon left small>edit</v-icon>Sunting artikel
            </v-btn>
            <v-btn color="red" dark>
              <v-icon dark left small>delete</v-icon>Hapus
            </v-btn>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isi__artikel:
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, quia distinctio! Inventore ipsa dignissimos, porro at vel quisquam ab quibusdam ipsum doloribus impedit sapiente odio nam facere mollitia nesciunt iusto!"
    };
  }
};
</script>


<style lang="scss" scoped>
@import "../../../assets/css/variables";
@import "../../../assets/css/mixins";
.list__post {
  padding: 1.5em;

  &--entries {
    margin-top: 1.5em;

    &__grid {
      display: flex;
      flex-direction: row;
      background-color: $white;
      margin-bottom: 1.5em;
      box-shadow: $box-shadow;

      @include bp-large() {
        flex-direction: column;
      }

      img {
        height: 300px;
      }

      .body__text {
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        &--inner {
          padding: 1.5em;
        }
      }
    }
  }
}
</style>

