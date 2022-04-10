<template>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="card form-holder">
          <div class="card-body pt-5 pb-5">
            <h1 class="text-muted">Login</h1>
            <form action="" method="post" @submit.prevent="submit">
              <div class="form-group">
                <label>Email</label>
                <input
                  type="text"
                  name=""
                  class="form-control"
                  placeholder="Email"
                  v-model="form.email"
                />
              </div>
              <div class="form-group">
                <label>Password</label>
                <input
                  type="password"
                  name=""
                  class="form-control"
                  placeholder="Password"
                  v-model="form.password"
                />
              </div>

              <p v-if="showError" class="text-danger">
                Username or Password is incorrect
              </p>

              <div class="row">
                <div class="col-6 text-left">
                  <a href="#" class="btn btn-link">Forgot Password</a>
                </div>
                <div class="col-6 text-right">
                  <input
                    type="submit"
                    class="btn btn-primary pr-5 pl-5"
                    value=" Login "
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import { mapActions } from "vuex";
export default {
  name: "Login",
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      showError: false,
    };
  },

  methods: {
    ...mapActions(["login"]),

    submit: function () {
      this.$store
        .dispatch("login", this.form)
        .then(() => this.$router.push("/dashboard"))
        .catch((err) => console.log(err));
    },
  },
};
</script>



<style>
.form-holder {
  margin-top: 20%;
  margin-bottom: 20%;
}
</style>