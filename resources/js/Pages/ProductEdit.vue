<template>
    <div class="container">
        <div class="d-flex justify-content-center">
            <form @submit.prevent="form.put(`/product/${product.id}`)"
                  class="d-flex flex-column justify-content-center">
                <label class="mb-1" for="name">Product Name</label>
                <input id="name" class="mb-3 form-control" placeholder="Enter name here"
                       type="text" v-model="form.name">
                <div v-if="form.errors.name">{{ form.errors.name }}</div>
                <!--                        -->
                <label class="mb-1" for="name">Price</label>
                <input id="name" class="mb-3 form-control" placeholder="Enter price here"
                       type="text" v-model="form.price">
                <div v-if="form.errors.price">{{ form.errors.price }}</div>
                <!--                       -->
                <label class="mb-1" for="name">Description</label>
                <input id="name" class="mb-3 form-control" placeholder="Enter description here"
                       type="text" v-model="form.description">
                <div v-if="form.errors.description">{{ form.errors.description }}</div>
                <!--                       -->
                <label class="mb-1" for="category">Category:</label>
                <select class="mb-4 form-select" id="category" name="category" v-model="form.category_id">
                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                </select>
                <!--                -->
                <button class="mx-3 mb-2 btn btn-warning" type="submit"
                        :disabled="form.processing">
                    Edit Product
                </button>
                <a class="mx-3 btn btn-primary" href="/dashboard">
                    Dashboard
                </a>
            </form>
        </div>

    </div>

</template>

<script>
export default {
    name: "ProductEdit",
    props: ['product', 'categories'],
    data() {
        return {
            form: this.$inertia.form({
                name: this.product.name,
                price: this.product.price,
                description: this.product.description,
                category_id: this.product.category_id
            }),
        }
    }
}
</script>

<style scoped>

</style>
