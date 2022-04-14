<template>
  <div class="col-md-3">
    <div class="card cursor-pointer">
      <div
        :style="`
              background:url('${this.product.image}') center center; height:300px`"
        class="card-img-top w-full"
      >
        <div class="d-flex flex-column justify-content-between h-100">
          <div class="d-flex justify-end">
            <!-- <div class="btn btn-sm btn-warning text-white"></div> -->
          </div>
          <div class="d-flex justify-end">
            <div
              @click="$emit('addToCard')"
              class="btn btn-sm btn-warning btn-rounded rounded-xl text-white"
            >
              +
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <p class="card-text">
          {{ this.product.description }}
        </p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "ProductCard",
  props: {
    product: { type: Object, default: () => {}, required: true },
  },
};
</script>