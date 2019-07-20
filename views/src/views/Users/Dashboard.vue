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

      <v-divider></v-divider>

      <!-- menu list -->
      <v-list dense>
        <v-list-tile
          tag="router-link"
          v-once
          v-for="(menu__link, index) in menu__links"
          :key="index"
          :to="menu__link.to"
          :href="menu__link.href"
        >
          <v-list-tile-action>
            <v-icon v-once>{{ menu__link.icon }}</v-icon>
          </v-list-tile-action>

          <v-list-tile-content>
            <v-list-tile-title v-once>{{ menu__link.title }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <!-- menu list -->
    </v-navigation-drawer>

    <v-toolbar dark color="purple darken-3" fixed app>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Dashboard</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-menu v-model="menu" :close-on-content-click="false" :max-width="300" offset-y>
        <template v-slot:activator="{ on }">
          <v-btn flat icon color="white" v-on="on">
            <v-icon>notifications</v-icon>
          </v-btn>
        </template>
        <v-list two-line>
          <template v-for="(item, index) in items">
            <v-list-tile :key="item.title" ripple avatar @click="toggle(index)">
              <v-list-tile-content>
                <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                <v-list-tile-sub-title class="text--primary">{{ item.headline }}</v-list-tile-sub-title>
                <v-list-tile-sub-title>{{ item.subtitle }}</v-list-tile-sub-title>
              </v-list-tile-content>

              <v-list-tile-action>
                <v-list-tile-action-text>{{ item.action }}</v-list-tile-action-text>
              </v-list-tile-action>
            </v-list-tile>

            <v-divider v-if="index + 1 < items.length" :key="index"></v-divider>
          </template>
        </v-list>
      </v-menu>
    </v-toolbar>

    <!-- content -->
    <v-content>
      <v-container grid-list-md>
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
    items: [
      {
        action: "15 min",
        headline: "Brunch this weekend?",
        title: "Ali Connors",
        subtitle:
          "I'll be in your neighborhood doing errands this weekend. Do you want to hang out?"
      },
      {
        action: "6 hr",
        headline: "Oui oui",
        title: "Sandra Adams",
        subtitle: "Do you have Paris recommendations? Have you ever been?"
      },
      {
        action: "12 hr",
        headline: "Birthday gift",
        title: "Trevor Hansen",
        subtitle:
          "Have any ideas about what we should get Heidi for her birthday?"
      },
      {
        action: "18hr",
        headline: "Recipe to try",
        title: "Britta Holt",
        subtitle:
          "We should eat this: Grate, Squash, Corn, and tomatillo Tacos."
      }
    ],
    menu__links: [
      { to: base__url + "/home", title: "Home", icon: "dashboard" },
      { to: base__url + "/new_posts", title: "Buat artikel", icon: "add" },
      { to: base__url + "/list_posts", title: "Daftar artikel", icon: "insert_drive_file"},
      { to: base__url + "/list_users", title: "Daftar dosen", icon: "people"},
      {
        to: "/logout",
        title: "Logout",
        icon: "exit_to_app"
      }
    ]
  }),
  methods: {
    //   methods disini nanti...
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

