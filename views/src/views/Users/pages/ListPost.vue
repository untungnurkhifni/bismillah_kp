<template>
  <div class="list__post">
    <v-text-field solo label="Cari artikel..." prepend-inner-icon="search"></v-text-field>
    <h1>Daftar artikel</h1>
    <div class="list__post--entries">
      <div class="list__post--entries__grid" 
      v-for="(item, index) in items" 
      v-bind:item="item"
      :index="index"
      :key="item.id">
        <img :src="'http://localhost/kp_amikom/uploads_artikel/'+item.gambar" alt />
        <div class="body__text">
          <div class="body__text--inner">
            <h2>{{ item.title_post }}</h2>
            <v-chip class="my-3" small>
              <v-icon small left>calendar_today</v-icon>
              {{ item.date }} / {{ item.id }}
            </v-chip>
            <p class="body-2">{{ item.body_post | truncate(350) }}</p>
          </div>

          <div class="body__text--inner">
            <v-card-actions>
              <v-btn
                dark
                outlined
                color="purple darken-3"
                @click="updateConfirmation(item.title_post, item.gambar, item.body_post), dialogUpdate= true"
              >
                <v-icon left small>edit</v-icon>Sunting artikel
              </v-btn>
              <v-btn color="red" dark @click="deleteArticle(item.id)">
                <v-icon dark left small>delete</v-icon>Hapus
              </v-btn>
            </v-card-actions>
          </div>
        </div>
      </div>
    </div>

    <!-- dialog hapus artikel -->
    <!-- <v-dialog v-model="dialogConfirm" max-width="500px">
      <v-divider></v-divider>
      <v-card class="pa-5">
        <v-card-text>
          <h1 style="line-height:1.5">Apakah kamu yakin ingin menghapus artikel ini?</h1>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn outlined @click="dialogConfirm = false">Batal</v-btn>
          <v-btn color="error" @click="deleteArticle(id), dialogConfirm= false">Hapus artikel</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog> -->

    <!-- dialog update artikel -->
    <v-dialog v-model="dialogUpdate" max-width="1000px">
      <v-card class="pa-5">
        <v-card-text class="pa-5">
          <h2 class="mb-5">Sunting artikel</h2>
          <v-divider class="mb-5"></v-divider>
          <v-layout row wrap>
            <v-flex sm6>
              <v-form ref="form">
                <v-text-field outlined v-model="title_post" label="Judul post"></v-text-field>
                <vue-editor v-model="body_post"></vue-editor>
                <!-- <v-textarea auto-grow no-resize outlined v-model="body_post"  label="Isi post"></v-textarea> -->
              </v-form>
            </v-flex>
            <v-flex sm6>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nulla impedit possimus blanditiis suscipit nihil consequatur quaerat recusandae beatae! Eligendi mollitia fugit quos, sed dignissimos ut sint earum ipsa beatae.
            </v-flex>
          </v-layout>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn outlined text @click="dialogUpdate=false">Batal</v-btn>
          <v-btn color="primary" @click="updateArticle">Simpan</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";

export default {
  components: {
    VueEditor
  },
  data: () => ({
    id: "",
    title_post: "",
    body_post: "",
    gambar: [],
    items: [],
    dialogConfirm: false,
    dialogUpdate: false
  }),
  mounted() {
    this.getArticle();
  },
  filters: {
    truncate: function(value, limit) {
      if (value.length > limit) {
        value = value.substring(0, limit - 3) + "...";
      }
      return value;
    }
  },
  methods: {
    getArticle: function() {
      this.axios
        .get("/artikel")
        .then(response => {
          this.items = response.data.data;
          this.items.sort((a, b) => b.id - a.id); // descending
        })
        .catch(error => {
        
        });
    },
    updateArticle() {
      let data = {
        title_post: this.title_post,
        gambar: this.gambar,
        body_post: this.body_post
      };
      this.axios
        .put("/artikel", data)
        .then(res => {
          this.dialogUpdate = false;
          this.getArticle();
        })
        .catch(err => {
          console.log(err);
        });
    },
    deleteArticle(ida) {
  
  let data ={
    id : ida
  }
      this.axios
        .post("/hapusartikel",data)
        .then(response => {
          this.dialogConfirm = false;
          this.getArticle();
         
        })
        .catch(error => {
          console.log(error);
        });
    },
    deleteConfirm(id) {
      this.id = id;
      this.dialogConfirm = true;
    },
    updateConfirmation(title_post, gambar, body_post) {
      this.title_post = title_post;
      this.gambar = gambar;
      this.body_post = body_post;
    }
  }
};
</script>


<style lang="scss" scoped>
@import "../../../assets/css/variables";
@import "../../../assets/css/mixins";

.v-btn {
  margin-right: 10px;
}

.list__post {
  padding: 1.5em;

  &--entries {
    margin-top: 1.5em;

    &__grid {
      display: grid;
      grid-template-columns: 500px 1fr;
      background-color: $white;
      margin-bottom: 2.5em;
      box-shadow: $box-shadow;

      @include bp-large() {
        grid-template-columns: 1fr;
      }

      img {
        min-height: 400px;
        object-fit: cover;
        object-position: center;
        @include bp-medium() {
          min-height: 0;
        }
      }

      .body__text {
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        @include bp-medium() {
          justify-content: flex-start;
        }

        &--inner {
          padding: 1.5em;
        }
      }
    }
  }
}
</style>

