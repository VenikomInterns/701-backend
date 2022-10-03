<template>
    <div class="container">
        <div class="row">
            <h2 class="mb-4 text-center">Category: {{ category_name }}</h2>
            <div class="mb-4 d-flex justify-content-center col-12 col-sm-12 col-md-6">
                <div class="mx-auto p-3 border border-secondary rounded">
                    <form @submit.prevent="form.put(`/category/${category_id}`)"
                          class="d-flex flex-column">
                        <label class="mb-1" for="name">Change Category Name</label>
                        <input id="name" class="mb-3 form-control" placeholder="Enter name here"
                               type="text" v-model="form.name">
                        <div v-if="form.errors.name">{{ form.errors.name }}</div>
                        <button class="mx-3 btn btn-warning" type="submit"
                                :disabled="form.processing">
                            Change Category Name
                        </button>
                    </form>
                </div>
            </div>
            <div class="mb-4 d-flex justify-content-center col-12 col-sm-12 col-md-6">
                <div class="mx-auto p-3 border border-secondary rounded">
                    <form @submit.prevent="product_form.post('/product')"
                          class="d-flex flex-column">
                        <label class="mb-1" for="name">Product Name</label>
                        <input id="name" class="mb-3 form-control" placeholder="Enter name here"
                               type="text" v-model="product_form.name">
                        <div v-if="product_form.errors.name">{{ product_form.errors.name }}</div>
                        <!--                        -->
                        <label class="mb-1" for="name">Price</label>
                        <input id="name" class="mb-3 form-control" placeholder="Enter price here"
                               type="text" v-model="product_form.price">
                        <div v-if="product_form.errors.price">{{ product_form.errors.price }}</div>
                        <!--                       -->
                        <label class="mb-1" for="name">Description</label>
                        <input id="name" class="mb-3 form-control" placeholder="Enter description here"
                               type="text" v-model="product_form.description">
                        <div v-if="product_form.errors.description">{{ product_form.errors.description }}</div>
                        <!--                       -->
                        <button class="mx-3 btn btn-warning" type="submit"
                                :disabled="product_form.processing">
                            Create New Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div v-for="product in products.data" class="mb-4 col-12 col-sm-12 col-md-4 ">
                <div class="py-3 text-center border border-secondary rounded">
                    <h4>{{ product.name }}</h4>
                    <h5>{{ product.price }}$</h5>
                    <p>{{ product.description }}</p>
                    <p>{{ product.created_at.split('T')[0] }}</p>
                    <p>{{ product.created_at.split('T')[1].split('.')[0] }}</p>
                    <Link :href="route('product.destroy', {'product': product.id})"
                          class="mx-2 mb-4 btn btn-danger" as="button" method="delete">Delete
                    </Link>
                    <Link :href="route('product.show', {'product': product.id})"
                          class="mx-2 mb-4 btn btn-warning" as="button" method="get">Edit
                    </Link>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="/dashboard">Dashboard</a></li>
                <li class="page-item"><a class="page-link" :href="products.prev_page_url">Previous page</a></li>
                <li class="page-item"><p class="page-link">Current: {{ products.current_page }}</p></li>
                <li class="page-item"><a class="page-link" :href="products.next_page_url">Next page</a></li>
            </ul>
        </nav>
    </div>

</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'

export default {
    components: {'Link': Link},
    name: "ProductsByCategory",
    props: ['products', 'category_id', 'category_name'],
    data() {
        return {
            form: this.$inertia.form({
                name: this.category_name,
            }),
            product_form: this.$inertia.form({
                name: null,
                price: null,
                description: null,
                category_id: this.category_id
            }),
        }
    },
}
</script>

<style scoped>

</style>

