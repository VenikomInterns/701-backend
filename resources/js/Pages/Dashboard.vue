<template>
    <div class="container">
        <div class="d-flex flex-column">
            <div class="mx-auto">
                <h2 class="mb-4">Admin Dashboard</h2>
                <h5>Categories:</h5>
                <Link v-for="category in categories" :href="route('category.show', {'category': category.id})"
                      class="mx-2 mb-4 btn btn-primary" as="button" method="get">{{ category.name }}
                </Link>
            </div>
            <div class="mx-auto p-3 border border-secondary rounded">
                <form @submit.prevent="form.post('category', {onSuccess: () => form.reset('name')})"
                      class="d-flex flex-column">
                    <label class="mb-1" for="name">New Category Name</label>
                    <input id="name" class="mb-3 form-control" placeholder="Enter name here" type="text"
                           v-model="form.name">
                    <div v-if="form.errors.name">{{ form.errors.name }}</div>
                    <button class="mx-3 btn btn-success" type="submit" :disabled="form.processing">Add New Category
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/inertia-vue3'

export default {
    components: {'AppLayout': AppLayout, 'Link': Link},
    props: ['categories'],
    data() {
        return {
            selected: 1,
            form: this.$inertia.form({
                name: null,
            }),
        }
    },

}
</script>

