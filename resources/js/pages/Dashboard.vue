<template>
  <div class="container">
    <h4 class="text-muted">
      Dashboard : <b class="text-dark">{{ user.name }}</b>
    </h4>
    <!-- <todo /> -->
  </div>
</template>
<script type="text/javascript">
// import todo from "../components/Todo.vue";
import { mapGetters, mapActions } from "vuex";
export default {
  components: {
    // todo,
  },
  computed: {
    ...mapGetters({ user: "getUser" }),
  },
};
</script>