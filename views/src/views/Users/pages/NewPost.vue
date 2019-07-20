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
           <v-select
            v-model="kategori__post"
            :rules="[v => !!v || 'This is required']"
            :items="kategori__items"
            label="Kategori post..."
            required
            ></v-select>
          <v-textarea
            v-model="isi__post"
            :rules="isi__postRules"
            label="Isi artikel"
            auto-grow
            value
          ></v-textarea>
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
export default {
  data: () => ({
    valid: false,
    judul__post: "",
    isi__post: "",
    kategori__post: null,
    judul__postRules: [
      v => !!v || "Judul harus diisi",
      v => v.length <= 200 || "Judul harus kurang dari 200"
    ],
    isi__postRules: [v => !!v || "Form harus diisi"],
    kategori__items: [
        'Berita',
        'Prestasi',
        'Event',
    ]
  })
};
</script>
