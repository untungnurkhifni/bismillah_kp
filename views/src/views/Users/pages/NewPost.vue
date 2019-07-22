<template>
  <div>
    <v-form v-model="valid">
      <v-container>
        <v-card class="pa-5">
          <h1 class="mb-4">Blog Posts</h1>
          <v-text-field
            v-model="judul__post"
            :rules="judul__postRules"
            :counter="200"
            label="Judul post"
            required
          ></v-text-field>

          <div class="file__wrapper">
            <img :src="imageUrl" height="150" v-if="imageUrl" />
            <v-text-field
              label="Pilih gambar"
              @click="pickFile"
              v-model="imageName"
              prepend-inner-icon="attach_file"
            ></v-text-field>
            <input
              type="file"
              style="display: none"
              ref="image"
              accept="image/*"
              @change="onFilePicked"
            />
          </div>

          <v-select
            v-model="kategori__post"
            :rules="[v => !!v || 'This is required']"
            :items="kategori__items"
            label="Kategori post..."
            required
          ></v-select>
          <div class="editor__wrapper">
            <vue-editor v-model="isi__post"></vue-editor>
          </div>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn dark color="purple darken-3">Submit</v-btn>
          </v-card-actions>
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
    judul__post: "",
    imageName: '',
		imageUrl: '',
		imageFile: '',
    isi__post: "",
    kategori__post: null,
    judul__postRules: [
      v => !!v || "Judul harus diisi",
      v => v.length <= 200 || "Judul harus kurang dari 200"
    ],
    kategori__items: ["Berita", "Prestasi", "Event"]
  }),
  methods: {
     pickFile () {
            this.$refs.image.click ()
     },
     onFilePicked (e) {
			const files = e.target.files;
			if(files[0] !== undefined) {
				this.imageName = files[0].name
				if(this.imageName.lastIndexOf('.') <= 0) {
					return
				}
				const fr = new FileReader();
				fr.readAsDataURL(files[0]);
				fr.addEventListener('load', () => {
					this.imageUrl = fr.result;
					this.imageFile = files[0];
				})
			} else {
				this.imageName = ''
				this.imageFile = ''
				this.imageUrl = ''
			}
		}
  }
};
</script>

<style scoped>
.editor__wrapper {
  margin: 1.5em 0;
}
</style>
