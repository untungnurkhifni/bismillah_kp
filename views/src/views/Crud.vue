<template>

  <v-container>
    <h1 class="subheader">Daftar Tersangka</h1>

    <v-card-title>
     <v-btn color="primary" @click="dialogAdd = true">Tambah Data</v-btn>      
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
      <v-progress-linear :indeterminate="true"></v-progress-linear>
    </v-card-title>

    <v-data-table :headers="headers" :items="mahasiswa" :search="search" class="elevation-1">
      <template slot="items" slot-scope="props">
        <td>{{props.item.nama}}</td>
        <td>{{props.item.nim}}</td>
        <td>{{props.item.kelas}}</td>
        <td>
          <v-btn 
            fab 
            small 
            color="primary" 
            title="Ubah"
            @click="updateConfirmation(props.item.nim,props.item.nama,props.item.kelas),dialogUpdate= true">E</v-btn>

          <v-btn
            fab
            small
            color="error"
            title="Hapus"
            @click="deleteConfirm(props.item.nim)"
          >D</v-btn>
        </td>
      </template>
    </v-data-table>

    <v-dialog v-model="dialogAdd" max-width="500px">
      <v-divider></v-divider>
      <v-card>
        <v-card-title>Tambah Mahasiswa</v-card-title>
        <v-card-text>
          <v-form ref="form">
            <v-text-field 
            v-model="nama" 
            :counter="10" 
            label="Nama">
            </v-text-field>


            <v-text-field
            v-model="nim"
            :counter="10"
            label="Nim">
            </v-text-field>


            <v-text-field
            v-model="kelas"
            :counter="10"
            label="Kelas">
            </v-text-field>
          </v-form>
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn flat color="error" @click="reset" >Batal</v-btn>
            <v-btn flat color="primary" @click="simpanMahasiswa">Simpan</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-dialog v-model="dialogUpdate" max-width="500px">
      <v-divider></v-divider>
      <v-card>
        <v-card-title>Tambah Mahasiswa</v-card-title>
        <v-card-text>
          <v-form ref="form">
            <v-text-field 
            v-model="nama" 
            :counter="10" 
            label="Nama">
            </v-text-field>


            <v-text-field
            v-model="nim"
            :counter="10"
            label="Nim">
            </v-text-field>


            <v-text-field
            v-model="kelas"
            :counter="10"
            label="Kelas">
            </v-text-field>
          </v-form>
        </v-card-text>

        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn flat color="error" 
            @click="reset" >Batal</v-btn>
            
            <v-btn flat color="primary" 
            @click="updateMahasiswa">Simpan</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-dialog v-model="dialogConfirm" max-width="300px">
      <v-divider></v-divider>
      <v-card>
      <v-card-text>
        <p class="font-weight-bold">Apakah kamu mau menghapus mahasiswa yang dipilih ?</p>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn flat color="error" 
        @click="dialogConfirm = false">Batal</v-btn>

				<v-btn flat color="primary" 
        @click="hapusMahasiswa(nim),dialogConfirm= false">Oke</v-btn>
      </v-card-actions>
      </v-card>
    </v-dialog>

  </v-container>
</template>

<script>
export default {
  data: () => ({
    nama: "",
    nim: "",
    kelas: "",
    headers: [
      {
        text: "Nama",
        value: "Nama"
      },
      {
        text: "Nim",
        value: "Nim"
      },
      {
        text: "Kelas",
        value: "Kelas"
      },
      {
        text: "Action",
        value: "Action"
      }
    ],
    mahasiswa: [],
    search: "",
    dialogAdd : false,
    dialogConfirm : false,
    dialogUpdate : false
  }),
  mounted() {
    this.ambilData();
  },

  methods: {
    ambilData() {
      this.axios
        .get("/site")
        .then(res => {
          this.mahasiswa = res.data.mahasiswa;
          console.log(res.data);
        })
        .catch(err => {
          console.log(err);
        });
    },
    reset(){
      this.$refs.form.reset()
      this.dialogAdd = false
      this.dialogUpdate = false
    },
    simpanMahasiswa(){
      let data = {
        nama : this.nama,
        nim : this.nim,
        kelas : this.kelas
      }

      this.axios.post("/site",data)
      .then(res =>{
        this.reset()
        this.ambilData()

        
      })
      .catch(err =>{
        console.log(err)
      })

    },
    updateMahasiswa(){
      let data = {
        nama : this.nama,
        nim : this.nim,
        kelas : this.kelas
      }
      this.axios.put('/site',data)
      .then(res =>{
        this.dialogUpdate = false
        this.ambilData()

      })
      .catch(err =>{

      })
    },
    hapusMahasiswa(nim){
     this.axios.delete('/site?nim=' + nim)
     .then(res =>{
       this.dialogConfirm = false
          this.ambilData()
     })
     .catch(err=>{

     }) 
    },
    deleteConfirm(nim){
      this.nim = nim
      this.dialogConfirm = true
    },
    updateConfirmation(nim,nama,kelas){
      this.nim = nim
      this.nama = nama
      this.kelas = kelas


    }
  }

};
</script>
<style>
</style>
