<template>
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <img class="logo-img" src="img/logo.webp" alt="">
        <span class="logo-text"><router-link class="nav-link" :to="{ name: 'home' }"
                >deliveboo</router-link></span>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <!-- <li class="nav-item cart-btn" @click="dropDown ? dropDown = false : dropDown = true">
              <i class="fas fa-shopping-cart"></i>
              Carrello
              <div class="cart-overview" :class=" dropDown ? 'active' : ''">
                <h4>Il tuo Carrello</h4>
                <div class="cart-articles">
                  <p>Articolo 1</p>
                  <p>Articolo 2</p>
                </div>
              </div>
            </li> -->
            <li class="nav-item checkout-btn">
              <i class="fas fa-shopping-cart"></i>
              <router-link class="text-dark text-decoration-none" :to="{ name: 'Checkout' }">Checkout</router-link>
            </li>
            <li class="nav-item login-btn" @click="register">
              <i class="fas fa-home"></i> Accedi o registrati</li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: "AppHeader",
  data() {
    return {
      dropDown: false,
    }
  },
  methods: {
    register() {
      axios.post("/register").finally((err) => {
        window.location.href = "/register";
      });
    }
  },
};
</script>

<style lang="scss" scoped>
header {
  position: relative;
  background-color: #00CDBC;
  color: white;

  .logo-text {
    font-size: 1.5rem;
  }

  .logo-img {
    width: 2.5rem;
  }

  li {
    padding: .4rem 1.2rem;
    border: 1px solid #e8ebeb;
    border-radius: 3px;
    background-color: white;
    color: black;
    margin-left: .5rem;
  }

  .fas {
    color: #00CDBC;
    padding-right: .3rem;
  }

  .cart-overview {
    min-width: 150px;
    padding: 2em;
    border: 1px solid #00CDBC;
    background-color: gray ;
    border-radius: 10px; 
    display: none; 
    position: absolute;
    top: 100%;
    z-index: 100;
  }

  .active {
    display: block!important;
  }

  .login-btn, .cart-btn, .checkout-btn {
    cursor: pointer;
  }

  .login-btn:hover,
  .cart-btn:hover,
  .checkout-btn:hover {
    border: 1px solid #707777;
  }
}
</style>