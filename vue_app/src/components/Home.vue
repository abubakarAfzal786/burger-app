<template>
  <div class="container py-5">
    <div class="title text-center">
      <h1 class="mb-4 font-bold">Order</h1>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <product-card
            v-for="item in totalItems"
            :key="item.index"
            :product="item"
            @addToCard="addProduct(item)"
          ></product-card>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card px-3">
          <template v-if="selectedItem.length < 1">
            <div class="py-5">
              <hr />
              <p class="text-center py-3">Your Cart is empty</p>
              <hr />
            </div>
          </template>

          <template v-else>
            <div class="py-2">
              <div class="mb-3" v-for="item in selectedItem" :key="item.index">
                <div class="d-flex justify-content-between">
                  <div class="">
                    <p>{{ item.title }}</p>
                    <span class="text-xs text-gray-500"
                      >{{ item.description }}
                    </span>
                  </div>
                </div>
                <div class="">
                  <div
                    class="
                      btn btn-sm btn-warning
                      rounded-xl
                      text-white
                      btn-rounded
                    "
                    @click="decreaseQuantity(item)"
                  >
                    -
                  </div>
                  {{ item.quantity }}
                  <div
                    @click="addQuantity(item)"
                    v-if="item.error == null"
                    class="
                      btn btn-sm btn-warning
                      rounded-xl
                      text-white
                      btn-rounded
                    "
                  >
                    +
                  </div>
                </div>
                <span class="error" v-show="item.error">{{ item.error }}</span>
              </div>

              <div class="my-2">
                <hr />
              </div>
              <div class="totalSection">
                <div class="d-flex justify-content-between">
                  <p>Subtotal</p>
                  <p></p>
                </div>
                <div class="d-flex justify-content-between">
                  <p>Delivery Fee</p>
                  <p></p>
                </div>
                <div class="d-flex justify-content-between">
                  <p>Total Amount</p>
                  <p></p>
                </div>
                <div class="btn w-100 mt-4 bg-yellow-500" @click="checkOut">
                  Go to Checkout
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import ProductCard from "./ProductCard";
export default {
  components: {
    "product-card": ProductCard,
  },
  data() {
    return {
      selectedItem: [],

      totalItems: [],
      availableStocks: [],
    };
  },
  mounted() {
    this.handleLoader("show");
    axios
      .get(`${process.env.VUE_APP_API_URL}/api/products`)
      .then((response) => {
        this.handleLoader("hide");
        this.totalItems = response.data.products;
        this.availableStocks = response.data.stocks;
      })
      .catch((error) => {
        this.handleLoader("hide");
        console.log(error);
      });
  },
  methods: {
    addProduct(item) {
      var cartItem = this.selectedItem.find(
        (product) => product.product_id === item.id
      );
      if (cartItem) {
        this.addQuantity(cartItem);
      } else {
        var checkStock = this.checkStock(item, 1);
        console.log(checkStock);
        if (checkStock) {
          this.selectedItem.push({
            product_id: item.id,
            quantity: 1,
            title: item.name,
            error: null,
          });
        } else {
          alert("Out of Stock");
        }
      }
    },
    addQuantity(item) {
      var product = this.totalItems.find(
        (product) => product.id == item.product_id
      );
      var quantity = item.quantity + 1;
      var checkStock = this.checkStock(product, quantity);
      console.log(checkStock);
      if (checkStock) {
        item.quantity++;
      } else {
        item.error = "insufficient Stock";
      }
    },

    decreaseQuantity(item) {
      var product = this.totalItems.find(
        (product) => product.id == item.product_id
      );
      if (item.quantity == 1) {
        this.selectedItem.splice(item.index);
      } else {
        item.quantity--;
      }
      this.updateStock(product, "add");
      item.error = null;
    },
    checkStock(product) {
      var checkStock = true;
      product.ingredients.forEach((ingredient) => {
        console.log("ingre", ingredient.quantity);
        console.log("stck", this.availableStocks[ingredient.stock_id]);
        if (this.availableStocks[ingredient.stock_id] < ingredient.quantity) {
          checkStock = false;
        }
      });
      product.block = true;
      if (checkStock) {
        this.updateStock(product, "subtract");
      }
      return checkStock;
    },
    updateStock(product, opr) {
      product.ingredients.forEach((ingredient) => {
        if (opr == "subtract") {
          this.availableStocks[ingredient.stock_id] =
            this.availableStocks[ingredient.stock_id] - ingredient.quantity;
        }
        if (opr == "add") {
          this.availableStocks[ingredient.stock_id] =
            this.availableStocks[ingredient.stock_id] + ingredient.quantity;
        }
      });
    },
    checkOut() {
      this.handleLoader("show");
      var request = this.selectedItem.map((item) => {
        return { product_id: item.product_id, quantity: item.quantity };
      });
      axios
        .post(`${process.env.VUE_APP_API_URL}/api/create-order`, {
          products: request,
        })
        .then((response) => {
          this.handleLoader("hide");

          if (response.data.message == "error") {
            response.data.orders.forEach((error) => {
              if (error.error !== null) {
                this.selectedItem[error.order].error = error.message;
              }
            });
          } else {
            alert("Your Order Has Been Placed...Thanks");
          }
        })
        .catch((response) => {
          this.handleLoader("hide");

          console.log(response);
        });
    },
  },
};
</script>
<style>
.btn-rounded {
  height: 30px;
  width: 30px;
  border-radius: 62%;
}
.error {
  color: red;
}
</style>
