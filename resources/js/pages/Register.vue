<template>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="card form-holder">
          <div class="card-body pt-4 pb-4">
            <h1 class="text-muted">Register</h1>

            <div v-if="showError">
              <span v-if="errors">
                <small v-for="error in errors" class="text-danger d-block">{{
                  error[0]
                }}</small>
              </span>
            </div>

            <form action="" method="post" @submit.prevent="submit">
              <div class="form-group">
                <label>Name</label>
                <input
                  type="text"
                  name=""
                  class="form-control"
                  placeholder="Name"
                  v-model="form.name"
                />
              </div>
              <div class="form-group">
                <label>Email</label>
                <input
                  type="email"
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

              <div class="form-group">
                <label>Confirm Password</label>
                <input
                  type="password"
                  name=""
                  class="form-control"
                  placeholder="Confirm Password"
                  v-model="form.password_confirmation"
                />
              </div>

              <div class="row">
                <div class="col-4 text-left"></div>
                <div class="col-8 text-right">
                  <input
                    type="submit"
                    class="btn btn-primary pr-5 pl-5"
                    value=" Register "
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
import { mapActions, mapGetters } from "vuex";
export default {
  name: "Register",
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      showError: false,
    };
  },
  computed: {
    ...mapGetters({ errors: "getError" }),
  },
  methods: {
    ...mapActions(["Register"]),
    submit: function () {
      let data = {
        name: this.form.name,
        email: this.form.email,
        password: this.form.password,
        password_confirmation: this.form.password_confirmation,
      };

      this.$store
        .dispatch("Register", data)
        .then(() => this.$router.push("/dashboard"))
        .catch((err) => {
          this.showError = true;
        });
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