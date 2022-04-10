<template>
  <div class="container bg-light">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-success">Home Component</div>

          <div class="card-body bg-warning">I'm an Home component.</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
