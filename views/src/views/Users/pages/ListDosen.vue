<template>
  <v-container>
    <v-app>
      <v-card-title>
        <v-btn dark color="blue-grey darken-3" @click="dialogAdd = true">Tambah Data</v-btn>
        <v-spacer></v-spacer>
        <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      </v-card-title>

      <v-data-table :headers="headers" :items="mahasiswa" :search="search" class="elevation-1">
        <template v-slot:items="props">
          <td>{{ props.item.nama }}</td>
          <td class="text-xs-right">{{ props.item.nim}}</td>
          <td class="text-xs-right">{{ props.item.kelas }}</td>
        </template>

        <template v-slot:item.action="{ item }">
          <v-btn class="ma-2" outlined color="success"
           @click="updateConfirmation(item.nim, item.nama, item.kelas), dialogUpdate= true">
            <v-icon left>mdi-pencil</v-icon> Edit
          </v-btn>
           <v-btn class="ma-2" dark color="error"
           @click="deleteConfirm(item.nim)">
            <v-icon left>mdi-delete</v-icon> Hapus
          </v-btn>
        </template>
        
      </v-data-table>

      <v-dialog v-model="dialogAdd" max-width="500px">
        <v-card>
          <v-card-text>
            <v-form ref="form">
              <v-text-field v-model="nama" :counter="10" label="Nama"></v-text-field>

              <v-text-field v-model="nim" :counter="10" label="Nim"></v-text-field>

              <v-text-field v-model="kelas" :counter="10" label="Kelas"></v-text-field>
            </v-form>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn text color="error" @click="reset">Batal</v-btn>
            <v-btn text color="primary" @click="simpanMahasiswa">Simpan</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>

      <v-dialog v-model="dialogUpdate" max-width="500px">
        <v-card>
          <v-card-text>
            <v-form ref="form">
              <v-text-field v-model="nama" :counter="10" label="Nama"></v-text-field>

              <v-text-field v-model="nim" :counter="10" label="Nim"></v-text-field>

              <v-text-field v-model="kelas" :counter="10" label="Kelas"></v-text-field>
            </v-form>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn text color="error" @click="reset">Batal</v-btn>

            <v-btn text color="primary" @click="updateMahasiswa">Simpan</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>

      <v-dialog v-model="dialogConfirm" max-width="500px">
        <v-divider></v-divider>
        <v-card>
          <v-card-text>
            <h2 class="headline font-weight-bold">Apakah kamu mau menghapus mahasiswa yang dipilih?</h2>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn text color="error" @click="dialogConfirm = false">Batal</v-btn>

            <v-btn text color="primary" @click="hapusMahasiswa(nim),dialogConfirm= false">Oke</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-app>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    headers: [
      {
        text: "Nama",
        align: "left",
        sortable: true,
        value: "nama"
      },
      { text: "Nim", value: "nim" },
      { text: "Kelas", value: "kelas" },
      { text: "Action", value: "action" }
    ],
    mahasiswa: [],
    search: "",
    dialogAdd: false,
    dialogConfirm: false,
    dialogUpdate: false,
    nama: "",
    nim: "",
    kelas: ""
  }),
  mounted() {
    this.ambilData();
  },
  methods: {
    ambilData: function() {
      this.axios
        .get("/site")
        .then(res => {
          this.mahasiswa = res.data.mahasiswa;
          //  console.log(this.mahasiswa);
        })
        .catch(err => {
          // console.log(err);
        });
    },
    reset() {
      this.$refs.form.reset();
      this.dialogAdd = false;
      this.dialogUpdate = false;
    },
    simpanMahasiswa() {
      let data = {
        nama: this.nama,
        nim: this.nim,
        kelas: this.kelas
      };

      this.axios
        .post("/site", data)
        .then(res => {
          this.reset();
          this.ambilData();
        })
        .catch(err => {
          console.log(err);
        });
    },
    updateMahasiswa() {
      let data = {
        nama: this.nama,
        nim: this.nim,
        kelas: this.kelas
      };
      this.axios
        .put("/site", data)
        .then(res => {
          this.dialogUpdate = false;
          this.ambilData();
        })
        .catch(err => {
          console.log(err);
        });
    },
    hapusMahasiswa(nim) {
      this.axios
        .delete("/site?nim=" + nim)
        .then(res => {
          this.dialogConfirm = false;
          this.ambilData();
        })
        .catch(err => {
          console.log(err);
        });
    },
    deleteConfirm(nim) {
      this.nim = nim;
      this.dialogConfirm = true;
    },
    updateConfirmation(nim, nama, kelas) {
      this.nim = nim;
      this.nama = nama;
      this.kelas = kelas;
    }
  }
};
</script>

<style scoped>
.v-btn {
  margin-left: 0px;
  margin-right: 0px;
}

.v-card__title {
  padding: 18px 0px;
}
</style>
