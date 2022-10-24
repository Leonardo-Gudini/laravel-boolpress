<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
            <a class="navbar-brand" href="/">Boolpress</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul v-for="(item, index) in navItems" class="navbar-nav" :key="index">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: item.link}">{{ item.name }}</router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'MyHeader',
    data() {
        return{
            navItems: [
                {
                    name: 'contact',
                    link: 'contact'
                },
                {
                    name: 'posts',
                    link: 'posts'
                },
                {
                    name: 'info',
                    link: 'info'
                },
            ]
        }
    }
}
</script>

<style>

</style>