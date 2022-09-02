<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <span class="navbar-brand" href="#">DeliveBoo</span>
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
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'home' }"
                >Home</router-link
              >
            </li>
            <li class="nav-item">
              <button class="nav-link" @click="dropDown ? dropDown = false : dropDown = true" >Cart</button>
              <div class="cart-overview" :class=" dropDown ? 'active' : ''">
                <h4>Il tuo Carrello</h4>
                <div class="cart-articles">
                  <p>Articolo 1</p>
                  <p>Articolo 2</p>
                </div>
              </div>
            </li>
            <li class="nav-item" @click="register">Sei un ristoratore?</li>
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

}
</style>