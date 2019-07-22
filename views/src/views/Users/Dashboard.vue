<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" fixed app>
      <!-- avatar -->
      <v-toolbar flat class="transparent">
        <v-list class="pa-0">
          <v-list-tile avatar>
            <v-list-tile-avatar>
              <v-icon>account_circle</v-icon>
            </v-list-tile-avatar>

            <v-list-tile-content>
              <v-list-tile-title>{{this.currentUser.nama}}</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
      </v-toolbar>

      <v-divider></v-divider>

      <!-- menu list -->
      <v-list dense>
        <v-list-tile
          tag="router-link"
          v-for="(menu__link, index) in menu__links"
          :key="index"
          :to="menu__link.to"
          :href="menu__link.href"
        >
          <v-list-tile-action>
            <v-icon>{{ menu__link.icon }}</v-icon>
          </v-list-tile-action>

          <v-list-tile-content>
            <v-list-tile-title>{{ menu__link.title }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <!-- menu list -->
    </v-navigation-drawer>

    <v-toolbar dark color="purple darken-3" fixed app>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Dashboard</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn dark flat @click="logout($event)">
        <v-icon dark left>exit_to_app</v-icon>Logout
      </v-btn>
    </v-toolbar>

    <!-- content -->
    <v-content>
      <v-container grid-list-lg>
        <!-- router view -->
        <transition name="fade" mode="out-in">
        <router-view></router-view>
        </transition>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
const base__url = "/dashboard";
export default {
  data: () => ({
    menu: false,
    drawer: true,
    menu__links: [
      { to: base__url + "/home", title: "Home", icon: "dashboard" },
      { to: base__url + "/new_posts", title: "Buat artikel", icon: "add" },
      { to: base__url + "/list_posts", title: "Daftar artikel", icon: "insert_drive_file"},
      { to: base__url + "/list_users", title: "Daftar dosen", icon: "people"}
    ],
    currentUser : ''
  }),
  created() {
    this.checkCurrentLogin();
    this.getDataUser();
  },
  methods: {
    checkCurrentLogin: function() {
      if (!localStorage.getItem('isLogin')) {
      this.$router.replace(this.$route.query.redirect || '/login')
      console.log("belum Login");
      }
    },
    getDataUser: function () {
      let data = JSON.parse(localStorage.getItem('user'));
      this.currentUser = data[0];
      console.log(this.currentUser);
    },
    logout: function(event) {
      event.preventDefault();
      localStorage.token = false;
      this.checkCurrentLogin();
      localStorage.removeItem('user');
      localStorage.setItem('isLogin',false);
      this.$router.replace(this.$route.query.redirect || '/login')
    }
  },
  metaInfo: {
    title:
      "Dashboard | Prodi Teknik Informatika - Universitas Amikom Purwokerto",
    // override the parent template and just use the above title only
    titleTemplate: null
  }
};
</script>


<style lang="scss" scoped>
@import "../../assets/css/variables";

// override the stylinh
.theme--light.application {
  background-color: lighten(#c6d7db, 13) !important;
  font-family: $body-font !important;
}

.v-toolbar__title {
  font-family: $heading-font;
  font-weight: bold;
}

</style>

