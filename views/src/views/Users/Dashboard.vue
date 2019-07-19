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
              <v-list-tile-title>John Leider</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
      </v-toolbar>

      <!-- menu list -->
      <v-list dense>
        <v-divider></v-divider>
        <v-list-tile
          tag="router-link"
          v-once
          v-for="(item, index) in items"
          :key="index"
          :to="item.to"
          :href="item.href"
        >
          <v-list-tile-action>
            <v-icon v-once>{{ item.icon }}</v-icon>
          </v-list-tile-action>

          <v-list-tile-content>
            <v-list-tile-title v-once>{{ item.title }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar dark color="deep-purple darken-3" fixed app>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Dashboard</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn flat icon color="white">
        <v-icon>notifications</v-icon>
      </v-btn>
    </v-toolbar>
    <v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
          <v-flex text-xs-center>
            <!-- router view -->
            <router-view></router-view>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
const base__url = "/dashboard";
export default {
  data: () => ({
    drawer: true,
    items: [
      { to: base__url + "/home", title: "Home", icon: "dashboard" },
      { to: base__url + "/post", title: "Post", icon: "question_answer" }
    ]
  }),
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
.v-toolbar__title {
  font-family: $heading-font;
  font-weight: bold;
}
</style>

