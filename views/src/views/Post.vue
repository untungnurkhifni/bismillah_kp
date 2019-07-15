<template>
  <div class="container">
    <v-container>
      <form>
      <v-text-field
        outline
        v-model="id_post"
        label="ID artikel"
      ></v-text-field>

      <v-text-field
        outline
        v-model="title_post"
        label="Judul artikel"
      ></v-text-field>

       <v-text-field
        outline
        v-model="body_post"
        label="Isi artikel"
      ></v-text-field>

      <v-card-actions>
        <v-spacer></v-spacer>
         <v-btn color="primary" @click="saveArticle">Submit</v-btn>
      </v-card-actions>
    </form>
    <v-layout class="mt-5">
      <v-flex v-for="(article, index) in articles"
        v-bind:item="article"
        :index="index"
        :key="article.id_post">  
        <v-card>
          <v-card-title primary-title>
            <div>
              <h3 class="headline mb-0">{{ article.title_post }}</h3>
              <div>{{ article.body_post }}</div>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
    </v-layout>
    
    </v-container>
  </div>
</template>

<script>
export default {
  data: () => ({
    id_post : "",
    title_post : "",
    body_post :"",
    date_post : "",
    articles: [],
  }),
  mounted() {
    this.getArticle();
  },
  methods: {
      getArticle() {
      this.axios
      .get("/artikel")
      .then(res => {
        this.artikel = res.data.data;
        console.log(res.data);
      })
      .catch(err => {
        console.log(err);
      });
    },
    saveArticle() {
      let article = {
        id : 1,
        judul : this.title_post,
        isi : this.body_post,
        tanggal : this.date_post
      }

      this.axios.post("http://localhost/coba_vue_ci/index.php/api/Artikel", article)
      .then(res => {
        this.getArticle()
      }).catch(err => {
        console.log(err)
      })

    }
  }
};
</script>

<style scoped>
.container {
  margin: 5rem auto;
}
</style>
