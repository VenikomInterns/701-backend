<template>
    <nav class=" mb-5 navbar navbar-expand-lg navbar-light bg-custom">
        <a class="navbar-brand" href="/">
            <img src="../../css/images/d_icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            Dushans Web Store
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>

            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: "NavBarComponent"
}
</script>

<style scoped>
.bg-custom {
    background-color: deepskyblue;
}
</style>
