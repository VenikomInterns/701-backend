<template>
    <Head title="Welcome"/>
    <section class="">
        <div v-if="canLogin" class="">
            <div v-if="$page.props.user" class="d-flex flex-column">
                <Link :href="route('dashboard')" class="">Dashboard</Link>
                <Link :href="route('logout')" method="post" class="">Log out</Link>
            </div>
            <template v-else>
                <Link :href="route('login')" class="">Log in</Link>
                <br>
                <p>Laravel Version: {{ laravelVersion }}</p>
                <p>PHP Version: {{ phpVersion }}</p>
            </template>
        </div>
    </section>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3';

export default {
    components: {'Head': Head, 'Link': Link},
    props: ['canLogin', 'canRegister', 'laravelVersion', 'phpVersion'],
    data() {
        return {}
    }
}
</script>

