<template>
  <nav>
    <div class="navigation__small">
      <div>
        <ul class="menu__link">
        <li><router-link to="/tentang">Tentang kami</router-link></li>
        <li><a href="#">Kontak</a></li>
        <li><a href="#"><font-awesome-icon :icon="['fas', 'globe']" size="lg" /> Website utama</a></li>
      </ul>
      </div>
      <div><router-link to="/login" class="login-btn"><font-awesome-icon :icon="['fas', 'lock']" size="lg" /> {{currentUser.email}}</router-link></div>
    </div>
    <div class="navigation__bar">
      <div class="navigation__bar--logo">
        <img src="../assets/img/logo_amikom.png" />
        <span>Teknik Informatika</span>

        <ul class="navigation__bar--links">
          <li>
            <router-link to="/">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="square"
                stroke-linejoin="arcs"
              >
                <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9" />
                <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6" />
              </svg> BERANDA
            </router-link>
          </li>
          <li>
            <a href="#">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="square"
                stroke-linejoin="arcs"
              >
                <path d="M6 9l6 6 6-6" />
              </svg>
              PROFIL
              <ul class="profile__p" aria-labelledby="dropdown">
                <li>
                  <a href="#">Sambutan Kepala Bagian</a>
                  <a href="#">Visi Misi dan Tujuan</a>
                  <a href="#">Struktur</a>
                </li>
              </ul>
            </a>
          </li>
          <li>
            <router-link to="/kurikulum">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="square"
                stroke-linejoin="arcs"
              >
                <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z" />
                <path d="M14 3v5h5M16 13H8M16 17H8M10 9H8" />
              </svg> KURIKULUM
            </router-link>
          </li>
          <li>
            <a href="#">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="square"
                stroke-linejoin="arcs"
              >
                <path d="M6 9l6 6 6-6" />
              </svg> AKADEMIK
              <div class="more__p" aria-labelledby="dropdown">
                <div class="more__p-grid">
                  <h3 class="more__p-title">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="19"
                      height="19"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="#000000"
                      stroke-width="2"
                      stroke-linecap="square"
                      stroke-linejoin="arcs"
                    >
                      <rect x="9" y="9" width="13" height="13" rx="2" ry="2" />
                      <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
                    </svg> Konsentrasi
                  </h3>
                  <ul class="more__p-item">
                    <li>
                      <a href="#">Pemrograman</a>
                    </li>
                    <li>
                      <a href="#">Multimedia dan Visualisasi</a>
                    </li>
                    <li>
                      <a href="#">Sistem Cerdas</a>
                    </li>
                  </ul>
                </div>
                <div class="more__p-grid">
                  <h3 class="more__p-title">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="19"
                      height="19"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="#000000"
                      stroke-width="2"
                      stroke-linecap="square"
                      stroke-linejoin="arcs"
                    >
                      <circle cx="12" cy="12" r="10" />
                      <line x1="12" y1="8" x2="12" y2="12" />
                      <line x1="12" y1="16" x2="12" y2="16" />
                    </svg> Pedoman Akademik
                  </h3>
                  <ul class="more__p-item">
                    <li>
                      <a href="#">Pedoman Kerja Praktek</a>
                    </li>
                    <li>
                      <a href="#">Pedoman Pelaksanaan Tugas Akhir</a>
                    </li>
                    <li>
                      <a href="#">Pedoman Skripsi</a>
                    </li>
                  </ul>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
      <div class="navigation__bar--other-links">
       
      </div>
    </div>
  </nav>
</template>
<script>
 export default{
   data: () => ({
    isLogin : false,
    currentUser : '',
    login :''
  }),
  created() {
    this.checkCurrentLogin();
   this.getDataUser();
  },
  methods:{
    checkCurrentLogin:function(){
      if (localStorage.getItem("isLogin")) {
        
        this.isLogin = true
      
      }else{
        this.isLogin = false
        this.currentUser = {email : 'login'}
      }
    },
    getDataUser: function() {
      let data = JSON.parse(localStorage.getItem("user"));
      this.currentUser = data[0];
    }
    }
 }
</script>
<style lang="scss" scoped>
@import "../assets/css/variables";

