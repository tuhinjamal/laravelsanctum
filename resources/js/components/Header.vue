<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand nav-title" href="#">Tuhin Jamal</a>
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
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link
              class="nav-link active"
              aria-current="page"
              :to="{ name: 'home' }"
              >Home</router-link
            >
          </li>
          <li class="nav-item">
            <router-link class="nav-link active" :to="{ name: 'category-list' }"
              >Category</router-link
            >
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Portfolio</a>
          </li>
          <li class="nav-item active">
            <router-link
              class="nav-link active"
              aria-current="page"
              :to="{ name: 'product-list' }"
              >Product</router-link
            >
          </li>

          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'login' }"
              >Login</router-link
            >
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'signup' }"
              >Signup</router-link
            >
          </li>
          <li>
            <a href="" class="nav-link" @click.prevent="logout">logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  methods: {
    logout() {
      axios.post("/logout").then((response) => {
        this.$router.push({ name: "login" });
        this.$toaster.success("You have been logged out");
      });
    },
  },
};
</script>

<style></style>