<template>
  <div class="py-5">
    <div class="py-5 text-center">
      <h1 class="text">Ordine effettuato con successo, ti abbiamo inviato tutti i dettagli tramite email</h1>
    </div>
    <div class="py-2 text-center">
      <button type="button" class="btn btn-brand">
        <router-link
          class="text-decoration-none text-white"
          :to="{ name: 'home' }"
          >Torna alla Home</router-link
        >
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Greetings",
};
</script>

<style>
</style>