<template>
	<div>
		<template v-if="loading">
			<div class="row">
				<div class="col-9">
					<div>
						<h2>Menù di {{ restaurant.business_name }}</h2>
						<div class="row row-cols-4">
							<div v-for="product in products" :key="product.id">
								<div class="card mb-2" style="width: 18rem">
									<img
										class="card-img-top"
										:src="'../storage/' + product.img"
										alt="Card image cap"
									/>
									<div class="card-body">
										<h5 class="card-title">{{ product.name }}</h5>
										<p class="card-text">{{ product.description }}</p>
										<p class="card-text">{{ product.ingredients }}</p>
										<div class="add">
											<span>€ {{ product.price }}</span>
											<input
												type="number"
												name="product_quantity"
												:id="'input' + product.id"
												value=""
											/>
											<button class="btn btn-success" @click="addToCart(product.id, product.user_id)">
												Aggiungi al carrello
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-3">
					<Cart />
				</div>
			</div>
		</template>
	</div>
</template>

<script>
import axios from "axios";
import Cart from "./Cart.vue";

export default {
	name: "RestaurantMenu",
	components: {
		Cart,
	},
	data() {
		return {
			loading: false,
			restaurant: null,
			products: [],
			cartProducts: [ 
        // {id : undefined,
        // user_id : undefined,
        // productQuantity : undefined}

      ],
		};
	},
	created() {
		this.getProducts();
    console.log(this.cartProducts);
	},
	methods: {
		getProducts() {
			const slug = this.$route.params.slug;
			axios.get(`/api/${slug}/menu`).then((resp) => {
				// console.log(resp.data.restaurant);
				this.restaurant = resp.data.restaurant;
				this.products = resp.data.products;
				this.loading = true;
			});
		},

		addToCart(id, user_id) {

      // if (this.cartProducts.length > 0 && this.cartProducts[0].user_id !== user_id) {
      //   alert('Non puoi aggiungere articoli di ristoranti diversi')
      // } else {
			  let productQuantity = parseInt(document.getElementById("input" + id).value);
        // if (product.user_id)
			  this.cartProducts.push([id, user_id, productQuantity]);
        document.getElementById("input" + id).value = null;
			  console.log(this.cartProducts);
      
		},
	},
};
</script>

<style lang="">
</style>