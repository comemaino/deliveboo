<template>
  <footer class="container-fluid">
      <div class="row">
          <div class="col-md-3 col-sm-12 gx-3 footer-card">
              <h4>Scopri Deliveboo</h4>
              <ul>
                  <li><a href="">Investitori</a></li>
                  <li><a href="">Chi siamo</a></li>
                  <li><a href="">Ristoranti</a></li>
                  <li><a href="">Altro</a></li>
                  <li><a href="">Programmazione</a></li>
                  <li><a href="">Il nostro blog</a></li>
                  <li><a href="">Programmazione</a></li>
                  <li><a href="">Design</a></li>
                  <li><a href="">Diventa nostro partner</a></li>
                  <li><a href="">Lavora con noi</a></li>
              </ul>
          </div>
          <div class="col-md-3 col-sm-12 footer-card">
              <h4>Note Legali</h4>
              <ul>
                  <li><a href="">Termini & Condizioni</a></li>
                  <li><a href="">Informativa sulla privacy</a></li>
                  <li><a href="">Cookies</a></li>

              </ul>
          </div>
          <div class="col-md-3 col-sm-12 footer-card">
              <h4>Aiuto</h4>
              <ul>
                  <li><a href="">Contatti</a></li>
                  <li><a href="">FAQ</a></li>
                  <li><a href="">Tipi di cucina</a></li>

              </ul>
          </div>
          <div class="col-md-3 col-sm-12 footer-card">
              <h4>Seguici sui social</h4>
              <ul class="social-icons d-flex">
                  <li>
                      <a href="https://www.facebook.com/DeliverooIT"><i class="fa-brands fa-facebook"></i></a>
                  </li>
                  <li>
                      <a href="https://twitter.com/deliveroo_italy"><i class="fa-brands fa-twitter"></i></a>
                  </li>
                  <li>
                      <a href="https://www.instagram.com/deliveroo_italy/"><i class="fa-brands fa-instagram"></i></a>
                  </li>
              </ul>
          </div>
      </div>
  </footer>
</template>

<script>
export default {
    name: "AppFooter",
}
</script>

<style lang="scss" scoped>
footer {
    background-color: #2e3333;
    height: 395px;
}

.row{
    width: 80%;
    margin: 0 auto;
}

.footer-card {
    background-color: #434848;
    color: white;
    margin-top: 2rem;
    margin-bottom: 2rem;
    // margin-left: 8px;
    // width: calc(100% / 4 - 16px);
    
}

h4 {
    padding-top: 1.5rem;
}

ul {
    padding-left: 0;
}

li {
    list-style: none;
}

a {
    text-decoration: none;
    color: inherit;
}

a:hover {
    color: #00CDBC;
}

.social-icons > li {
    margin: 0 8px;

    .fa-brands {
        font-size: 30px;
        line-height: 60px;
    }

    .fa-brands:hover {
        transform: translate(0, -10%);
        transition: ease-in-out .4s;
    }
}
</style>