<template>
  <div>
    <v-form v-model="valid">
      <v-container>
        <v-card class="pa-5">
          <v-card-text class="pa-5">
          <h1 class="mb-5 black--text">Blog Posts</h1>
          <v-divider class="my-5"></v-divider>
          <v-text-field
          outlined
            v-model="title_post"
            :rules="judul__postRules"
            :counter="200"
            label="Judul post"
            required
          ></v-text-field>

          <v-file-input
          outlined
            v-model="gambar"
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pilih gambar..."
            prepend-inner-icon="mdi-camera"
            label="Gambar artikel"
            ref="files"
            type="file"
            @change="onFilePicked($event)"
          >
          </v-file-input>

          <v-select
          outlined
            v-model="kategori"
            :rules="[v => !!v || 'This is required']"
            :items="kategori__items"
            label="Kategori post..."
            item-text="name"
            item-value="value"
            required
          ></v-select>
          <div class="editor__wrapper">
            <vue-editor v-model="body_post"></vue-editor>
          </div>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn large dark color="purple darken-3" @click="saveArticle">Submit</v-btn>
          </v-card-actions>
          </v-card-text>
        </v-card>
      </v-container>
    </v-form>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";

export default {
  components: {
    VueEditor
  },
  data: () => ({
    valid: false,
    title_post: "",
    body_post: "",
    kategori: null,
    gambar: null,
    judul__postRules: [
      v => !!v || "Judul harus diisi",
      v => v.length <= 200 || "Judul harus kurang dari 200"
    ],
    kategori__items: [
      {name: "Berita", value:"Berita"}, 
      {name: "Prestasi", value:"Prestasi"}, 
      {name:"Event", value:"Event"}
    ],
    articles: [],
    imageName: '',
		imageUrl: '',
    imageFile: '',
    form_data : {}
  }),
  mounted() {
    this.getArticle();
  },
  methods: {
    checkKategori(value) {
      this.kategori = value;
    },
    getArticle() {
      this.axios
        .get("/artikel")
        .then(response => {
          this.articles = response.data.data;
        })
        .catch(err => {
          // console.log(err);
        });
    },
    saveArticle() {
      this.form_data = new FormData();
      
     
      let data = {
        title_post: this.title_post,
        body_post: this.body_post,
        kategori: this.kategori
      }
      this.form_data.append('gambar',this.imageFile);
      this.axios
        .post("/artikel", data,this.form_data,{
    headers: {
        'Content-Type': 'multipart/form-data'
    }}).then(response => {
          //this.getArticle();
          console.log(response.data);
        })
        .catch(err => {
          console.log(err + " Gagal mengirim post heh...");
        });
    },
    pickFile () {
            this.$refs.image.click ()
        },
		
		onFilePicked (e) {
			const files = this.$refs.files.files;
			// if(files[0] !== undefined) {
			// 	this.imageName = files[0].name
			// 	if(this.imageName.lastIndexOf('.') <= 0) {
			// 		return
			// 	}
				const fr = new FileReader ()
				// fr.readAsDataURL(files)
				// fr.addEventListener('load', () => {
				// 	this.imageUrl = fr.result
          this.imageFile = files
          console.log(files);
          // this is an image file that can be sent to server...
				// })
			// } else {
			// 	this.imageName = ''
			// 	this.imageFile = ''
			// 	this.imageUrl = ''
			// }
		}
  }
};
</script>

<style scoped>
.editor__wrapper {
  margin: 1.5em 0;
}
</style>
