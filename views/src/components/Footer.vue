<template>
    <footer>
        <div class="inner_footer">
            <div class="grid-footer">
                <h2>Informasi</h2>
                <ul class="more-link">
                    <li><a href="#">Tentang kami</a></li>
                    <li><a href="#">Dosen</a></li>
                    <li><a href="#">Student</a></li>
                    <li><a href="#">Online publication</a></li>
                    <li><a href="#">LPM</a></li>
                    <li><a href="#">E-library</a></li>
                    <li><a href="#">E-learning</a></li>
                    <li><a href="#">E-journal</a></li>
                </ul>
            </div>
            <div class="grid-footer">
                <h2>Alamat</h2>
                Jalan Letjen Pol Sumarto, Purwokerto Utara, Banyumas Regency, Jawa Tengah, Indonesia 53127 +(0281) 623321
            </div>
            <div class="grid-footer">
                <h2>Ikuti</h2>
                <ul class="social-media">
                    <li><a href="#"><font-awesome-icon :icon="['fab', 'instagram']" size="lg" /></a></li>
                    <li><a href="#"><font-awesome-icon :icon="['fab', 'facebook']" size="lg" /></a></li>
                    <li><a href="#"><font-awesome-icon :icon="['fab', 'twitter']" size="lg" /></a></li>
                    <li><a href="#"><font-awesome-icon :icon="['fas', 'book']" size="lg" /></a></li>
                    <li><a href="#"><font-awesome-icon :icon="['fas', 'globe']" size="lg" /></a></li>
                </ul>
            </div>
        </div>
        <div class="copyright__footer">
            2019 &copy; Universitas Amikom Purwokerto 
        </div>
    </footer>
</template>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&display=swap');
@import "../assets/css/variables";
@import "../assets/css/mixins";

footer {
    background-color:$black;
    color:#eee;
    font-family:$body-font;
    line-height: 1.5;

    .more-link {
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        overflow: hidden;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
        

        li {
            width:50%;
            flex-grow: 1;
            margin-top:0.5rem;

            a {
                display: block;
                color:#fff;
            }
        }
    }

    .social-media {
        display:flex;
        list-style: none;
        margin:1.5rem 0 0 0;
        
        li {
            & + li {
                margin-left: 1rem;
            }

            a {
                display: inline-block;
                color:#fff;
                background-color:#222;
                padding:0.7rem 1rem;
                -webkit-border-radius: 100%;
                -moz-border-radius: 100%;
                border-radius: 100%;
                @include transition(background-color .3s ease);

                &:hover {
                    background-color: $primary-color;
                }

                svg {
                    width:16px;
                }
            }
        }
    }

    .inner_footer {
        max-width: 1240px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 3.5rem;
        padding:4rem 3rem;

        @include bp-medium {
            grid-template-columns: repeat(1, 1fr);
            padding:2rem;
        }

        & > .grid-footer {
            h2 {
                font-weight: bold;
                margin-bottom: 1rem!important;
            }
        }
    }

    .copyright__footer {
        background-color:#222;
        padding:1.5rem 3.5rem;
    }
}
</style>