nav {
  background-color: $white;
  width: 100%;
  height: auto;
  font-family: $body-font;

  .navigation__small {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color:$primary-color;
    font-family: $heading-font;
    font-size: 0.75em;
    padding:0.85rem 2rem;

    a.router-link-exact-active {
      padding-bottom: 0.25em;
      border-bottom:2px solid currentColor;
    }

    a.login-btn {
      display: block;
      padding:0.25rem 0.75rem;
      font-weight: bold;
      color:$white;
      text-decoration: none;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;

      svg {
        vertical-align: middle;
        display: inline-block;
        margin-right: 0.5em;
      }

      &:hover {
        background-color:rgba(225,225,225,0.25);
      }
    }

    ul {
      display: flex;

      @media (max-width:60rem) {
        display:none!important;
      }

      li {
        & + li {
          margin-left:1rem;

          &:before {
            content:"/";
            color:$white;
            margin-right: 1rem;
          }
        }
        a {
          color:$white;
          opacity: 0.85;
          text-decoration: none;

          svg {
            margin-right: 0.5rem;
            vertical-align: middle;
          }

          &:hover {
            opacity: 1;
          }
        }
      }
    }
  }

  .navigation__bar {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: $box-shadow-lg;

    @media (max-width: 960px) {
      padding: 1rem 0;
    }

    &--logo {
      display: flex;
      align-items: center;
      padding-left: 1rem;

      img {
        height: 50px;
        margin-right: 1rem;
      }

      span {
        font-weight: bold;
        font-size: 1.15rem;
        margin-right: 1.5rem;
      }
    }
    &--links {
      @media (max-width: 960px) {
        display: none;
      }

      margin: 0;
      display: flex;
      flex-direction: row;
      list-style: none;
      align-items: center;
      li {
        position: relative;

        a {
          font-size: 0.95em;
          position: relative;
          color: #111;
          display: block;
          padding: 2rem 2rem;
          text-decoration: none;
          transition: 0.5s;

          svg {
            display: inline-block;
            vertical-align: middle;
            margin-right: 0.65rem;
          }

          &:before {
            content: "";
            position: absolute;
            bottom: 0px;
            left: 0;
            width: 0;
            height: 5px;
            background-color: #444;
            transition: 0.5s;
          }

          &:hover {
            background-color: $primary-color-light;
          }

          &:hover:before {
            width: 100%;
          }

          &:hover .profile__p,
          &:hover .more__p {
            visibility: visible;
            opacity: 1;
          }

          & > .profile__p {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            left: 0;
            top: calc(100% + 0rem);
            min-width: 18rem;
            padding: 0;
            list-style: none;
            z-index: 999;
            background-color: #fff;
            transition: 0.5s;
            box-shadow: $box-shadow;

            li {
              a {
                padding: 1.25rem 2rem;

                & + a {
                  border-top:1px solid #eee;
                }

                &:before {
                  display: none !important;
                }
              }
            }
          }

          & > .more__p {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            visibility: hidden;
            opacity: 0;
            position: absolute;
            left: calc(-100% * 4);
            top: calc(100% + 0rem);
            min-width: calc(35em * 2 + 2em);
            padding: 0;
            list-style: none;
            z-index: 999;
            background-color: #fff;
            transition: 0.5s;
            box-shadow: $box-shadow;

            .more__p-title {
              grid-column: 1/-1;
              display: block;
              font-weight: bold;
              padding: 1rem !important;
              border-bottom: 1px solid #ddd;
            }

            .more__p-item {
              display: flex;
              flex-wrap: wrap;

              li {
                width: 50%;
                flex-grow: 1;
                a {
                  padding: 1rem 1rem;
                  border: 1px solid #eee;

                  &:before {
                    display: none !important;
                  }
                }
              }
            }
          }
        }

        a.router-link-exact-active {
          font-weight: bold;
        }

        a.router-link-exact-active:before {
          content: "";
          position: absolute;
          bottom: 0px;
          left: 0;
          width: 100%;
          height: 5px;
          background-color: $primary-color;
        }
      }
    }

    &--other-links {
      margin-right: 2rem;
    }
  }
}
</style>
