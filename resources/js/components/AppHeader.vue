<template>
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <img src="https://image.winudf.com/v2/image1/Y29tLmRlbGl2ZXJvby5vcmRlcmFwcF9pY29uXzE1NTk3NDMyNjNfMDc0/icon.png?w=&fakeurl=1" alt="">
        <span class="logo" href="#">deliveboo</span>
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
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'home' }"
                >Home</router-link
              >
            </li>
            <li class="nav-item nav-link">Accedi</li>
            <li class="nav-item nav-link">Registrati</li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: "AppHeader",
};
</script>

<style>
header {
  background-color: #00cdbc;
  color: white;
  font-family: Arial, Helvetica, sans-serif;
}

img {
  width: 3rem;
}

.navbar {
  background-color: #00cdbc;
}

.logo {
  font-size: 1.6rem;
}

li {
  margin: 0 0.3rem;
  color: black;
  background-color: white;
  border: 1px solid #eff1f1;
  border-radius: 0.2rem;
  padding: 0 1rem;
}
</style>